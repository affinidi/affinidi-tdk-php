# AffinidiTdk\Clients\CredentialVerificationClient\DefaultApi

All URIs are relative to https://apse1.api.affinidi.io/ver, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**verifyCredentials()**](DefaultApi.md#verifyCredentials) | **POST** /v1/verifier/verify-vcs | Verifying VC |
| [**verifyCredentialsV2()**](DefaultApi.md#verifyCredentialsV2) | **POST** /v2/verifier/credentials | Verifying VC |
| [**verifyPresentation()**](DefaultApi.md#verifyPresentation) | **POST** /v1/verifier/verify-vp | Verifying VP |
| [**verifyPresentationV2()**](DefaultApi.md#verifyPresentationV2) | **POST** /v2/verifier/presentation | Verifying VP |


## `verifyCredentials()`

```php
verifyCredentials($verify_credential_input): \AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyCredentialOutput
```

Verifying VC

Verifying Verifiable Credentials (signatures)  `isValid` - true if all credentials verified `errors` contains list of error messages for invalid credentials.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\CredentialVerificationClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\CredentialVerificationClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\CredentialVerificationClient\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$verify_credential_input = new \AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyCredentialInput(); // \AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyCredentialInput | VerifyCredentials

try {
    $result = $apiInstance->verifyCredentials($verify_credential_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->verifyCredentials: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **verify_credential_input** | [**\AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyCredentialInput**](../Model/VerifyCredentialInput.md)| VerifyCredentials | |

### Return type

[**\AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyCredentialOutput**](../Model/VerifyCredentialOutput.md)

### Authorization

[ProjectTokenAuth](../../README.md#ProjectTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `verifyCredentialsV2()`

```php
verifyCredentialsV2($verify_credential_v2_input): \AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyCredentialOutput
```

Verifying VC

Verifying Verifiable Credentials (signatures)  `isValid` - true if all credentials verified `errors` contains list of error messages for invalid credentials.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\CredentialVerificationClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\CredentialVerificationClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\CredentialVerificationClient\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$verify_credential_v2_input = new \AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyCredentialV2Input(); // \AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyCredentialV2Input | Request body for verifying VCs with separate JWT and LDP arrays

try {
    $result = $apiInstance->verifyCredentialsV2($verify_credential_v2_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->verifyCredentialsV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **verify_credential_v2_input** | [**\AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyCredentialV2Input**](../Model/VerifyCredentialV2Input.md)| Request body for verifying VCs with separate JWT and LDP arrays | |

### Return type

[**\AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyCredentialOutput**](../Model/VerifyCredentialOutput.md)

### Authorization

[ProjectTokenAuth](../../README.md#ProjectTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `verifyPresentation()`

```php
verifyPresentation($verify_presentation_input): \AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyPresentationOutput
```

Verifying VP

Verifying Verifiable Presentation (signatures)  `isValid` - true if presentation verified `error` verificaction error.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\CredentialVerificationClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\CredentialVerificationClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\CredentialVerificationClient\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$verify_presentation_input = new \AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyPresentationInput(); // \AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyPresentationInput | VerifyPresentation

try {
    $result = $apiInstance->verifyPresentation($verify_presentation_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->verifyPresentation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **verify_presentation_input** | [**\AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyPresentationInput**](../Model/VerifyPresentationInput.md)| VerifyPresentation | |

### Return type

[**\AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyPresentationOutput**](../Model/VerifyPresentationOutput.md)

### Authorization

[ProjectTokenAuth](../../README.md#ProjectTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `verifyPresentationV2()`

```php
verifyPresentationV2($verify_presentation_v2_input): \AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyPresentationOutput
```

Verifying VP

Verifying Verifiable Presentation (signatures)  Uses Presentation Exchange Query (pexQuery) structure for presentation definition and submission. Supports optional domain and challenge verification as per W3C VP standard.  `isValid` - true if presentation verified `error` verificaction error.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ProjectTokenAuth
$config = AffinidiTdk\Clients\CredentialVerificationClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\CredentialVerificationClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\CredentialVerificationClient\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$verify_presentation_v2_input = new \AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyPresentationV2Input(); // \AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyPresentationV2Input | VerifyPresentationV2

try {
    $result = $apiInstance->verifyPresentationV2($verify_presentation_v2_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->verifyPresentationV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **verify_presentation_v2_input** | [**\AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyPresentationV2Input**](../Model/VerifyPresentationV2Input.md)| VerifyPresentationV2 | |

### Return type

[**\AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyPresentationOutput**](../Model/VerifyPresentationOutput.md)

### Authorization

[ProjectTokenAuth](../../README.md#ProjectTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
