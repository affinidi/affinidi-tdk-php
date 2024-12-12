# Affinidi TDK Internal module for managing access tokens.

## Install

```bash
composer install affinidi-tdk/affinidi-tdk-php affinidi-tdk/wallets-client
```

## Usage

```php
<?php

require_once 'vendor/autoload.php';

use AuthProvider\AuthProvider;
use AffinidiTdk\Clients\Wallets as WalletsClient;

$params = [
  'privateKey' => "",
  // 'apiGatewayUrl' => 'https://apse1.api.affinidi.io',
  // 'tokenEndpoint' => 'https://apse1.auth.developer.affinidi.io/auth/oauth2/token',
  'keyId' => '',
  'passphrase' => '',
  'projectId' => '',
  'tokenId' => ''
];

$authProvider = new AuthProvider($params);

try {
  $tokenCallback = [$authProvider, 'fetchProjectScopedToken'];

  $configCwe = WalletsClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', $tokenCallback);

  $apiInstanceCwe = new WalletsClient\Api\WalletApi(
    new GuzzleHttp\Client(),
    $configCwe
  );

  $apiInstanceCwe->listWallets();

  $resultCwe = $apiInstanceCwe->listWallets();

  $resultCweJson = json_decode($resultCwe, true);

  print_r(count($resultCweJson['wallets']));

} catch (Exception $e) {
  print_r($e->getMessage());
}
```
