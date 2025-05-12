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
        $config = CredentialIssuanceClient\Configuration::getDefaultConfiguration()->setApiKey('Authorization', '', getTokenCallback());

        $api = new CredentialIssuanceClient\Api\ConfigurationApi(
            new GuzzleHttp\Client(),
            $config
        );

        $result = $api->getIssuanceConfigList();
        $resultJson = json_decode($result, true);

        debugMessage('List Credential Issuance Configurations', ['result' => $resultJson]);

        // Check if there are any configurations in the list
        if (!empty($resultJson['configurations'])) {
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


    private function batchCredentialStartIssuance(): array
    {
        $config = CredentialIssuanceClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', getTokenCallback());


        $api = new CredentialIssuanceClient\Api\IssuanceApi(
            new GuzzleHttp\Client(),
            $config
        );
        $projectId = getConfiguration()['projectId'];
        $issuanceData = getConfiguration()['issuanceData'];

        $result = $api->startissuance($projectId, json_decode($issuanceData));
        $resultJson = json_decode($result, true);
        debugMessage('Start Credential Issuance Response', ['result' => $resultJson], true);
        return $resultJson;
    }
    // function to getOfferUri and return preAuthCode
    private function batchCredentialGetOfferUri($issuanceId): array
    {
        $config = CredentialIssuanceClient\Configuration::getDefaultConfiguration();

        $api = new CredentialIssuanceClient\Api\OfferApi(
            new GuzzleHttp\Client(),
            $config
        );
        $projectId = getConfiguration()['projectId'];

        $result = $api->getCredentialOffer($projectId, $issuanceId);
        $resultJson = json_decode($result, true);

        debugMessage('Get Offer Uri Response', ['result' => $result], true);

        // Assert that 'preAuthCode' key exists
        $this->assertArrayHasKey('credential_issuer', $resultJson, 'The response does not contain a "preAuthCode" key.');
        $this->assertArrayHasKey('grants', $resultJson, 'The response does not contain a "preAuthCode" key.');
        $this->assertArrayHasKey('urn:ietf:params:oauth:grant-type:pre-authorized_code', $resultJson['grants'], 'The response does not contain a "preAuthCode" key.');
        $this->assertArrayHasKey('pre-authorized_code', $resultJson['grants']['urn:ietf:params:oauth:grant-type:pre-authorized_code'], 'The response does not contain a "preAuthCode" key.');
        $preAuthCode = $resultJson['grants']['urn:ietf:params:oauth:grant-type:pre-authorized_code']['pre-authorized_code'];
        $credentialIssuer = $resultJson['credential_issuer'];
        return [
            'preAuthCode' => $preAuthCode,
            'credentialIssuer' => $credentialIssuer
        ];
    }



    private function batchCredentialExchangeToken($preAuthCode, $credentialIssuer): array
    {
        $url = "{$credentialIssuer}/oauth2/token";
        $requestBody = http_build_query([
            'grant_type' => 'urn:ietf:params:oauth:grant-type:pre-authorized_code',
            'pre-authorized_code' => $preAuthCode,
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded'
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            throw new \RuntimeException("Token exchange failed with status code: {$httpCode}");
        }

        $result = json_decode($response, true);
        return [
            'access_token' => $result['access_token'],
            'authorization_details' => $result['authorization_details'],
        ];
    }

    public function testBatchIssuance()
    {
        debugMessage('Start Batch Credential Issuance', ['projectId' => getConfiguration()['projectId'], 'issuanceData' => getConfiguration()['issuanceData']]);
        $startIssuanceResponse = $this->batchCredentialStartIssuance();

        // Assert start issuance response
        $this->assertArrayHasKey('issuanceId', $startIssuanceResponse, 'The response does not contain an "issuanceId" key.');
        $this->assertArrayHasKey('credentialOfferUri', $startIssuanceResponse, 'The response does not contain a "credentialOfferUri" key.');
        $this->assertNotEmpty($startIssuanceResponse['issuanceId'], 'The issuanceId should not be empty.');

        $issuanceId = $startIssuanceResponse['issuanceId'];
        $offerInfo = $this->batchCredentialGetOfferUri($issuanceId);

        // Assert offer info response
        $this->assertArrayHasKey('preAuthCode', $offerInfo, 'The response does not contain a "preAuthCode" key.');
        $this->assertArrayHasKey('credentialIssuer', $offerInfo, 'The response does not contain a "credentialIssuer" key.');
        $this->assertNotEmpty($offerInfo['preAuthCode'], 'The preAuthCode should not be empty.');
        $this->assertNotEmpty($offerInfo['credentialIssuer'], 'The credentialIssuer should not be empty.');

        $preAuthCode = $offerInfo['preAuthCode'];
        $credentialIssuer = $offerInfo['credentialIssuer'];
        $tokenInfo = $this->batchCredentialExchangeToken($preAuthCode,$credentialIssuer);

        // Assert token info response
        $this->assertArrayHasKey('access_token', $tokenInfo, 'The response does not contain a "access_token" key.');
        $this->assertArrayHasKey('authorization_details', $tokenInfo, 'The response does not contain a "authorization_details" key.');
        $this->assertNotEmpty($tokenInfo['access_token'], 'The access_token should not be empty.');
        $this->assertNotEmpty($tokenInfo['authorization_details'], 'The authorization_details should not be empty.');
    }
}
