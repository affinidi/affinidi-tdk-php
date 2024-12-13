<?php
/**
 * Format
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
 * Format Class Doc Comment
 *
 * @category Class
 * @package  AffinidiTdk\Clients\CredentialVerificationClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Format implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Format';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'jwt' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\JwtObject',
        'jwt_vc' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\JwtObject',
        'jwt_vp' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\JwtObject',
        'ldp' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\LdpObject',
        'ldp_vc' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\LdpObject',
        'ldp_vp' => '\AffinidiTdk\Clients\CredentialVerificationClient\Model\LdpObject'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'jwt' => null,
        'jwt_vc' => null,
        'jwt_vp' => null,
        'ldp' => null,
        'ldp_vc' => null,
        'ldp_vp' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'jwt' => false,
        'jwt_vc' => false,
        'jwt_vp' => false,
        'ldp' => false,
        'ldp_vc' => false,
        'ldp_vp' => false
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
        'jwt' => 'jwt',
        'jwt_vc' => 'jwt_vc',
        'jwt_vp' => 'jwt_vp',
        'ldp' => 'ldp',
        'ldp_vc' => 'ldp_vc',
        'ldp_vp' => 'ldp_vp'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'jwt' => 'setJwt',
        'jwt_vc' => 'setJwtVc',
        'jwt_vp' => 'setJwtVp',
        'ldp' => 'setLdp',
        'ldp_vc' => 'setLdpVc',
        'ldp_vp' => 'setLdpVp'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'jwt' => 'getJwt',
        'jwt_vc' => 'getJwtVc',
        'jwt_vp' => 'getJwtVp',
        'ldp' => 'getLdp',
        'ldp_vc' => 'getLdpVc',
        'ldp_vp' => 'getLdpVp'
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
        $this->setIfExists('jwt', $data ?? [], null);
        $this->setIfExists('jwt_vc', $data ?? [], null);
        $this->setIfExists('jwt_vp', $data ?? [], null);
        $this->setIfExists('ldp', $data ?? [], null);
        $this->setIfExists('ldp_vc', $data ?? [], null);
        $this->setIfExists('ldp_vp', $data ?? [], null);
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
     * Gets jwt
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\JwtObject|null
     */
    public function getJwt()
    {
        return $this->container['jwt'];
    }

    /**
     * Sets jwt
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\JwtObject|null $jwt jwt
     *
     * @return self
     */
    public function setJwt($jwt)
    {
        if (is_null($jwt)) {
            throw new \InvalidArgumentException('non-nullable jwt cannot be null');
        }
        $this->container['jwt'] = $jwt;

        return $this;
    }

    /**
     * Gets jwt_vc
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\JwtObject|null
     */
    public function getJwtVc()
    {
        return $this->container['jwt_vc'];
    }

    /**
     * Sets jwt_vc
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\JwtObject|null $jwt_vc jwt_vc
     *
     * @return self
     */
    public function setJwtVc($jwt_vc)
    {
        if (is_null($jwt_vc)) {
            throw new \InvalidArgumentException('non-nullable jwt_vc cannot be null');
        }
        $this->container['jwt_vc'] = $jwt_vc;

        return $this;
    }

    /**
     * Gets jwt_vp
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\JwtObject|null
     */
    public function getJwtVp()
    {
        return $this->container['jwt_vp'];
    }

    /**
     * Sets jwt_vp
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\JwtObject|null $jwt_vp jwt_vp
     *
     * @return self
     */
    public function setJwtVp($jwt_vp)
    {
        if (is_null($jwt_vp)) {
            throw new \InvalidArgumentException('non-nullable jwt_vp cannot be null');
        }
        $this->container['jwt_vp'] = $jwt_vp;

        return $this;
    }

    /**
     * Gets ldp
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\LdpObject|null
     */
    public function getLdp()
    {
        return $this->container['ldp'];
    }

    /**
     * Sets ldp
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\LdpObject|null $ldp ldp
     *
     * @return self
     */
    public function setLdp($ldp)
    {
        if (is_null($ldp)) {
            throw new \InvalidArgumentException('non-nullable ldp cannot be null');
        }
        $this->container['ldp'] = $ldp;

        return $this;
    }

    /**
     * Gets ldp_vc
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\LdpObject|null
     */
    public function getLdpVc()
    {
        return $this->container['ldp_vc'];
    }

    /**
     * Sets ldp_vc
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\LdpObject|null $ldp_vc ldp_vc
     *
     * @return self
     */
    public function setLdpVc($ldp_vc)
    {
        if (is_null($ldp_vc)) {
            throw new \InvalidArgumentException('non-nullable ldp_vc cannot be null');
        }
        $this->container['ldp_vc'] = $ldp_vc;

        return $this;
    }

    /**
     * Gets ldp_vp
     *
     * @return \AffinidiTdk\Clients\CredentialVerificationClient\Model\LdpObject|null
     */
    public function getLdpVp()
    {
        return $this->container['ldp_vp'];
    }

    /**
     * Sets ldp_vp
     *
     * @param \AffinidiTdk\Clients\CredentialVerificationClient\Model\LdpObject|null $ldp_vp ldp_vp
     *
     * @return self
     */
    public function setLdpVp($ldp_vp)
    {
        if (is_null($ldp_vp)) {
            throw new \InvalidArgumentException('non-nullable ldp_vp cannot be null');
        }
        $this->container['ldp_vp'] = $ldp_vp;

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


