# # WalletV2Dto

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | id of the wallet in uuidV4 format | [optional]
**did** | **string** | did of the wallet | [optional]
**name** | **string** | The name of the wallet | [optional]
**description** | **string** | The description of the wallet | [optional]
**did_document** | **object** | did document of the wallet | [optional]
**ari** | **string** | ARI of the wallet | [optional]
**algorithm** | **string** | algorithm used to generate key for the wallet | [optional]
**keys** | [**\AffinidiTdk\Clients\WalletsClient\Model\WalletDtoKeysInner[]**](WalletDtoKeysInner.md) |  | [optional]
**services** | [**\AffinidiTdk\Clients\WalletsClient\Model\ServiceEndpointDto[]**](ServiceEndpointDto.md) | list of service endpoints associated with this wallet | [optional]
**created_at** | **string** |  | [optional]
**modified_at** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
