<?php
/**
 * DefaultApi
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

namespace AffinidiTdk\Clients\Iota\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use AffinidiTdk\Clients\Iota\ApiException;
use AffinidiTdk\Clients\Iota\Configuration;
use AffinidiTdk\Clients\Iota\HeaderSelector;
use AffinidiTdk\Clients\Iota\ObjectSerializer;

/**
 * DefaultApi Class Doc Comment
 *
 * @category Class
 * @package  AffinidiTdk\Clients\Iota
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class DefaultApi
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
        'listLoggedConsents' => [
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
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
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
     * Operation listLoggedConsents
     *
     * @param  string $configuration_id configuration_id (optional)
     * @param  string $user_id user_id (optional)
     * @param  int $limit The maximum number of records to fetch from the list of logged consents. (optional)
     * @param  string $exclusive_start_key The base64url encoded key of the first item that this operation will evaluate (it is not returned). Use the value that was returned in the previous operation. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listLoggedConsents'] to see the possible values for this operation
     *
     * @throws \AffinidiTdk\Clients\Iota\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \AffinidiTdk\Clients\Iota\Model\ListLoggedConsentsOK|\AffinidiTdk\Clients\Iota\Model\InvalidParameterError|\AffinidiTdk\Clients\Iota\Model\OperationForbiddenError
     */
    public function listLoggedConsents($configuration_id = null, $user_id = null, $limit = null, $exclusive_start_key = null, string $contentType = self::contentTypes['listLoggedConsents'][0])
    {
        list($response) = $this->listLoggedConsentsWithHttpInfo($configuration_id, $user_id, $limit, $exclusive_start_key, $contentType);
        return $response;
    }

    /**
     * Operation listLoggedConsentsWithHttpInfo
     *
     * @param  string $configuration_id (optional)
     * @param  string $user_id (optional)
     * @param  int $limit The maximum number of records to fetch from the list of logged consents. (optional)
     * @param  string $exclusive_start_key The base64url encoded key of the first item that this operation will evaluate (it is not returned). Use the value that was returned in the previous operation. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listLoggedConsents'] to see the possible values for this operation
     *
     * @throws \AffinidiTdk\Clients\Iota\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \AffinidiTdk\Clients\Iota\Model\ListLoggedConsentsOK|\AffinidiTdk\Clients\Iota\Model\InvalidParameterError|\AffinidiTdk\Clients\Iota\Model\OperationForbiddenError, HTTP status code, HTTP response headers (array of strings)
     */
    public function listLoggedConsentsWithHttpInfo($configuration_id = null, $user_id = null, $limit = null, $exclusive_start_key = null, string $contentType = self::contentTypes['listLoggedConsents'][0])
    {
        $request = $this->listLoggedConsentsRequest($configuration_id, $user_id, $limit, $exclusive_start_key, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
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
                    if ('\AffinidiTdk\Clients\Iota\Model\ListLoggedConsentsOK' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\AffinidiTdk\Clients\Iota\Model\ListLoggedConsentsOK' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\AffinidiTdk\Clients\Iota\Model\ListLoggedConsentsOK', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\AffinidiTdk\Clients\Iota\Model\InvalidParameterError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\AffinidiTdk\Clients\Iota\Model\InvalidParameterError' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\AffinidiTdk\Clients\Iota\Model\InvalidParameterError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\AffinidiTdk\Clients\Iota\Model\OperationForbiddenError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\AffinidiTdk\Clients\Iota\Model\OperationForbiddenError' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\AffinidiTdk\Clients\Iota\Model\OperationForbiddenError', []),
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

            $returnType = '\AffinidiTdk\Clients\Iota\Model\ListLoggedConsentsOK';
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
                        '\AffinidiTdk\Clients\Iota\Model\ListLoggedConsentsOK',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\AffinidiTdk\Clients\Iota\Model\InvalidParameterError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\AffinidiTdk\Clients\Iota\Model\OperationForbiddenError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listLoggedConsentsAsync
     *
     * @param  string $configuration_id (optional)
     * @param  string $user_id (optional)
     * @param  int $limit The maximum number of records to fetch from the list of logged consents. (optional)
     * @param  string $exclusive_start_key The base64url encoded key of the first item that this operation will evaluate (it is not returned). Use the value that was returned in the previous operation. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listLoggedConsents'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listLoggedConsentsAsync($configuration_id = null, $user_id = null, $limit = null, $exclusive_start_key = null, string $contentType = self::contentTypes['listLoggedConsents'][0])
    {
        return $this->listLoggedConsentsAsyncWithHttpInfo($configuration_id, $user_id, $limit, $exclusive_start_key, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listLoggedConsentsAsyncWithHttpInfo
     *
     * @param  string $configuration_id (optional)
     * @param  string $user_id (optional)
     * @param  int $limit The maximum number of records to fetch from the list of logged consents. (optional)
     * @param  string $exclusive_start_key The base64url encoded key of the first item that this operation will evaluate (it is not returned). Use the value that was returned in the previous operation. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listLoggedConsents'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listLoggedConsentsAsyncWithHttpInfo($configuration_id = null, $user_id = null, $limit = null, $exclusive_start_key = null, string $contentType = self::contentTypes['listLoggedConsents'][0])
    {
        $returnType = '\AffinidiTdk\Clients\Iota\Model\ListLoggedConsentsOK';
        $request = $this->listLoggedConsentsRequest($configuration_id, $user_id, $limit, $exclusive_start_key, $contentType);

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
     * Create request for operation 'listLoggedConsents'
     *
     * @param  string $configuration_id (optional)
     * @param  string $user_id (optional)
     * @param  int $limit The maximum number of records to fetch from the list of logged consents. (optional)
     * @param  string $exclusive_start_key The base64url encoded key of the first item that this operation will evaluate (it is not returned). Use the value that was returned in the previous operation. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listLoggedConsents'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listLoggedConsentsRequest($configuration_id = null, $user_id = null, $limit = null, $exclusive_start_key = null, string $contentType = self::contentTypes['listLoggedConsents'][0])
    {



        if ($limit !== null && $limit > 100) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling DefaultApi.listLoggedConsents, must be smaller than or equal to 100.');
        }
        if ($limit !== null && $limit < 1) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling DefaultApi.listLoggedConsents, must be bigger than or equal to 1.');
        }
        
        if ($exclusive_start_key !== null && strlen($exclusive_start_key) > 3000) {
            throw new \InvalidArgumentException('invalid length for "$exclusive_start_key" when calling DefaultApi.listLoggedConsents, must be smaller than or equal to 3000.');
        }
        

        $resourcePath = '/v1/logged-consents';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $configuration_id,
            'configurationId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $user_id,
            'userId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $limit,
            'limit', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $exclusive_start_key,
            'exclusiveStartKey', // param base name
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
