# login-configuration-client


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
require_once('/path/to/login-configuration-client/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\LoginConfigurationClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\LoginConfigurationClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\LoginConfigurationClient\Api\AllowListApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_names_input = new \AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNamesInput(); // \AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNamesInput | List of group names as input

try {
    $apiInstance->allowGroups($group_names_input);
} catch (Exception $e) {
    echo 'Exception when calling AllowListApi->allowGroups: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://apse1.api.affinidi.io/vpa*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AllowListApi* | [**allowGroups**](docs/Api/AllowListApi.md#allowgroups) | **POST** /v1/allow-list/groups/add | 
*AllowListApi* | [**disallowGroups**](docs/Api/AllowListApi.md#disallowgroups) | **POST** /v1/allow-list/groups/remove | 
*AllowListApi* | [**listAllowedGroups**](docs/Api/AllowListApi.md#listallowedgroups) | **GET** /v1/allow-list/groups | 
*ConfigurationApi* | [**createLoginConfigurations**](docs/Api/ConfigurationApi.md#createloginconfigurations) | **POST** /v1/login/configurations | Create a new login configuration
*ConfigurationApi* | [**deleteLoginConfigurationsById**](docs/Api/ConfigurationApi.md#deleteloginconfigurationsbyid) | **DELETE** /v1/login/configurations/{configurationId} | Delete login configurations by ID
*ConfigurationApi* | [**getClientMetadataByClientId**](docs/Api/ConfigurationApi.md#getclientmetadatabyclientid) | **GET** /v1/login/configurations/metadata/{clientId} | Get Client Metadata By  OAuth 2.0 Client ID
*ConfigurationApi* | [**getLoginConfigurationsById**](docs/Api/ConfigurationApi.md#getloginconfigurationsbyid) | **GET** /v1/login/configurations/{configurationId} | Get login configuration by ID
*ConfigurationApi* | [**listLoginConfigurations**](docs/Api/ConfigurationApi.md#listloginconfigurations) | **GET** /v1/login/configurations | List login configurations
*ConfigurationApi* | [**updateLoginConfigurationsById**](docs/Api/ConfigurationApi.md#updateloginconfigurationsbyid) | **PATCH** /v1/login/configurations/{configurationId} | Update login configurations by ID
*DenyListApi* | [**blockGroups**](docs/Api/DenyListApi.md#blockgroups) | **POST** /v1/deny-list/groups/add | 
*DenyListApi* | [**blockUsers**](docs/Api/DenyListApi.md#blockusers) | **POST** /v1/deny-list/users/add | 
*DenyListApi* | [**listBlockedGroups**](docs/Api/DenyListApi.md#listblockedgroups) | **GET** /v1/deny-list/groups | 
*DenyListApi* | [**listBlockedUsers**](docs/Api/DenyListApi.md#listblockedusers) | **GET** /v1/deny-list/users | 
*DenyListApi* | [**unblockGroups**](docs/Api/DenyListApi.md#unblockgroups) | **POST** /v1/deny-list/groups/remove | 
*DenyListApi* | [**unblockUsers**](docs/Api/DenyListApi.md#unblockusers) | **POST** /v1/deny-list/users/remove | 
*GroupApi* | [**addUserToGroup**](docs/Api/GroupApi.md#addusertogroup) | **POST** /v1/groups/{groupName}/users | 
*GroupApi* | [**createGroup**](docs/Api/GroupApi.md#creategroup) | **POST** /v1/groups | 
*GroupApi* | [**deleteGroup**](docs/Api/GroupApi.md#deletegroup) | **DELETE** /v1/groups/{groupName} | 
*GroupApi* | [**getGroupById**](docs/Api/GroupApi.md#getgroupbyid) | **GET** /v1/groups/{groupName} | 
*GroupApi* | [**listGroupUserMappings**](docs/Api/GroupApi.md#listgroupusermappings) | **GET** /v1/groups/{groupName}/users | 
*GroupApi* | [**listGroups**](docs/Api/GroupApi.md#listgroups) | **GET** /v1/groups | 
*GroupApi* | [**removeUserFromGroup**](docs/Api/GroupApi.md#removeuserfromgroup) | **DELETE** /v1/groups/{groupName}/users | 
*IdpApi* | [**v1LoginProjectProjectIdOauth2AuthGet**](docs/Api/IdpApi.md#v1loginprojectprojectidoauth2authget) | **GET** /v1/login/project/{projectId}/oauth2/auth | OAuth 2.0 Authorize Endpoint
*IdpApi* | [**v1LoginProjectProjectIdOauth2RevokePost**](docs/Api/IdpApi.md#v1loginprojectprojectidoauth2revokepost) | **POST** /v1/login/project/{projectId}/oauth2/revoke | Revoke OAuth 2.0 Access or Refresh Token
*IdpApi* | [**v1LoginProjectProjectIdOauth2SessionsLogoutGet**](docs/Api/IdpApi.md#v1loginprojectprojectidoauth2sessionslogoutget) | **GET** /v1/login/project/{projectId}/oauth2/sessions/logout | OpenID Connect Front- and Back-channel Enabled Logout
*IdpApi* | [**v1LoginProjectProjectIdOauth2TokenPost**](docs/Api/IdpApi.md#v1loginprojectprojectidoauth2tokenpost) | **POST** /v1/login/project/{projectId}/oauth2/token | The OAuth 2.0 Token Endpoint
*IdpApi* | [**v1LoginProjectProjectIdUserinfoGet**](docs/Api/IdpApi.md#v1loginprojectprojectiduserinfoget) | **GET** /v1/login/project/{projectId}/userinfo | OpenID Connect Userinfo
*IdpApi* | [**v1LoginProjectProjectIdWellKnownJwksJsonGet**](docs/Api/IdpApi.md#v1loginprojectprojectidwellknownjwksjsonget) | **GET** /v1/login/project/{projectId}/.well-known/jwks.json | Discover Well-Known JSON Web Keys
*IdpApi* | [**v1LoginProjectProjectIdWellKnownOpenidConfigurationGet**](docs/Api/IdpApi.md#v1loginprojectprojectidwellknownopenidconfigurationget) | **GET** /v1/login/project/{projectId}/.well-known/openid-configuration | OpenID Connect Discovery

## Models

- [ActionForbiddenError](docs/Model/ActionForbiddenError.md)
- [AddUserToGroupInput](docs/Model/AddUserToGroupInput.md)
- [BlockedUsers](docs/Model/BlockedUsers.md)
- [BlockedUsersInput](docs/Model/BlockedUsersInput.md)
- [CorsLoginSessionAcceptResponseOK](docs/Model/CorsLoginSessionAcceptResponseOK.md)
- [CorsLoginSessionForIdpOK](docs/Model/CorsLoginSessionForIdpOK.md)
- [CorsLoginSessionRejectResponseOK](docs/Model/CorsLoginSessionRejectResponseOK.md)
- [CreateGroupInput](docs/Model/CreateGroupInput.md)
- [CreateHydraNetworkError](docs/Model/CreateHydraNetworkError.md)
- [CreateLoginConfigurationInput](docs/Model/CreateLoginConfigurationInput.md)
- [CreateLoginConfigurationOutput](docs/Model/CreateLoginConfigurationOutput.md)
- [CreateLoginConfigurationOutputAuth](docs/Model/CreateLoginConfigurationOutputAuth.md)
- [CreateLoginConfigurations400Response](docs/Model/CreateLoginConfigurations400Response.md)
- [CreateProjectNetworkError](docs/Model/CreateProjectNetworkError.md)
- [ErrorOAuth2](docs/Model/ErrorOAuth2.md)
- [GetUserInfo](docs/Model/GetUserInfo.md)
- [GroupDto](docs/Model/GroupDto.md)
- [GroupNames](docs/Model/GroupNames.md)
- [GroupNamesInput](docs/Model/GroupNamesInput.md)
- [GroupUserMappingDto](docs/Model/GroupUserMappingDto.md)
- [GroupUserMappingsList](docs/Model/GroupUserMappingsList.md)
- [GroupsList](docs/Model/GroupsList.md)
- [GroupsPerUserLimitExceededError](docs/Model/GroupsPerUserLimitExceededError.md)
- [IdTokenMappingItem](docs/Model/IdTokenMappingItem.md)
- [InlineObject](docs/Model/InlineObject.md)
- [InvalidClaimContextError](docs/Model/InvalidClaimContextError.md)
- [InvalidGroupsError](docs/Model/InvalidGroupsError.md)
- [InvalidParameterError](docs/Model/InvalidParameterError.md)
- [InvalidParameterErrorDetailsInner](docs/Model/InvalidParameterErrorDetailsInner.md)
- [InvalidVPTokenCreationTimeError](docs/Model/InvalidVPTokenCreationTimeError.md)
- [JsonWebKey](docs/Model/JsonWebKey.md)
- [JsonWebKeyKeysInner](docs/Model/JsonWebKeyKeysInner.md)
- [ListLoginConfigurationOutput](docs/Model/ListLoginConfigurationOutput.md)
- [LoginConfigurationClientMetadataInput](docs/Model/LoginConfigurationClientMetadataInput.md)
- [LoginConfigurationClientMetadataOutput](docs/Model/LoginConfigurationClientMetadataOutput.md)
- [LoginConfigurationObject](docs/Model/LoginConfigurationObject.md)
- [LoginConfigurationReadInvalidClientIdError](docs/Model/LoginConfigurationReadInvalidClientIdError.md)
- [LoginSessionAcceptResponseInput](docs/Model/LoginSessionAcceptResponseInput.md)
- [LoginSessionAcceptResponseOutput](docs/Model/LoginSessionAcceptResponseOutput.md)
- [LoginSessionDto](docs/Model/LoginSessionDto.md)
- [LoginSessionDtoAuthorizationRequest](docs/Model/LoginSessionDtoAuthorizationRequest.md)
- [LoginSessionForIDPInput](docs/Model/LoginSessionForIDPInput.md)
- [LoginSessionRejectResponseInput](docs/Model/LoginSessionRejectResponseInput.md)
- [LoginSessionRejectResponseOutput](docs/Model/LoginSessionRejectResponseOutput.md)
- [NotFoundError](docs/Model/NotFoundError.md)
- [OAuth2Token](docs/Model/OAuth2Token.md)
- [OAuth2TokenAuthorizationDetailsInner](docs/Model/OAuth2TokenAuthorizationDetailsInner.md)
- [OIDCConfig](docs/Model/OIDCConfig.md)
- [OIDCConfigCredentialsSupportedDraft00Inner](docs/Model/OIDCConfigCredentialsSupportedDraft00Inner.md)
- [RedirectResponse](docs/Model/RedirectResponse.md)
- [RemoveUserFromGroupInput](docs/Model/RemoveUserFromGroupInput.md)
- [ResourceCreationError](docs/Model/ResourceCreationError.md)
- [ServiceErrorResponse](docs/Model/ServiceErrorResponse.md)
- [ServiceErrorResponseDetailsInner](docs/Model/ServiceErrorResponseDetailsInner.md)
- [TokenEndpointAuthMethod](docs/Model/TokenEndpointAuthMethod.md)
- [UnauthorizedError](docs/Model/UnauthorizedError.md)
- [UpdateLoginConfigurationInput](docs/Model/UpdateLoginConfigurationInput.md)
- [VPTokenValidationError](docs/Model/VPTokenValidationError.md)

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
