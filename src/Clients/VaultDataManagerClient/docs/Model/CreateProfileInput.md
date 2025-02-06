# # CreateProfileInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Name of the item |
**description** | **string** | description of profile | [optional]
**edek_info** | [**\AffinidiTdk\Clients\VaultDataManagerClient\Model\EdekInfo**](EdekInfo.md) |  |
**dek** | **string** | A base64 encoded data encryption key, encrypted using VFS public key, required for node types [FILE, PROFILE] |
**metadata** | **string** | metadata of the node in stringified json format | [optional]
**subject_did** | **string** | DID to grant access to Profile | [optional]
**rights** | **string[]** | types of access to grant | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
