# AffinidiTdk\Clients\VaultDataManagerClient\AccountsApi

All URIs are relative to https://api.vault.affinidi.com/vfs, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createAccount()**](AccountsApi.md#createAccount) | **POST** /v1/accounts |  |
| [**deleteAccount()**](AccountsApi.md#deleteAccount) | **DELETE** /v1/accounts/{accountIndex} |  |
| [**listAccounts()**](AccountsApi.md#listAccounts) | **GET** /v1/accounts |  |


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

## `deleteAccount()`

```php
deleteAccount($account_index): \AffinidiTdk\Clients\VaultDataManagerClient\Model\DeleteAccountDto
```



Delete account.

### Example

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
$account_index = 56; // int

try {
    $result = $apiInstance->deleteAccount($account_index);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountsApi->deleteAccount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_index** | **int**|  | |

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\DeleteAccountDto**](../Model/DeleteAccountDto.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listAccounts()`

```php
listAccounts($limit, $exclusive_start_key): \AffinidiTdk\Clients\VaultDataManagerClient\Model\ListAccountsDto
```



List accounts of associated profiles.

### Example

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
$limit = 50; // int | Maximum number of accounts to fetch in a list
$exclusive_start_key = 'exclusive_start_key_example'; // string | The base64url encoded key of the first item that this operation will evaluate (it is not returned). Use the value that was returned in the previous operation.

try {
    $result = $apiInstance->listAccounts($limit, $exclusive_start_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountsApi->listAccounts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Maximum number of accounts to fetch in a list | [optional] [default to 50] |
| **exclusive_start_key** | **string**| The base64url encoded key of the first item that this operation will evaluate (it is not returned). Use the value that was returned in the previous operation. | [optional] |

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\ListAccountsDto**](../Model/ListAccountsDto.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
