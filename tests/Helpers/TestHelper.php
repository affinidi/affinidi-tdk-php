<?php

use Dotenv\Dotenv;
use Ramsey\Uuid\Uuid;
use AffinidiTdk\AuthProvider\AuthProvider;
use AffinidiTdk\Clients\WalletsClient;
use AffinidiTdk\Clients\WalletsClient\Model\CreateWalletInput;
use AffinidiTdk\Clients\CredentialVerificationClient;
use AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyCredentialInput;
use AffinidiTdk\Clients\CredentialVerificationClient\Model\W3cCredential;

// Load the .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

/**
 * Fetch configurations from environment variables.
 *
 * @return array
 * @throws RuntimeException if required env variables are missing
 */
function getConfiguration(): array
{
    $requiredKeys = [
        'PRIVATE_KEY', 'PROJECT_ID', 'TOKEN_ID', 'IOTA_CONFIGURATION',
        'IOTA_PRESENTATION_DEFINITION', 'IOTA_PRESENTATION_SUBMISSION',
        'VERIFIABLE_PRESENTATION', 'VERIFIABLE_CREDENTIAL',
        'UNSIGNED_CREDENTIAL_PARAMS', 'CREDENTIAL_ISSUANCE_DATA',
    ];

    $missing = array_filter($requiredKeys, fn($key) => empty($_ENV[$key]));
    if (!empty($missing)) {
        throw new RuntimeException("Missing required environment variables: " . implode(', ', $missing));
    }

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

/**
 * Creates a token callback from AuthProvider.
 */
function getTokenCallback(): callable
{
    $config = getConfiguration();
    $authProvider = new AuthProvider([
        'privateKey' => $config['privateKey'],
        'keyId' => $config['keyId'],
        'passphrase' => $config['passphrase'],
        'projectId' => $config['projectId'],
        'tokenId' => $config['tokenId'],
    ]);

    return [$authProvider, 'fetchProjectScopedToken'];
}

/**
 * Debug output helper.
 */
function debugMessage(string $subject, array $details, bool $end = false): void
{
    global $argv;
    if (!in_array('--debug', $argv)) return;

    echo "\n\n\033[0;34m$subject:\033[0m";
    foreach ($details as $key => $value) {
        $formatted = is_array($value) ? json_encode($value, JSON_PRETTY_PRINT) : $value;
        echo "\n - $key: $formatted";
    }

    if ($end) {
        echo "\n\n\033[0;34m" . str_repeat('=', 80) . "\033[0m\n\n";
    }
}

/**
 * Create a wallet with optional DID method.
 */
function createWallet(string $didMethod = 'key'): array
{
    $config = WalletsClient\Configuration::getDefaultConfiguration()
        ->setApiKey('authorization', '', getTokenCallback());

    $api = new WalletsClient\Api\WalletApi(config: $config);

    $data = ['did_method' => $didMethod];

    if ($didMethod === 'web') {
        $randomUrl = substr(Uuid::uuid4()->toString(), 0, 8);
        $data['did_web_url'] = "$randomUrl.com";
    }

    $input = new CreateWalletInput($data);
    $response = json_decode($api->createWallet($input), true);

    if (!isset($response['wallet'])) {
        throw new RuntimeException("Failed to create wallet. Response missing 'wallet' key.");
    }

    return $response['wallet'];
}

/**
 * Delete a wallet by ID.
 */
function deleteWallet(string $walletId): void
{
    $config = WalletsClient\Configuration::getDefaultConfiguration()
        ->setApiKey('authorization', '', getTokenCallback());

    $api = new WalletsClient\Api\WalletApi(config: $config);
    [$response, $statusCode] = $api->deleteWalletWithHttpInfo($walletId);

    if ($statusCode !== 204) {
        throw new RuntimeException("Failed to delete wallet. Status code: $statusCode");
    }
}

/**
 * Validates a verifiable credential.
 */
function isCredentialValid($credential): bool
{
    $config = CredentialVerificationClient\Configuration::getDefaultConfiguration()
        ->setApiKey('authorization', '', getTokenCallback());

    $api = new CredentialVerificationClient\Api\DefaultApi(config: $config);

    $result = decodeJson($api->verifyCredentials([
        'verifiableCredentials' => [$credential],
    ]));

    if (!isset($result['isValid'])) {
        throw new RuntimeException("Credential validation failed. Response missing 'isValid'.");
    }

    return (bool)$result['isValid'];
}

/**
 * Extract revocation status ID from a URL.
 */
function extractRevocationStatusId(string $url): ?string
{
    $parts = parse_url($url);
    if (!isset($parts['path'])) return null;

    $segments = explode('/', trim($parts['path'], '/'));
    return $segments ? end($segments) : null;
}

function decodeJson(string $json): array
{
    $data = json_decode($json, true);
    return $data;
}
