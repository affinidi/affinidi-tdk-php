<?php

use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\IotaClient;

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

        // Assert that 'configurations' key exists
        $this->assertArrayHasKey('configurations', $resultJson, 'The response does not contain a "configurations" key.');

        // Assert that the count of configurations is greater than 0
        $configurationsCount = count($resultJson['configurations']);
        $this->assertGreaterThan(0, $configurationsCount, 'No wallets were returned in the response.');
    }

    public function testRedirectFlow()
    {
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

        $dataSharingRequestParams = [
            'queryId' => getConfiguration()['queryId'],
            'redirectUri' => getConfiguration()['redirectUri'],
            'configurationId' => getConfiguration()['iotaConfigId'],
            'mode' => 'redirect',
            'correlationId' => Uuid::uuid4()->toString(),
            'nonce' => substr(Uuid::uuid4()->toString(), 0, 10)
        ];

        $result = $api->initiateDataSharingRequest($dataSharingRequestParams);
        $resultJson = json_decode($result, true);

        $dataSharingRequestResponse = $resultJson['data'];

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

        $iotOIDC4VPCallbackParams = [
            'state' => $payload['state'],
            'presentation_submission' => getConfiguration()['presentationSubmission'],
            'vp_token' => getConfiguration()['vpToken']
        ];

        $result = $apiCallback->iotOIDC4VPCallback($iotOIDC4VPCallbackParams);
        $resultJson = json_decode($result, true);

        $fetchIotaVpResponseParams = [
            'configurationId' => getConfiguration()['iotaConfigId'],
            'correlationId' => $dataSharingRequestResponse['correlationId'],
            'transactionId' => $dataSharingRequestResponse['transactionId'],
            'responseCode' => $resultJson['response_code']
        ];

        $result = $api->fetchIotaVpResponse($fetchIotaVpResponseParams);
        $resultJson = json_decode($result, true);

        $this->assertNotEmpty($resultJson);

        // TODO: uncomment the below, once iota-service is fixed and clients are regenerated:
        //       FetchIOTAVPResponseOK Model should have vpToken and presentationSubmission instead of vp_token and presentation_submission

        // // Assert that 'vpToken' key exists
        // $this->assertArrayHasKey('vpToken', $resultJson, 'The response does not contain a "vpToken" key.');

        // $vp = $resultJson['vpToken'];
        // $vpJson = json_decode($vp, true);

        // // Assert that the count of credentials is greater than 0
        // $credentialsCount = count($vpJson['verifiableCredential']);
        // $this->assertGreaterThan(0, $credentialsCount, 'No VCs were returned in the response.');

        // // NOTE: for debugging, no need printing email
        // $email = $vpJson['verifiableCredential'][0]['credentialSubject']['email'];
        // echo $email;
    }
}
