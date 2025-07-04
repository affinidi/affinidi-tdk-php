# wallets-client


For more information, please visit [https://github.com/affinidi/affinidi-tdk](https://github.com/affinidi/affinidi-tdk).

## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), run:

```bash
composer require affinidi-tdk/affinidi-tdk-php
```

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/wallets-client/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\WalletsClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\WalletsClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\WalletsClient\Api\RevocationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 'project_id_example'; // string | Description for projectId.
$wallet_id = 'wallet_id_example'; // string | Description for walletId.
$status_id = 'status_id_example'; // string | Description for statusId.

try {
    $result = $apiInstance->getRevocationCredentialStatus($project_id, $wallet_id, $status_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RevocationApi->getRevocationCredentialStatus: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://apse1.api.affinidi.io/cwe*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*RevocationApi* | [**getRevocationCredentialStatus**](docs/Api/RevocationApi.md#getrevocationcredentialstatus) | **GET** /v1/projects/{projectId}/wallets/{walletId}/revocation-statuses/{statusId} | 
*RevocationApi* | [**getRevocationListCredential**](docs/Api/RevocationApi.md#getrevocationlistcredential) | **GET** /v1/wallets/{walletId}/revocation-list/{listId} | Return revocation list credential.
*RevocationApi* | [**revokeCredential**](docs/Api/RevocationApi.md#revokecredential) | **POST** /v1/wallets/{walletId}/revoke | Revoke Credential.
*WalletApi* | [**createWallet**](docs/Api/WalletApi.md#createwallet) | **POST** /v1/wallets | 
*WalletApi* | [**deleteWallet**](docs/Api/WalletApi.md#deletewallet) | **DELETE** /v1/wallets/{walletId} | 
*WalletApi* | [**getWallet**](docs/Api/WalletApi.md#getwallet) | **GET** /v1/wallets/{walletId} | 
*WalletApi* | [**listWallets**](docs/Api/WalletApi.md#listwallets) | **GET** /v1/wallets | 
*WalletApi* | [**signCredential**](docs/Api/WalletApi.md#signcredential) | **POST** /v1/wallets/{walletId}/sign-credential | 
*WalletApi* | [**signJwtToken**](docs/Api/WalletApi.md#signjwttoken) | **POST** /v1/wallets/{walletId}/sign-jwt | 
*WalletApi* | [**updateWallet**](docs/Api/WalletApi.md#updatewallet) | **PATCH** /v1/wallets/{walletId} | 

## Models

- [CreateWalletInput](docs/Model/CreateWalletInput.md)
- [CreateWalletResponse](docs/Model/CreateWalletResponse.md)
- [EntityNotFoundError](docs/Model/EntityNotFoundError.md)
- [GetRevocationCredentialStatusOK](docs/Model/GetRevocationCredentialStatusOK.md)
- [GetRevocationListCredentialResultDto](docs/Model/GetRevocationListCredentialResultDto.md)
- [InvalidDidParameterError](docs/Model/InvalidDidParameterError.md)
- [InvalidParameterError](docs/Model/InvalidParameterError.md)
- [KeyNotFoundError](docs/Model/KeyNotFoundError.md)
- [NotFoundError](docs/Model/NotFoundError.md)
- [OperationForbiddenError](docs/Model/OperationForbiddenError.md)
- [RevokeCredentialInput](docs/Model/RevokeCredentialInput.md)
- [ServiceErrorResponse](docs/Model/ServiceErrorResponse.md)
- [ServiceErrorResponseDetailsInner](docs/Model/ServiceErrorResponseDetailsInner.md)
- [SignCredential400Response](docs/Model/SignCredential400Response.md)
- [SignCredentialInputDto](docs/Model/SignCredentialInputDto.md)
- [SignCredentialInputDtoUnsignedCredentialParams](docs/Model/SignCredentialInputDtoUnsignedCredentialParams.md)
- [SignCredentialResultDto](docs/Model/SignCredentialResultDto.md)
- [SignCredentialsDm1JwtInputDto](docs/Model/SignCredentialsDm1JwtInputDto.md)
- [SignCredentialsDm1JwtResultDto](docs/Model/SignCredentialsDm1JwtResultDto.md)
- [SignCredentialsDm1LdInputDto](docs/Model/SignCredentialsDm1LdInputDto.md)
- [SignCredentialsDm1LdResultDto](docs/Model/SignCredentialsDm1LdResultDto.md)
- [SignCredentialsDm2LdInputDto](docs/Model/SignCredentialsDm2LdInputDto.md)
- [SignCredentialsDm2LdResultDto](docs/Model/SignCredentialsDm2LdResultDto.md)
- [SignCredentialsDm2SdJwtInputDto](docs/Model/SignCredentialsDm2SdJwtInputDto.md)
- [SignCredentialsDm2SdJwtResultDto](docs/Model/SignCredentialsDm2SdJwtResultDto.md)
- [SignJwtToken](docs/Model/SignJwtToken.md)
- [SignJwtTokenOK](docs/Model/SignJwtTokenOK.md)
- [SigningFailedError](docs/Model/SigningFailedError.md)
- [UpdateWalletInput](docs/Model/UpdateWalletInput.md)
- [WalletDto](docs/Model/WalletDto.md)
- [WalletDtoKeysInner](docs/Model/WalletDtoKeysInner.md)
- [WalletsListDto](docs/Model/WalletsListDto.md)

## Authorization

Authentication schemes defined for the API:
### ProjectTokenAuth

- **Type**: API key
- **API key parameter name**: authorization
- **Location**: HTTP header


## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author

info@affinidi.com

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.0.0`
    - Generator version: `7.13.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
