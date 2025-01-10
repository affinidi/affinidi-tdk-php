# AffinidiTdk\Clients\VaultDataManagerClient\FilesApi

All URIs are relative to https://apse1.api.affinidi.io/vfs, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getScannedFileInfo()**](FilesApi.md#getScannedFileInfo) | **GET** /v1/scanned-files/{scannedFileJobId} |  |
| [**listScannedFiles()**](FilesApi.md#listScannedFiles) | **GET** /v1/scanned-files/ |  |
| [**startFileScan()**](FilesApi.md#startFileScan) | **POST** /v1/nodes/{nodeId}/file/scan |  |


## `getScannedFileInfo()`

```php
getScannedFileInfo($scanned_file_job_id, $exclusive_start_key): \AffinidiTdk\Clients\VaultDataManagerClient\Model\GetScannedFileInfoOK
```



Get the details of a scanned file using the textract jobId

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\FilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$scanned_file_job_id = 'scanned_file_job_id_example'; // string | Scanned file jobId.
$exclusive_start_key = 'exclusive_start_key_example'; // string | The base64url encoded key of the first item that this operation will evaluate (it is not returned). Use the value that was returned in the previous operation.

try {
    $result = $apiInstance->getScannedFileInfo($scanned_file_job_id, $exclusive_start_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FilesApi->getScannedFileInfo: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **scanned_file_job_id** | **string**| Scanned file jobId. | |
| **exclusive_start_key** | **string**| The base64url encoded key of the first item that this operation will evaluate (it is not returned). Use the value that was returned in the previous operation. | [optional] |

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\GetScannedFileInfoOK**](../Model/GetScannedFileInfoOK.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listScannedFiles()`

```php
listScannedFiles(): \AffinidiTdk\Clients\VaultDataManagerClient\Model\ListScannedFilesOK
```



List all the the scanned files with all the details, e.g. status and jobId

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\FilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listScannedFiles();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FilesApi->listScannedFiles: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\ListScannedFilesOK**](../Model/ListScannedFilesOK.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `startFileScan()`

```php
startFileScan($node_id, $start_file_scan_input): \AffinidiTdk\Clients\VaultDataManagerClient\Model\StartFileScanOK
```



Start a scan of the file under this node and provide a textract job

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\FilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$node_id = 'node_id_example'; // string | Description for nodeId.
$start_file_scan_input = new \AffinidiTdk\Clients\VaultDataManagerClient\Model\StartFileScanInput(); // \AffinidiTdk\Clients\VaultDataManagerClient\Model\StartFileScanInput | StartFileScan

try {
    $result = $apiInstance->startFileScan($node_id, $start_file_scan_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FilesApi->startFileScan: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **node_id** | **string**| Description for nodeId. | |
| **start_file_scan_input** | [**\AffinidiTdk\Clients\VaultDataManagerClient\Model\StartFileScanInput**](../Model/StartFileScanInput.md)| StartFileScan | |

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\StartFileScanOK**](../Model/StartFileScanOK.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
