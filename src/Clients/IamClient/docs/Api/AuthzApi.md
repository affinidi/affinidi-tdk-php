# AffinidiTdk\Clients\IamClient\AuthzApi

All URIs are relative to https://apse1.api.affinidi.io/iam, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**grantAccessVfs()**](AuthzApi.md#grantAccessVfs) | **POST** /v1/authz/vfs/access | Grant access to the virtual file system |


## `grantAccessVfs()`

```php
grantAccessVfs($grant_access_input): \AffinidiTdk\Clients\IamClient\Model\GrantAccessOutput
```

Grant access to the virtual file system

Grants access rights to a subject for the virtual file system

### Example

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
$grant_access_input = new \AffinidiTdk\Clients\IamClient\Model\GrantAccessInput(); // \AffinidiTdk\Clients\IamClient\Model\GrantAccessInput | Grant access to virtual file system

try {
    $result = $apiInstance->grantAccessVfs($grant_access_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthzApi->grantAccessVfs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **grant_access_input** | [**\AffinidiTdk\Clients\IamClient\Model\GrantAccessInput**](../Model/GrantAccessInput.md)| Grant access to virtual file system | |

### Return type

[**\AffinidiTdk\Clients\IamClient\Model\GrantAccessOutput**](../Model/GrantAccessOutput.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
