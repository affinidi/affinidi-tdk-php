<?php
/**
 * DidWebInputParams
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  AffinidiTdk\Clients\WalletsClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * CloudWalletEssentials
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

namespace AffinidiTdk\Clients\WalletsClient\Model;

use \ArrayAccess;
use \AffinidiTdk\Clients\WalletsClient\ObjectSerializer;

/**
 * DidWebInputParams Class Doc Comment
 *
 * @category Class
 * @description Additional params for did method web
 * @package  AffinidiTdk\Clients\WalletsClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DidWebInputParams implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'DidWebInputParams';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'name' => 'string',
        'description' => 'string',
        'did_method' => 'string',
        'did_web_url' => 'string'
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
        'description' => null,
        'did_method' => null,
        'did_web_url' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'name' => false,
        'description' => false,
        'did_method' => false,
        'did_web_url' => false
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
        'description' => 'description',
        'did_method' => 'didMethod',
        'did_web_url' => 'didWebUrl'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'description' => 'setDescription',
        'did_method' => 'setDidMethod',
        'did_web_url' => 'setDidWebUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'description' => 'getDescription',
        'did_method' => 'getDidMethod',
        'did_web_url' => 'getDidWebUrl'
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

    public const DID_METHOD_WEB = 'web';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDidMethodAllowableValues()
    {
        return [
            self::DID_METHOD_WEB,
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
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('did_method', $data ?? [], null);
        $this->setIfExists('did_web_url', $data ?? [], null);
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

        if ($this->container['did_method'] === null) {
            $invalidProperties[] = "'did_method' can't be null";
        }
        $allowedValues = $this->getDidMethodAllowableValues();
        if (!is_null($this->container['did_method']) && !in_array($this->container['did_method'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'did_method', must be one of '%s'",
                $this->container['did_method'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['did_web_url'] === null) {
            $invalidProperties[] = "'did_web_url' can't be null";
        }
        if ((mb_strlen($this->container['did_web_url']) > 300)) {
            $invalidProperties[] = "invalid value for 'did_web_url', the character length must be smaller than or equal to 300.";
        }

        if (!preg_match("/^(?!:\/\/)([a-zA-Z0-9\\-\\.]+)(:[0-9]+)?(\/[a-zA-Z0-9\\-\/]*)?$/", $this->container['did_web_url'])) {
            $invalidProperties[] = "invalid value for 'did_web_url', must be conform to the pattern /^(?!:\/\/)([a-zA-Z0-9\\-\\.]+)(:[0-9]+)?(\/[a-zA-Z0-9\\-\/]*)?$/.";
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
     * @param string|null $name The name of the wallet
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
     * @param string|null $description The description of the wallet
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
     * Gets did_method
     *
     * @return string
     */
    public function getDidMethod()
    {
        return $this->container['did_method'];
    }

    /**
     * Sets did_method
     *
     * @param string $did_method did_method
     *
     * @return self
     */
    public function setDidMethod($did_method)
    {
        if (is_null($did_method)) {
            throw new \InvalidArgumentException('non-nullable did_method cannot be null');
        }
        $allowedValues = $this->getDidMethodAllowableValues();
        if (!in_array($did_method, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'did_method', must be one of '%s'",
                    $did_method,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['did_method'] = $did_method;

        return $this;
    }

    /**
     * Gets did_web_url
     *
     * @return string
     */
    public function getDidWebUrl()
    {
        return $this->container['did_web_url'];
    }

    /**
     * Sets did_web_url
     *
     * @param string $did_web_url If the did method is web, this is the URL of the did
     *
     * @return self
     */
    public function setDidWebUrl($did_web_url)
    {
        if (is_null($did_web_url)) {
            throw new \InvalidArgumentException('non-nullable did_web_url cannot be null');
        }
        if ((mb_strlen($did_web_url) > 300)) {
            throw new \InvalidArgumentException('invalid length for $did_web_url when calling DidWebInputParams., must be smaller than or equal to 300.');
        }
        if ((!preg_match("/^(?!:\/\/)([a-zA-Z0-9\\-\\.]+)(:[0-9]+)?(\/[a-zA-Z0-9\\-\/]*)?$/", ObjectSerializer::toString($did_web_url)))) {
            throw new \InvalidArgumentException("invalid value for \$did_web_url when calling DidWebInputParams., must conform to the pattern /^(?!:\/\/)([a-zA-Z0-9\\-\\.]+)(:[0-9]+)?(\/[a-zA-Z0-9\\-\/]*)?$/.");
        }

        $this->container['did_web_url'] = $did_web_url;

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


