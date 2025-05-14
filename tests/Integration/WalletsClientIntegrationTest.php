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

        debugMessage('Wallets Client List Wallets Response', ['result' => $result], true);

        // Assert that 'wallets' key exists
        $this->assertArrayHasKey('wallets', $resultJson, 'The response does not contain a "wallets" key.');

        // Assert that the count of wallets is greater than 0
        $walletsCount = count($resultJson['wallets']);
        $this->assertGreaterThan(0, $walletsCount, 'No wallets were returned in the response.');
    }

    public function testSignCredential()
    {
        $config = WalletsClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', getTokenCallback());

        $api = new WalletsClient\Api\WalletApi(
            new GuzzleHttp\Client(),
            $config
        );
        $walletId = getConfiguration()['walletId']; // Wallet as per environment variables
        $unsignedRequest = [
            'unsignedCredentialParams' => [
                'jsonLdContextUrl' => getConfiguration()['schemaJsonLd'],
                'jsonSchemaUrl' => getConfiguration()['schemaJson'],
                'typeName' => getConfiguration()['schemaJsonTypeId'],
                'credentialSubject' => [
                    '@type' => [
                        'VerifiableCredential',
                        getConfiguration()['schemaJsonTypeId'],
                    ],
                    'hashWithoutAttachments' => '1db21096a5ec3ecd1aad513b0b26b3acf8939bf321125fb2a737ae7cb36e9048',
                    'hashWithAttachment' => 'personalInfo.json',
                    'orderId' => '123456',
                ],
                'holderDid' => getConfiguration()['holderDID'],
                'expiresAt' => '2030-12-31T23:59:59Z',
            ],
        ];
        $result = $api->signCredential($walletId, $unsignedRequest);
        $resultJson = json_decode($result, true);

        debugMessage('Wallets Client Sign Credential Response', ['result' => $result], true);

        // Assert that 'credential' key exists
        $this->assertArrayHasKey('signedCredential', $resultJson, 'The response does not contain a "signedCredential" key.');

        // Assert that the credential is not empty
        $this->assertNotEmpty($resultJson['signedCredential'], 'The credential is empty.');
    }
}
