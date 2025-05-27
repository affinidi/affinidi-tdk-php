<?php

use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\CredentialIssuanceClient;

class CredentialIssuanceClientIntegrationTest extends TestCase
{
    private static string $projectId;

    public static function setUpBeforeClass(): void
    {
        self::$projectId = getConfiguration()['projectId'];
    }

    public function testIssuanceConfiguration(): void
    {
        $api = $this->getConfigurationApi();

        // List configurations
        $listConfigsResponse = $api->getIssuanceConfigList();
        $data = decodeJson($listConfigsResponse);
        $this->assertArrayHasKey('configurations', $data);
        $this->assertGreaterThan(0, count($data['configurations']), 'No issuance configurations found.');

        // Update configuration
        $configId = $data['configurations'][0]['id'];
        $updatedDescription = 'UpdatedDescription';
        $updatePayload = ['description' => $updatedDescription];

        $updateConfigResponse = $api->updateIssuanceConfigById($configId, $updatePayload);
        $updatedConfig = decodeJson($updateConfigResponse);
        $this->assertEquals($updatedDescription, $updatedConfig['description'] ?? null, 'Description was not updated correctly.');

        // Get configuration
        $getConfigResponse = $api->getIssuanceConfigById($configId);
        $config = decodeJson($getConfigResponse);
        $this->assertEquals($configId, $config['id'] ?? null, 'Fetched config ID does not match.');
    }

    public function testBatchIssuance(): void
    {
        debugMessage('Start Batch Credential Issuance', [
            'projectId' => self::$projectId,
            'issuanceData' => getConfiguration()['credentialIssuanceData']
        ]);

        $issuance = $this->startBatchCredentialIssuance();
        $this->assertArrayHasKey('issuanceId', $issuance);
        $this->assertNotEmpty($issuance['issuanceId']);
        $this->assertArrayHasKey('credentialOfferUri', $issuance);

        $offer = $this->getCredentialOffer($issuance['issuanceId']);
        $this->assertNotEmpty($offer['preAuthCode']);
        $this->assertNotEmpty($offer['credentialIssuer']);

        $token = $this->exchangePreAuthCodeForToken($offer['preAuthCode'], $offer['credentialIssuer']);
        $this->assertNotEmpty($token['access_token']);
        $this->assertNotEmpty($token['authorization_details']);
    }

    // ─────────────────────────────── Helpers ───────────────────────────────

    private function getConfigurationApi(): CredentialIssuanceClient\Api\ConfigurationApi
    {
        $config = CredentialIssuanceClient\Configuration::getDefaultConfiguration()
            ->setApiKey('Authorization', '', getTokenCallback());

        return new CredentialIssuanceClient\Api\ConfigurationApi(config: $config);
    }

    private function getIssuanceApi(): CredentialIssuanceClient\Api\IssuanceApi
    {
        $config = CredentialIssuanceClient\Configuration::getDefaultConfiguration()
            ->setApiKey('authorization', '', getTokenCallback());

        return new CredentialIssuanceClient\Api\IssuanceApi(config: $config);
    }

    private function startBatchCredentialIssuance(): array
    {
        $issuanceData = decodeJson(getConfiguration()['credentialIssuanceData']);
        $response = $this->getIssuanceApi()->startIssuance(self::$projectId, $issuanceData);
        $data = decodeJson($response);

        debugMessage('Start Credential Issuance Response', ['result' => $data], true);

        $this->assertArrayHasKey('credentialOfferUri', $data);
        $this->assertArrayHasKey('issuanceId', $data);

        return $data;
    }

    private function getCredentialOffer(string $issuanceId): array
    {
        $config = CredentialIssuanceClient\Configuration::getDefaultConfiguration();
        $api = new CredentialIssuanceClient\Api\OfferApi(config: $config);

        $response = $api->getCredentialOffer(self::$projectId, $issuanceId);
        $data = decodeJson($response);

        debugMessage('Get Offer URI Response', ['result' => $data], true);

        $grantType = 'urn:ietf:params:oauth:grant-type:pre-authorized_code';
        $this->assertArrayHasKey('grants', $data);
        $this->assertArrayHasKey($grantType, $data['grants']);
        $this->assertArrayHasKey('pre-authorized_code', $data['grants'][$grantType]);

        return [
            'preAuthCode' => $data['grants'][$grantType]['pre-authorized_code'],
            'credentialIssuer' => $data['credential_issuer']
        ];
    }

    private function exchangePreAuthCodeForToken(string $preAuthCode, string $issuerUrl): array
    {
        $url = "{$issuerUrl}/oauth2/token";
        $body = http_build_query([
            'grant_type' => 'urn:ietf:params:oauth:grant-type:pre-authorized_code',
            'pre-authorized_code' => $preAuthCode,
        ]);

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded']
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $this->assertEquals(200, $httpCode, "Token exchange failed with status code: {$httpCode}");

        return decodeJson($response);
    }
}
