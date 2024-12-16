<?php

use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\CredentialVerificationClient;

class CredentialVerificationClientIntegrationTest extends TestCase
{
    public function testVerifyCredentials()
    {
        $config = CredentialVerificationClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', getTokenCallback());

        $credential = getConfiguration()['vc'];
        $credentials = json_encode(['verifiableCredentials' => [json_decode($credential)]]);

        $api = new CredentialVerificationClient\Api\DefaultApi(
            new GuzzleHttp\Client(),
            $config
        );

        $result = $api->verifycredentials(json_decode($credentials));
        $resultJson = json_decode($result, true);

        // Assert that verification succeeded, no errors
        $errorsCount = count($resultJson['errors']);
        $this->assertEquals(0, $errorsCount, 'Failed to verify VC.');

        $this->assertEquals($resultJson['isValid'], 1);
    }

    public function testVerifyCredentialsInvalid()
    {
        $config = CredentialVerificationClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', getTokenCallback());

        $credential = getConfiguration()['vcInvalid'];
        $credentials = json_encode(['verifiableCredentials' => [json_decode($credential)]]);

        $api = new CredentialVerificationClient\Api\DefaultApi(
            new GuzzleHttp\Client(),
            $config
        );

        $result = $api->verifycredentials(json_decode($credentials));
        $resultJson = json_decode($result, true);

        // Assert that verification failed
        $errorsCount = count($resultJson['errors']);
        $this->assertEquals($errorsCount, 1);
    }
}
