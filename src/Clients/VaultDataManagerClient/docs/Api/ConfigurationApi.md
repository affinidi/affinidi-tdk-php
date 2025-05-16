# AffinidiTdk\Clients\VaultDataManagerClient\ConfigurationApi

All URIs are relative to https://api.vault.affinidi.com/vfs, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getConfiguration()**](ConfigurationApi.md#getConfiguration) | **GET** /v1/config |  |


## `getConfiguration()`

```php
getConfiguration(): \AffinidiTdk\Clients\VaultDataManagerClient\Model\GetConfigOK
```



Retrieves the user profile name and the maximum number of profiles, with default values set to 'default' and 1, respectively.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: AwsSigV4
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\ConfigurationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getConfiguration();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConfigurationApi->getConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\GetConfigOK**](../Model/GetConfigOK.md)

### Authorization

[AwsSigV4](../../README.md#AwsSigV4)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
