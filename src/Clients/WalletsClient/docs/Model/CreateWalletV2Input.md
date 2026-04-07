# # CreateWalletV2Input

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The name of the wallet | [optional]
**description** | **string** | The description of the wallet | [optional]
**did_method** | **string** | Define how DID of your wallet is created and resolved | [optional] [default to 'key']
**did_web_url** | **string** | URL of the DID. Required if the did method is web | [optional]
**algorithm** | **string** | algorithm to generate key for the wallet | [optional] [default to 'secp256k1']
**services** | [**\AffinidiTdk\Clients\WalletsClient\Model\ServiceEndpointInput[]**](ServiceEndpointInput.md) | Service endpoints to include in DID document | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
