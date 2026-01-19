# # VerifyPresentationV2Input

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**verifiable_presentation** | **object** |  | [optional]
**pex_query** | [**\AffinidiTdk\Clients\CredentialVerificationClient\Model\VerifyPresentationV2InputPexQuery**](VerifyPresentationV2InputPexQuery.md) |  | [optional]
**dcql_query** | **array<string,mixed>** | DCQL (Digital Credentials Query Language) Query used to verify that the credentials in the Verifiable Presentation match the specified query requirements. Currently supports only ldp_vc format credentials. Developers should implement additional business rule validation on top of the verification results returned by this service. | [optional]
**challenge** | **string** | Optional challenge string for domain/challenge verification | [optional]
**domain** | **string[]** | Optional domain for verification. Array of domain strings as per W3C VP standard | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
