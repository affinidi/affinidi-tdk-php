# AffinidiTdk\Clients\CredentialVerificationClient\VerifierApi

All URIs are relative to https://apse1.api.affinidi.io/ver, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**validateJwt()**](VerifierApi.md#validateJwt) | **POST** /v1/verifier/validate-jwt | Validates JWT token |


## `validateJwt()`

```php
validateJwt($validate_jwt_input): \AffinidiTdk\Clients\CredentialVerificationClient\Model\ValidateJwtOutput
```

Validates JWT token

Validates JWT object.  returns   isValid: boolean   payload: payload from JWT

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\CredentialVerificationClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\CredentialVerificationClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\CredentialVerificationClient\Api\VerifierApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$validate_jwt_input = new \AffinidiTdk\Clients\CredentialVerificationClient\Model\ValidateJwtInput(); // \AffinidiTdk\Clients\CredentialVerificationClient\Model\ValidateJwtInput | ValidateJwt

try {
    $result = $apiInstance->validateJwt($validate_jwt_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VerifierApi->validateJwt: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **validate_jwt_input** | [**\AffinidiTdk\Clients\CredentialVerificationClient\Model\ValidateJwtInput**](../Model/ValidateJwtInput.md)| ValidateJwt | |

### Return type

[**\AffinidiTdk\Clients\CredentialVerificationClient\Model\ValidateJwtOutput**](../Model/ValidateJwtOutput.md)

### Authorization

[ProjectTokenAuth](../../README.md#ProjectTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
