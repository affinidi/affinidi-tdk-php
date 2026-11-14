# # WalletKeyDto

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**key_id** | **string** | wallet-scoped key identifier (e.g., \&quot;key-1\&quot;) | [optional]
**algorithm** | **string** | cryptographic algorithm used by this key | [optional]
**key_type** | **string** | Deprecated alias of &#x60;algorithm&#x60;. Always equal to &#x60;algorithm&#x60; and included for backward compatibility. | [optional]
**key_ari** | **string** | ARI identifier for the key (e.g., \&quot;ari:key:...\&quot;) | [optional]
**relationships** | [**\AffinidiTdk\Clients\WalletsClient\Model\VerificationRelationship[]**](VerificationRelationship.md) | verification relationships this key supports | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
