<?php

use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\IotaClient;
use AffinidiTdk\Clients\IotaClient\Model\CallbackInput;
use AffinidiTdk\Clients\IotaClient\Model\FetchIOTAVPResponseInput;
use AffinidiTdk\Clients\IotaClient\Model\InitiateDataSharingRequestInput;

class IotaClientIntegrationTest extends TestCase
{
    public function testListConfigurations()
    {
        $config = IotaClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', getTokenCallback());

        $api = new IotaClient\Api\ConfigurationsApi(
            new GuzzleHttp\Client(),
            $config
        );

        $result = $api->listIotaConfigurations();
        $resultJson = json_decode($result, true);

        debugMessage('Iota Client List Configurations Response', ['result' => $result], true);

        // Assert that 'configurations' key exists
        $this->assertArrayHasKey('configurations', $resultJson, 'The response does not contain a "configurations" key.');

        // Assert that the count of configurations is greater than 0
        $configurationsCount = count($resultJson['configurations']);
        $this->assertGreaterThan(0, $configurationsCount, 'No wallets were returned in the response.');
    }

    public function testRedirectFlow()
    {
        $this->markTestSkipped('Enable as soon as dedicated project + configuration has been created.');

        $config = IotaClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', getTokenCallback());
        $configCallback = IotaClient\Configuration::getDefaultConfiguration();

        $api = new IotaClient\Api\IotaApi(
            new GuzzleHttp\Client(),
            $config
        );

        $apiCallback = new IotaClient\Api\CallbackApi(
            new GuzzleHttp\Client(),
            $configCallback
        );

        $dataSharingRequestInput = new InitiateDataSharingRequestInput([
            'query_id' => getConfiguration()['queryId'],
            'redirect_uri' => getConfiguration()['redirectUri'],
            'configuration_id' => getConfiguration()['iotaConfigId'],
            'mode' => 'redirect',
            'correlation_id' => Uuid::uuid4()->toString(),
            'nonce' => substr(Uuid::uuid4()->toString(), 0, 10)
        ]);

        debugMessage('Iota Redirect Flow Data Sharing Request Params', ['input' => $dataSharingRequestInput]);
        $result = $api->initiateDataSharingRequest($dataSharingRequestInput);
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
            'presentation_submission' => getConfiguration()['presentationSubmission'],
            'vp_token' => getConfiguration()['vpToken']
        ]);

        debugMessage('Iota Redirect Flow OIDC4VP Callback Params', ['input' => $iotaOIDC4VPCallbackInput]);

        $result = $apiCallback->iotOIDC4VPCallback($iotaOIDC4VPCallbackInput);
        $resultJson = json_decode($result, true);

        debugMessage('Iota Redirect Flow OIDC4VP Callback Response', ['result' => $result]);

        $fetchIotaVpResponseInput = new FetchIOTAVPResponseInput([
            'configuration_id' => getConfiguration()['iotaConfigId'],
            'correlation_id' => $dataSharingRequestResponse['correlationId'],
            'transaction_id' => $dataSharingRequestResponse['transactionId'],
            'response_code' => $resultJson['response_code']
        ]);

        debugMessage('Iota Redirect Flow VP Response Params', ['input' => $fetchIotaVpResponseInput]);

        $result = $api->fetchIotaVpResponse($fetchIotaVpResponseInput);
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
