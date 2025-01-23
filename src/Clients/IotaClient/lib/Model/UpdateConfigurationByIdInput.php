<?php
/**
 * UpdateConfigurationByIdInput
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  AffinidiTdk\Clients\IotaClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * IotaService
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: 1.0.0
 * Contact: info@affinidi.com
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.9.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace AffinidiTdk\Clients\IotaClient\Model;

use \ArrayAccess;
use \AffinidiTdk\Clients\IotaClient\ObjectSerializer;

/**
 * UpdateConfigurationByIdInput Class Doc Comment
 *
 * @category Class
 * @package  AffinidiTdk\Clients\IotaClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class UpdateConfigurationByIdInput implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'UpdateConfigurationByIdInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'name' => 'string',
        'wallet_ari' => 'string',
        'iota_response_webhook_url' => 'string',
        'enable_verification' => 'bool',
        'enable_consent_audit_log' => 'bool',
        'token_max_age' => 'float',
        'description' => 'string',
        'client_metadata' => '\AffinidiTdk\Clients\IotaClient\Model\UpdateConfigurationByIdInputClientMetadata',
        'mode' => 'string',
        'redirect_uris' => 'string[]',
        'enable_idv_providers' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'name' => null,
        'wallet_ari' => null,
        'iota_response_webhook_url' => null,
        'enable_verification' => null,
        'enable_consent_audit_log' => null,
        'token_max_age' => null,
        'description' => null,
        'client_metadata' => null,
        'mode' => null,
        'redirect_uris' => null,
        'enable_idv_providers' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'name' => false,
        'wallet_ari' => false,
        'iota_response_webhook_url' => false,
        'enable_verification' => false,
        'enable_consent_audit_log' => false,
        'token_max_age' => false,
        'description' => false,
        'client_metadata' => false,
        'mode' => false,
        'redirect_uris' => false,
        'enable_idv_providers' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'name' => 'name',
        'wallet_ari' => 'walletAri',
        'iota_response_webhook_url' => 'iotaResponseWebhookURL',
        'enable_verification' => 'enableVerification',
        'enable_consent_audit_log' => 'enableConsentAuditLog',
        'token_max_age' => 'tokenMaxAge',
        'description' => 'description',
        'client_metadata' => 'clientMetadata',
        'mode' => 'mode',
        'redirect_uris' => 'redirectUris',
        'enable_idv_providers' => 'enableIdvProviders'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'wallet_ari' => 'setWalletAri',
        'iota_response_webhook_url' => 'setIotaResponseWebhookUrl',
        'enable_verification' => 'setEnableVerification',
        'enable_consent_audit_log' => 'setEnableConsentAuditLog',
        'token_max_age' => 'setTokenMaxAge',
        'description' => 'setDescription',
        'client_metadata' => 'setClientMetadata',
        'mode' => 'setMode',
        'redirect_uris' => 'setRedirectUris',
        'enable_idv_providers' => 'setEnableIdvProviders'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'wallet_ari' => 'getWalletAri',
        'iota_response_webhook_url' => 'getIotaResponseWebhookUrl',
        'enable_verification' => 'getEnableVerification',
        'enable_consent_audit_log' => 'getEnableConsentAuditLog',
        'token_max_age' => 'getTokenMaxAge',
        'description' => 'getDescription',
        'client_metadata' => 'getClientMetadata',
        'mode' => 'getMode',
        'redirect_uris' => 'getRedirectUris',
        'enable_idv_providers' => 'getEnableIdvProviders'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    public const MODE_REDIRECT = 'redirect';
    public const MODE_WEBSOCKET = 'websocket';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getModeAllowableValues()
    {
        return [
            self::MODE_REDIRECT,
            self::MODE_WEBSOCKET,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('wallet_ari', $data ?? [], null);
        $this->setIfExists('iota_response_webhook_url', $data ?? [], null);
        $this->setIfExists('enable_verification', $data ?? [], null);
        $this->setIfExists('enable_consent_audit_log', $data ?? [], null);
        $this->setIfExists('token_max_age', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('client_metadata', $data ?? [], null);
        $this->setIfExists('mode', $data ?? [], null);
        $this->setIfExists('redirect_uris', $data ?? [], null);
        $this->setIfExists('enable_idv_providers', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getModeAllowableValues();
        if (!is_null($this->container['mode']) && !in_array($this->container['mode'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'mode', must be one of '%s'",
                $this->container['mode'],
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name The name of the configuration to quickly identify the resource.
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets wallet_ari
     *
     * @return string|null
     */
    public function getWalletAri()
    {
        return $this->container['wallet_ari'];
    }

    /**
     * Sets wallet_ari
     *
     * @param string|null $wallet_ari The unique resource identifier of the Wallet used to sign the request token.
     *
     * @return self
     */
    public function setWalletAri($wallet_ari)
    {
        if (is_null($wallet_ari)) {
            throw new \InvalidArgumentException('non-nullable wallet_ari cannot be null');
        }
        $this->container['wallet_ari'] = $wallet_ari;

        return $this;
    }

    /**
     * Gets iota_response_webhook_url
     *
     * @return string|null
     */
    public function getIotaResponseWebhookUrl()
    {
        return $this->container['iota_response_webhook_url'];
    }

    /**
     * Sets iota_response_webhook_url
     *
     * @param string|null $iota_response_webhook_url The webhook URL is used for callback when the data is ready.
     *
     * @return self
     */
    public function setIotaResponseWebhookUrl($iota_response_webhook_url)
    {
        if (is_null($iota_response_webhook_url)) {
            throw new \InvalidArgumentException('non-nullable iota_response_webhook_url cannot be null');
        }
        $this->container['iota_response_webhook_url'] = $iota_response_webhook_url;

        return $this;
    }

    /**
     * Gets enable_verification
     *
     * @return bool|null
     */
    public function getEnableVerification()
    {
        return $this->container['enable_verification'];
    }

    /**
     * Sets enable_verification
     *
     * @param bool|null $enable_verification Cryptographically verifies the data shared by the user when enabled.
     *
     * @return self
     */
    public function setEnableVerification($enable_verification)
    {
        if (is_null($enable_verification)) {
            throw new \InvalidArgumentException('non-nullable enable_verification cannot be null');
        }
        $this->container['enable_verification'] = $enable_verification;

        return $this;
    }

    /**
     * Gets enable_consent_audit_log
     *
     * @return bool|null
     */
    public function getEnableConsentAuditLog()
    {
        return $this->container['enable_consent_audit_log'];
    }

    /**
     * Sets enable_consent_audit_log
     *
     * @param bool|null $enable_consent_audit_log Records the user's consent when they share their data, including the type of data shared when enabled.
     *
     * @return self
     */
    public function setEnableConsentAuditLog($enable_consent_audit_log)
    {
        if (is_null($enable_consent_audit_log)) {
            throw new \InvalidArgumentException('non-nullable enable_consent_audit_log cannot be null');
        }
        $this->container['enable_consent_audit_log'] = $enable_consent_audit_log;

        return $this;
    }

    /**
     * Gets token_max_age
     *
     * @return float|null
     */
    public function getTokenMaxAge()
    {
        return $this->container['token_max_age'];
    }

    /**
     * Sets token_max_age
     *
     * @param float|null $token_max_age This is the lifetime of the signed request token during the data-sharing flow.
     *
     * @return self
     */
    public function setTokenMaxAge($token_max_age)
    {
        if (is_null($token_max_age)) {
            throw new \InvalidArgumentException('non-nullable token_max_age cannot be null');
        }
        $this->container['token_max_age'] = $token_max_age;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description An optional description of what the configuration is used for.
     *
     * @return self
     */
    public function setDescription($description)
    {
        if (is_null($description)) {
            throw new \InvalidArgumentException('non-nullable description cannot be null');
        }
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets client_metadata
     *
     * @return \AffinidiTdk\Clients\IotaClient\Model\UpdateConfigurationByIdInputClientMetadata|null
     */
    public function getClientMetadata()
    {
        return $this->container['client_metadata'];
    }

    /**
     * Sets client_metadata
     *
     * @param \AffinidiTdk\Clients\IotaClient\Model\UpdateConfigurationByIdInputClientMetadata|null $client_metadata client_metadata
     *
     * @return self
     */
    public function setClientMetadata($client_metadata)
    {
        if (is_null($client_metadata)) {
            throw new \InvalidArgumentException('non-nullable client_metadata cannot be null');
        }
        $this->container['client_metadata'] = $client_metadata;

        return $this;
    }

    /**
     * Gets mode
     *
     * @return string|null
     */
    public function getMode()
    {
        return $this->container['mode'];
    }

    /**
     * Sets mode
     *
     * @param string|null $mode Determines whether to handle the data-sharing request using the WebSocket or Redirect flow.
     *
     * @return self
     */
    public function setMode($mode)
    {
        if (is_null($mode)) {
            throw new \InvalidArgumentException('non-nullable mode cannot be null');
        }
        $allowedValues = $this->getModeAllowableValues();
        if (!in_array($mode, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'mode', must be one of '%s'",
                    $mode,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['mode'] = $mode;

        return $this;
    }

    /**
     * Gets redirect_uris
     *
     * @return string[]|null
     */
    public function getRedirectUris()
    {
        return $this->container['redirect_uris'];
    }

    /**
     * Sets redirect_uris
     *
     * @param string[]|null $redirect_uris List of allowed URLs to redirect users, including the response from the request. This is required if the selected data-sharing mode is Redirect.
     *
     * @return self
     */
    public function setRedirectUris($redirect_uris)
    {
        if (is_null($redirect_uris)) {
            throw new \InvalidArgumentException('non-nullable redirect_uris cannot be null');
        }
        $this->container['redirect_uris'] = $redirect_uris;

        return $this;
    }

    /**
     * Gets enable_idv_providers
     *
     * @return bool|null
     */
    public function getEnableIdvProviders()
    {
        return $this->container['enable_idv_providers'];
    }

    /**
     * Sets enable_idv_providers
     *
     * @param bool|null $enable_idv_providers Enables identity verification from user with a 3rd-party provider when a verified identity document is not found.
     *
     * @return self
     */
    public function setEnableIdvProviders($enable_idv_providers)
    {
        if (is_null($enable_idv_providers)) {
            throw new \InvalidArgumentException('non-nullable enable_idv_providers cannot be null');
        }
        $this->container['enable_idv_providers'] = $enable_idv_providers;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


