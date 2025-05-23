<?php

use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\IotaClient;
use AffinidiTdk\Clients\IotaClient\Model\CallbackInput;
use AffinidiTdk\Clients\IotaClient\Model\FetchIOTAVPResponseInput;
use AffinidiTdk\Clients\IotaClient\Model\UpdateConfigurationByIdInput;
use AffinidiTdk\Clients\IotaClient\Model\InitiateDataSharingRequestInput;

class IotaClientIntegrationTest extends TestCase
{
    private static $pexQueryApi;
    private static $configurationsApi;

    private static string $walletId;
    private static string $walletAri;
    private static string $configurationId;
    private static string $queryId;
    private static string $iotaRedirectUri;

    public static function setUpBeforeClass(): void
    {
        // Create wallet
        $wallet = createWallet();
        self::$walletId = $wallet['id'];
        self::$walletAri = $wallet['ari'];

        // Prepare configurationsApi
        $config = IotaClient\Configuration::getDefaultConfiguration()
            ->setApiKey('authorization', '', getTokenCallback());

        self::$configurationsApi = new IotaClient\Api\ConfigurationsApi(
            new GuzzleHttp\Client(),
            $config
        );

        // Create configuration
        $iotaConfiguration = json_decode(getConfiguration()['iotaConfiguration'], true);
        $iotaConfiguration['walletAri'] = self::$walletAri;

        $result = self::$configurationsApi->createIotaConfiguration($iotaConfiguration);
        $resultJson = json_decode($result, true);

        self::$configurationId = $resultJson['configurationId'];
        self::$iotaRedirectUri = $resultJson['redirectUris'][0] ?? '';

        // Create PEX query
        self::$pexQueryApi = new IotaClient\Api\PexQueryApi(
            new GuzzleHttp\Client(),
            $config
        );

        $query = [
            'name' => 'TestQuery',
            'vpDefinition' => getConfiguration()['iotaPresentationDefinition'],
        ];

        $queryResult = self::$pexQueryApi->createPexQuery(self::$configurationId, $query);
        $queryJson = json_decode($queryResult, true);

        self::$queryId = $queryJson['queryId'];

    }

    public static function tearDownAfterClass(): void
    {
        // Delete query
        if (!empty(self::$queryId)) {
            self::$pexQueryApi->deletePexQueryById(self::$configurationId, self::$queryId);
        }

        // Delete configuration
        if (!empty(self::$configurationId)) {
            self::$configurationsApi->deleteIotaConfigurationById(self::$configurationId);
        }

        // Delete wallet
        if (!empty(self::$walletId)) {
            deleteWallet(self::$walletId);
        }
    }

    public function testIotaConfiguration(): void
    {
        $this->assertNotEmpty(self::$configurationId);
        $this->assertNotEmpty(self::$walletAri);

        // List
        $result = self::$configurationsApi->listIotaConfigurations();
        $resultJson = json_decode($result, true);
        $this->assertArrayHasKey('configurations', $resultJson);
        $this->assertGreaterThan(0, count($resultJson['configurations']));

        // Update
        $input = new UpdateConfigurationByIdInput();
        $newName = 'Updated name';
        $input->setName($newName);
        $updateResult = self::$configurationsApi->updateIotaConfigurationById(self::$configurationId, $input);
        $this->assertEquals(json_decode($updateResult, true)['name'], $newName);

        // Read
        $readResult = self::$configurationsApi->getIotaConfigurationById(self::$configurationId);
        $readJson = json_decode($readResult, true);
        $this->assertEquals('redirect', $readJson['mode']);
    }

    public function testIotaQuery(): void
    {
        $this->assertNotEmpty(self::$configurationId);
        $this->assertNotEmpty(self::$queryId);

        // List
        $result = self::$pexQueryApi->listPexQueries(self::$configurationId);
        $resultJson = json_decode($result, true);
        $this->assertArrayHasKey('pexQueries', $resultJson);
        $this->assertGreaterThan(0, count($resultJson['pexQueries']));

        // Update
        $input = new UpdateConfigurationByIdInput();
        $newDescription = 'UpdatedDescription';
        $input->setDescription($newDescription);
        $updateResult = self::$pexQueryApi->updatePexQueryById(self::$configurationId, self::$queryId, $input);
        $this->assertEquals(json_decode($updateResult, true)['description'], $newDescription);

        // Read
        $readResult = self::$pexQueryApi->getPexQueryById(self::$configurationId, self::$queryId);
        $readJson = json_decode($readResult, true);
        $this->assertArrayHasKey('configurationAri', $readJson);
    }

    public function testRedirectFlow(): void
    {
        $this->assertNotEmpty(self::$configurationId);
        $this->assertNotEmpty(self::$queryId);
        $this->assertNotEmpty(self::$iotaRedirectUri);

        $config = IotaClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', getTokenCallback());
        $configCallback = IotaClient\Configuration::getDefaultConfiguration();

        $iotaApi = new IotaClient\Api\IotaApi(
            new GuzzleHttp\Client(),
            $config
        );

        $callbackApi = new IotaClient\Api\CallbackApi(
            new GuzzleHttp\Client(),
            $configCallback
        );

        $dataSharingRequestInput = new InitiateDataSharingRequestInput([
            'query_id' => self::$queryId,
            'redirect_uri' => self::$iotaRedirectUri,
            'configuration_id' => self::$configurationId,
            'mode' => 'redirect',
            'correlation_id' => Uuid::uuid4()->toString(),
            'nonce' => substr(Uuid::uuid4()->toString(), 0, 10)
        ]);

        debugMessage('Iota Redirect Flow Data Sharing Request Params', ['input' => $dataSharingRequestInput]);
        $result = $iotaApi->initiateDataSharingRequest($dataSharingRequestInput);
        $resultJson = json_decode($result, true);

        $dataSharingRequestResponse = $resultJson['data'];
        debugMessage('Iota Redirect Flow Data Sharing Response', $dataSharingRequestResponse);

        $this->assertArrayHasKey('jwt', $dataSharingRequestResponse, 'The response does not contain a "jwt" key.');

        $jwt = $dataSharingRequestResponse['jwt'];

        // Split the JWT into its components
        $jwtParts = explode('.', $jwt);

        if (count($jwtParts) !== 3) {
            echo "Invalid JWT format.";
            exit;
        }

        // Decode the payload (second part of the JWT)
        $payloadBase64Url = $jwtParts[1];
        $payloadJson = base64_decode(strtr($payloadBase64Url, '-_', '+/'));
        $payload = json_decode($payloadJson, true); // Convert JSON to an associative array

        $iotaOIDC4VPCallbackInput = new CallbackInput([
            'state' => $payload['state'],
            'presentation_submission' => getConfiguration()['iotaPresentationSubmission'],
            'vp_token' => getConfiguration()['verifiablePresentation']
        ]);

        debugMessage('Iota Redirect Flow OIDC4VP Callback Params', ['input' => $iotaOIDC4VPCallbackInput]);

        $result = $callbackApi->iotOIDC4VPCallback($iotaOIDC4VPCallbackInput);
        $resultJson = json_decode($result, true);

        debugMessage('Iota Redirect Flow OIDC4VP Callback Response', ['result' => $result]);

        $fetchIotaVpResponseInput = new FetchIOTAVPResponseInput([
            'configuration_id' => self::$configurationId,
            'correlation_id' => $dataSharingRequestResponse['correlationId'],
            'transaction_id' => $dataSharingRequestResponse['transactionId'],
            'response_code' => $resultJson['response_code']
        ]);

        debugMessage('Iota Redirect Flow VP Response Params', ['input' => $fetchIotaVpResponseInput]);

        $result = $iotaApi->fetchIotaVpResponse($fetchIotaVpResponseInput);
        $resultJson = json_decode($result, true);

        debugMessage('Iota Redirect Flow VP Response', $resultJson, true);

        $this->assertNotEmpty($resultJson);

        // // Assert that 'vpToken' key exists
        $this->assertArrayHasKey('vpToken', $resultJson, 'The response does not contain a "vpToken" key.');

        $vp = $resultJson['vpToken'];
        $vpJson = json_decode($vp, true);

        // Assert that the count of credentials is greater than 0
        $credentialsCount = count($vpJson['verifiableCredential']);
        $this->assertGreaterThan(0, $credentialsCount, 'No VCs were returned in the response.');
    }
}
