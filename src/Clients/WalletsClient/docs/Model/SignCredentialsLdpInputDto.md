# # SignCredentialsLdpInputDto

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**unsigned_credential** | **object** | Unsigned Credential in Dm2 format |
**revocable** | **bool** |  | [optional]
**signature_scheme** | **string** |  | [optional]
**signature_suite** | **string** | W3C signature suite for canonicalization. Defaults to rdfc variants for each algorithm (ecdsa-rdfc-2019 for P256, eddsa-rdfc-2022 for Ed25519, EcdsaSecp256k1Signature2019 for secp256k1). | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
