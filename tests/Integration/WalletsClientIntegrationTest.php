<?php

use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\WalletsClient;

class WalletsClientIntegrationTest extends TestCase
{
    public function testListWallets()
    {
        $config = WalletsClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', getTokenCallback());

        $api = new WalletsClient\Api\WalletApi(
            new GuzzleHttp\Client(),
            $config
        );

        $result = $api->listWallets();
        $resultJson = json_decode($result, true);

        // Assert that 'wallets' key exists
        $this->assertArrayHasKey('wallets', $resultJson, 'The response does not contain a "wallets" key.');

        // Assert that the count of wallets is greater than 0
        $walletsCount = count($resultJson['wallets']);
        $this->assertGreaterThan(0, $walletsCount, 'No wallets were returned in the response.');
    }
}
