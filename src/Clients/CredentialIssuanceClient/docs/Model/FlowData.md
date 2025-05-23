# # FlowData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**created_at** | **string** | [GEN] ISO 8601 string of the creation date/time the entity |
**modified_at** | **string** | [GEN] ISO 8601 string of the modification date/time the entity |
**id** | **string** |  |
**project_id** | **string** |  | [optional]
**flow_id** | **string** |  |
**credential_type_id** | **string** |  |
**json_ld_context_url** | **string** |  |
**json_schema_url** | **string** |  |
**configuration_id** | **string** | Id of configuration, used to issue VC. | [optional]
**issued_at** | **string** | when credential was issued to the holder (holder invoked generateCredentials endpoint) | [optional]
**wallet_id** | **string** | Id of wallet, used to issue VC. | [optional]
**project_id_configuration_id** | **string** | Id of configuration with which VC was issued. To use as an index, it is grouped together with projectId, as \&quot;{projectIdConfigurationId}#{configurationId}\&quot; | [optional]
**project_id_configuration_id_wallet_id** | **string** | Id of wallet which issued VC. To use as an index, it is grouped together with projectId, as \&quot;{projectIdConfigurationId}#{walletId}\&quot; | [optional]
**project_id_configuration_id_credential_type** | **string** | VC.type value. To use as an index, it is grouped together with projectId, as \&quot;{projectIdConfigurationId}#{credentialType}\&quot; | [optional]
**status_lists_details** | [**\AffinidiTdk\Clients\CredentialIssuanceClient\Model\FlowDataStatusListsDetailsInner[]**](FlowDataStatusListsDetailsInner.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
