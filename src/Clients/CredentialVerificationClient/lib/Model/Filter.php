<?php
/**
 * Filter
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  AffinidiTdk\Clients\CredentialVerificationClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * VerificationService
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

namespace AffinidiTdk\Clients\CredentialVerificationClient\Model;

use \ArrayAccess;
use \AffinidiTdk\Clients\CredentialVerificationClient\ObjectSerializer;

/**
 * Filter Class Doc Comment
 *
 * @category Class
 * @package  AffinidiTdk\Clients\CredentialVerificationClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Filter implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Filter';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        '_const' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst',
        '_enum' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst[]',
        'exclusive_minimum' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst',
        'exclusive_maximum' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst',
        'format' => 'string',
        'format_maximum' => 'string',
        'format_minimum' => 'string',
        'format_exclusive_maximum' => 'string',
        'format_exclusive_minimum' => 'string',
        'min_length' => 'int',
        'max_length' => 'int',
        'minimum' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst',
        'maximum' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst',
        'not' => 'object',
        'pattern' => 'string',
        'contains' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\Filter',
        'items' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterItems',
        'type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        '_const' => null,
        '_enum' => null,
        'exclusive_minimum' => null,
        'exclusive_maximum' => null,
        'format' => null,
        'format_maximum' => null,
        'format_minimum' => null,
        'format_exclusive_maximum' => null,
        'format_exclusive_minimum' => null,
        'min_length' => null,
        'max_length' => null,
        'minimum' => null,
        'maximum' => null,
        'not' => null,
        'pattern' => null,
        'contains' => null,
        'items' => null,
        'type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        '_const' => false,
        '_enum' => false,
        'exclusive_minimum' => false,
        'exclusive_maximum' => false,
        'format' => false,
        'format_maximum' => false,
        'format_minimum' => false,
        'format_exclusive_maximum' => false,
        'format_exclusive_minimum' => false,
        'min_length' => false,
        'max_length' => false,
        'minimum' => false,
        'maximum' => false,
        'not' => false,
        'pattern' => false,
        'contains' => false,
        'items' => false,
        'type' => false
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
        '_const' => '_const',
        '_enum' => '_enum',
        'exclusive_minimum' => 'exclusiveMinimum',
        'exclusive_maximum' => 'exclusiveMaximum',
        'format' => 'format',
        'format_maximum' => 'formatMaximum',
        'format_minimum' => 'formatMinimum',
        'format_exclusive_maximum' => 'formatExclusiveMaximum',
        'format_exclusive_minimum' => 'formatExclusiveMinimum',
        'min_length' => 'minLength',
        'max_length' => 'maxLength',
        'minimum' => 'minimum',
        'maximum' => 'maximum',
        'not' => 'not',
        'pattern' => 'pattern',
        'contains' => 'contains',
        'items' => 'items',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        '_const' => 'setConst',
        '_enum' => 'setEnum',
        'exclusive_minimum' => 'setExclusiveMinimum',
        'exclusive_maximum' => 'setExclusiveMaximum',
        'format' => 'setFormat',
        'format_maximum' => 'setFormatMaximum',
        'format_minimum' => 'setFormatMinimum',
        'format_exclusive_maximum' => 'setFormatExclusiveMaximum',
        'format_exclusive_minimum' => 'setFormatExclusiveMinimum',
        'min_length' => 'setMinLength',
        'max_length' => 'setMaxLength',
        'minimum' => 'setMinimum',
        'maximum' => 'setMaximum',
        'not' => 'setNot',
        'pattern' => 'setPattern',
        'contains' => 'setContains',
        'items' => 'setItems',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        '_const' => 'getConst',
        '_enum' => 'getEnum',
        'exclusive_minimum' => 'getExclusiveMinimum',
        'exclusive_maximum' => 'getExclusiveMaximum',
        'format' => 'getFormat',
        'format_maximum' => 'getFormatMaximum',
        'format_minimum' => 'getFormatMinimum',
        'format_exclusive_maximum' => 'getFormatExclusiveMaximum',
        'format_exclusive_minimum' => 'getFormatExclusiveMinimum',
        'min_length' => 'getMinLength',
        'max_length' => 'getMaxLength',
        'minimum' => 'getMinimum',
        'maximum' => 'getMaximum',
        'not' => 'getNot',
        'pattern' => 'getPattern',
        'contains' => 'getContains',
        'items' => 'getItems',
        'type' => 'getType'
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
        $this->setIfExists('_const', $data ?? [], null);
        $this->setIfExists('_enum', $data ?? [], null);
        $this->setIfExists('exclusive_minimum', $data ?? [], null);
        $this->setIfExists('exclusive_maximum', $data ?? [], null);
        $this->setIfExists('format', $data ?? [], null);
        $this->setIfExists('format_maximum', $data ?? [], null);
        $this->setIfExists('format_minimum', $data ?? [], null);
        $this->setIfExists('format_exclusive_maximum', $data ?? [], null);
        $this->setIfExists('format_exclusive_minimum', $data ?? [], null);
        $this->setIfExists('min_length', $data ?? [], null);
        $this->setIfExists('max_length', $data ?? [], null);
        $this->setIfExists('minimum', $data ?? [], null);
        $this->setIfExists('maximum', $data ?? [], null);
        $this->setIfExists('not', $data ?? [], null);
        $this->setIfExists('pattern', $data ?? [], null);
        $this->setIfExists('contains', $data ?? [], null);
        $this->setIfExists('items', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
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
     * Gets _const
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst|null
     */
    public function getConst()
    {
        return $this->container['_const'];
    }

    /**
     * Sets _const
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst|null $_const _const
     *
     * @return self
     */
    public function setConst($_const)
    {
        if (is_null($_const)) {
            throw new \InvalidArgumentException('non-nullable _const cannot be null');
        }
        $this->container['_const'] = $_const;

        return $this;
    }

    /**
     * Gets _enum
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst[]|null
     */
    public function getEnum()
    {
        return $this->container['_enum'];
    }

    /**
     * Sets _enum
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst[]|null $_enum _enum
     *
     * @return self
     */
    public function setEnum($_enum)
    {
        if (is_null($_enum)) {
            throw new \InvalidArgumentException('non-nullable _enum cannot be null');
        }
        $this->container['_enum'] = $_enum;

        return $this;
    }

    /**
     * Gets exclusive_minimum
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst|null
     */
    public function getExclusiveMinimum()
    {
        return $this->container['exclusive_minimum'];
    }

    /**
     * Sets exclusive_minimum
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst|null $exclusive_minimum exclusive_minimum
     *
     * @return self
     */
    public function setExclusiveMinimum($exclusive_minimum)
    {
        if (is_null($exclusive_minimum)) {
            throw new \InvalidArgumentException('non-nullable exclusive_minimum cannot be null');
        }
        $this->container['exclusive_minimum'] = $exclusive_minimum;

        return $this;
    }

    /**
     * Gets exclusive_maximum
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst|null
     */
    public function getExclusiveMaximum()
    {
        return $this->container['exclusive_maximum'];
    }

    /**
     * Sets exclusive_maximum
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst|null $exclusive_maximum exclusive_maximum
     *
     * @return self
     */
    public function setExclusiveMaximum($exclusive_maximum)
    {
        if (is_null($exclusive_maximum)) {
            throw new \InvalidArgumentException('non-nullable exclusive_maximum cannot be null');
        }
        $this->container['exclusive_maximum'] = $exclusive_maximum;

        return $this;
    }

    /**
     * Gets format
     *
     * @return string|null
     */
    public function getFormat()
    {
        return $this->container['format'];
    }

    /**
     * Sets format
     *
     * @param string|null $format format
     *
     * @return self
     */
    public function setFormat($format)
    {
        if (is_null($format)) {
            throw new \InvalidArgumentException('non-nullable format cannot be null');
        }
        $this->container['format'] = $format;

        return $this;
    }

    /**
     * Gets format_maximum
     *
     * @return string|null
     */
    public function getFormatMaximum()
    {
        return $this->container['format_maximum'];
    }

    /**
     * Sets format_maximum
     *
     * @param string|null $format_maximum format_maximum
     *
     * @return self
     */
    public function setFormatMaximum($format_maximum)
    {
        if (is_null($format_maximum)) {
            throw new \InvalidArgumentException('non-nullable format_maximum cannot be null');
        }
        $this->container['format_maximum'] = $format_maximum;

        return $this;
    }

    /**
     * Gets format_minimum
     *
     * @return string|null
     */
    public function getFormatMinimum()
    {
        return $this->container['format_minimum'];
    }

    /**
     * Sets format_minimum
     *
     * @param string|null $format_minimum format_minimum
     *
     * @return self
     */
    public function setFormatMinimum($format_minimum)
    {
        if (is_null($format_minimum)) {
            throw new \InvalidArgumentException('non-nullable format_minimum cannot be null');
        }
        $this->container['format_minimum'] = $format_minimum;

        return $this;
    }

    /**
     * Gets format_exclusive_maximum
     *
     * @return string|null
     */
    public function getFormatExclusiveMaximum()
    {
        return $this->container['format_exclusive_maximum'];
    }

    /**
     * Sets format_exclusive_maximum
     *
     * @param string|null $format_exclusive_maximum format_exclusive_maximum
     *
     * @return self
     */
    public function setFormatExclusiveMaximum($format_exclusive_maximum)
    {
        if (is_null($format_exclusive_maximum)) {
            throw new \InvalidArgumentException('non-nullable format_exclusive_maximum cannot be null');
        }
        $this->container['format_exclusive_maximum'] = $format_exclusive_maximum;

        return $this;
    }

    /**
     * Gets format_exclusive_minimum
     *
     * @return string|null
     */
    public function getFormatExclusiveMinimum()
    {
        return $this->container['format_exclusive_minimum'];
    }

    /**
     * Sets format_exclusive_minimum
     *
     * @param string|null $format_exclusive_minimum format_exclusive_minimum
     *
     * @return self
     */
    public function setFormatExclusiveMinimum($format_exclusive_minimum)
    {
        if (is_null($format_exclusive_minimum)) {
            throw new \InvalidArgumentException('non-nullable format_exclusive_minimum cannot be null');
        }
        $this->container['format_exclusive_minimum'] = $format_exclusive_minimum;

        return $this;
    }

    /**
     * Gets min_length
     *
     * @return int|null
     */
    public function getMinLength()
    {
        return $this->container['min_length'];
    }

    /**
     * Sets min_length
     *
     * @param int|null $min_length min_length
     *
     * @return self
     */
    public function setMinLength($min_length)
    {
        if (is_null($min_length)) {
            throw new \InvalidArgumentException('non-nullable min_length cannot be null');
        }
        $this->container['min_length'] = $min_length;

        return $this;
    }

    /**
     * Gets max_length
     *
     * @return int|null
     */
    public function getMaxLength()
    {
        return $this->container['max_length'];
    }

    /**
     * Sets max_length
     *
     * @param int|null $max_length max_length
     *
     * @return self
     */
    public function setMaxLength($max_length)
    {
        if (is_null($max_length)) {
            throw new \InvalidArgumentException('non-nullable max_length cannot be null');
        }
        $this->container['max_length'] = $max_length;

        return $this;
    }

    /**
     * Gets minimum
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst|null
     */
    public function getMinimum()
    {
        return $this->container['minimum'];
    }

    /**
     * Sets minimum
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst|null $minimum minimum
     *
     * @return self
     */
    public function setMinimum($minimum)
    {
        if (is_null($minimum)) {
            throw new \InvalidArgumentException('non-nullable minimum cannot be null');
        }
        $this->container['minimum'] = $minimum;

        return $this;
    }

    /**
     * Gets maximum
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst|null
     */
    public function getMaximum()
    {
        return $this->container['maximum'];
    }

    /**
     * Sets maximum
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterConst|null $maximum maximum
     *
     * @return self
     */
    public function setMaximum($maximum)
    {
        if (is_null($maximum)) {
            throw new \InvalidArgumentException('non-nullable maximum cannot be null');
        }
        $this->container['maximum'] = $maximum;

        return $this;
    }

    /**
     * Gets not
     *
     * @return object|null
     */
    public function getNot()
    {
        return $this->container['not'];
    }

    /**
     * Sets not
     *
     * @param object|null $not not
     *
     * @return self
     */
    public function setNot($not)
    {
        if (is_null($not)) {
            throw new \InvalidArgumentException('non-nullable not cannot be null');
        }
        $this->container['not'] = $not;

        return $this;
    }

    /**
     * Gets pattern
     *
     * @return string|null
     */
    public function getPattern()
    {
        return $this->container['pattern'];
    }

    /**
     * Sets pattern
     *
     * @param string|null $pattern pattern
     *
     * @return self
     */
    public function setPattern($pattern)
    {
        if (is_null($pattern)) {
            throw new \InvalidArgumentException('non-nullable pattern cannot be null');
        }
        $this->container['pattern'] = $pattern;

        return $this;
    }

    /**
     * Gets contains
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\Filter|null
     */
    public function getContains()
    {
        return $this->container['contains'];
    }

    /**
     * Sets contains
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\Filter|null $contains contains
     *
     * @return self
     */
    public function setContains($contains)
    {
        if (is_null($contains)) {
            throw new \InvalidArgumentException('non-nullable contains cannot be null');
        }
        $this->container['contains'] = $contains;

        return $this;
    }

    /**
     * Gets items
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterItems|null
     */
    public function getItems()
    {
        return $this->container['items'];
    }

    /**
     * Sets items
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\FilterItems|null $items items
     *
     * @return self
     */
    public function setItems($items)
    {
        if (is_null($items)) {
            throw new \InvalidArgumentException('non-nullable items cannot be null');
        }
        $this->container['items'] = $items;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string|null $type type
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $this->container['type'] = $type;

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


