# # CreateLoginConfigurationOutput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**ari** | **string** | Configuration ari |
**project_id** | **string** | Project id |
**configuration_id** | **string** | Configuration id | [optional]
**name** | **string** | User defined login configuration name |
**auth** | [**\AffinidiTdk\Clients\LoginConfigurationClient\Model\CreateLoginConfigurationOutputAuth**](CreateLoginConfigurationOutputAuth.md) |  |
**redirect_uris** | **string[]** | OAuth 2.0 Redirect URIs |
**client_metadata** | [**\AffinidiTdk\Clients\LoginConfigurationClient\Model\LoginConfigurationClientMetadataOutput**](LoginConfigurationClientMetadataOutput.md) |  |
**creation_date** | **string** | OAuth 2.0 Client Creation Date |
**post_logout_redirect_uris** | **string[]** | Post Logout Redirect URIs, Used to redirect the user&#39;s browser to a specified URL after the logout process is complete. Must match the domain, port, scheme of at least one of the registered redirect URIs | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
