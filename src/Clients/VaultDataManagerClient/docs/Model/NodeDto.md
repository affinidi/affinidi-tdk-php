# # NodeDto

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**node_id** | **string** | A unique identifier of current node |
**status** | [**\AffinidiTdk\Clients\VaultDataManagerClient\Model\NodeStatus**](NodeStatus.md) |  |
**file_count** | **float** | number of files in current node | [optional]
**profile_count** | **float** | number of profiles in current node | [optional]
**folder_count** | **float** | number of folders in current node | [optional]
**vc_count** | **float** | number of vcCount in current node | [optional]
**name** | **string** | display name of current node |
**consumer_id** | **string** | unique identifier for consumer |
**parent_node_id** | **string** | parent node path |
**profile_id** | **string** | A unique identifier of profile, under which current node is created |
**created_at** | **string** | creation date/time of the node |
**modified_at** | **string** | modification date/time of the node |
**created_by** | **string** | Identifier of the user who created the node |
**modified_by** | **string** | Identifier of the user who last updated the node |
**description** | **string** | Description of the node | [optional]
**type** | [**\AffinidiTdk\Clients\VaultDataManagerClient\Model\NodeType**](NodeType.md) |  |
**link** | **string** | id of the file, used for FILE node only | [optional]
**schema** | **string** | name of the schema, used for PROFILE node only | [optional]
**consumed_file_storage** | **float** | amount of bytes used by the stored data, used for ROOT_ELEMENT only for now | [optional]
**edek_info** | [**\AffinidiTdk\Clients\VaultDataManagerClient\Model\EdekInfo**](EdekInfo.md) |  | [optional]
**metadata** | **string** | A JSON string format containing metadata of the node | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
