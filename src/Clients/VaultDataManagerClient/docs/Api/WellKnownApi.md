# AffinidiTdk\Clients\VaultDataManagerClient\WellKnownApi

All URIs are relative to https://api.vault.affinidi.com/vfs, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getWellKnownJwks()**](WellKnownApi.md#getWellKnownJwks) | **GET** /.well-known/jwks.json |  |


## `getWellKnownJwks()`

```php
getWellKnownJwks(): \AffinidiTdk\Clients\VaultDataManagerClient\Model\JsonWebKeySetDto
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\WellKnownApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->getWellKnownJwks();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WellKnownApi->getWellKnownJwks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\JsonWebKeySetDto**](../Model/JsonWebKeySetDto.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
