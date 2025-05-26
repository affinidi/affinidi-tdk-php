<?php

use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\CredentialVerificationClient;

class CredentialVerificationClientIntegrationTest extends TestCase
{
    private static CredentialVerificationClient\Api\DefaultApi $api;

    public static function setUpBeforeClass(): void
    {
        $config = CredentialVerificationClient\Configuration::getDefaultConfiguration()
            ->setApiKey('authorization', '', getTokenCallback());

        self::$api = new CredentialVerificationClient\Api\DefaultApi(config: $config);
    }

    public function testVerifyCredential(): void
    {
        $credentialJson = getConfiguration()['verifiableCredential'];
        $credentials = ['verifiableCredentials' => [decodeJson($credentialJson)]];

        $verifyCredentialsResponse = self::$api->verifyCredentials($credentials);
        $data = decodeJson($verifyCredentialsResponse);
        $this->assertEquals(0, count($data['errors'] ?? []), 'Credential verification returned errors.');
        $this->assertTrue((bool)($data['isValid'] ?? false), 'Credential is not valid.');
    }

    public function testVerifyPresentation(): void
    {
        $presentationJson = getConfiguration()['verifiablePresentation'];
        $input = ['verifiablePresentation' => decodeJson($presentationJson)];

        $verifyPresentationResponse = self::$api->verifyPresentation($input);
        $data = decodeJson($verifyPresentationResponse);
        $this->assertEquals(0, count($data['errors'] ?? []), 'Presentation verification returned errors.');
        $this->assertTrue((bool)($data['isValid'] ?? false), 'Presentation is not valid.');
    }
}
