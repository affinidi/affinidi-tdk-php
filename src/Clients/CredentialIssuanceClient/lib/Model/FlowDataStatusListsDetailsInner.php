<?php
/**
 * FlowDataStatusListsDetailsInner
 *
 * PHP version 8.1
 *
 * @category Class
 * @package  AffinidiTdk\Clients\CredentialIssuanceClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * CredentialIssuanceService
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: 1.0.0
 * Contact: info@affinidi.com
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.13.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace AffinidiTdk\Clients\CredentialIssuanceClient\Model;

use \ArrayAccess;
use \AffinidiTdk\Clients\CredentialIssuanceClient\ObjectSerializer;

/**
 * FlowDataStatusListsDetailsInner Class Doc Comment
 *
 * @category Class
 * @package  AffinidiTdk\Clients\CredentialIssuanceClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class FlowDataStatusListsDetailsInner implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'FlowData_statusListsDetails_inner';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'status_list_purpose' => 'string',
        'status_list_id' => 'string',
        'status_list_index' => 'string',
        'standard' => 'string',
        'is_active' => 'bool',
        'status_activation_reason' => 'string',
        'status_activated_at' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'status_list_purpose' => null,
        'status_list_id' => null,
        'status_list_index' => null,
        'standard' => null,
        'is_active' => null,
        'status_activation_reason' => null,
        'status_activated_at' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'status_list_purpose' => false,
        'status_list_id' => false,
        'status_list_index' => false,
        'standard' => false,
        'is_active' => false,
        'status_activation_reason' => false,
        'status_activated_at' => false
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
        'status_list_purpose' => 'statusListPurpose',
        'status_list_id' => 'statusListId',
        'status_list_index' => 'statusListIndex',
        'standard' => 'standard',
        'is_active' => 'isActive',
        'status_activation_reason' => 'statusActivationReason',
        'status_activated_at' => 'statusActivatedAt'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'status_list_purpose' => 'setStatusListPurpose',
        'status_list_id' => 'setStatusListId',
        'status_list_index' => 'setStatusListIndex',
        'standard' => 'setStandard',
        'is_active' => 'setIsActive',
        'status_activation_reason' => 'setStatusActivationReason',
        'status_activated_at' => 'setStatusActivatedAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'status_list_purpose' => 'getStatusListPurpose',
        'status_list_id' => 'getStatusListId',
        'status_list_index' => 'getStatusListIndex',
        'standard' => 'getStandard',
        'is_active' => 'getIsActive',
        'status_activation_reason' => 'getStatusActivationReason',
        'status_activated_at' => 'getStatusActivatedAt'
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

    public const STATUS_LIST_PURPOSE_REVOKED = 'REVOKED';
    public const STANDARD_REVOCATION_LIST2020 = 'RevocationList2020';
    public const STANDARD_BITSTRING_STATUS_LIST_V1 = 'BitstringStatusListV1';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusListPurposeAllowableValues()
    {
        return [
            self::STATUS_LIST_PURPOSE_REVOKED,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStandardAllowableValues()
    {
        return [
            self::STANDARD_REVOCATION_LIST2020,
            self::STANDARD_BITSTRING_STATUS_LIST_V1,
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
        $this->setIfExists('status_list_purpose', $data ?? [], null);
        $this->setIfExists('status_list_id', $data ?? [], null);
        $this->setIfExists('status_list_index', $data ?? [], null);
        $this->setIfExists('standard', $data ?? [], null);
        $this->setIfExists('is_active', $data ?? [], null);
        $this->setIfExists('status_activation_reason', $data ?? [], null);
        $this->setIfExists('status_activated_at', $data ?? [], null);
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

        if ($this->container['status_list_purpose'] === null) {
            $invalidProperties[] = "'status_list_purpose' can't be null";
        }
        $allowedValues = $this->getStatusListPurposeAllowableValues();
        if (!is_null($this->container['status_list_purpose']) && !in_array($this->container['status_list_purpose'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status_list_purpose', must be one of '%s'",
                $this->container['status_list_purpose'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['status_list_id'] === null) {
            $invalidProperties[] = "'status_list_id' can't be null";
        }
        if ($this->container['status_list_index'] === null) {
            $invalidProperties[] = "'status_list_index' can't be null";
        }
        if ($this->container['standard'] === null) {
            $invalidProperties[] = "'standard' can't be null";
        }
        $allowedValues = $this->getStandardAllowableValues();
        if (!is_null($this->container['standard']) && !in_array($this->container['standard'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'standard', must be one of '%s'",
                $this->container['standard'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['is_active'] === null) {
            $invalidProperties[] = "'is_active' can't be null";
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
     * Gets status_list_purpose
     *
     * @return string
     */
    public function getStatusListPurpose()
    {
        return $this->container['status_list_purpose'];
    }

    /**
     * Sets status_list_purpose
     *
     * @param string $status_list_purpose Purpose of status list to which credential is added
     *
     * @return self
     */
    public function setStatusListPurpose($status_list_purpose)
    {
        if (is_null($status_list_purpose)) {
            throw new \InvalidArgumentException('non-nullable status_list_purpose cannot be null');
        }
        $allowedValues = $this->getStatusListPurposeAllowableValues();
        if (!in_array($status_list_purpose, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'status_list_purpose', must be one of '%s'",
                    $status_list_purpose,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status_list_purpose'] = $status_list_purpose;

        return $this;
    }

    /**
     * Gets status_list_id
     *
     * @return string
     */
    public function getStatusListId()
    {
        return $this->container['status_list_id'];
    }

    /**
     * Sets status_list_id
     *
     * @param string $status_list_id id of status list
     *
     * @return self
     */
    public function setStatusListId($status_list_id)
    {
        if (is_null($status_list_id)) {
            throw new \InvalidArgumentException('non-nullable status_list_id cannot be null');
        }
        $this->container['status_list_id'] = $status_list_id;

        return $this;
    }

    /**
     * Gets status_list_index
     *
     * @return string
     */
    public function getStatusListIndex()
    {
        return $this->container['status_list_index'];
    }

    /**
     * Sets status_list_index
     *
     * @param string $status_list_index as usual it is a number, but all standards use a string
     *
     * @return self
     */
    public function setStatusListIndex($status_list_index)
    {
        if (is_null($status_list_index)) {
            throw new \InvalidArgumentException('non-nullable status_list_index cannot be null');
        }
        $this->container['status_list_index'] = $status_list_index;

        return $this;
    }

    /**
     * Gets standard
     *
     * @return string
     */
    public function getStandard()
    {
        return $this->container['standard'];
    }

    /**
     * Sets standard
     *
     * @param string $standard standard
     *
     * @return self
     */
    public function setStandard($standard)
    {
        if (is_null($standard)) {
            throw new \InvalidArgumentException('non-nullable standard cannot be null');
        }
        $allowedValues = $this->getStandardAllowableValues();
        if (!in_array($standard, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'standard', must be one of '%s'",
                    $standard,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['standard'] = $standard;

        return $this;
    }

    /**
     * Gets is_active
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->container['is_active'];
    }

    /**
     * Sets is_active
     *
     * @param bool $is_active indicates status is true or not. Default false.
     *
     * @return self
     */
    public function setIsActive($is_active)
    {
        if (is_null($is_active)) {
            throw new \InvalidArgumentException('non-nullable is_active cannot be null');
        }
        $this->container['is_active'] = $is_active;

        return $this;
    }

    /**
     * Gets status_activation_reason
     *
     * @return string|null
     */
    public function getStatusActivationReason()
    {
        return $this->container['status_activation_reason'];
    }

    /**
     * Sets status_activation_reason
     *
     * @param string|null $status_activation_reason text reasoning why the status is true (if true). Optional.
     *
     * @return self
     */
    public function setStatusActivationReason($status_activation_reason)
    {
        if (is_null($status_activation_reason)) {
            throw new \InvalidArgumentException('non-nullable status_activation_reason cannot be null');
        }
        $this->container['status_activation_reason'] = $status_activation_reason;

        return $this;
    }

    /**
     * Gets status_activated_at
     *
     * @return string|null
     */
    public function getStatusActivatedAt()
    {
        return $this->container['status_activated_at'];
    }

    /**
     * Sets status_activated_at
     *
     * @param string|null $status_activated_at ISO 8601 string of the modification date/time the status. Optional.
     *
     * @return self
     */
    public function setStatusActivatedAt($status_activated_at)
    {
        if (is_null($status_activated_at)) {
            throw new \InvalidArgumentException('non-nullable status_activated_at cannot be null');
        }
        $this->container['status_activated_at'] = $status_activated_at;

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


