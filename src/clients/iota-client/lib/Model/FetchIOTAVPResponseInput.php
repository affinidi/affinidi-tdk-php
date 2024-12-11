<?php
/**
 * FetchIOTAVPResponseInput
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  AffinidiTdk\Clients\Iota
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

namespace AffinidiTdk\Clients\Iota\Model;

use \ArrayAccess;
use \AffinidiTdk\Clients\Iota\ObjectSerializer;

/**
 * FetchIOTAVPResponseInput Class Doc Comment
 *
 * @category Class
 * @package  AffinidiTdk\Clients\Iota
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class FetchIOTAVPResponseInput implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'FetchIOTAVPResponseInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'correlation_id' => 'string',
        'transaction_id' => 'string',
        'response_code' => 'string',
        'configuration_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'correlation_id' => null,
        'transaction_id' => null,
        'response_code' => null,
        'configuration_id' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'correlation_id' => false,
        'transaction_id' => false,
        'response_code' => false,
        'configuration_id' => false
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
        'correlation_id' => 'correlationId',
        'transaction_id' => 'transactionId',
        'response_code' => 'responseCode',
        'configuration_id' => 'configurationId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'correlation_id' => 'setCorrelationId',
        'transaction_id' => 'setTransactionId',
        'response_code' => 'setResponseCode',
        'configuration_id' => 'setConfigurationId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'correlation_id' => 'getCorrelationId',
        'transaction_id' => 'getTransactionId',
        'response_code' => 'getResponseCode',
        'configuration_id' => 'getConfigurationId'
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
        $this->setIfExists('correlation_id', $data ?? [], null);
        $this->setIfExists('transaction_id', $data ?? [], null);
        $this->setIfExists('response_code', $data ?? [], null);
        $this->setIfExists('configuration_id', $data ?? [], null);
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

        if ($this->container['correlation_id'] === null) {
            $invalidProperties[] = "'correlation_id' can't be null";
        }
        if ($this->container['transaction_id'] === null) {
            $invalidProperties[] = "'transaction_id' can't be null";
        }
        if ($this->container['response_code'] === null) {
            $invalidProperties[] = "'response_code' can't be null";
        }
        if ((mb_strlen($this->container['response_code']) > 255)) {
            $invalidProperties[] = "invalid value for 'response_code', the character length must be smaller than or equal to 255.";
        }

        if ((mb_strlen($this->container['response_code']) < 1)) {
            $invalidProperties[] = "invalid value for 'response_code', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['configuration_id'] === null) {
            $invalidProperties[] = "'configuration_id' can't be null";
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
     * Gets correlation_id
     *
     * @return string
     */
    public function getCorrelationId()
    {
        return $this->container['correlation_id'];
    }

    /**
     * Sets correlation_id
     *
     * @param string $correlation_id A unique, randomly generated identifier that correlates the request and response in the data-sharing request flow.
     *
     * @return self
     */
    public function setCorrelationId($correlation_id)
    {
        if (is_null($correlation_id)) {
            throw new \InvalidArgumentException('non-nullable correlation_id cannot be null');
        }
        $this->container['correlation_id'] = $correlation_id;

        return $this;
    }

    /**
     * Gets transaction_id
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->container['transaction_id'];
    }

    /**
     * Sets transaction_id
     *
     * @param string $transaction_id A unique, randomly generated identifier data-sharing request flow is initiated. This value is used with the response code to fetch the callback response data.
     *
     * @return self
     */
    public function setTransactionId($transaction_id)
    {
        if (is_null($transaction_id)) {
            throw new \InvalidArgumentException('non-nullable transaction_id cannot be null');
        }
        $this->container['transaction_id'] = $transaction_id;

        return $this;
    }

    /**
     * Gets response_code
     *
     * @return string
     */
    public function getResponseCode()
    {
        return $this->container['response_code'];
    }

    /**
     * Sets response_code
     *
     * @param string $response_code A unique identifier to fetch the callback response data. Send this value together with the transactionId to successfully fetch the data.
     *
     * @return self
     */
    public function setResponseCode($response_code)
    {
        if (is_null($response_code)) {
            throw new \InvalidArgumentException('non-nullable response_code cannot be null');
        }
        if ((mb_strlen($response_code) > 255)) {
            throw new \InvalidArgumentException('invalid length for $response_code when calling FetchIOTAVPResponseInput., must be smaller than or equal to 255.');
        }
        if ((mb_strlen($response_code) < 1)) {
            throw new \InvalidArgumentException('invalid length for $response_code when calling FetchIOTAVPResponseInput., must be bigger than or equal to 1.');
        }

        $this->container['response_code'] = $response_code;

        return $this;
    }

    /**
     * Gets configuration_id
     *
     * @return string
     */
    public function getConfigurationId()
    {
        return $this->container['configuration_id'];
    }

    /**
     * Sets configuration_id
     *
     * @param string $configuration_id ID of the Affinidi Iota Framework configuration.
     *
     * @return self
     */
    public function setConfigurationId($configuration_id)
    {
        if (is_null($configuration_id)) {
            throw new \InvalidArgumentException('non-nullable configuration_id cannot be null');
        }
        $this->container['configuration_id'] = $configuration_id;

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

