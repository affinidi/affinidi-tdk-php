# # CreateNodeInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Name of the item |
**type** | [**\AffinidiTdk\Clients\VaultDataManagerClient\Model\NodeType**](NodeType.md) |  |
**description** | **string** | description of profile if creating a new profile | [optional]
**parent_node_id** | **string** | parent node id, if not provided then root element is used | [optional]
**edek_info** | [**\AffinidiTdk\Clients\VaultDataManagerClient\Model\EdekInfo**](EdekInfo.md) |  | [optional]
**dek** | **string** | A base64 encoded data encryption key, encrypted using VFS public key, required for node types [FILE, PROFILE] | [optional]
**metadata** | **string** | metadata of the node in stringified json format | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
