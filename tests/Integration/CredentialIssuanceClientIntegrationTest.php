<?php

use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\CredentialIssuanceClient;

class CredentialIssuanceClientIntegrationTest extends TestCase
{
    public function testIssuance()
    {
        $this->markTestSkipped('Enable as soon as dedicated project + configuration has been created.');

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
}
