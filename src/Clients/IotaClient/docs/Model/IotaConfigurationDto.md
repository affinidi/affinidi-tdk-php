# # IotaConfigurationDto

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**ari** | **string** | This is a unique resource identifier of the Affinidi Iota Framework configuration. |
**configuration_id** | **string** | ID of the Affinidi Iota Framework configuration. |
**name** | **string** | The name of the configuration to quickly identify the resource. |
**project_id** | **string** | The ID of the project. |
**wallet_ari** | **string** | The unique resource identifier of the Wallet used to sign the request token. |
**token_max_age** | **float** | This is the lifetime of the signed request token during the data-sharing flow. |
**iota_response_webhook_url** | **string** | The webhook URL is used for callback when the data is ready. | [optional]
**enable_verification** | **bool** | Cryptographically verifies the data shared by the user when enabled. |
**enable_consent_audit_log** | **bool** | Records the consent the user gave when they shared their data, including the type of data shared. |
**client_metadata** | [**\AffinidiTdk\Clients\IotaClient\Model\IotaConfigurationDtoClientMetadata**](IotaConfigurationDtoClientMetadata.md) |  |
**mode** | **string** | Determines whether to handle the data-sharing request using the WebSocket or Redirect flow. | [optional] [default to 'websocket']
**redirect_uris** | **string[]** | List of allowed URLs to redirect users, including the response from the request. This is required if the selected data-sharing mode is Redirect. | [optional]
**enable_idv_providers** | **bool** | Enables identity verification from user with a 3rd-party provider when a verified identity document is not found. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
