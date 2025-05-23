<?php

use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\WalletsClient;

class WalletsClientIntegrationTest extends TestCase
{
    private static $walletApi;
    private static $revocationApi;

    private static string $walletDid;
    private static string $walletId;
    private static string $walletIdDidWeb;

    public static function setUpBeforeClass(): void
    {
        $wallet = createWallet();
        self::$walletId = $wallet['id'];

        $wallet = createWallet('web');
        self::$walletIdDidWeb = $wallet['id'];
    }

    public static function tearDownAfterClass(): void
    {
        // Delete wallet
        if (!empty(self::$walletId)) {
            deleteWallet(self::$walletId);
        }

        if (!empty(self::$walletIdDidWeb)) {
            deleteWallet(self::$walletIdDidWeb);
        }
    }

    public function testSigningCredentials(): void
    {
    }

    public function testWallets(): void
    {
        $config = WalletsClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', getTokenCallback());

        $api = new WalletsClient\Api\WalletApi(
            new GuzzleHttp\Client(),
            $config
        );

        $result = $api->listWallets();
        $resultJson = json_decode($result, true);

        debugMessage('Wallets Client List Wallets Response', ['result' => $result], true);

        // Assert that 'wallets' key exists
        $this->assertArrayHasKey('wallets', $resultJson, 'The response does not contain a "wallets" key.');

        // Assert that the count of wallets is greater than 0
        $walletsCount = count($resultJson['wallets']);
        $this->assertGreaterThan(0, $walletsCount, 'No wallets were returned in the response.');
    }
}
