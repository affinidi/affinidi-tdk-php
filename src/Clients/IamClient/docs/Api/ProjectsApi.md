# AffinidiTdk\Clients\IamClient\ProjectsApi

All URIs are relative to https://apse1.api.affinidi.io/iam, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addPrincipalToProject()**](ProjectsApi.md#addPrincipalToProject) | **POST** /v1/projects/principals |  |
| [**createProject()**](ProjectsApi.md#createProject) | **POST** /v1/projects |  |
| [**deletePrincipalFromProject()**](ProjectsApi.md#deletePrincipalFromProject) | **DELETE** /v1/projects/principals/{principalId} |  |
| [**listPrincipalsOfProject()**](ProjectsApi.md#listPrincipalsOfProject) | **GET** /v1/projects/principals |  |
| [**listProject()**](ProjectsApi.md#listProject) | **GET** /v1/projects |  |
| [**updateProject()**](ProjectsApi.md#updateProject) | **PATCH** /v1/projects/{projectId} |  |


## `addPrincipalToProject()`

```php
addPrincipalToProject($add_user_to_project_input)
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\IamClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\IamClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\IamClient\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$add_user_to_project_input = new \AffinidiTdk\Clients\IamClient\Model\AddUserToProjectInput(); // \AffinidiTdk\Clients\IamClient\Model\AddUserToProjectInput | AddPrincipalToProject

try {
    $apiInstance->addPrincipalToProject($add_user_to_project_input);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->addPrincipalToProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **add_user_to_project_input** | [**\AffinidiTdk\Clients\IamClient\Model\AddUserToProjectInput**](../Model/AddUserToProjectInput.md)| AddPrincipalToProject | |

### Return type

void (empty response body)

### Authorization

[ProjectTokenAuth](../../README.md#ProjectTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createProject()`

```php
createProject($create_project_input): \AffinidiTdk\Clients\IamClient\Model\ProjectDto
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: UserTokenAuth
$config = AffinidiTdk\Clients\IamClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\IamClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\IamClient\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_project_input = new \AffinidiTdk\Clients\IamClient\Model\CreateProjectInput(); // \AffinidiTdk\Clients\IamClient\Model\CreateProjectInput | CreateProject

try {
    $result = $apiInstance->createProject($create_project_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->createProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_project_input** | [**\AffinidiTdk\Clients\IamClient\Model\CreateProjectInput**](../Model/CreateProjectInput.md)| CreateProject | |

### Return type

[**\AffinidiTdk\Clients\IamClient\Model\ProjectDto**](../Model/ProjectDto.md)

### Authorization

[UserTokenAuth](../../README.md#UserTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deletePrincipalFromProject()`

```php
deletePrincipalFromProject($principal_id, $principal_type)
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\IamClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\IamClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\IamClient\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$principal_id = 'principal_id_example'; // string | id of principal
$principal_type = 'principal_type_example'; // string | type of principal

try {
    $apiInstance->deletePrincipalFromProject($principal_id, $principal_type);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->deletePrincipalFromProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **principal_id** | **string**| id of principal | |
| **principal_type** | **string**| type of principal | |

### Return type

void (empty response body)

### Authorization

[ProjectTokenAuth](../../README.md#ProjectTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPrincipalsOfProject()`

```php
listPrincipalsOfProject($limit, $exclusive_start_key): \AffinidiTdk\Clients\IamClient\Model\UserList
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\IamClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\IamClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\IamClient\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 100; // int | Maximum number of records to fetch in a list
$exclusive_start_key = 'exclusive_start_key_example'; // string | The base64url encoded key of the first item that this operation will evaluate (it is not returned). Use the value that was returned in the previous operation.

try {
    $result = $apiInstance->listPrincipalsOfProject($limit, $exclusive_start_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->listPrincipalsOfProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Maximum number of records to fetch in a list | [optional] [default to 100] |
| **exclusive_start_key** | **string**| The base64url encoded key of the first item that this operation will evaluate (it is not returned). Use the value that was returned in the previous operation. | [optional] |

### Return type

[**\AffinidiTdk\Clients\IamClient\Model\UserList**](../Model/UserList.md)

### Authorization

[ProjectTokenAuth](../../README.md#ProjectTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listProject()`

```php
listProject($limit, $exclusive_start_key): \AffinidiTdk\Clients\IamClient\Model\ProjectList
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: UserTokenAuth
$config = AffinidiTdk\Clients\IamClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\IamClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\IamClient\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 100; // int | Maximum number of records to fetch in a list
$exclusive_start_key = 'exclusive_start_key_example'; // string | The base64url encoded key of the first item that this operation will evaluate (it is not returned). Use the value that was returned in the previous operation.

try {
    $result = $apiInstance->listProject($limit, $exclusive_start_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->listProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Maximum number of records to fetch in a list | [optional] [default to 100] |
| **exclusive_start_key** | **string**| The base64url encoded key of the first item that this operation will evaluate (it is not returned). Use the value that was returned in the previous operation. | [optional] |

### Return type

[**\AffinidiTdk\Clients\IamClient\Model\ProjectList**](../Model/ProjectList.md)

### Authorization

[UserTokenAuth](../../README.md#UserTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateProject()`

```php
updateProject($project_id, $update_project_input): \AffinidiTdk\Clients\IamClient\Model\ProjectDto
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: UserTokenAuth
$config = AffinidiTdk\Clients\IamClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\IamClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\IamClient\Api\ProjectsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 'project_id_example'; // string | projectId
$update_project_input = new \AffinidiTdk\Clients\IamClient\Model\UpdateProjectInput(); // \AffinidiTdk\Clients\IamClient\Model\UpdateProjectInput | UpdateProject

try {
    $result = $apiInstance->updateProject($project_id, $update_project_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->updateProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **string**| projectId | |
| **update_project_input** | [**\AffinidiTdk\Clients\IamClient\Model\UpdateProjectInput**](../Model/UpdateProjectInput.md)| UpdateProject | |

### Return type

[**\AffinidiTdk\Clients\IamClient\Model\ProjectDto**](../Model/ProjectDto.md)

### Authorization

[UserTokenAuth](../../README.md#UserTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
