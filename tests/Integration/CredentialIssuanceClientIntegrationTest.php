<?php

use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\CredentialIssuanceClient;

class CredentialIssuanceClientIntegrationTest extends TestCase
{
    public function testIssuance()
    {
        $config = CredentialIssuanceClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', getTokenCallback());

        $api = new CredentialIssuanceClient\Api\IssuanceApi(
            new GuzzleHttp\Client(),
            $config
        );

        $projectId = getConfiguration()['projectId'];
        $issuanceData = getConfiguration()['issuanceData'];

        debugMessage('Start Credential Issuance', ['projectId' => $projectId, 'issuanceData' => $issuanceData]);
        $result = $api->startissuance($projectId, json_decode($issuanceData));
        $resultJson = json_decode($result, true);

        debugMessage('Credential Issuance Response', ['result' => $result], true);

        // Assert that 'credentialOfferUri' key exists
        $this->assertArrayHasKey('credentialOfferUri', $resultJson, 'The response does not contain a "credentialOfferUri" key.');
        // Assert that 'issuanceId' key exists
        $this->assertArrayHasKey('issuanceId', $resultJson, 'The response does not contain a "issuanceId" key.');
    }

    public function testIssuanceConfig()
    {
        $config = CredentialIssuanceClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', getTokenCallback());

        $api = new CredentialIssuanceClient\Api\ConfigurationApi(
            new GuzzleHttp\Client(),
            $config
        );

        $result = $api->getIssuanceConfigList();
        $resultJson = json_decode($result, true);

        debugMessage('List Credential Issuance Configurations', ['result' => $resultJson]);

        // If we have issuance configuration, gets its ID, otherwise create a new one
        if (count($resultJson) == 1) {
            $configId = $resultJson['configurations'][0]['id'];

            // Assert that 'id' key exists
            $this->assertArrayHasKey('id', $resultJson['configurations'][0], 'The response does not contain a "id" key.');
        } else {
            $configInput = [
                'name' => 'TestConfig',
                'issuerWalletId' => 'cc64266957a88423c76605188b27d7e0',
                'credentialSupported' => [
                    [
                        'credentialTypeId' => 'TSkillBadgeV1R0',
                        'jsonLdContextUrl' => 'https://schema.affinidi.io/TSkillBadgeV1R0.jsonld',
                        'jsonSchemaUrl' => 'https://schema.affinidi.io/TSkillBadgeV1R0.json',
                    ]
                ]
            ];

            debugMessage('Create Credential Issuance Configuration', ['configInput' => $configInput]);
            $result = $api->createIssuanceConfig($configInput);
            $resultJson = json_decode($result, true);

            debugMessage('Create Credential Issuance Configuration Response', ['result' => $resultJson], true);

            // Assert that 'id' key exists
            $this->assertArrayHasKey('id', $resultJson, 'The response does not contain a "id" key.');

            $configId = $resultJson['id'];

            // reading details of the configuration since the endpoint returns only ID
            $result = $api->getIssuanceConfigById($configId);
            $resultJson = json_decode($result, true);

            // Assert that 'webhook' key exists
            $this->assertArrayHasKey('webhook', $resultJson, 'The response does not contain a "webhook" key.');
            $this->assertEquals($resultJson['webhook']['enabled'], false);
        }

        // updating webhook url
        $configUpdateInput = [
            'webhook' => [
                'enabled' => true,
                'endpoint' => [
                    'url' => 'https://webhook.com'
                ]
            ]
        ];

        $result = $api->updateIssuanceConfigById($configId, $configUpdateInput);
        $resultJson = json_decode($result, true);

        $this->assertEquals($resultJson['webhook']['enabled'], true);
        $this->assertArrayHasKey('url', $resultJson['webhook']['endpoint'], 'The response does not contain a "url" key.');
    }
}
