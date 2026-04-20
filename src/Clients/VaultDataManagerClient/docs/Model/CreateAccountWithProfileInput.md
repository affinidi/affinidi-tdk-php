# # CreateAccountWithProfileInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_index** | **float** | number that is used for profile DID derivation |
**account_did** | **string** | DID that is associated with the account number |
**did_proof** | **string** | JWT that proves ownership of profile DID by requester |
**alias** | **string** | Alias of account | [optional]
**account_metadata** | **object** | Metadata of account | [optional]
**account_description** | **string** | Description of account | [optional]
**profile_name** | **string** | Name of the profile node |
**profile_description** | **string** | Description of the profile node | [optional]
**profile_metadata** | **object** | Metadata of the profile | [optional]
**edek_info** | [**\AffinidiTdk\Clients\VaultDataManagerClient\Model\EdekInfo**](EdekInfo.md) |  |
**dek** | **string** | A base64 encoded data encryption key, encrypted using VFS public key |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
