<?php
/**
 * OfferApi
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

namespace AffinidiTdk\Clients\CredentialIssuanceClient\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use AffinidiTdk\Clients\CredentialIssuanceClient\ApiException;
use AffinidiTdk\Clients\CredentialIssuanceClient\Configuration;
use AffinidiTdk\Clients\CredentialIssuanceClient\HeaderSelector;
use AffinidiTdk\Clients\CredentialIssuanceClient\ObjectSerializer;

/**
 * InvalidJwtTokenError
 *
 * @category Class
 * @package  AffinidiTdk\Clients\CredentialIssuanceClient
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
 * OfferApi Class Doc Comment
 *
 * @category Class
 * @package  AffinidiTdk\Clients\CredentialIssuanceClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class OfferApi
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
        'getCredentialOffer' => [
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
     * Operation getCredentialOffer
     *
     * @param  string $project_id Affinidi project id (required)
     * @param  string $issuance_id issuanceId from credential_offer_uri (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCredentialOffer'] to see the possible values for this operation
     *
     * @throws \AffinidiTdk\Clients\CredentialIssuanceClient\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \AffinidiTdk\Clients\CredentialIssuanceClient\Model\CredentialOfferResponse|\AffinidiTdk\Clients\CredentialIssuanceClient\Model\GetCredentialOffer400Response
     */
    public function getCredentialOffer($project_id, $issuance_id, string $contentType = self::contentTypes['getCredentialOffer'][0])
    {
        list($response) = $this->getCredentialOfferWithHttpInfo($project_id, $issuance_id, $contentType);
        return $response;
    }

    /**
     * Operation getCredentialOfferWithHttpInfo
     *
     * @param  string $project_id Affinidi project id (required)
     * @param  string $issuance_id issuanceId from credential_offer_uri (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCredentialOffer'] to see the possible values for this operation
     *
     * @throws \AffinidiTdk\Clients\CredentialIssuanceClient\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \AffinidiTdk\Clients\CredentialIssuanceClient\Model\CredentialOfferResponse|\AffinidiTdk\Clients\CredentialIssuanceClient\Model\GetCredentialOffer400Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function getCredentialOfferWithHttpInfo($project_id, $issuance_id, string $contentType = self::contentTypes['getCredentialOffer'][0])
    {
        $request = $this->getCredentialOfferRequest($project_id, $issuance_id, $contentType);

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
                    if ('\AffinidiTdk\Clients\CredentialIssuanceClient\Model\CredentialOfferResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\AffinidiTdk\Clients\CredentialIssuanceClient\Model\CredentialOfferResponse' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\AffinidiTdk\Clients\CredentialIssuanceClient\Model\CredentialOfferResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\AffinidiTdk\Clients\CredentialIssuanceClient\Model\GetCredentialOffer400Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\AffinidiTdk\Clients\CredentialIssuanceClient\Model\GetCredentialOffer400Response' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\AffinidiTdk\Clients\CredentialIssuanceClient\Model\GetCredentialOffer400Response', []),
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

            $returnType = '\AffinidiTdk\Clients\CredentialIssuanceClient\Model\CredentialOfferResponse';
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
                        '\AffinidiTdk\Clients\CredentialIssuanceClient\Model\CredentialOfferResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\AffinidiTdk\Clients\CredentialIssuanceClient\Model\GetCredentialOffer400Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getCredentialOfferAsync
     *
     * @param  string $project_id Affinidi project id (required)
     * @param  string $issuance_id issuanceId from credential_offer_uri (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCredentialOffer'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCredentialOfferAsync($project_id, $issuance_id, string $contentType = self::contentTypes['getCredentialOffer'][0])
    {
        return $this->getCredentialOfferAsyncWithHttpInfo($project_id, $issuance_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getCredentialOfferAsyncWithHttpInfo
     *
     * @param  string $project_id Affinidi project id (required)
     * @param  string $issuance_id issuanceId from credential_offer_uri (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCredentialOffer'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCredentialOfferAsyncWithHttpInfo($project_id, $issuance_id, string $contentType = self::contentTypes['getCredentialOffer'][0])
    {
        $returnType = '\AffinidiTdk\Clients\CredentialIssuanceClient\Model\CredentialOfferResponse';
        $request = $this->getCredentialOfferRequest($project_id, $issuance_id, $contentType);

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
     * Create request for operation 'getCredentialOffer'
     *
     * @param  string $project_id Affinidi project id (required)
     * @param  string $issuance_id issuanceId from credential_offer_uri (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCredentialOffer'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getCredentialOfferRequest($project_id, $issuance_id, string $contentType = self::contentTypes['getCredentialOffer'][0])
    {

        // verify the required parameter 'project_id' is set
        if ($project_id === null || (is_array($project_id) && count($project_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project_id when calling getCredentialOffer'
            );
        }

        // verify the required parameter 'issuance_id' is set
        if ($issuance_id === null || (is_array($issuance_id) && count($issuance_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $issuance_id when calling getCredentialOffer'
            );
        }


        $resourcePath = '/v1/{projectId}/offers/{issuanceId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($project_id !== null) {
            $resourcePath = str_replace(
                '{' . 'projectId' . '}',
                ObjectSerializer::toPathValue($project_id),
                $resourcePath
            );
        }
        // path params
        if ($issuance_id !== null) {
            $resourcePath = str_replace(
                '{' . 'issuanceId' . '}',
                ObjectSerializer::toPathValue($issuance_id),
                $resourcePath
            );
        }


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
