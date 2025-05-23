# # UpdateIssuanceConfigInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** |  | [optional]
**description** | **string** |  | [optional]
**issuer_wallet_id** | **string** | Issuer Wallet id | [optional]
**credential_offer_duration** | **float** | credential offer duration in second | [optional]
**format** | **string** | String identifying the format of this Credential, i.e., ldp_vc. Depending on the format value, the object contains further elements defining the type | [optional]
**issuer_uri** | **string** | Issuer URI | [optional]
**credential_supported** | [**\AffinidiTdk\Clients\CredentialIssuanceClient\Model\CredentialSupportedObject[]**](CredentialSupportedObject.md) |  | [optional]
**issuer_metadata** | **array<string,mixed>** | Issuer public information wallet may want to show to user during consent confirmation | [optional]
**return_uris** | **string[]** | List of allowed URIs to be returned to after issuance | [optional]
**webhook** | [**\AffinidiTdk\Clients\CredentialIssuanceClient\Model\CisConfigurationWebhookSetting**](CisConfigurationWebhookSetting.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
