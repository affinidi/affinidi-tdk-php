<?php

use Dotenv\Dotenv;
use Ramsey\Uuid\Uuid;
use AffinidiTdk\AuthProvider\AuthProvider;
use AffinidiTdk\Common\Helpers\Environment;
use AffinidiTdk\Common\Helpers\EnvironmentUtils;
use AffinidiTdk\Clients\WalletsClient;
use AffinidiTdk\Clients\WalletsClient\Model\CreateWalletInput;
use AffinidiTdk\Clients\CredentialVerificationClient;
use AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyCredentialInput;
use AffinidiTdk\Clients\CredentialVerificationClient\Model\W3cCredential;

// Load the .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

function isProd(): bool
{
    return EnvironmentUtils::fetchEnvironment() === Environment::PRODUCTION;
}

/**
 * Fetch configurations from environment variables.
 *
 * @return array
 * @throws RuntimeException if required env variables are missing
 */
function getConfiguration(): array
{
    $isProd = isProd();

    $requiredKeys =
    [
        'PRIVATE_KEY', 'PROJECT_ID', 'TOKEN_ID',
        'IOTA_CONFIGURATION', 'IOTA_PRESENTATION_DEFINITION',
        'IOTA_PRESENTATION_SUBMISSION', 'VERIFIABLE_PRESENTATION',
        'VERIFIABLE_CREDENTIAL', 'UNSIGNED_CREDENTIAL_PARAMS',
        'CREDENTIAL_ISSUANCE_DATA'
    ];

    if ($isProd) {
        $requiredKeys = array_merge($requiredKeys, [
            'DEV_PRIVATE_KEY', 'DEV_PROJECT_ID', 'DEV_TOKEN_ID'
        ]);
    }

    $missing = array_filter($requiredKeys, fn($key) => empty($_ENV[$key]));
    if (!empty($missing)) {
        throw new RuntimeException("Missing required environment variables: " . implode(', ', $missing));
    }

    return [
        'privateKey' => $_ENV[$isProd ? 'PRIVATE_KEY' : 'DEV_PRIVATE_KEY'],
        'keyId' => $_ENV[$isProd ? 'KEY_ID' : 'DEV_KEY_ID'] ?? '',
        'passphrase' => $_ENV[$isProd ? 'PASSPHRASE' : 'DEV_PASSPHRASE'] ?? '',
        'projectId' => $_ENV[$isProd ? 'PROJECT_ID' : 'DEV_PROJECT_ID'],
        'tokenId' => $_ENV[$isProd ? 'TOKEN_ID' : 'DEV_TOKEN_ID'],
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
    checkWalletLimitExceeded();
    $originalBasePath = WalletsClient\Configuration::getDefaultConfiguration()->getHost();
    $host = replaceBaseDomain($originalBasePath);

    $config = WalletsClient\Configuration::getDefaultConfiguration()
        ->setApiKey('authorization', '', getTokenCallback())
        ->setHost($host);

    $api = new WalletsClient\Api\WalletApi(config: $config);

    $data = ['did_method' => $didMethod];

    if ($didMethod === 'web') {
        $randomUrl = substr(Uuid::uuid4()->toString(), 0, 8);
        $data['did_web_url'] = "$randomUrl.com";
    }

    $input = new CreateWalletInput($data);
    $createWalletResponse = $api->createWallet($input);
    $data = json_decode($createWalletResponse, true);

    if (!isset($data['wallet'])) {
        throw new RuntimeException("Failed to create wallet. Response missing 'wallet' key.");
    }

    return $data['wallet'];
}

/**
 * Delete a wallet by ID.
 */
function deleteWallet(string $walletId): void
{
    $originalBasePath = WalletsClient\Configuration::getDefaultConfiguration()->getHost();
    $host = replaceBaseDomain($originalBasePath);

    $config = WalletsClient\Configuration::getDefaultConfiguration()
        ->setApiKey('authorization', '', getTokenCallback())
        ->setHost($host);

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
    $originalBasePath = CredentialVerificationClient\Configuration::getDefaultConfiguration()->getHost();
    $host = replaceBaseDomain($originalBasePath);

    $config = CredentialVerificationClient\Configuration::getDefaultConfiguration()
        ->setApiKey('authorization', '', getTokenCallback())
        ->setHost($host);

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

// NOTE: Max number of wallets for project is 10. Making clean up,
//       if wallet number exceeds threshold, to prevent 422 error
function checkWalletLimitExceeded(): void
{
    $WALLETS_LIMIT_THRESHOLD = 7;

    $originalBasePath = WalletsClient\Configuration::getDefaultConfiguration()->getHost();
    $host = replaceBaseDomain($originalBasePath);

    $config = WalletsClient\Configuration::getDefaultConfiguration()
        ->setApiKey('authorization', '', getTokenCallback())
        ->setHost($host);

    $api = new WalletsClient\Api\WalletApi(config: $config);

    $response = $api->listWallets();
    $data = decodeJson($response);

    if (!isset($data['wallets'])) {
        throw new RuntimeException("Failed to get wallets. Response missing 'wallets' key.");
    }

    if (count($data['wallets']) > $WALLETS_LIMIT_THRESHOLD) {
        print("❗️Number of wallets reaching the limit (10). Deleting wallets.");

        foreach ($data['wallets'] as $wallet) {
            deleteWallet($wallet['id']);
        }
    }
}

function replaceBaseDomain(string $originalBasePath, string $newDomain = ''): string
{
    $domain = $newDomain !== '' ? $newDomain : EnvironmentUtils::fetchApiGwUrl();

    $originalParts = parse_url($originalBasePath);
    $newDomainParts = parse_url($domain);

    $scheme = $newDomainParts['scheme'] ?? 'https';
    $host = $newDomainParts['host'] ?? '';
    $port = isset($newDomainParts['port']) ? ':' . $newDomainParts['port'] : '';
    $path = $originalParts['path'] ?? '';

    return "{$scheme}://{$host}{$port}{$path}";
}
