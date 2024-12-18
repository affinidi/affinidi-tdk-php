<?php
/**
 * FetchIOTAVPResponseOK
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
 * FetchIOTAVPResponseOK Class Doc Comment
 *
 * @category Class
 * @package  AffinidiTdk\Clients\IotaClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class FetchIOTAVPResponseOK implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'FetchIOTAVPResponseOK';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'correlation_id' => 'string',
        'presentation_submission' => 'string',
        'vp_token' => 'string',
        'presentation_submission' => 'string',
        'vp_token' => 'string'
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
        'presentation_submission' => null,
        'vp_token' => null,
        'presentation_submission' => null,
        'vp_token' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'correlation_id' => false,
        'presentation_submission' => false,
        'vp_token' => false,
        'presentation_submission' => false,
        'vp_token' => false
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
        'presentation_submission' => 'presentation_submission',
        'vp_token' => 'vp_token',
        'presentation_submission' => 'presentationSubmission',
        'vp_token' => 'vpToken'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'correlation_id' => 'setCorrelationId',
        'presentation_submission' => 'setPresentationSubmission',
        'vp_token' => 'setVpToken',
        'presentation_submission' => 'setPresentationSubmission',
        'vp_token' => 'setVpToken'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'correlation_id' => 'getCorrelationId',
        'presentation_submission' => 'getPresentationSubmission',
        'vp_token' => 'getVpToken',
        'presentation_submission' => 'getPresentationSubmission',
        'vp_token' => 'getVpToken'
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
        $this->setIfExists('presentation_submission', $data ?? [], null);
        $this->setIfExists('vp_token', $data ?? [], null);
        $this->setIfExists('presentation_submission', $data ?? [], null);
        $this->setIfExists('vp_token', $data ?? [], null);
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
     * Gets correlation_id
     *
     * @return string|null
     */
    public function getCorrelationId()
    {
        return $this->container['correlation_id'];
    }

    /**
     * Sets correlation_id
     *
     * @param string|null $correlation_id A unique, randomly generated identifier that correlates the request and response in the data-sharing request flow.
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
     * Gets presentation_submission
     *
     * @return string|null
     * @deprecated
     */
    public function getPresentationSubmission()
    {
        return $this->container['presentation_submission'];
    }

    /**
     * Sets presentation_submission
     *
     * @param string|null $presentation_submission A JSON string format that describes the link between the Verifiable Presentation and Presentation Definition for the verifier. The presentation submission follows the OID4VP standard.
     *
     * @return self
     * @deprecated
     */
    public function setPresentationSubmission($presentation_submission)
    {
        if (is_null($presentation_submission)) {
            throw new \InvalidArgumentException('non-nullable presentation_submission cannot be null');
        }
        $this->container['presentation_submission'] = $presentation_submission;

        return $this;
    }

    /**
     * Gets vp_token
     *
     * @return string|null
     * @deprecated
     */
    public function getVpToken()
    {
        return $this->container['vp_token'];
    }

    /**
     * Sets vp_token
     *
     * @param string|null $vp_token A JSON string format containing the data the user consented to share in a Verifiable Presentation format. The VP Token follows the OID4VP standard.
     *
     * @return self
     * @deprecated
     */
    public function setVpToken($vp_token)
    {
        if (is_null($vp_token)) {
            throw new \InvalidArgumentException('non-nullable vp_token cannot be null');
        }
        $this->container['vp_token'] = $vp_token;

        return $this;
    }

    /**
     * Gets presentation_submission
     *
     * @return string|null
     */
    public function getPresentationSubmission()
    {
        return $this->container['presentation_submission'];
    }

    /**
     * Sets presentation_submission
     *
     * @param string|null $presentation_submission A JSON string format that describes the link between the Verifiable Presentation and Presentation Definition for the verifier. The presentation submission follows the OID4VP standard.
     *
     * @return self
     */
    public function setPresentationSubmission($presentation_submission)
    {
        if (is_null($presentation_submission)) {
            throw new \InvalidArgumentException('non-nullable presentation_submission cannot be null');
        }
        $this->container['presentation_submission'] = $presentation_submission;

        return $this;
    }

    /**
     * Gets vp_token
     *
     * @return string|null
     */
    public function getVpToken()
    {
        return $this->container['vp_token'];
    }

    /**
     * Sets vp_token
     *
     * @param string|null $vp_token A JSON string format containing the data the user consented to share in a Verifiable Presentation format. The VP Token follows the OID4VP standard.
     *
     * @return self
     */
    public function setVpToken($vp_token)
    {
        if (is_null($vp_token)) {
            throw new \InvalidArgumentException('non-nullable vp_token cannot be null');
        }
        $this->container['vp_token'] = $vp_token;

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


