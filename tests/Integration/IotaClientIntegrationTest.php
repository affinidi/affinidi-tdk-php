<?php

use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\IotaClient;
use AffinidiTdk\Clients\IotaClient\Model\{
    CallbackInput,
    FetchIOTAVPResponseInput,
    UpdateConfigurationByIdInput,
    InitiateDataSharingRequestInput
};

class IotaClientIntegrationTest extends TestCase
{
    private static IotaClient\Api\PexQueryApi $pexQueryApi;
    private static IotaClient\Api\ConfigurationsApi $configurationsApi;

    private static string $walletId;
    private static string $walletAri;
    private static string $configurationId;
    private static string $queryId;
    private static string $iotaRedirectUri;

    public static function setUpBeforeClass(): void
    {
        $wallet = createWallet();
        self::$walletId = $wallet['id'];
        self::$walletAri = $wallet['ari'];

        $config = self::getApiConfig();
        self::$configurationsApi = new IotaClient\Api\ConfigurationsApi(config: $config);
        self::$pexQueryApi = new IotaClient\Api\PexQueryApi(config: $config);

        self::createIotaConfiguration();
        self::createPexQuery();
    }

    public static function tearDownAfterClass(): void
    {
        if (!empty(self::$queryId)) {
            [, $statusCode] = self::$pexQueryApi->deletePexQueryByIdWithHttpInfo(self::$configurationId, self::$queryId);
            assert($statusCode === 204);
        }

        if (!empty(self::$configurationId)) {
            [, $statusCode] = self::$configurationsApi->deleteIotaConfigurationByIdWithHttpInfo(self::$configurationId);
            assert($statusCode === 204);
        }

        if (!empty(self::$walletId)) {
            deleteWallet(self::$walletId);
        }
    }

    private static function getApiConfig(): IotaClient\Configuration
    {
        $originalBasePath = IotaClient\Configuration::getDefaultConfiguration()->getHost();
        $host = replaceBaseDomain($originalBasePath);

        return IotaClient\Configuration::getDefaultConfiguration()
            ->setApiKey('authorization', '', getTokenCallback())
            ->setHost($host);
    }

    private static function createIotaConfiguration(): void
    {
        $input = json_decode(getConfiguration()['iotaConfiguration'], true);
        $input['walletAri'] = self::$walletAri;

        $createConfigResponse = self::$configurationsApi->createIotaConfiguration($input);
        $iotaConfig = decodeJson($createConfigResponse);

        self::$configurationId = $iotaConfig['configurationId'];
        self::$iotaRedirectUri = $iotaConfig['redirectUris'][0] ?? '';
    }

    private static function createPexQuery(): void
    {
        $input = [
            'name' => 'TestQuery',
            'vpDefinition' => getConfiguration()['iotaPresentationDefinition'],
        ];

        $createQueryResponse = self::$pexQueryApi->createPexQuery(self::$configurationId, $input);
        $query = decodeJson($createQueryResponse);

        self::$queryId = $query['queryId'];
    }

    public function testIotaConfiguration(): void
    {
        $this->assertNotEmpty(self::$configurationId);
        $this->assertNotEmpty(self::$walletAri);

        $configsResponse = self::$configurationsApi->listIotaConfigurations();
        $configs = decodeJson($configsResponse);
        $this->assertArrayHasKey('configurations', $configs);
        $this->assertGreaterThan(0, count($configs['configurations']));

        $input = (new UpdateConfigurationByIdInput())->setName('Updated name');
        $updateConfigResponse = self::$configurationsApi->updateIotaConfigurationById(self::$configurationId, $input);
        $updatedConfig = decodeJson($updateConfigResponse);
        $this->assertEquals('Updated name', $updatedConfig['name']);

        $getConfigResponse = self::$configurationsApi->getIotaConfigurationById(self::$configurationId);
        $config = decodeJson($getConfigResponse);
        $this->assertEquals('redirect', $config['mode']);
    }

    public function testIotaQuery(): void
    {
        $this->assertNotEmpty(self::$configurationId);
        $this->assertNotEmpty(self::$queryId);

        $listResponse = self::$pexQueryApi->listPexQueries(self::$configurationId);
        $queries = decodeJson($listResponse);
        $this->assertArrayHasKey('pexQueries', $queries);
        $this->assertGreaterThan(0, count($queries['pexQueries']));

        $input = (new UpdateConfigurationByIdInput())->setDescription('UpdatedDescription');
        $updateQueriesResponse = self::$pexQueryApi->updatePexQueryById(self::$configurationId, self::$queryId, $input);
        $updatedQuery = decodeJson($updateQueriesResponse);
        $this->assertEquals('UpdatedDescription', $updatedQuery['description']);

        $getQueryResponse = self::$pexQueryApi->getPexQueryById(self::$configurationId, self::$queryId);
        $query = decodeJson($getQueryResponse);
        $this->assertArrayHasKey('configurationAri', $query);
    }

    public function testRedirectFlow(): void
    {
        $this->assertNotEmpty(self::$configurationId);
        $this->assertNotEmpty(self::$queryId);
        $this->assertNotEmpty(self::$iotaRedirectUri);

        $config = self::getApiConfig();
        $iotaApi = new IotaClient\Api\IotaApi(config: $config);
        $callbackApi = new IotaClient\Api\CallbackApi(config: $config);

        $correlationId = Uuid::uuid4()->toString();
        $nonce = substr(Uuid::uuid4()->toString(), 0, 10);

        $requestInput = new InitiateDataSharingRequestInput([
            'query_id' => self::$queryId,
            'redirect_uri' => self::$iotaRedirectUri,
            'configuration_id' => self::$configurationId,
            'mode' => 'redirect',
            'correlation_id' => $correlationId,
            'nonce' => $nonce
        ]);

        debugMessage('Iota Redirect Flow Request', ['input' => $requestInput]);

        $initResponseRaw = $iotaApi->initiateDataSharingRequest($requestInput);
        $initResponse = decodeJson($initResponseRaw);
        $this->assertArrayHasKey('data', $initResponse);

        $jwt = $initResponse['data']['jwt'];
        $this->assertNotEmpty($jwt);

        $payload = $this->decodeJwtPayload($jwt);
        $state = $payload['state'] ?? null;
        $this->assertNotEmpty($state);

        $callbackInput = new CallbackInput([
            'state' => $state,
            'presentation_submission' => getConfiguration()['iotaPresentationSubmission'],
            'vp_token' => getConfiguration()['verifiablePresentation'],
        ]);

        debugMessage('OIDC4VP Callback', ['input' => $callbackInput]);

        $callbackRaw = $callbackApi->iotOIDC4VPCallback($callbackInput);
        $callbackResponse = decodeJson($callbackRaw);

        $vpInput = new FetchIOTAVPResponseInput([
            'configuration_id' => self::$configurationId,
            'correlation_id' => $initResponse['data']['correlationId'],
            'transaction_id' => $initResponse['data']['transactionId'],
            'response_code' => $callbackResponse['response_code']
        ]);

        debugMessage('Fetching VP Response', ['input' => $vpInput]);

        $vpRaw = $iotaApi->fetchIotaVpResponse($vpInput);
        $vpResponse = decodeJson($vpRaw);
        $this->assertArrayHasKey('vp_token', $vpResponse);

        $vp = decodeJson($vpResponse['vp_token']);
        $this->assertGreaterThan(0, count($vp['verifiableCredential']), 'No VCs were returned.');
    }

    private function decodeJwtPayload(string $jwt): array
    {
        $parts = explode('.', $jwt);
        if (count($parts) !== 3) {
            $this->fail('Invalid JWT structure.');
        }

        $payloadBase64 = strtr($parts[1], '-_', '+/');
        $decoded = base64_decode($payloadBase64);
        return decodeJson($decoded);
    }
}
