# # UpdateConfigurationByIdInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The name of the configuration to quickly identify the resource. | [optional]
**wallet_ari** | **string** | The unique resource identifier of the Wallet used to sign the request token. | [optional]
**iota_response_webhook_url** | **string** | The webhook URL is used for callback when the data is ready. | [optional]
**enable_verification** | **bool** | Cryptographically verifies the data shared by the user when enabled. | [optional]
**enable_consent_audit_log** | **bool** | Records the user&#39;s consent when they share their data, including the type of data shared when enabled. | [optional]
**token_max_age** | **float** | This is the lifetime of the signed request token during the data-sharing flow. | [optional]
**description** | **string** | An optional description of what the configuration is used for. | [optional]
**client_metadata** | [**\AffinidiTdk\Clients\IotaClient\Model\IotaConfigurationDtoClientMetadata**](IotaConfigurationDtoClientMetadata.md) |  | [optional]
**mode** | **string** | Determines whether to handle the data-sharing request using the WebSocket or Redirect flow. | [optional]
**redirect_uris** | **string[]** | List of allowed URLs to redirect users, including the response from the request. This is required if the selected data-sharing mode is Redirect. | [optional]
**enable_idv_providers** | **bool** | Enables identity verification from user with a 3rd-party provider when a verified identity document is not found. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
