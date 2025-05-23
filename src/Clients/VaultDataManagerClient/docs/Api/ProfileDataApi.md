# AffinidiTdk\Clients\VaultDataManagerClient\ProfileDataApi

All URIs are relative to https://api.vault.affinidi.com/vfs, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**queryProfileData()**](ProfileDataApi.md#queryProfileData) | **GET** /v1/nodes/{nodeId}/profile-data |  |
| [**updateProfileData()**](ProfileDataApi.md#updateProfileData) | **PATCH** /v1/nodes/{nodeId}/profile-data |  |


## `queryProfileData()`

```php
queryProfileData($node_id, $dek, $query): \AffinidiTdk\Clients\VaultDataManagerClient\Model\QueryProfileDataOK
```



Retrieves information from a profile.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\ProfileDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$node_id = 'node_id_example'; // string | the nodeId of the node being operated on
$dek = 'dek_example'; // string | A base64url encoded data encryption key, encrypted using VFS public
$query = 'query_example'; // string | data query, TBD maybe encode it with base64 to make it url friendly?

try {
    $result = $apiInstance->queryProfileData($node_id, $dek, $query);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileDataApi->queryProfileData: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **node_id** | **string**| the nodeId of the node being operated on | |
| **dek** | **string**| A base64url encoded data encryption key, encrypted using VFS public | |
| **query** | **string**| data query, TBD maybe encode it with base64 to make it url friendly? | [optional] |

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\QueryProfileDataOK**](../Model/QueryProfileDataOK.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateProfileData()`

```php
updateProfileData($node_id, $update_profile_data_input): \AffinidiTdk\Clients\VaultDataManagerClient\Model\UpdateProfileDataOK
```



Updates the profile with the given data

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\ProfileDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$node_id = 'node_id_example'; // string
$update_profile_data_input = new \AffinidiTdk\Clients\VaultDataManagerClient\Model\UpdateProfileDataInput(); // \AffinidiTdk\Clients\VaultDataManagerClient\Model\UpdateProfileDataInput | Updates the schema with the given data

try {
    $result = $apiInstance->updateProfileData($node_id, $update_profile_data_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileDataApi->updateProfileData: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **node_id** | **string**|  | |
| **update_profile_data_input** | [**\AffinidiTdk\Clients\VaultDataManagerClient\Model\UpdateProfileDataInput**](../Model/UpdateProfileDataInput.md)| Updates the schema with the given data | |

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\UpdateProfileDataOK**](../Model/UpdateProfileDataOK.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
