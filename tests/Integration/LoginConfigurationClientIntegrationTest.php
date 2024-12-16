<?php

use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\LoginConfigurationClient;

class LoginConfigurationClientIntegrationTest extends TestCase
{
    public function testListLoginConfigurations()
    {
        $config = LoginConfigurationClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', getTokenCallback());

        $api = new LoginConfigurationClient\Api\ConfigurationApi(
            new GuzzleHttp\Client(),
            $config
        );

        $result = $api->listLoginConfigurations();
        $resultJson = json_decode($result, true);

        debugMessage('Login Configuration Client List Login Configurations Response', ['result' => $result], true);

        // Assert that 'configurations' key exists
        $this->assertArrayHasKey('configurations', $resultJson, 'The response does not contain a "configurations" key.');

        // Assert that the count of login configurations is greater than 0
        $configurationsCount = count($resultJson['configurations']);
        $this->assertGreaterThan(0, $configurationsCount, 'No login configurations were returned in the response.');
    }
}
