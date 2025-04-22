# AffinidiTdk\Clients\CredentialIssuanceClient\CredentialsApi

All URIs are relative to https://apse1.api.affinidi.io/cis, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**batchCredential()**](CredentialsApi.md#batchCredential) | **POST** /v1/{projectId}/batch_credential | Allows wallets to claim multiple credentials at once. |
| [**generateCredentials()**](CredentialsApi.md#generateCredentials) | **POST** /v1/{projectId}/credential |  |
| [**getClaimedCredentials()**](CredentialsApi.md#getClaimedCredentials) | **GET** /v1/{projectId}/configurations/{configurationId}/credentials | Get claimed credential in the specified range |
| [**getIssuanceIdClaimedCredential()**](CredentialsApi.md#getIssuanceIdClaimedCredential) | **GET** /v1/{projectId}/configurations/{configurationId}/issuances/{issuanceId}/credentials | Get claimed VC linked to the issuanceId |


## `batchCredential()`

```php
batchCredential($project_id, $batch_credential_input): \AffinidiTdk\Clients\CredentialIssuanceClient\Model\BatchCredentialResponse
```

Allows wallets to claim multiple credentials at once.

Allows wallets to claim multiple credentials at once. For authentication, it uses a token from the authorization server

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = AffinidiTdk\Clients\CredentialIssuanceClient\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new AffinidiTdk\Clients\CredentialIssuanceClient\Api\CredentialsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 'project_id_example'; // string | Affinidi project id
$batch_credential_input = new \AffinidiTdk\Clients\CredentialIssuanceClient\Model\BatchCredentialInput(); // \AffinidiTdk\Clients\CredentialIssuanceClient\Model\BatchCredentialInput | Request body for batch credential

try {
    $result = $apiInstance->batchCredential($project_id, $batch_credential_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CredentialsApi->batchCredential: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **string**| Affinidi project id | |
| **batch_credential_input** | [**\AffinidiTdk\Clients\CredentialIssuanceClient\Model\BatchCredentialInput**](../Model/BatchCredentialInput.md)| Request body for batch credential | |

### Return type

[**\AffinidiTdk\Clients\CredentialIssuanceClient\Model\BatchCredentialResponse**](../Model/BatchCredentialResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `generateCredentials()`

```php
generateCredentials($project_id, $create_credential_input): \AffinidiTdk\Clients\CredentialIssuanceClient\Model\CredentialResponse
```



Issue credential for end user upon presentation a valid access token. Since we don't immediate issue credential It's expected to return `transaction_id` and use this `transaction_id` to get the deferred credentials

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = AffinidiTdk\Clients\CredentialIssuanceClient\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new AffinidiTdk\Clients\CredentialIssuanceClient\Api\CredentialsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 'project_id_example'; // string | Affinidi project id
$create_credential_input = new \AffinidiTdk\Clients\CredentialIssuanceClient\Model\CreateCredentialInput(); // \AffinidiTdk\Clients\CredentialIssuanceClient\Model\CreateCredentialInput | Request body to issue credentials

try {
    $result = $apiInstance->generateCredentials($project_id, $create_credential_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CredentialsApi->generateCredentials: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **string**| Affinidi project id | |
| **create_credential_input** | [**\AffinidiTdk\Clients\CredentialIssuanceClient\Model\CreateCredentialInput**](../Model/CreateCredentialInput.md)| Request body to issue credentials | |

### Return type

[**\AffinidiTdk\Clients\CredentialIssuanceClient\Model\CredentialResponse**](../Model/CredentialResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getClaimedCredentials()`

```php
getClaimedCredentials($project_id, $configuration_id, $range_start_time, $range_end_time, $exclusive_start_key, $limit): \AffinidiTdk\Clients\CredentialIssuanceClient\Model\ClaimedCredentialListResponse
```

Get claimed credential in the specified range

Get claimed credential in the specified range

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\CredentialIssuanceClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\CredentialIssuanceClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\CredentialIssuanceClient\Api\CredentialsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 'project_id_example'; // string | project id
$configuration_id = 'configuration_id_example'; // string | configuration id
$range_start_time = 'range_start_time_example'; // string
$range_end_time = 'range_end_time_example'; // string
$exclusive_start_key = 'exclusive_start_key_example'; // string | exclusiveStartKey for retrieving the next batch of data.
$limit = 20; // int

try {
    $result = $apiInstance->getClaimedCredentials($project_id, $configuration_id, $range_start_time, $range_end_time, $exclusive_start_key, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CredentialsApi->getClaimedCredentials: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **string**| project id | |
| **configuration_id** | **string**| configuration id | |
| **range_start_time** | **string**|  | |
| **range_end_time** | **string**|  | [optional] |
| **exclusive_start_key** | **string**| exclusiveStartKey for retrieving the next batch of data. | [optional] |
| **limit** | **int**|  | [optional] [default to 20] |

### Return type

[**\AffinidiTdk\Clients\CredentialIssuanceClient\Model\ClaimedCredentialListResponse**](../Model/ClaimedCredentialListResponse.md)

### Authorization

[ProjectTokenAuth](../../README.md#ProjectTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getIssuanceIdClaimedCredential()`

```php
getIssuanceIdClaimedCredential($project_id, $configuration_id, $issuance_id): \AffinidiTdk\Clients\CredentialIssuanceClient\Model\ClaimedCredentialResponse
```

Get claimed VC linked to the issuanceId

Get claimed VC linked to the issuanceId

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\CredentialIssuanceClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\CredentialIssuanceClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\CredentialIssuanceClient\Api\CredentialsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 'project_id_example'; // string | project id
$configuration_id = 'configuration_id_example'; // string | configuration id
$issuance_id = 'issuance_id_example'; // string | issuance id

try {
    $result = $apiInstance->getIssuanceIdClaimedCredential($project_id, $configuration_id, $issuance_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CredentialsApi->getIssuanceIdClaimedCredential: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **string**| project id | |
| **configuration_id** | **string**| configuration id | |
| **issuance_id** | **string**| issuance id | |

### Return type

[**\AffinidiTdk\Clients\CredentialIssuanceClient\Model\ClaimedCredentialResponse**](../Model/ClaimedCredentialResponse.md)

### Authorization

[ProjectTokenAuth](../../README.md#ProjectTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
