# # UpdateLoginConfigurationInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | User defined login configuration name | [optional]
**redirect_uris** | **string[]** | OAuth 2.0 Redirect URIs | [optional]
**post_logout_redirect_uris** | **string[]** | Post Logout Redirect URIs, Used to redirect the user&#39;s browser to a specified URL after the logout process is complete. Must match the domain, port, scheme of at least one of the registered redirect URIs | [optional]
**client_secret** | **string** | OAuth2 client secret | [optional]
**vp_definition** | **string** | VP definition in JSON stringify format | [optional]
**presentation_definition** | **object** | Presentation Definition | [optional]
**id_token_mapping** | [**\AffinidiTdk\Clients\LoginConfigurationClient\Model\IdTokenMappingItem[]**](IdTokenMappingItem.md) | Fields name/path mapping between the vp_token and the id_token | [optional]
**client_metadata** | [**\AffinidiTdk\Clients\LoginConfigurationClient\Model\LoginConfigurationClientMetadataInput**](LoginConfigurationClientMetadataInput.md) |  | [optional]
**token_endpoint_auth_method** | [**\AffinidiTdk\Clients\LoginConfigurationClient\Model\TokenEndpointAuthMethod**](TokenEndpointAuthMethod.md) |  | [optional]
**fail_on_mapping_conflict** | **bool** | Interrupts login process if duplications of data fields names will be found | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
