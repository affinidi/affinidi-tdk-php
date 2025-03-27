<?php

use Dotenv\Dotenv;
use AffinidiTdk\AuthProvider\AuthProvider;

// Load the .env file from the tests/Helpers directory
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Define the helper function to fetch configurations from environment variables
function getConfiguration()
{
    return [
        'privateKey' => $_ENV['PRIVATE_KEY'],
        'keyId' => $_ENV['KEY_ID'],
        'passphrase' => $_ENV['PASSPHRASE'],
        'projectId' => $_ENV['PROJECT_ID'],
        'tokenId' => $_ENV['TOKEN_ID'],
        'iotaConfigId' => $_ENV['IOTA_CONFIG_ID'],
        'queryId' => $_ENV['QUERY_ID'],
        'redirectUri' => $_ENV['REDIRECT_URI'],
        'did' => $_ENV['DID'],
        'presentationSubmission' => $_ENV['PRESENTATION_SUBMISSION'],
        'vpToken' => $_ENV['VP_TOKEN'],
        'vc' => $_ENV['VERIFIABLE_CREDENTIAL'],
        'vcInvalid' => $_ENV['VERIFIABLE_CREDENTIAL_INVALID'],
        'issuanceData' => $_ENV['CREDENTIAL_ISSUANCE_DATA'],
        'walletId' => $_ENV['WALLET_ID'],
        'holderDID' => $_ENV['HOLDER_DID'],
        'schemaJson' => $_ENV['SCHEMA_JSON'],
        'schemaJsonLd' => $_ENV['SCHEMA_JSONLD'],
        'schemaJsonTypeId' => $_ENV['SCHEMA_JSON_TYPE_ID'],
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
        echo "\n - ", $key, ": ", $value, "";
    }

    if ($end)
        echo "\n\n\033[0;34m================================================================================\033[0m\n\n";
}
