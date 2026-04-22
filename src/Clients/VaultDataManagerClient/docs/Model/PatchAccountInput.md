# # PatchAccountInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**did_proof** | **string** | JWT that proves ownership of profile DID by requester |
**encrypted_dekek** | **string** | A base64 encoded data encryption key, encrypted using VFS public key, required for PATCH operation on account |
**owner_profile_id** | **string** | A unique identifier of profile, required for PATCH operation on account |
**owner_profile_did** | **string** | DID that is associated with the profile, required for PATCH operation on account |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
