<?php
/**
 * AllowListApi
 * PHP version 7.4
 *
 * @category Class
 * @package  AffinidiTdk\Clients\LoginConfigurationClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * OidcVpAdapterBackend
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

namespace AffinidiTdk\Clients\LoginConfigurationClient\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use AffinidiTdk\Clients\LoginConfigurationClient\ApiException;
use AffinidiTdk\Clients\LoginConfigurationClient\Configuration;
use AffinidiTdk\Clients\LoginConfigurationClient\HeaderSelector;
use AffinidiTdk\Clients\LoginConfigurationClient\ObjectSerializer;

/**
 * InvalidJwtTokenError
 *
 * @category Class
 * @package  AffinidiTdk\Clients\LoginConfigurationClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class InvalidJwtTokenError extends \Exception
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

/**
 * NotFoundError
 *
 * @category Class
 * @package  AffinidiTdk\Clients\Wallets
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class NotFoundError extends \Exception
{
    /**
     * @var string
     */
    private $name = 'NotFoundError';

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
    public function __construct(string $message, string $traceId)
    {
        $message = [
            'name' => $this->name,
            'message' => $message,
            'traceId' => $traceId
        ];

        parent::__construct(json_encode($message), 404);
        $this->traceId = $traceId;
    }
}

/**
 * AllowListApi Class Doc Comment
 *
 * @category Class
 * @package  AffinidiTdk\Clients\LoginConfigurationClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AllowListApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'allowGroups' => [
            'application/json',
        ],
        'disallowGroups' => [
            'application/json',
        ],
        'listAllowedGroups' => [
            'application/json',
        ],
    ];

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ?ClientInterface $client = null,
        ?Configuration $config = null,
        ?HeaderSelector $selector = null,
        int $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: Configuration::getDefaultConfiguration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation allowGroups
     *
     * @param  \AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNamesInput|null $group_names_input List of group names as input (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['allowGroups'] to see the possible values for this operation
     *
     * @throws \AffinidiTdk\Clients\LoginConfigurationClient\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function allowGroups($group_names_input = null, string $contentType = self::contentTypes['allowGroups'][0])
    {
        $this->allowGroupsWithHttpInfo($group_names_input, $contentType);
    }

    /**
     * Operation allowGroupsWithHttpInfo
     *
     * @param  \AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNamesInput|null $group_names_input List of group names as input (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['allowGroups'] to see the possible values for this operation
     *
     * @throws \AffinidiTdk\Clients\LoginConfigurationClient\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function allowGroupsWithHttpInfo($group_names_input = null, string $contentType = self::contentTypes['allowGroups'][0])
    {
        $request = $this->allowGroupsRequest($group_names_input, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                $jsonResponse = json_decode($e->getResponse()->getBody());
                if ($jsonResponse->name === 'InvalidJwtTokenError') {
                    $issue = $jsonResponse->details[0]->issue;
                    throw new InvalidJwtTokenError($issue, $jsonResponse->traceId);
                }

                if ($jsonResponse->name === 'NotFoundError') {
                    throw new NotFoundError($jsonResponse->message, $jsonResponse->traceId);
                }

                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\AffinidiTdk\Clients\LoginConfigurationClient\Model\InvalidGroupsError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation allowGroupsAsync
     *
     * @param  \AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNamesInput|null $group_names_input List of group names as input (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['allowGroups'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function allowGroupsAsync($group_names_input = null, string $contentType = self::contentTypes['allowGroups'][0])
    {
        return $this->allowGroupsAsyncWithHttpInfo($group_names_input, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation allowGroupsAsyncWithHttpInfo
     *
     * @param  \AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNamesInput|null $group_names_input List of group names as input (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['allowGroups'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function allowGroupsAsyncWithHttpInfo($group_names_input = null, string $contentType = self::contentTypes['allowGroups'][0])
    {
        $returnType = '';
        $request = $this->allowGroupsRequest($group_names_input, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'allowGroups'
     *
     * @param  \AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNamesInput|null $group_names_input List of group names as input (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['allowGroups'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function allowGroupsRequest($group_names_input = null, string $contentType = self::contentTypes['allowGroups'][0])
    {



        $resourcePath = '/v1/allow-list/groups/add';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($group_names_input)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($group_names_input));
            } else {
                $httpBody = $group_names_input;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('authorization');
        if ($apiKey !== null) {
            $headers['authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation disallowGroups
     *
     * @param  \AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNamesInput|null $group_names_input List of group names as input (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['disallowGroups'] to see the possible values for this operation
     *
     * @throws \AffinidiTdk\Clients\LoginConfigurationClient\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function disallowGroups($group_names_input = null, string $contentType = self::contentTypes['disallowGroups'][0])
    {
        $this->disallowGroupsWithHttpInfo($group_names_input, $contentType);
    }

    /**
     * Operation disallowGroupsWithHttpInfo
     *
     * @param  \AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNamesInput|null $group_names_input List of group names as input (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['disallowGroups'] to see the possible values for this operation
     *
     * @throws \AffinidiTdk\Clients\LoginConfigurationClient\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function disallowGroupsWithHttpInfo($group_names_input = null, string $contentType = self::contentTypes['disallowGroups'][0])
    {
        $request = $this->disallowGroupsRequest($group_names_input, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                $jsonResponse = json_decode($e->getResponse()->getBody());
                if ($jsonResponse->name === 'InvalidJwtTokenError') {
                    $issue = $jsonResponse->details[0]->issue;
                    throw new InvalidJwtTokenError($issue, $jsonResponse->traceId);
                }

                if ($jsonResponse->name === 'NotFoundError') {
                    throw new NotFoundError($jsonResponse->message, $jsonResponse->traceId);
                }

                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\AffinidiTdk\Clients\LoginConfigurationClient\Model\InvalidGroupsError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation disallowGroupsAsync
     *
     * @param  \AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNamesInput|null $group_names_input List of group names as input (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['disallowGroups'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function disallowGroupsAsync($group_names_input = null, string $contentType = self::contentTypes['disallowGroups'][0])
    {
        return $this->disallowGroupsAsyncWithHttpInfo($group_names_input, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation disallowGroupsAsyncWithHttpInfo
     *
     * @param  \AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNamesInput|null $group_names_input List of group names as input (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['disallowGroups'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function disallowGroupsAsyncWithHttpInfo($group_names_input = null, string $contentType = self::contentTypes['disallowGroups'][0])
    {
        $returnType = '';
        $request = $this->disallowGroupsRequest($group_names_input, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'disallowGroups'
     *
     * @param  \AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNamesInput|null $group_names_input List of group names as input (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['disallowGroups'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function disallowGroupsRequest($group_names_input = null, string $contentType = self::contentTypes['disallowGroups'][0])
    {



        $resourcePath = '/v1/allow-list/groups/remove';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($group_names_input)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($group_names_input));
            } else {
                $httpBody = $group_names_input;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('authorization');
        if ($apiKey !== null) {
            $headers['authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listAllowedGroups
     *
     * @param  string|null $page_token page_token (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAllowedGroups'] to see the possible values for this operation
     *
     * @throws \AffinidiTdk\Clients\LoginConfigurationClient\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNames
     */
    public function listAllowedGroups($page_token = null, string $contentType = self::contentTypes['listAllowedGroups'][0])
    {
        list($response) = $this->listAllowedGroupsWithHttpInfo($page_token, $contentType);
        return $response;
    }

    /**
     * Operation listAllowedGroupsWithHttpInfo
     *
     * @param  string|null $page_token (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAllowedGroups'] to see the possible values for this operation
     *
     * @throws \AffinidiTdk\Clients\LoginConfigurationClient\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNames, HTTP status code, HTTP response headers (array of strings)
     */
    public function listAllowedGroupsWithHttpInfo($page_token = null, string $contentType = self::contentTypes['listAllowedGroups'][0])
    {
        $request = $this->listAllowedGroupsRequest($page_token, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                $jsonResponse = json_decode($e->getResponse()->getBody());
                if ($jsonResponse->name === 'InvalidJwtTokenError') {
                    $issue = $jsonResponse->details[0]->issue;
                    throw new InvalidJwtTokenError($issue, $jsonResponse->traceId);
                }

                if ($jsonResponse->name === 'NotFoundError') {
                    throw new NotFoundError($jsonResponse->message, $jsonResponse->traceId);
                }

                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 200:
                    if ('\AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNames' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNames' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNames', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            $returnType = '\AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNames';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNames',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listAllowedGroupsAsync
     *
     * @param  string|null $page_token (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAllowedGroups'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAllowedGroupsAsync($page_token = null, string $contentType = self::contentTypes['listAllowedGroups'][0])
    {
        return $this->listAllowedGroupsAsyncWithHttpInfo($page_token, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listAllowedGroupsAsyncWithHttpInfo
     *
     * @param  string|null $page_token (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAllowedGroups'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAllowedGroupsAsyncWithHttpInfo($page_token = null, string $contentType = self::contentTypes['listAllowedGroups'][0])
    {
        $returnType = '\AffinidiTdk\Clients\LoginConfigurationClient\Model\GroupNames';
        $request = $this->listAllowedGroupsRequest($page_token, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'listAllowedGroups'
     *
     * @param  string|null $page_token (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAllowedGroups'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listAllowedGroupsRequest($page_token = null, string $contentType = self::contentTypes['listAllowedGroups'][0])
    {



        $resourcePath = '/v1/allow-list/groups';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page_token,
            'pageToken', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('authorization');
        if ($apiKey !== null) {
            $headers['authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
