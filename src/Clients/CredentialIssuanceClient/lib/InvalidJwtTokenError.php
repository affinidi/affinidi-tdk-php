<?php
/**
 * InvalidJwtTokenError
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

namespace AffinidiTdk\Clients\CredentialIssuanceClient;

use \Exception;

/**
 * InvalidJwtTokenError
 *
 * @category Class
 * @package  AffinidiTdk\Clients\CredentialIssuanceClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class InvalidJwtTokenError extends Exception
{
    /**
     * @var string
     */
    private $name = 'InvalidJwtTokenError';

    /**
     * @var string
     */
    protected $message = 'JWT token is invalid';

    /**
     * @var string
     */
    private $issue;

    /**
     * @var string
     */
    private $traceId;

    /**
     * @param string $issue
     * @param string $traceId
     */
    public function __construct(string $issue, string $traceId)
    {
        $message = [
            'name' => $this->name,
            'message' => $this->message,
            'issue' => $issue,
            'traceId' => $traceId
        ];

        parent::__construct(json_encode($message), 403);
        $this->issue = $issue;
        $this->traceId = $traceId;
    }
}