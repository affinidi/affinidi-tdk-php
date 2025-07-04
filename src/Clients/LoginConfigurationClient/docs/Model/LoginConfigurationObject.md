# # LoginConfigurationObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**ari** | **string** | Configuration ari |
**configuration_id** | **string** | Configuration id | [optional]
**project_id** | **string** | Project id |
**name** | **string** | User defined login configuration name |
**redirect_uris** | **string[]** | OAuth 2.0 Redirect URIs | [optional]
**post_logout_redirect_uris** | **string[]** | Post Logout Redirect URIs, Used to redirect the user&#39;s browser to a specified URL after the logout process is complete. Must match the domain, port, scheme of at least one of the registered redirect URIs | [optional]
**scope** | **string** | OAuth 2.0 Client Scope | [optional]
**client_id** | **string** | OAuth 2.0 Client ID | [optional]
**creation_date** | **string** | OAuth 2.0 Client Creation Date |
**vp_definition** | **string** | VP definition in JSON stringify format | [optional]
**presentation_definition** | **object** | Presentation Definition | [optional]
**id_token_mapping** | [**\AffinidiTdk\Clients\LoginConfigurationClient\Model\IdTokenMappingItem[]**](IdTokenMappingItem.md) | Fields name/path mapping between the vp_token and the id_token |
**client_metadata** | [**\AffinidiTdk\Clients\LoginConfigurationClient\Model\LoginConfigurationClientMetadataOutput**](LoginConfigurationClientMetadataOutput.md) |  |
**token_endpoint_auth_method** | [**\AffinidiTdk\Clients\LoginConfigurationClient\Model\TokenEndpointAuthMethod**](TokenEndpointAuthMethod.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
