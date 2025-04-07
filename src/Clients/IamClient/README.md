# iam-client


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
require_once('/path/to/iam-client/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\IamClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\IamClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\IamClient\Api\AuthzApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$subject_did = 'subject_did_example'; // string

try {
    $apiInstance->deleteAccessVfs($subject_did);
} catch (Exception $e) {
    echo 'Exception when calling AuthzApi->deleteAccessVfs: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://apse1.api.affinidi.io/iam*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AuthzApi* | [**deleteAccessVfs**](docs/Api/AuthzApi.md#deleteaccessvfs) | **DELETE** /v1/authz/vfs/access/{subjectDID} | delete access of subjectDiD
*AuthzApi* | [**grantAccessVfs**](docs/Api/AuthzApi.md#grantaccessvfs) | **POST** /v1/authz/vfs/access | Grant access to the virtual file system
*AuthzApi* | [**updateAccessVfs**](docs/Api/AuthzApi.md#updateaccessvfs) | **PUT** /v1/authz/vfs/access/{subjectDID} | Update access of subjectDiD
*ConsumerAuthApi* | [**consumerAuthTokenEndpoint**](docs/Api/ConsumerAuthApi.md#consumerauthtokenendpoint) | **POST** /v1/consumer/oauth2/token | The Consumer OAuth 2.0 Token Endpoint
*DefaultApi* | [**v1AuthProxyDelete**](docs/Api/DefaultApi.md#v1authproxydelete) | **DELETE** /v1/auth/{proxy+} | 
*DefaultApi* | [**v1AuthProxyGet**](docs/Api/DefaultApi.md#v1authproxyget) | **GET** /v1/auth/{proxy+} | 
*DefaultApi* | [**v1AuthProxyPatch**](docs/Api/DefaultApi.md#v1authproxypatch) | **PATCH** /v1/auth/{proxy+} | 
*DefaultApi* | [**v1AuthProxyPost**](docs/Api/DefaultApi.md#v1authproxypost) | **POST** /v1/auth/{proxy+} | 
*DefaultApi* | [**v1AuthProxyPut**](docs/Api/DefaultApi.md#v1authproxyput) | **PUT** /v1/auth/{proxy+} | 
*DefaultApi* | [**v1IdpProxyDelete**](docs/Api/DefaultApi.md#v1idpproxydelete) | **DELETE** /v1/idp/{proxy+} | 
*DefaultApi* | [**v1IdpProxyGet**](docs/Api/DefaultApi.md#v1idpproxyget) | **GET** /v1/idp/{proxy+} | 
*DefaultApi* | [**v1IdpProxyPatch**](docs/Api/DefaultApi.md#v1idpproxypatch) | **PATCH** /v1/idp/{proxy+} | 
*DefaultApi* | [**v1IdpProxyPost**](docs/Api/DefaultApi.md#v1idpproxypost) | **POST** /v1/idp/{proxy+} | 
*DefaultApi* | [**v1IdpProxyPut**](docs/Api/DefaultApi.md#v1idpproxyput) | **PUT** /v1/idp/{proxy+} | 
*PoliciesApi* | [**getPolicies**](docs/Api/PoliciesApi.md#getpolicies) | **GET** /v1/policies/principals/{principalId} | 
*PoliciesApi* | [**updatePolicies**](docs/Api/PoliciesApi.md#updatepolicies) | **PUT** /v1/policies/principals/{principalId} | 
*ProjectsApi* | [**addPrincipalToProject**](docs/Api/ProjectsApi.md#addprincipaltoproject) | **POST** /v1/projects/principals | 
*ProjectsApi* | [**createProject**](docs/Api/ProjectsApi.md#createproject) | **POST** /v1/projects | 
*ProjectsApi* | [**deletePrincipalFromProject**](docs/Api/ProjectsApi.md#deleteprincipalfromproject) | **DELETE** /v1/projects/principals/{principalId} | 
*ProjectsApi* | [**listPrincipalsOfProject**](docs/Api/ProjectsApi.md#listprincipalsofproject) | **GET** /v1/projects/principals | 
*ProjectsApi* | [**listProject**](docs/Api/ProjectsApi.md#listproject) | **GET** /v1/projects | 
*ProjectsApi* | [**updateProject**](docs/Api/ProjectsApi.md#updateproject) | **PATCH** /v1/projects/{projectId} | 
*StsApi* | [**createProjectScopedToken**](docs/Api/StsApi.md#createprojectscopedtoken) | **POST** /v1/sts/create-project-scoped-token | 
*StsApi* | [**whoami**](docs/Api/StsApi.md#whoami) | **GET** /v1/sts/whoami | 
*TokensApi* | [**createToken**](docs/Api/TokensApi.md#createtoken) | **POST** /v1/tokens | 
*TokensApi* | [**deleteToken**](docs/Api/TokensApi.md#deletetoken) | **DELETE** /v1/tokens/{tokenId} | 
*TokensApi* | [**getToken**](docs/Api/TokensApi.md#gettoken) | **GET** /v1/tokens/{tokenId} | 
*TokensApi* | [**listProjectsOfToken**](docs/Api/TokensApi.md#listprojectsoftoken) | **GET** /v1/tokens/{tokenId}/projects | 
*TokensApi* | [**listToken**](docs/Api/TokensApi.md#listtoken) | **GET** /v1/tokens | 
*TokensApi* | [**updateToken**](docs/Api/TokensApi.md#updatetoken) | **PATCH** /v1/tokens/{tokenId} | 
*WellKnownApi* | [**getWellKnownDid**](docs/Api/WellKnownApi.md#getwellknowndid) | **GET** /.well-known/did.json | 
*WellKnownApi* | [**getWellKnownJwks**](docs/Api/WellKnownApi.md#getwellknownjwks) | **GET** /.well-known/jwks.json | 

## Models

- [ActionForbiddenError](docs/Model/ActionForbiddenError.md)
- [AddUserToProjectInput](docs/Model/AddUserToProjectInput.md)
- [ConsumerAuthTokenEndpointInput](docs/Model/ConsumerAuthTokenEndpointInput.md)
- [ConsumerAuthTokenEndpointOutput](docs/Model/ConsumerAuthTokenEndpointOutput.md)
- [CorsConsumerAuthTokenEndpointOK](docs/Model/CorsConsumerAuthTokenEndpointOK.md)
- [CreateProjectInput](docs/Model/CreateProjectInput.md)
- [CreateProjectScopedTokenInput](docs/Model/CreateProjectScopedTokenInput.md)
- [CreateProjectScopedTokenOutput](docs/Model/CreateProjectScopedTokenOutput.md)
- [CreateTokenInput](docs/Model/CreateTokenInput.md)
- [DeleteAccessOutput](docs/Model/DeleteAccessOutput.md)
- [GetWellKnownDidOK](docs/Model/GetWellKnownDidOK.md)
- [GrantAccessInput](docs/Model/GrantAccessInput.md)
- [GrantAccessOutput](docs/Model/GrantAccessOutput.md)
- [InvalidDIDError](docs/Model/InvalidDIDError.md)
- [InvalidJwtTokenError](docs/Model/InvalidJwtTokenError.md)
- [InvalidParameterError](docs/Model/InvalidParameterError.md)
- [JsonWebKeyDto](docs/Model/JsonWebKeyDto.md)
- [JsonWebKeySetDto](docs/Model/JsonWebKeySetDto.md)
- [NotFoundError](docs/Model/NotFoundError.md)
- [PolicyDto](docs/Model/PolicyDto.md)
- [PolicyStatementDto](docs/Model/PolicyStatementDto.md)
- [PrincipalCannotBeDeletedError](docs/Model/PrincipalCannotBeDeletedError.md)
- [PrincipalDoesNotBelongToProjectError](docs/Model/PrincipalDoesNotBelongToProjectError.md)
- [ProjectDto](docs/Model/ProjectDto.md)
- [ProjectList](docs/Model/ProjectList.md)
- [ProjectWithPolicyDto](docs/Model/ProjectWithPolicyDto.md)
- [ProjectWithPolicyList](docs/Model/ProjectWithPolicyList.md)
- [PublicKeyCannotBeResolvedFromDidError](docs/Model/PublicKeyCannotBeResolvedFromDidError.md)
- [ServiceErrorResponse](docs/Model/ServiceErrorResponse.md)
- [ServiceErrorResponseDetailsInner](docs/Model/ServiceErrorResponseDetailsInner.md)
- [TokenAuthenticationMethodDto](docs/Model/TokenAuthenticationMethodDto.md)
- [TokenDto](docs/Model/TokenDto.md)
- [TokenList](docs/Model/TokenList.md)
- [TokenPrivateKeyAuthenticationMethodDto](docs/Model/TokenPrivateKeyAuthenticationMethodDto.md)
- [TokenPrivateKeyAuthenticationMethodDtoPublicKeyInfo](docs/Model/TokenPrivateKeyAuthenticationMethodDtoPublicKeyInfo.md)
- [TokenPrivateKeyAuthenticationMethodDtoPublicKeyInfoOneOf](docs/Model/TokenPrivateKeyAuthenticationMethodDtoPublicKeyInfoOneOf.md)
- [TokenPrivateKeyAuthenticationMethodDtoPublicKeyInfoOneOf1](docs/Model/TokenPrivateKeyAuthenticationMethodDtoPublicKeyInfoOneOf1.md)
- [TypedPrincipalId](docs/Model/TypedPrincipalId.md)
- [UnauthorizedError](docs/Model/UnauthorizedError.md)
- [UnexpectedError](docs/Model/UnexpectedError.md)
- [UpdateAccessInput](docs/Model/UpdateAccessInput.md)
- [UpdateAccessOutput](docs/Model/UpdateAccessOutput.md)
- [UpdateProjectInput](docs/Model/UpdateProjectInput.md)
- [UpdateTokenInput](docs/Model/UpdateTokenInput.md)
- [UpdateTokenPrivateKeyAuthenticationMethodDto](docs/Model/UpdateTokenPrivateKeyAuthenticationMethodDto.md)
- [UserDto](docs/Model/UserDto.md)
- [UserList](docs/Model/UserList.md)
- [WhoamiDto](docs/Model/WhoamiDto.md)

## Authorization

Authentication schemes defined for the API:
### HeritageTokenAuth

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


### ConsumerTokenAuth

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
    - Generator version: `7.9.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
