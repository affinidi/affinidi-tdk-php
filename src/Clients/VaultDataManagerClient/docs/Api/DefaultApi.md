# AffinidiTdk\Clients\VaultDataManagerClient\DefaultApi

All URIs are relative to https://api.vault.affinidi.com/vfs, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createAccount()**](DefaultApi.md#createAccount) | **POST** /v1/accounts |  |


## `createAccount()`

```php
createAccount($create_account_input): \AffinidiTdk\Clients\VaultDataManagerClient\Model\CreateAccountOK
```



creates account

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\DefaultApi(
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
    echo 'Exception when calling DefaultApi->createAccount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_account_input** | [**\AffinidiTdk\Clients\VaultDataManagerClient\Model\CreateAccountInput**](../Model/CreateAccountInput.md)| CreateAccount | |

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\CreateAccountOK**](../Model/CreateAccountOK.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
