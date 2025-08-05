# vault-data-manager-client


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
require_once('/path/to/vault-data-manager-client/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\AccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_account_input = new \AffinidiTdk\Clients\VaultDataManagerClient\Model\CreateAccountInput(); // \AffinidiTdk\Clients\VaultDataManagerClient\Model\CreateAccountInput | CreateAccount

try {
    $result = $apiInstance->createAccount($create_account_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountsApi->createAccount: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api.vault.affinidi.com/vfs*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AccountsApi* | [**createAccount**](docs/Api/AccountsApi.md#createaccount) | **POST** /v1/accounts | 
*AccountsApi* | [**deleteAccount**](docs/Api/AccountsApi.md#deleteaccount) | **DELETE** /v1/accounts/{accountIndex} | 
*AccountsApi* | [**listAccounts**](docs/Api/AccountsApi.md#listaccounts) | **GET** /v1/accounts | 
*AccountsApi* | [**updateAccount**](docs/Api/AccountsApi.md#updateaccount) | **PUT** /v1/accounts/{accountIndex} | 
*ConfigurationApi* | [**getConfiguration**](docs/Api/ConfigurationApi.md#getconfiguration) | **GET** /v1/config | 
*FilesApi* | [**getScannedFileInfo**](docs/Api/FilesApi.md#getscannedfileinfo) | **GET** /v1/scanned-files/{scannedFileJobId} | 
*FilesApi* | [**listScannedFiles**](docs/Api/FilesApi.md#listscannedfiles) | **GET** /v1/scanned-files/ | 
*FilesApi* | [**startFileScan**](docs/Api/FilesApi.md#startfilescan) | **POST** /v1/nodes/{nodeId}/file/scan | 
*NodesApi* | [**createChildNode**](docs/Api/NodesApi.md#createchildnode) | **POST** /v1/nodes/{nodeId} | 
*NodesApi* | [**createNode**](docs/Api/NodesApi.md#createnode) | **POST** /v1/nodes | 
*NodesApi* | [**deleteNode**](docs/Api/NodesApi.md#deletenode) | **DELETE** /v1/nodes/{nodeId} | 
*NodesApi* | [**getDetailedNodeInfo**](docs/Api/NodesApi.md#getdetailednodeinfo) | **GET** /v1/nodes/{nodeId} | 
*NodesApi* | [**initNodes**](docs/Api/NodesApi.md#initnodes) | **POST** /v1/nodes/init | 
*NodesApi* | [**listNodeChildren**](docs/Api/NodesApi.md#listnodechildren) | **GET** /v1/nodes/{nodeId}/children | 
*NodesApi* | [**listRootNodeChildren**](docs/Api/NodesApi.md#listrootnodechildren) | **GET** /v1/nodes | 
*NodesApi* | [**moveNode**](docs/Api/NodesApi.md#movenode) | **POST** /v1/nodes/{nodeId}/move | 
*NodesApi* | [**permanentlyDeleteNode**](docs/Api/NodesApi.md#permanentlydeletenode) | **DELETE** /v1/nodes/{nodeId}/remove/{nodeIdToRemove} | 
*NodesApi* | [**restoreNodeFromTrashbin**](docs/Api/NodesApi.md#restorenodefromtrashbin) | **POST** /v1/nodes/{nodeId}/restore/{nodeIdToRestore} | 
*NodesApi* | [**updateNode**](docs/Api/NodesApi.md#updatenode) | **PATCH** /v1/nodes/{nodeId} | 
*ProfileDataApi* | [**queryProfileData**](docs/Api/ProfileDataApi.md#queryprofiledata) | **GET** /v1/nodes/{nodeId}/profile-data | 
*ProfileDataApi* | [**updateProfileData**](docs/Api/ProfileDataApi.md#updateprofiledata) | **PATCH** /v1/nodes/{nodeId}/profile-data | 
*WellKnownApi* | [**getWellKnownJwks**](docs/Api/WellKnownApi.md#getwellknownjwks) | **GET** /.well-known/jwks.json | 

## Models

- [AccountDto](docs/Model/AccountDto.md)
- [AwsCredentialExchangeOperationOK](docs/Model/AwsCredentialExchangeOperationOK.md)
- [ConsumerMetadataDto](docs/Model/ConsumerMetadataDto.md)
- [CorsAwsCredentialExchangeOK](docs/Model/CorsAwsCredentialExchangeOK.md)
- [CorsDeleteAccountOK](docs/Model/CorsDeleteAccountOK.md)
- [CorsDeleteNodeOK](docs/Model/CorsDeleteNodeOK.md)
- [CorsGetConfigOK](docs/Model/CorsGetConfigOK.md)
- [CorsGetConfigurationOK](docs/Model/CorsGetConfigurationOK.md)
- [CorsGetScannedFileInfoOK](docs/Model/CorsGetScannedFileInfoOK.md)
- [CorsGetWellKnownJwksOK](docs/Model/CorsGetWellKnownJwksOK.md)
- [CorsInitNodesOK](docs/Model/CorsInitNodesOK.md)
- [CorsListAccountsOK](docs/Model/CorsListAccountsOK.md)
- [CorsListNodeChildrenOK](docs/Model/CorsListNodeChildrenOK.md)
- [CorsListRootNodeChildrenOK](docs/Model/CorsListRootNodeChildrenOK.md)
- [CorsListScannedFilesOK](docs/Model/CorsListScannedFilesOK.md)
- [CorsMoveNodeOK](docs/Model/CorsMoveNodeOK.md)
- [CorsPermanentlyDeleteNodeOK](docs/Model/CorsPermanentlyDeleteNodeOK.md)
- [CorsRestoreNodeFromTrashbinOK](docs/Model/CorsRestoreNodeFromTrashbinOK.md)
- [CorsStartFileScanOK](docs/Model/CorsStartFileScanOK.md)
- [CorsUpdateProfileDataOK](docs/Model/CorsUpdateProfileDataOK.md)
- [CreateAccountInput](docs/Model/CreateAccountInput.md)
- [CreateAccountOK](docs/Model/CreateAccountOK.md)
- [CreateChildNodeInput](docs/Model/CreateChildNodeInput.md)
- [CreateNodeInput](docs/Model/CreateNodeInput.md)
- [CreateNodeOK](docs/Model/CreateNodeOK.md)
- [DeleteAccountDto](docs/Model/DeleteAccountDto.md)
- [DeleteNodeDto](docs/Model/DeleteNodeDto.md)
- [EdekInfo](docs/Model/EdekInfo.md)
- [GetConfigOK](docs/Model/GetConfigOK.md)
- [GetDetailedNodeInfoOK](docs/Model/GetDetailedNodeInfoOK.md)
- [GetScannedFileInfoOK](docs/Model/GetScannedFileInfoOK.md)
- [InitNodesOK](docs/Model/InitNodesOK.md)
- [InvalidParameterError](docs/Model/InvalidParameterError.md)
- [InvalidParameterErrorDetailsInner](docs/Model/InvalidParameterErrorDetailsInner.md)
- [JsonWebKeyDto](docs/Model/JsonWebKeyDto.md)
- [JsonWebKeySetDto](docs/Model/JsonWebKeySetDto.md)
- [ListAccountsDto](docs/Model/ListAccountsDto.md)
- [ListNodeChildrenOK](docs/Model/ListNodeChildrenOK.md)
- [ListRootNodeChildrenOK](docs/Model/ListRootNodeChildrenOK.md)
- [ListScannedFilesOK](docs/Model/ListScannedFilesOK.md)
- [ListScannedFilesOKScannedFilesInner](docs/Model/ListScannedFilesOKScannedFilesInner.md)
- [MoveNodeDto](docs/Model/MoveNodeDto.md)
- [MoveNodeInput](docs/Model/MoveNodeInput.md)
- [NodeDto](docs/Model/NodeDto.md)
- [NodeStatus](docs/Model/NodeStatus.md)
- [NodeType](docs/Model/NodeType.md)
- [NotFoundError](docs/Model/NotFoundError.md)
- [QueryProfileDataOK](docs/Model/QueryProfileDataOK.md)
- [RestoreNodeFromTrashbin](docs/Model/RestoreNodeFromTrashbin.md)
- [StartFileScanInput](docs/Model/StartFileScanInput.md)
- [StartFileScanOK](docs/Model/StartFileScanOK.md)
- [UnexpectedError](docs/Model/UnexpectedError.md)
- [UpdateAccountDto](docs/Model/UpdateAccountDto.md)
- [UpdateAccountInput](docs/Model/UpdateAccountInput.md)
- [UpdateNodeInput](docs/Model/UpdateNodeInput.md)
- [UpdateProfileDataInput](docs/Model/UpdateProfileDataInput.md)
- [UpdateProfileDataOK](docs/Model/UpdateProfileDataOK.md)

## Authorization

Authentication schemes defined for the API:
### AwsSigV4

- **Type**: API key
- **API key parameter name**: Authorization
- **Location**: HTTP header


### ApiKey

- **Type**: API key
- **API key parameter name**: x-api-key
- **Location**: HTTP header


### bearerAuth

- **Type**: Bearer authentication (JWT)

### ConsumerTokenAuth

- **Type**: API key
- **API key parameter name**: authorization
- **Location**: HTTP header


### UserTokenAuth

- **Type**: API key
- **API key parameter name**: authorization
- **Location**: HTTP header


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
