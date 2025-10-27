# AffinidiTdk\Clients\IotaClient\DcqlQueryApi

All URIs are relative to https://apse1.api.affinidi.io/ais, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createDcqlQuery()**](DcqlQueryApi.md#createDcqlQuery) | **POST** /v1/configurations/{configurationId}/dcql-queries |  |
| [**deleteDcqlQueryById()**](DcqlQueryApi.md#deleteDcqlQueryById) | **DELETE** /v1/configurations/{configurationId}/dcql-queries/{queryId} |  |
| [**getDcqlQueryById()**](DcqlQueryApi.md#getDcqlQueryById) | **GET** /v1/configurations/{configurationId}/dcql-queries/{queryId} |  |
| [**listDcqlQueries()**](DcqlQueryApi.md#listDcqlQueries) | **GET** /v1/configurations/{configurationId}/dcql-queries |  |
| [**updateDcqlQueryById()**](DcqlQueryApi.md#updateDcqlQueryById) | **PATCH** /v1/configurations/{configurationId}/dcql-queries/{queryId} |  |


## `createDcqlQuery()`

```php
createDcqlQuery($configuration_id, $create_dcql_query_input): \AffinidiTdk\Clients\IotaClient\Model\DcqlQueryDto
```



Creates a new DCQL query in the configuration to query data.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\IotaClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\IotaClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\IotaClient\Api\DcqlQueryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$configuration_id = 'configuration_id_example'; // string | ID of the Affinidi Iota Framework configuration.
$create_dcql_query_input = new \AffinidiTdk\Clients\IotaClient\Model\CreateDcqlQueryInput(); // \AffinidiTdk\Clients\IotaClient\Model\CreateDcqlQueryInput | CreateDcqlQuery

try {
    $result = $apiInstance->createDcqlQuery($configuration_id, $create_dcql_query_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DcqlQueryApi->createDcqlQuery: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **configuration_id** | **string**| ID of the Affinidi Iota Framework configuration. | |
| **create_dcql_query_input** | [**\AffinidiTdk\Clients\IotaClient\Model\CreateDcqlQueryInput**](../Model/CreateDcqlQueryInput.md)| CreateDcqlQuery | |

### Return type

[**\AffinidiTdk\Clients\IotaClient\Model\DcqlQueryDto**](../Model/DcqlQueryDto.md)

### Authorization

[ProjectTokenAuth](../../README.md#ProjectTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteDcqlQueryById()`

```php
deleteDcqlQueryById($configuration_id, $query_id)
```



Deletes a DCQL query in the configuration by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\IotaClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\IotaClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\IotaClient\Api\DcqlQueryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$configuration_id = 'configuration_id_example'; // string | ID of the Affinidi Iota Framework configuration.
$query_id = 'query_id_example'; // string | The ID of the query.

try {
    $apiInstance->deleteDcqlQueryById($configuration_id, $query_id);
} catch (Exception $e) {
    echo 'Exception when calling DcqlQueryApi->deleteDcqlQueryById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **configuration_id** | **string**| ID of the Affinidi Iota Framework configuration. | |
| **query_id** | **string**| The ID of the query. | |

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

## `getDcqlQueryById()`

```php
getDcqlQueryById($configuration_id, $query_id): \AffinidiTdk\Clients\IotaClient\Model\DcqlQueryDto
```



Retrieves a DCQL query in the configuration by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\IotaClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\IotaClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\IotaClient\Api\DcqlQueryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$configuration_id = 'configuration_id_example'; // string | ID of the Affinidi Iota Framework configuration.
$query_id = 'query_id_example'; // string | The ID of the query.

try {
    $result = $apiInstance->getDcqlQueryById($configuration_id, $query_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DcqlQueryApi->getDcqlQueryById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **configuration_id** | **string**| ID of the Affinidi Iota Framework configuration. | |
| **query_id** | **string**| The ID of the query. | |

### Return type

[**\AffinidiTdk\Clients\IotaClient\Model\DcqlQueryDto**](../Model/DcqlQueryDto.md)

### Authorization

[ProjectTokenAuth](../../README.md#ProjectTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listDcqlQueries()`

```php
listDcqlQueries($configuration_id, $limit, $exclusive_start_key): \AffinidiTdk\Clients\IotaClient\Model\ListDcqlQueriesOK
```



Lists all DCQL queries in the configuration.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\IotaClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\IotaClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\IotaClient\Api\DcqlQueryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$configuration_id = 'configuration_id_example'; // string | ID of the Affinidi Iota Framework configuration.
$limit = 56; // int | Maximum number of records to fetch in a list
$exclusive_start_key = 'exclusive_start_key_example'; // string | The base64url encoded key of the first item that this operation will evaluate (it is not returned). Use the value that was returned in the previous operation.

try {
    $result = $apiInstance->listDcqlQueries($configuration_id, $limit, $exclusive_start_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DcqlQueryApi->listDcqlQueries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **configuration_id** | **string**| ID of the Affinidi Iota Framework configuration. | |
| **limit** | **int**| Maximum number of records to fetch in a list | [optional] |
| **exclusive_start_key** | **string**| The base64url encoded key of the first item that this operation will evaluate (it is not returned). Use the value that was returned in the previous operation. | [optional] |

### Return type

[**\AffinidiTdk\Clients\IotaClient\Model\ListDcqlQueriesOK**](../Model/ListDcqlQueriesOK.md)

### Authorization

[ProjectTokenAuth](../../README.md#ProjectTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateDcqlQueryById()`

```php
updateDcqlQueryById($configuration_id, $query_id, $update_dcql_query_input): \AffinidiTdk\Clients\IotaClient\Model\DcqlQueryDto
```



Updates the DCQL query in the configuration by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\IotaClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\IotaClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\IotaClient\Api\DcqlQueryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$configuration_id = 'configuration_id_example'; // string | ID of the Affinidi Iota Framework configuration.
$query_id = 'query_id_example'; // string | The ID of the query.
$update_dcql_query_input = new \AffinidiTdk\Clients\IotaClient\Model\UpdateDcqlQueryInput(); // \AffinidiTdk\Clients\IotaClient\Model\UpdateDcqlQueryInput | UpdateDcqlQueryById

try {
    $result = $apiInstance->updateDcqlQueryById($configuration_id, $query_id, $update_dcql_query_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DcqlQueryApi->updateDcqlQueryById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **configuration_id** | **string**| ID of the Affinidi Iota Framework configuration. | |
| **query_id** | **string**| The ID of the query. | |
| **update_dcql_query_input** | [**\AffinidiTdk\Clients\IotaClient\Model\UpdateDcqlQueryInput**](../Model/UpdateDcqlQueryInput.md)| UpdateDcqlQueryById | |

### Return type

[**\AffinidiTdk\Clients\IotaClient\Model\DcqlQueryDto**](../Model/DcqlQueryDto.md)

### Authorization

[ProjectTokenAuth](../../README.md#ProjectTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
