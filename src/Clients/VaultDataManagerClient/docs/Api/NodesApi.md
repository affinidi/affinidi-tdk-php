# AffinidiTdk\Clients\VaultDataManagerClient\NodesApi

All URIs are relative to https://api.vault.affinidi.com/vfs, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createNode()**](NodesApi.md#createNode) | **POST** /v1/nodes |  |
| [**createProfile()**](NodesApi.md#createProfile) | **POST** /v1/nodes/create-profile |  |
| [**deleteNode()**](NodesApi.md#deleteNode) | **DELETE** /v1/nodes/{nodeId} |  |
| [**getDetailedNodeInfo()**](NodesApi.md#getDetailedNodeInfo) | **GET** /v1/nodes/{nodeId} |  |
| [**grantAccess()**](NodesApi.md#grantAccess) | **POST** /v1/nodes/grant-access |  |
| [**initNodes()**](NodesApi.md#initNodes) | **POST** /v1/nodes/init |  |
| [**listNodeChildren()**](NodesApi.md#listNodeChildren) | **GET** /v1/nodes/{nodeId}/children |  |
| [**listRootNodeChildren()**](NodesApi.md#listRootNodeChildren) | **GET** /v1/nodes |  |
| [**moveNode()**](NodesApi.md#moveNode) | **POST** /v1/nodes/{nodeId}/move |  |
| [**permanentlyDeleteNode()**](NodesApi.md#permanentlyDeleteNode) | **DELETE** /v1/nodes/{nodeId}/remove/{nodeIdToRemove} |  |
| [**restoreNodeFromTrashbin()**](NodesApi.md#restoreNodeFromTrashbin) | **POST** /v1/nodes/{nodeId}/restore/{nodeIdToRestore} |  |
| [**updateNode()**](NodesApi.md#updateNode) | **PATCH** /v1/nodes/{nodeId} |  |


## `createNode()`

```php
createNode($create_node_input, $owner_did): \AffinidiTdk\Clients\VaultDataManagerClient\Model\CreateNodeOK
```



creates node

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\NodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_node_input = new \AffinidiTdk\Clients\VaultDataManagerClient\Model\CreateNodeInput(); // \AffinidiTdk\Clients\VaultDataManagerClient\Model\CreateNodeInput | CreateNode
$owner_did = 'owner_did_example'; // string | DID of the Node owner

try {
    $result = $apiInstance->createNode($create_node_input, $owner_did);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NodesApi->createNode: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_node_input** | [**\AffinidiTdk\Clients\VaultDataManagerClient\Model\CreateNodeInput**](../Model/CreateNodeInput.md)| CreateNode | |
| **owner_did** | **string**| DID of the Node owner | [optional] |

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\CreateNodeOK**](../Model/CreateNodeOK.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createProfile()`

```php
createProfile($create_profile_input): \AffinidiTdk\Clients\VaultDataManagerClient\Model\CreateNodeOK
```



creates Profile with control plane

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\NodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_profile_input = new \AffinidiTdk\Clients\VaultDataManagerClient\Model\CreateProfileInput(); // \AffinidiTdk\Clients\VaultDataManagerClient\Model\CreateProfileInput | CreateNode

try {
    $result = $apiInstance->createProfile($create_profile_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NodesApi->createProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_profile_input** | [**\AffinidiTdk\Clients\VaultDataManagerClient\Model\CreateProfileInput**](../Model/CreateProfileInput.md)| CreateNode | |

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\CreateNodeOK**](../Model/CreateNodeOK.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteNode()`

```php
deleteNode($node_id): \AffinidiTdk\Clients\VaultDataManagerClient\Model\DeleteNodeDto
```



Mark a node and any attached files for deletion. If the node is a folder, perform the same action for all its children if the profile type is PROFILE, VC_ROOT, or VC. For other node types, move them to the TRASH_BIN node.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\NodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$node_id = 'node_id_example'; // string

try {
    $result = $apiInstance->deleteNode($node_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NodesApi->deleteNode: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **node_id** | **string**|  | |

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\DeleteNodeDto**](../Model/DeleteNodeDto.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDetailedNodeInfo()`

```php
getDetailedNodeInfo($node_id, $dek, $owner_did): \AffinidiTdk\Clients\VaultDataManagerClient\Model\GetDetailedNodeInfoOK
```



Gets detailed information about the node

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\NodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$node_id = 'node_id_example'; // string
$dek = 'dek_example'; // string | A base64url encoded data encryption key, encrypted using VFS public key. getUrl will not be returned if dek is not provided
$owner_did = 'owner_did_example'; // string | DID of the Node owner

try {
    $result = $apiInstance->getDetailedNodeInfo($node_id, $dek, $owner_did);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NodesApi->getDetailedNodeInfo: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **node_id** | **string**|  | |
| **dek** | **string**| A base64url encoded data encryption key, encrypted using VFS public key. getUrl will not be returned if dek is not provided | [optional] |
| **owner_did** | **string**| DID of the Node owner | [optional] |

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\GetDetailedNodeInfoOK**](../Model/GetDetailedNodeInfoOK.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `grantAccess()`

```php
grantAccess($grant_access_input)
```



grants access to another consumer to access nodes hierarchy

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\NodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$grant_access_input = new \AffinidiTdk\Clients\VaultDataManagerClient\Model\GrantAccessInput(); // \AffinidiTdk\Clients\VaultDataManagerClient\Model\GrantAccessInput | CreateNode

try {
    $apiInstance->grantAccess($grant_access_input);
} catch (Exception $e) {
    echo 'Exception when calling NodesApi->grantAccess: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **grant_access_input** | [**\AffinidiTdk\Clients\VaultDataManagerClient\Model\GrantAccessInput**](../Model/GrantAccessInput.md)| CreateNode | |

### Return type

void (empty response body)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `initNodes()`

```php
initNodes(): \AffinidiTdk\Clients\VaultDataManagerClient\Model\InitNodesOK
```



Initialize root node, and TRASH_BIN

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\NodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->initNodes();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NodesApi->initNodes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\InitNodesOK**](../Model/InitNodesOK.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listNodeChildren()`

```php
listNodeChildren($node_id, $limit, $exclusive_start_key, $owner_did): \AffinidiTdk\Clients\VaultDataManagerClient\Model\ListNodeChildrenOK
```



lists children of the node

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\NodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$node_id = 'node_id_example'; // string | Description for nodeId.
$limit = 10; // int | Maximum number of records to fetch in a list
$exclusive_start_key = 'exclusive_start_key_example'; // string | exclusiveStartKey for retrieving the next batch of data.
$owner_did = 'owner_did_example'; // string | DID of the Node owner

try {
    $result = $apiInstance->listNodeChildren($node_id, $limit, $exclusive_start_key, $owner_did);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NodesApi->listNodeChildren: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **node_id** | **string**| Description for nodeId. | |
| **limit** | **int**| Maximum number of records to fetch in a list | [optional] [default to 10] |
| **exclusive_start_key** | **string**| exclusiveStartKey for retrieving the next batch of data. | [optional] |
| **owner_did** | **string**| DID of the Node owner | [optional] |

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\ListNodeChildrenOK**](../Model/ListNodeChildrenOK.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listRootNodeChildren()`

```php
listRootNodeChildren($owner_did): \AffinidiTdk\Clients\VaultDataManagerClient\Model\ListRootNodeChildrenOK
```



lists children of the root node for the consumer

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\NodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$owner_did = 'owner_did_example'; // string | DID of the Node owner

try {
    $result = $apiInstance->listRootNodeChildren($owner_did);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NodesApi->listRootNodeChildren: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **owner_did** | **string**| DID of the Node owner | [optional] |

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\ListRootNodeChildrenOK**](../Model/ListRootNodeChildrenOK.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `moveNode()`

```php
moveNode($node_id, $move_node_input): \AffinidiTdk\Clients\VaultDataManagerClient\Model\MoveNodeDto
```



Moves a node from source to destination along with the hierarchy

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\NodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$node_id = 'node_id_example'; // string
$move_node_input = new \AffinidiTdk\Clients\VaultDataManagerClient\Model\MoveNodeInput(); // \AffinidiTdk\Clients\VaultDataManagerClient\Model\MoveNodeInput | MoveNode

try {
    $result = $apiInstance->moveNode($node_id, $move_node_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NodesApi->moveNode: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **node_id** | **string**|  | |
| **move_node_input** | [**\AffinidiTdk\Clients\VaultDataManagerClient\Model\MoveNodeInput**](../Model/MoveNodeInput.md)| MoveNode | |

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\MoveNodeDto**](../Model/MoveNodeDto.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `permanentlyDeleteNode()`

```php
permanentlyDeleteNode($node_id, $node_id_to_remove)
```



Permanently delete a node from TRASH_BIN, if the node is not in the TRASH_BIN it cannot delete.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\NodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$node_id = 'node_id_example'; // string | nodeId of the TRASH_BIN
$node_id_to_remove = 'node_id_to_remove_example'; // string | nodeId of the node to be deleted from TRASH_BIN

try {
    $apiInstance->permanentlyDeleteNode($node_id, $node_id_to_remove);
} catch (Exception $e) {
    echo 'Exception when calling NodesApi->permanentlyDeleteNode: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **node_id** | **string**| nodeId of the TRASH_BIN | |
| **node_id_to_remove** | **string**| nodeId of the node to be deleted from TRASH_BIN | |

### Return type

void (empty response body)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `restoreNodeFromTrashbin()`

```php
restoreNodeFromTrashbin($node_id, $node_id_to_restore, $restore_node_from_trashbin): \AffinidiTdk\Clients\VaultDataManagerClient\Model\MoveNodeDto
```



Restore node marked for deletion from TRASH_BIN

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\NodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$node_id = 'node_id_example'; // string | nodeId of the TRASH_BIN
$node_id_to_restore = 'node_id_to_restore_example'; // string | nodeId of the node to be restored from TRASH_BIN
$restore_node_from_trashbin = new \AffinidiTdk\Clients\VaultDataManagerClient\Model\RestoreNodeFromTrashbin(); // \AffinidiTdk\Clients\VaultDataManagerClient\Model\RestoreNodeFromTrashbin | RestoreNodeFromTrashbin

try {
    $result = $apiInstance->restoreNodeFromTrashbin($node_id, $node_id_to_restore, $restore_node_from_trashbin);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NodesApi->restoreNodeFromTrashbin: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **node_id** | **string**| nodeId of the TRASH_BIN | |
| **node_id_to_restore** | **string**| nodeId of the node to be restored from TRASH_BIN | |
| **restore_node_from_trashbin** | [**\AffinidiTdk\Clients\VaultDataManagerClient\Model\RestoreNodeFromTrashbin**](../Model/RestoreNodeFromTrashbin.md)| RestoreNodeFromTrashbin | |

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\MoveNodeDto**](../Model/MoveNodeDto.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateNode()`

```php
updateNode($node_id, $update_node_input): \AffinidiTdk\Clients\VaultDataManagerClient\Model\NodeDto
```



Updates a node

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ConsumerTokenAuth
$config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AffinidiTdk\Clients\VaultDataManagerClient\Configuration::getDefaultConfiguration()->setApiKeyPrefix('authorization', 'Bearer');


$apiInstance = new AffinidiTdk\Clients\VaultDataManagerClient\Api\NodesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$node_id = 'node_id_example'; // string | Description for nodeId.
$update_node_input = new \AffinidiTdk\Clients\VaultDataManagerClient\Model\UpdateNodeInput(); // \AffinidiTdk\Clients\VaultDataManagerClient\Model\UpdateNodeInput | UpdateNodeInput

try {
    $result = $apiInstance->updateNode($node_id, $update_node_input);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NodesApi->updateNode: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **node_id** | **string**| Description for nodeId. | |
| **update_node_input** | [**\AffinidiTdk\Clients\VaultDataManagerClient\Model\UpdateNodeInput**](../Model/UpdateNodeInput.md)| UpdateNodeInput | |

### Return type

[**\AffinidiTdk\Clients\VaultDataManagerClient\Model\NodeDto**](../Model/NodeDto.md)

### Authorization

[ConsumerTokenAuth](../../README.md#ConsumerTokenAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
