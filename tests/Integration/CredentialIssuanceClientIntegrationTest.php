<?php

use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\CredentialIssuanceClient;

class CredentialIssuanceIntegrationTest extends TestCase
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

        $result = $api->startissuance($projectId, json_decode($issuanceData));
        $resultJson = json_decode($result, true);

        // Assert that 'credentialOfferUri' key exists
        $this->assertArrayHasKey('credentialOfferUri', $resultJson, 'The response does not contain a "credentialOfferUri" key.');
        // Assert that 'issuanceId' key exists
        $this->assertArrayHasKey('issuanceId', $resultJson, 'The response does not contain a "issuanceId" key.');
    }
}
