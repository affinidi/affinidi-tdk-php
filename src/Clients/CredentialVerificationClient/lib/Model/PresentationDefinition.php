<?php
/**
 * PresentationDefinition
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
 * PresentationDefinition Class Doc Comment
 *
 * @category Class
 * @description Presentation definition
 * @package  AffinidiTdk\Clients\CredentialVerificationClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PresentationDefinition implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PresentationDefinition';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'name' => 'string',
        'purpose' => 'string',
        'format' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\Format',
        'submission_requirements' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\SubmissionRequirement[]',
        'input_descriptors' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\InputDescriptor[]',
        'frame' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\FreeFormObject'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => null,
        'name' => null,
        'purpose' => null,
        'format' => null,
        'submission_requirements' => null,
        'input_descriptors' => null,
        'frame' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'name' => false,
        'purpose' => false,
        'format' => false,
        'submission_requirements' => false,
        'input_descriptors' => false,
        'frame' => false
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
        'id' => 'id',
        'name' => 'name',
        'purpose' => 'purpose',
        'format' => 'format',
        'submission_requirements' => 'submission_requirements',
        'input_descriptors' => 'input_descriptors',
        'frame' => 'frame'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'purpose' => 'setPurpose',
        'format' => 'setFormat',
        'submission_requirements' => 'setSubmissionRequirements',
        'input_descriptors' => 'setInputDescriptors',
        'frame' => 'setFrame'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'purpose' => 'getPurpose',
        'format' => 'getFormat',
        'submission_requirements' => 'getSubmissionRequirements',
        'input_descriptors' => 'getInputDescriptors',
        'frame' => 'getFrame'
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
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('purpose', $data ?? [], null);
        $this->setIfExists('format', $data ?? [], null);
        $this->setIfExists('submission_requirements', $data ?? [], null);
        $this->setIfExists('input_descriptors', $data ?? [], null);
        $this->setIfExists('frame', $data ?? [], null);
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

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['input_descriptors'] === null) {
            $invalidProperties[] = "'input_descriptors' can't be null";
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
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id Definition id
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
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
     * @param string|null $name Definition name
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
     * Gets purpose
     *
     * @return string|null
     */
    public function getPurpose()
    {
        return $this->container['purpose'];
    }

    /**
     * Sets purpose
     *
     * @param string|null $purpose Definition purpose
     *
     * @return self
     */
    public function setPurpose($purpose)
    {
        if (is_null($purpose)) {
            throw new \InvalidArgumentException('non-nullable purpose cannot be null');
        }
        $this->container['purpose'] = $purpose;

        return $this;
    }

    /**
     * Gets format
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\Format|null
     */
    public function getFormat()
    {
        return $this->container['format'];
    }

    /**
     * Sets format
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\Format|null $format format
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
     * Gets submission_requirements
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\SubmissionRequirement[]|null
     */
    public function getSubmissionRequirements()
    {
        return $this->container['submission_requirements'];
    }

    /**
     * Sets submission_requirements
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\SubmissionRequirement[]|null $submission_requirements submission_requirements
     *
     * @return self
     */
    public function setSubmissionRequirements($submission_requirements)
    {
        if (is_null($submission_requirements)) {
            throw new \InvalidArgumentException('non-nullable submission_requirements cannot be null');
        }
        $this->container['submission_requirements'] = $submission_requirements;

        return $this;
    }

    /**
     * Gets input_descriptors
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\InputDescriptor[]
     */
    public function getInputDescriptors()
    {
        return $this->container['input_descriptors'];
    }

    /**
     * Sets input_descriptors
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\InputDescriptor[] $input_descriptors input_descriptors
     *
     * @return self
     */
    public function setInputDescriptors($input_descriptors)
    {
        if (is_null($input_descriptors)) {
            throw new \InvalidArgumentException('non-nullable input_descriptors cannot be null');
        }
        $this->container['input_descriptors'] = $input_descriptors;

        return $this;
    }

    /**
     * Gets frame
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\FreeFormObject|null
     */
    public function getFrame()
    {
        return $this->container['frame'];
    }

    /**
     * Sets frame
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\FreeFormObject|null $frame frame
     *
     * @return self
     */
    public function setFrame($frame)
    {
        if (is_null($frame)) {
            throw new \InvalidArgumentException('non-nullable frame cannot be null');
        }
        $this->container['frame'] = $frame;

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


