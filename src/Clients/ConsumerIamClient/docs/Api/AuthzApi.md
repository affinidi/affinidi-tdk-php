# AffinidiTdk\Clients\ConsumerIamClient\AuthzApi

All URIs are relative to https://apse1.api.affinidi.io/cid, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteAccessVfs()**](AuthzApi.md#deleteAccessVfs) | **DELETE** /v1/authz/vfs/access/{granteeDid} | delete access of granteeDid |
| [**getAccessVfs()**](AuthzApi.md#getAccessVfs) | **GET** /v1/authz/vfs/access/{granteeDid} | Get permissions to the virtual file system for a subject |
| [**grantAccessVfs()**](AuthzApi.md#grantAccessVfs) | **POST** /v1/authz/vfs/access/{granteeDid} | Grant access to the virtual file system |
| [**updateAccessVfs()**](AuthzApi.md#updateAccessVfs) | **PUT** /v1/authz/vfs/access/{granteeDid} | Update access of granteeDid |


## `deleteAccessVfs()`

```php
deleteAccessVfs($grantee_did)
```

delete access of granteeDid

deleteAccessVfs

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\ConsumerIamClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\ConsumerIamClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\ConsumerIamClient\Api\AuthzApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$grantee_did = 'grantee_did_example'; // string

try {
    $apiInstance->deleteAccessVfs($grantee_did);
} catch (Exception $e) {
    echo 'Exception when calling AuthzApi->deleteAccessVfs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **grantee_did** | **string**|  | |

### Return type

void (empty response body)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAccessVfs()`

```php
getAccessVfs($grantee_did): \AffinidiTdk\Clients\ConsumerIamClient\Model\GetAccessOutput
```

Get permissions to the virtual file system for a subject

Retrieves access rights granted to a subject for the virtual file system

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\ConsumerIamClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\ConsumerIamClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\ConsumerIamClient\Api\AuthzApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$grantee_did = 'grantee_did_example'; // string

try {
    $result = $apiInstance->getAccessVfs($grantee_did);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthzApi->getAccessVfs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **grantee_did** | **string**|  | |

### Return type

[**\AffinidiTdk\Clients\ConsumerIamClient\Model\GetAccessOutput**](../Model/GetAccessOutput.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `grantAccessVfs()`

```php
grantAccessVfs($grantee_did, $grant_access_input): \AffinidiTdk\Clients\ConsumerIamClient\Model\GrantAccessOutput
```

Grant access to the virtual file system

Grants access rights to a subject for the virtual file system

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\ConsumerIamClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\ConsumerIamClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\ConsumerIamClient\Api\AuthzApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$grantee_did = 'grantee_did_example'; // string
$grant_access_input = new \AffinidiTdk\Clients\ConsumerIamClient\Model\GrantAccessInput(); // \AffinidiTdk\Clients\ConsumerIamClient\Model\GrantAccessInput | Grant access to virtual file system

try {
    $result = $apiInstance->grantAccessVfs($grantee_did, $grant_access_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthzApi->grantAccessVfs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **grantee_did** | **string**|  | |
| **grant_access_input** | [**\AffinidiTdk\Clients\ConsumerIamClient\Model\GrantAccessInput**](../Model/GrantAccessInput.md)| Grant access to virtual file system | |

### Return type

[**\AffinidiTdk\Clients\ConsumerIamClient\Model\GrantAccessOutput**](../Model/GrantAccessOutput.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAccessVfs()`

```php
updateAccessVfs($grantee_did, $update_access_input): \AffinidiTdk\Clients\ConsumerIamClient\Model\UpdateAccessOutput
```

Update access of granteeDid

updateAccessVfs

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\ConsumerIamClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\ConsumerIamClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\ConsumerIamClient\Api\AuthzApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$grantee_did = 'grantee_did_example'; // string
$update_access_input = new \AffinidiTdk\Clients\ConsumerIamClient\Model\UpdateAccessInput(); // \AffinidiTdk\Clients\ConsumerIamClient\Model\UpdateAccessInput | update access to virtual file system

try {
    $result = $apiInstance->updateAccessVfs($grantee_did, $update_access_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthzApi->updateAccessVfs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **grantee_did** | **string**|  | |
| **update_access_input** | [**\AffinidiTdk\Clients\ConsumerIamClient\Model\UpdateAccessInput**](../Model/UpdateAccessInput.md)| update access to virtual file system | |

### Return type

[**\AffinidiTdk\Clients\ConsumerIamClient\Model\UpdateAccessOutput**](../Model/UpdateAccessOutput.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
