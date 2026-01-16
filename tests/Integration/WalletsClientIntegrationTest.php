<?php

use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\WalletsClient;
use AffinidiTdk\Clients\WalletsClient\Model\CreateWalletV2Input;
use AffinidiTdk\Clients\WalletsClient\Model\RevokeCredentialsInput;
use AffinidiTdk\Clients\WalletsClient\Model\SignCredentialsLdpInputDto;

class WalletsClientIntegrationTest extends TestCase
{
    private static WalletsClient\Api\WalletApi $walletApi;
    private static WalletsClient\Api\RevocationApi $revocationApi;

    private static string $walletDid;
    private static string $walletId;
    private static string $walletIdDidWeb;

    private static string $v2WalletId;

    public static function setUpBeforeClass(): void
    {
        $config = self::getApiConfig();

        self::$walletApi = new WalletsClient\Api\WalletApi(config: $config);
        self::$revocationApi = new WalletsClient\Api\RevocationApi(config: $config);

        $wallet = createWallet();
        self::$walletId = $wallet['id'];
        self::$walletDid = $wallet['did'];

        $walletWeb = createWallet('web');
        self::$walletIdDidWeb = $walletWeb['id'];

        $walletV2 = createWalletV2();
        self::$v2WalletId = $walletV2['id'];
    }

    public static function tearDownAfterClass(): void
    {
        foreach ([self::$walletId, self::$walletIdDidWeb, self::$v2WalletId] as $walletId) {
            if (!empty($walletId)) {
                deleteWallet($walletId);
            }
        }
    }

    private static function getApiConfig(): WalletsClient\Configuration
    {
        $originalBasePath = WalletsClient\Configuration::getDefaultConfiguration()->getHost();
        $host = replaceBaseDomain($originalBasePath);

        return WalletsClient\Configuration::getDefaultConfiguration()
            ->setApiKey('authorization', '', getTokenCallback())
            ->setHost($host);
    }

    public function testSignAndRevokeCredential(): void
    {
        $expiresAt = (new DateTime('+10 minutes'))->format(DateTime::ATOM);
        $params = json_decode(getConfiguration()['unsignedCredentialParams'], true);

        $params['holderDid'] = self::$walletDid;
        $params['expiresAt'] = $expiresAt;

        $input = [
            'unsignedCredentialParams' => $params,
            'revocable' => true,
        ];

        $signCredentialResponse = self::$walletApi->signCredential(self::$walletId, $input);
        $data = decodeJson($signCredentialResponse);

        $this->assertArrayHasKey('signedCredential', $data);
        $credential = $data['signedCredential'];
        $this->assertArrayHasKey('proof', $credential);
        // Signed credential should be valid
        $this->assertTrue(isCredentialValid($credential));

        $revocationListUrl = $credential['credentialStatus']['revocationListCredential'];
        $statusId = extractRevocationStatusId($revocationListUrl);
        $this->assertNotEmpty($statusId);

        $revocationCredentialStatusResponse = self::$revocationApi->getRevocationCredentialStatus(
            getConfiguration()['projectId'],
            self::$walletId,
            $statusId
        );
        $credentialStatus = decodeJson($revocationCredentialStatusResponse);
        $this->assertArrayHasKey('revocationListCredential', $credentialStatus);

        $revocationListCredential = $credentialStatus['revocationListCredential'];
        foreach (['id', 'type', 'credentialSubject', 'proof'] as $key) {
            $this->assertArrayHasKey($key, $revocationListCredential);
        }

        $this->assertEquals(['VerifiableCredential', 'RevocationList2020Credential'], $revocationListCredential['type']);

        self::$revocationApi->revokeCredential(self::$walletId, [
            'revocationReason' => 'test',
            'credentialId' => $credential['id'],
        ]);
        // Revoked credential should be invalid
        $this->assertFalse(isCredentialValid($credential));
    }

    public function testSignInvalidCredential(): void
    {
        $expiresAt = (new DateTime())->format(DateTime::ATOM);
        $params = json_decode(getConfiguration()['unsignedCredentialParams'], true);

        $params['holderDid'] = self::$walletDid;
        $params['expiresAt'] = $expiresAt;

        $input = [
            'unsignedCredentialParams' => $params,
            'revocable' => false,
        ];

        $signCredentialResponse = self::$walletApi->signCredential(self::$walletId, $input);
        $data = decodeJson($signCredentialResponse);

        $this->assertArrayHasKey('signedCredential', $data);
        $credential = $data['signedCredential'];
        $this->assertArrayHasKey('proof', $credential);

        // Expired credential should be invalid
        $this->assertFalse(isCredentialValid($credential));
    }

    public function testSignJwt(): void
    {
        $input = [
            'header' => [
                'alg' => 'HS256',
                'typ' => 'JWT',
            ],
            'payload' => [
                'sub' => Uuid::uuid4()->toString(),
                'iat' => time(),
                'exp' => time() + (5 * 60),
            ],
        ];

        $response = self::$walletApi->signJwtToken(self::$walletId, $input);
        $resultJson = decodeJson($response);

        $this->assertArrayHasKey('signedJwt', $resultJson);
    }

    public function testWallets(): void
    {
        // Get wallet
        $getWalletResponse = self::$walletApi->getWallet(self::$walletId);
        $wallet = decodeJson($getWalletResponse);
        $this->assertArrayHasKey('id', $wallet);

        // List wallets
        $walletsListResponse = self::$walletApi->listWallets();
        $data = decodeJson($walletsListResponse);
        $this->assertArrayHasKey('wallets', $data);
        $this->assertGreaterThan(0, count($data['wallets']));

        // Update wallet
        $updatedName = 'UpdatedName';
        $updateWalletResponse = self::$walletApi->updateWallet(self::$walletId, ['name' => $updatedName]);
        $updatedWallet = decodeJson($updateWalletResponse);
        $this->assertArrayHasKey('name', $updatedWallet);
        $this->assertEquals($updatedName, $updatedWallet['name']);
    }

    public function testCreateV2Wallet(): void
    {
        $data = [
            'did_method' => 'key',
            'wallet_version' => 'v2',
        ];

        $input = new CreateWalletV2Input($data);
        $createWalletResponse = self::$walletApi->createWalletV2($input);
        $walletData = decodeJson($createWalletResponse);

        $this->assertArrayHasKey('wallet', $walletData);
        $this->assertArrayHasKey('id', $walletData['wallet']);
        $this->assertArrayHasKey('did', $walletData['wallet']);
        $this->assertStringStartsWith('did:key:', $walletData['wallet']['did']);

        // Clean up
        deleteWallet($walletData['wallet']['id']);
    }

    public function testSignAndRevokeLdpCredential(): void
    {
        $credentialId = 'urn:uuid:' . Uuid::uuid4()->toString();
        $unsignedCredential = json_decode(getConfiguration()['unsignedCredentialV2'], true);
        $unsignedCredential['id'] = $credentialId;

        $input = [
            'unsignedCredential' => $unsignedCredential,
            'revocable' => true,
        ];

        $signCredentialResponse = self::$walletApi->signCredentialsLdp(self::$v2WalletId, $input);
        $data = decodeJson($signCredentialResponse);

        $this->assertArrayHasKey('credential', $data);
        $credential = $data['credential'];
        echo "\n\033[0;36m[CREDENTIAL]\033[0m " . json_encode($credential, JSON_PRETTY_PRINT) . "\n";
        $this->assertArrayHasKey('proof', $credential);

        $revocationListUrl = $credential['credentialStatus']['revocationListCredential'];

        $statusId = extractRevocationStatusId($revocationListUrl);
        $this->assertNotEmpty($statusId);

        $revocationCredentialStatusResponse = self::$revocationApi->getRevocationCredentialStatus(
            getConfiguration()['projectId'],
            self::$v2WalletId,
            $statusId
        );
        $credentialStatus = decodeJson($revocationCredentialStatusResponse);
        $this->assertArrayHasKey('revocationListCredential', $credentialStatus);

        $revocationListCredential = $credentialStatus['revocationListCredential'];
        foreach (['id', 'type', 'credentialSubject', 'proof'] as $key) {
            $this->assertArrayHasKey($key, $revocationListCredential);
        }

        $this->assertEquals(['VerifiableCredential', 'RevocationList2020Credential'], $revocationListCredential['type']);

        $revokeCredentialInput = new RevokeCredentialsInput([
            'revocation_reason' => 'test',
            'credential_id' => $credentialId,
        ]);

        self::$revocationApi->revokeCredentials(self::$v2WalletId, $revokeCredentialInput);

        // Revoked credential should be invalid
        $this->assertFalse(isCredentialValidV2($credential));
    }
}
