# # StartIssuanceInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**claim_mode** | **string** | In TX_CODE claim mode, additional transaction code will be generated and the Authorization Server expects presentation of the transaction Code by the end-user. If FIXED_HOLDER claim mode is defined, holderDid must be present and service will not generate additional transaction code (NORMAL claimMode is deprecated). | [optional]
**holder_did** | **string** | Holder DID | [optional]
**issuance_id** | **string** | Website&#39;s internal identifier. Website may use to get info about the status of issuance flow. If it is not provided, CIS will generate one. | [optional]
**data** | [**\AffinidiTdk\Clients\CredentialIssuanceClient\Model\StartIssuanceInputDataInner[]**](StartIssuanceInputDataInner.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
