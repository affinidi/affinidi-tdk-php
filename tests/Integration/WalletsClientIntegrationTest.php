<?php

use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\WalletsClient;

class WalletsClientIntegrationTest extends TestCase
{
    private static WalletsClient\Api\WalletApi $walletApi;
    private static WalletsClient\Api\RevocationApi $revocationApi;

    private static string $walletDid;
    private static string $walletId;
    private static string $walletIdDidWeb;

    public static function setUpBeforeClass(): void
    {
        $config = self::getApiConfig();

        self::$walletApi = new WalletsClient\Api\WalletApi(config: $config);
        self::$revocationApi = new WalletsClient\Api\RevocationApi(config: $config);

        $walletKey = createWallet();
        self::$walletId = $walletKey['id'];
        self::$walletDid = $walletKey['did'];

        $walletWeb = createWallet('web');
        self::$walletIdDidWeb = $walletWeb['id'];
    }

    public static function tearDownAfterClass(): void
    {
        foreach ([self::$walletId, self::$walletIdDidWeb] as $walletId) {
            if (!empty($walletId)) {
                deleteWallet($walletId);
            }
        }
    }

    private static function getApiConfig(): WalletsClient\Configuration
    {
        return WalletsClient\Configuration::getDefaultConfiguration()
            ->setApiKey('authorization', '', getTokenCallback());
    }

    public function testSignAndRevokeCredential(): void
    {
        $expiresAt = (new DateTime('+10 minutes'))->format(DateTime::ATOM);
        $params = decodeJson(getConfiguration()['unsignedCredentialParams']);
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
        $params = decodeJson(getConfiguration()['unsignedCredentialParams']);

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
}
