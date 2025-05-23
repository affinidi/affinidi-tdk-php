<?php

use Dotenv\Dotenv;
use Ramsey\Uuid\Uuid;
use AffinidiTdk\AuthProvider\AuthProvider;
use AffinidiTdk\Clients\WalletsClient;
use AffinidiTdk\Clients\WalletsClient\Model\CreateWalletInput;
use AffinidiTdk\Clients\CredentialVerificationClient;
use AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyCredentialInput;
use AffinidiTdk\Clients\CredentialVerificationClient\Model\W3cCredential;

// Load the .env file from the tests/Helpers directory
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Define the helper function to fetch configurations from environment variables
function getConfiguration()
{
    // TODO: throw error if any of "required" variables is missing
    return [
        'privateKey' => $_ENV['PRIVATE_KEY'],
        'keyId' => $_ENV['KEY_ID'],
        'passphrase' => $_ENV['PASSPHRASE'],
        'projectId' => $_ENV['PROJECT_ID'],
        'tokenId' => $_ENV['TOKEN_ID'],
        // fixtures
        'iotaConfiguration' => $_ENV['IOTA_CONFIGURATION'],
        'iotaPresentationDefinition' => $_ENV['IOTA_PRESENTATION_DEFINITION'],
        'iotaPresentationSubmission' => $_ENV['IOTA_PRESENTATION_SUBMISSION'],
        'verifiablePresentation' => $_ENV['VERIFIABLE_PRESENTATION'],
        'verifiableCredential' => $_ENV['VERIFIABLE_CREDENTIAL'],
        'unsignedCredentialParams' => $_ENV['UNSIGNED_CREDENTIAL_PARAMS'],
        'credentialIssuanceData' => $_ENV['CREDENTIAL_ISSUANCE_DATA'],
    ];
}

function getTokenCallback()
{
    $authProviderKeys = ['privateKey', 'keyId', 'passphrase', 'projectId', 'tokenId'];
    $authProviderConfig = array_intersect_key(getConfiguration(), array_flip($authProviderKeys));

    $authProvider = new AuthProvider($authProviderConfig);
    $tokenCallback = [$authProvider, 'fetchProjectScopedToken'];

    return $tokenCallback;
}

function debugMessage(string $subject, array $details, bool $end = false)
{
    global $argv;
    if (!in_array('--debug', $argv))
        return;

    echo "\n\n\033[0;34m", $subject, ":\033[0m";
    foreach ($details as $key => $value) {
        $formattedValue = is_array($value) ? json_encode($value, JSON_PRETTY_PRINT) : $value;
        echo "\n - ", $key, ": ", $formattedValue;
    }

    if ($end)
        echo "\n\n\033[0;34m================================================================================\033[0m\n\n";
}

function createWallet(string $didMethod = 'key')
{
    // Initialize the API configuration
    $config = WalletsClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', getTokenCallback());

    $api = new WalletsClient\Api\WalletApi(
        new GuzzleHttp\Client(),
        $config
    );

    // Default data for 'key' method
    $data = ['did_method' => 'key'];

    // If the didMethod is 'web', modify the input to include did_web_url
    if ($didMethod === 'web') {
        $did_web_url = substr(Uuid::uuid4()->toString(), 0, 8); // generate a random URL (UUID)
        $data = [
            'did_method' => 'web',
            'did_web_url' => "$did_web_url.com"
        ];
    }

    // Create the wallet input object
    $input = new CreateWalletInput($data);

    // Call the API to create the wallet
    $result = $api->createWallet($input);
    $resultJson = json_decode($result, true);

    // Return the wallet information from the response
    return $resultJson['wallet'];
}

function deleteWallet(string $walletId)
{
    $config = WalletsClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', getTokenCallback());

    $api = new WalletsClient\Api\WalletApi(
        new GuzzleHttp\Client(),
        $config
    );

    $api->deleteWallet($walletId);
}

function isCredentialValid(object $credential)
{
    $config = CredentialVerificationClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', getTokenCallback());

    $api = new CredentialVerificationClient\Api\DefaultApi(
        new GuzzleHttp\Client(),
        $config
    );

    $credentials = ['verifiableCredentials' => [$credential]];

    $result = $api->verifyCredentials($credentials);
    $resultJson = json_decode($result, true);

    return $resultJson['isValid'];
}
