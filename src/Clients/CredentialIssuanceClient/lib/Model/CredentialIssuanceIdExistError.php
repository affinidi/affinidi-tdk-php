<?php
/**
 * CredentialIssuanceIdExistError
 *
 * PHP version 7.4
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
 * Generator version: 7.9.0
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
 * CredentialIssuanceIdExistError Class Doc Comment
 *
 * @category Class
 * @package  AffinidiTdk\Clients\CredentialIssuanceClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CredentialIssuanceIdExistError implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CredentialIssuanceIdExistError';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'name' => 'string',
        'message' => 'string',
        'http_status_code' => 'float',
        'trace_id' => 'string',
        'details' => '\AffinidiTdk\Clients\CredentialIssuanceClient\Model\ActionForbiddenErrorDetailsInner[]'
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
        'message' => null,
        'http_status_code' => null,
        'trace_id' => null,
        'details' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'name' => false,
        'message' => false,
        'http_status_code' => false,
        'trace_id' => false,
        'details' => false
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
        'message' => 'message',
        'http_status_code' => 'httpStatusCode',
        'trace_id' => 'traceId',
        'details' => 'details'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'message' => 'setMessage',
        'http_status_code' => 'setHttpStatusCode',
        'trace_id' => 'setTraceId',
        'details' => 'setDetails'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'message' => 'getMessage',
        'http_status_code' => 'getHttpStatusCode',
        'trace_id' => 'getTraceId',
        'details' => 'getDetails'
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

    public const NAME_CREDENTIAL_ISSUANCE_ID_EXIST_ERROR = 'CredentialIssuanceIdExistError';
    public const MESSAGE_ISSUANCE_ID_EXIST_FOR_THE_PROJECT_PLEASE_USE_DIFFERENT_ISSUANCE_ID = 'issuanceId exist for the project, please use different issuanceId';
    public const HTTP_STATUS_CODE_NUMBER_400 = 400;

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getNameAllowableValues()
    {
        return [
            self::NAME_CREDENTIAL_ISSUANCE_ID_EXIST_ERROR,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMessageAllowableValues()
    {
        return [
            self::MESSAGE_ISSUANCE_ID_EXIST_FOR_THE_PROJECT_PLEASE_USE_DIFFERENT_ISSUANCE_ID,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getHttpStatusCodeAllowableValues()
    {
        return [
            self::HTTP_STATUS_CODE_NUMBER_400,
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
        $this->setIfExists('message', $data ?? [], null);
        $this->setIfExists('http_status_code', $data ?? [], null);
        $this->setIfExists('trace_id', $data ?? [], null);
        $this->setIfExists('details', $data ?? [], null);
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

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        $allowedValues = $this->getNameAllowableValues();
        if (!is_null($this->container['name']) && !in_array($this->container['name'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'name', must be one of '%s'",
                $this->container['name'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['message'] === null) {
            $invalidProperties[] = "'message' can't be null";
        }
        $allowedValues = $this->getMessageAllowableValues();
        if (!is_null($this->container['message']) && !in_array($this->container['message'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'message', must be one of '%s'",
                $this->container['message'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['http_status_code'] === null) {
            $invalidProperties[] = "'http_status_code' can't be null";
        }
        $allowedValues = $this->getHttpStatusCodeAllowableValues();
        if (!is_null($this->container['http_status_code']) && !in_array($this->container['http_status_code'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'http_status_code', must be one of '%s'",
                $this->container['http_status_code'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['trace_id'] === null) {
            $invalidProperties[] = "'trace_id' can't be null";
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
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $allowedValues = $this->getNameAllowableValues();
        if (!in_array($name, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'name', must be one of '%s'",
                    $name,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->container['message'];
    }

    /**
     * Sets message
     *
     * @param string $message message
     *
     * @return self
     */
    public function setMessage($message)
    {
        if (is_null($message)) {
            throw new \InvalidArgumentException('non-nullable message cannot be null');
        }
        $allowedValues = $this->getMessageAllowableValues();
        if (!in_array($message, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'message', must be one of '%s'",
                    $message,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['message'] = $message;

        return $this;
    }

    /**
     * Gets http_status_code
     *
     * @return float
     */
    public function getHttpStatusCode()
    {
        return $this->container['http_status_code'];
    }

    /**
     * Sets http_status_code
     *
     * @param float $http_status_code http_status_code
     *
     * @return self
     */
    public function setHttpStatusCode($http_status_code)
    {
        if (is_null($http_status_code)) {
            throw new \InvalidArgumentException('non-nullable http_status_code cannot be null');
        }
        $allowedValues = $this->getHttpStatusCodeAllowableValues();
        if (!in_array($http_status_code, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'http_status_code', must be one of '%s'",
                    $http_status_code,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['http_status_code'] = $http_status_code;

        return $this;
    }

    /**
     * Gets trace_id
     *
     * @return string
     */
    public function getTraceId()
    {
        return $this->container['trace_id'];
    }

    /**
     * Sets trace_id
     *
     * @param string $trace_id trace_id
     *
     * @return self
     */
    public function setTraceId($trace_id)
    {
        if (is_null($trace_id)) {
            throw new \InvalidArgumentException('non-nullable trace_id cannot be null');
        }
        $this->container['trace_id'] = $trace_id;

        return $this;
    }

    /**
     * Gets details
     *
     * @return \AffinidiTdk\Clients\CredentialIssuanceClient\Model\ActionForbiddenErrorDetailsInner[]|null
     */
    public function getDetails()
    {
        return $this->container['details'];
    }

    /**
     * Sets details
     *
     * @param \AffinidiTdk\Clients\CredentialIssuanceClient\Model\ActionForbiddenErrorDetailsInner[]|null $details details
     *
     * @return self
     */
    public function setDetails($details)
    {
        if (is_null($details)) {
            throw new \InvalidArgumentException('non-nullable details cannot be null');
        }
        $this->container['details'] = $details;

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


