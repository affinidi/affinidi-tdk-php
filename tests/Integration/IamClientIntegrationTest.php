<?php

use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\IamClient;

class IamClientIntegrationTest extends TestCase
{
    public function testGetPolicies()
    {
        $config = IamClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', getTokenCallback());

        $api = new IamClient\Api\PoliciesApi(
            new GuzzleHttp\Client(),
            $config
        );

        $result = $api->getPolicies(getConfiguration()['tokenId'], 'token');
        $resultJson = json_decode($result, true);

        // Assert that 'statement' key exists
        $this->assertArrayHasKey('statement', $resultJson, 'The response does not contain a "statement" key.');

        // Assert that the count of policies is greater than 0
        $policiesCount = count($resultJson['statement']);
        $this->assertGreaterThan(0, $policiesCount, 'No policies were returned in the response.');
    }
}
