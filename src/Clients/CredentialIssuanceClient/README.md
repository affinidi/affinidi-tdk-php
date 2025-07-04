# credential-issuance-client


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
require_once('/path/to/credential-issuance-client/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\CredentialIssuanceClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\CredentialIssuanceClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\CredentialIssuanceClient\Api\ConfigurationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_issuance_config_input = new \AffinidiTdk\Clients\CredentialIssuanceClient\Model\CreateIssuanceConfigInput(); // \AffinidiTdk\Clients\CredentialIssuanceClient\Model\CreateIssuanceConfigInput | Request body of create configuration

try {
    $result = $apiInstance->createIssuanceConfig($create_issuance_config_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConfigurationApi->createIssuanceConfig: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://apse1.api.affinidi.io/cis*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ConfigurationApi* | [**createIssuanceConfig**](docs/Api/ConfigurationApi.md#createissuanceconfig) | **POST** /v1/configurations | 
*ConfigurationApi* | [**deleteIssuanceConfigById**](docs/Api/ConfigurationApi.md#deleteissuanceconfigbyid) | **DELETE** /v1/configurations/{configurationId} | 
*ConfigurationApi* | [**getIssuanceConfigById**](docs/Api/ConfigurationApi.md#getissuanceconfigbyid) | **GET** /v1/configurations/{configurationId} | 
*ConfigurationApi* | [**getIssuanceConfigList**](docs/Api/ConfigurationApi.md#getissuanceconfiglist) | **GET** /v1/configurations | 
*ConfigurationApi* | [**updateIssuanceConfigById**](docs/Api/ConfigurationApi.md#updateissuanceconfigbyid) | **PUT** /v1/configurations/{configurationId} | 
*CredentialsApi* | [**batchCredential**](docs/Api/CredentialsApi.md#batchcredential) | **POST** /v1/{projectId}/batch_credential | Allows wallets to claim multiple credentials at once.
*CredentialsApi* | [**generateCredentials**](docs/Api/CredentialsApi.md#generatecredentials) | **POST** /v1/{projectId}/credential | 
*CredentialsApi* | [**getClaimedCredentials**](docs/Api/CredentialsApi.md#getclaimedcredentials) | **GET** /v1/{projectId}/configurations/{configurationId}/credentials | Get claimed credential in the specified range
*CredentialsApi* | [**getIssuanceIdClaimedCredential**](docs/Api/CredentialsApi.md#getissuanceidclaimedcredential) | **GET** /v1/{projectId}/configurations/{configurationId}/issuances/{issuanceId}/credentials | Get claimed VC linked to the issuanceId
*DefaultApi* | [**changeCredentialStatus**](docs/Api/DefaultApi.md#changecredentialstatus) | **POST** /v1/{projectId}/configurations/{configurationId}/issuance/change-status | change credential status.
*DefaultApi* | [**listIssuanceDataRecords**](docs/Api/DefaultApi.md#listissuancedatarecords) | **GET** /v1/{projectId}/configurations/{configurationId}/issuance/issuance-data-records | List records
*IssuanceApi* | [**issuanceState**](docs/Api/IssuanceApi.md#issuancestate) | **GET** /v1/{projectId}/issuance/state/{issuanceId} | 
*IssuanceApi* | [**issueCredentials**](docs/Api/IssuanceApi.md#issuecredentials) | **POST** /v1/{projectId}/credential/issue | 
*IssuanceApi* | [**listIssuance**](docs/Api/IssuanceApi.md#listissuance) | **GET** /v1/{projectId}/issuance | 
*IssuanceApi* | [**startIssuance**](docs/Api/IssuanceApi.md#startissuance) | **POST** /v1/{projectId}/issuance/start | 
*OfferApi* | [**getCredentialOffer**](docs/Api/OfferApi.md#getcredentialoffer) | **GET** /v1/{projectId}/offers/{issuanceId} | 
*WellKnownApi* | [**getWellKnownOpenIdCredentialIssuer**](docs/Api/WellKnownApi.md#getwellknownopenidcredentialissuer) | **GET** /v1/{projectId}/.well-known/openid-credential-issuer | 

## Models

- [ActionForbiddenError](docs/Model/ActionForbiddenError.md)
- [ActionForbiddenErrorDetailsInner](docs/Model/ActionForbiddenErrorDetailsInner.md)
- [BatchCredentialInput](docs/Model/BatchCredentialInput.md)
- [BatchCredentialInputCredentialRequestsInner](docs/Model/BatchCredentialInputCredentialRequestsInner.md)
- [BatchCredentialResponse](docs/Model/BatchCredentialResponse.md)
- [BatchCredentialResponseCredentialResponsesInner](docs/Model/BatchCredentialResponseCredentialResponsesInner.md)
- [ChangeCredentialStatus400Response](docs/Model/ChangeCredentialStatus400Response.md)
- [ChangeCredentialStatusInput](docs/Model/ChangeCredentialStatusInput.md)
- [ChangeStatusForbiddenError](docs/Model/ChangeStatusForbiddenError.md)
- [CisConfigurationWebhookSetting](docs/Model/CisConfigurationWebhookSetting.md)
- [CisConfigurationWebhookSettingEndpoint](docs/Model/CisConfigurationWebhookSettingEndpoint.md)
- [ClaimedCredentialListResponse](docs/Model/ClaimedCredentialListResponse.md)
- [ClaimedCredentialResponse](docs/Model/ClaimedCredentialResponse.md)
- [CorsBatchCredentialOK](docs/Model/CorsBatchCredentialOK.md)
- [CorsGenerateCredentialsOK](docs/Model/CorsGenerateCredentialsOK.md)
- [CorsGetClaimedCredentialsOK](docs/Model/CorsGetClaimedCredentialsOK.md)
- [CorsGetCredentialOfferOK](docs/Model/CorsGetCredentialOfferOK.md)
- [CorsGetIssuanceIdClaimedCredentialOK](docs/Model/CorsGetIssuanceIdClaimedCredentialOK.md)
- [CorsGetWellKnownOpenIdCredentialIssuerOK](docs/Model/CorsGetWellKnownOpenIdCredentialIssuerOK.md)
- [CreateCredentialInput](docs/Model/CreateCredentialInput.md)
- [CreateIssuanceConfig400Response](docs/Model/CreateIssuanceConfig400Response.md)
- [CreateIssuanceConfigInput](docs/Model/CreateIssuanceConfigInput.md)
- [CredentialIssuanceIdExistError](docs/Model/CredentialIssuanceIdExistError.md)
- [CredentialOfferClaimedError](docs/Model/CredentialOfferClaimedError.md)
- [CredentialOfferExpiredError](docs/Model/CredentialOfferExpiredError.md)
- [CredentialOfferResponse](docs/Model/CredentialOfferResponse.md)
- [CredentialOfferResponseGrants](docs/Model/CredentialOfferResponseGrants.md)
- [CredentialOfferResponseGrantsUrnIetfParamsOauthGrantTypePreAuthorizedCode](docs/Model/CredentialOfferResponseGrantsUrnIetfParamsOauthGrantTypePreAuthorizedCode.md)
- [CredentialOfferResponseGrantsUrnIetfParamsOauthGrantTypePreAuthorizedCodeTxCode](docs/Model/CredentialOfferResponseGrantsUrnIetfParamsOauthGrantTypePreAuthorizedCodeTxCode.md)
- [CredentialProof](docs/Model/CredentialProof.md)
- [CredentialResponse](docs/Model/CredentialResponse.md)
- [CredentialResponseDeferred](docs/Model/CredentialResponseDeferred.md)
- [CredentialResponseImmediate](docs/Model/CredentialResponseImmediate.md)
- [CredentialResponseImmediateCNonceExpiresIn](docs/Model/CredentialResponseImmediateCNonceExpiresIn.md)
- [CredentialResponseImmediateCredential](docs/Model/CredentialResponseImmediateCredential.md)
- [CredentialSubjectNotValidError](docs/Model/CredentialSubjectNotValidError.md)
- [CredentialSupportedObject](docs/Model/CredentialSupportedObject.md)
- [DeferredCredentialInput](docs/Model/DeferredCredentialInput.md)
- [FlowData](docs/Model/FlowData.md)
- [FlowDataStatusListsDetailsInner](docs/Model/FlowDataStatusListsDetailsInner.md)
- [GenerateCredentials400Response](docs/Model/GenerateCredentials400Response.md)
- [GetCredentialOffer400Response](docs/Model/GetCredentialOffer400Response.md)
- [InvalidCredentialRequestError](docs/Model/InvalidCredentialRequestError.md)
- [InvalidCredentialTypeError](docs/Model/InvalidCredentialTypeError.md)
- [InvalidIssuerWalletError](docs/Model/InvalidIssuerWalletError.md)
- [InvalidJwtTokenError](docs/Model/InvalidJwtTokenError.md)
- [InvalidParameterError](docs/Model/InvalidParameterError.md)
- [InvalidProofError](docs/Model/InvalidProofError.md)
- [IssuanceConfigDto](docs/Model/IssuanceConfigDto.md)
- [IssuanceConfigListResponse](docs/Model/IssuanceConfigListResponse.md)
- [IssuanceConfigMiniDto](docs/Model/IssuanceConfigMiniDto.md)
- [IssuanceStateResponse](docs/Model/IssuanceStateResponse.md)
- [ListIssuanceRecordResponse](docs/Model/ListIssuanceRecordResponse.md)
- [ListIssuanceResponse](docs/Model/ListIssuanceResponse.md)
- [ListIssuanceResponseIssuancesInner](docs/Model/ListIssuanceResponseIssuancesInner.md)
- [MissingHolderDidError](docs/Model/MissingHolderDidError.md)
- [NotFoundError](docs/Model/NotFoundError.md)
- [ProjectCredentialConfigExistError](docs/Model/ProjectCredentialConfigExistError.md)
- [ProjectCredentialConfigNotExistError](docs/Model/ProjectCredentialConfigNotExistError.md)
- [RevocationForbiddenError](docs/Model/RevocationForbiddenError.md)
- [StartIssuance400Response](docs/Model/StartIssuance400Response.md)
- [StartIssuanceInput](docs/Model/StartIssuanceInput.md)
- [StartIssuanceInputDataInner](docs/Model/StartIssuanceInputDataInner.md)
- [StartIssuanceInputDataInnerMetaData](docs/Model/StartIssuanceInputDataInnerMetaData.md)
- [StartIssuanceInputDataInnerStatusListDetailsInner](docs/Model/StartIssuanceInputDataInnerStatusListDetailsInner.md)
- [StartIssuanceResponse](docs/Model/StartIssuanceResponse.md)
- [SupportedCredentialMetadata](docs/Model/SupportedCredentialMetadata.md)
- [SupportedCredentialMetadataDisplayInner](docs/Model/SupportedCredentialMetadataDisplayInner.md)
- [SupportedCredentialMetadataItemLogo](docs/Model/SupportedCredentialMetadataItemLogo.md)
- [UpdateIssuanceConfigInput](docs/Model/UpdateIssuanceConfigInput.md)
- [VcClaimedError](docs/Model/VcClaimedError.md)
- [WellKnownOpenIdCredentialIssuerResponse](docs/Model/WellKnownOpenIdCredentialIssuerResponse.md)
- [WellKnownOpenIdCredentialIssuerResponseCredentialsSupportedInner](docs/Model/WellKnownOpenIdCredentialIssuerResponseCredentialsSupportedInner.md)

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


### HeritageTokenAuth

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
