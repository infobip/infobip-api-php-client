<?php

// phpcs:ignorefile

/**
 * VoiceApi
 * PHP version 8.0
 *
 * @category Class
 * @package  Infobip
 * @author   Infobip Support
 * @link     https://www.infobip.com
 */

declare(strict_types=1);

/**
 * Infobip Client API Libraries OpenAPI Specification
 *
 * OpenAPI specification containing public endpoints supported in client API libraries.
 *
 * Contact: support@infobip.com
 *
 * This class is auto generated from the Infobip OpenAPI specification through the OpenAPI Specification Client API libraries (Re)Generator (OSCAR), powered by the OpenAPI Generator (https://openapi-generator.tech).
 *
 * Do not edit manually. To learn how to raise an issue, see the CONTRIBUTING guide or contact us @ support@infobip.com.
 */

namespace Infobip\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Utils;
use Infobip\ApiException;
use Infobip\Configuration;
use Infobip\DeprecationChecker;
use Infobip\ObjectSerializer;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Symfony\Component\Validator\Constraints as Assert;

final class VoiceApi
{
    use ApiTrait;

    private Configuration $config;
    private ClientInterface $client;
    private ObjectSerializer $objectSerializer;
    private LoggerInterface $logger;
    private DeprecationChecker $deprecationChecker;

    /**
     * @param Configuration $config - Client configuration
     * @param ClientInterface|null $client - (Optional) The HTTP client with Guzzle as default
     * @param ObjectSerializer|null $objectSerializer - (Optional) The object serializer
     * @param LoggerInterface|null $logger - (Optional) The logger used for API deprecations
     * @param DeprecationChecker|null $deprecationChecker (Optional) API deprecation checker that will log deprecations
     */
    public function __construct(
        Configuration $config,
        ?ClientInterface $client = null,
        ?ObjectSerializer $objectSerializer = null,
        ?LoggerInterface $logger = null,
        ?DeprecationChecker $deprecationChecker = null
    ) {
        $this->config = $config;
        $this->client = $client ?: new Client();
        $this->objectSerializer = $objectSerializer ?: new ObjectSerializer();
        $this->logger = $logger ?: new NullLogger();
        $this->deprecationChecker = $deprecationChecker ?: new DeprecationChecker($this->logger);
    }

    /**
     * Operation getSentBulks
     *
     * Get sent bulks
     *
     * @param string $bulkId Unique ID of the bulk. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\CallsBulkResponse
     */
    public function getSentBulks(string $bulkId)
    {
        $request = $this->getSentBulksRequest($bulkId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getSentBulksResponse($response, $request->getUri());
            } catch (GuzzleException $exception) {
                $errorResponse = ($exception instanceof RequestException) ? $exception->getResponse() : null;

                throw new ApiException(
                    "[{$exception->getCode()}] {$exception->getMessage()}",
                    $exception->getCode(),
                    $errorResponse?->getHeaders(),
                    ($errorResponse !== null) ? (string)$errorResponse->getBody() : null
                );
            }
        } catch (ApiException $exception) {
            throw $this->getSentBulksApiException($exception);
        }
    }

    /**
     * Operation getSentBulksAsync
     *
     * Get sent bulks
     *
     * @param string $bulkId Unique ID of the bulk. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getSentBulksAsync(string $bulkId): PromiseInterface
    {
        $request = $this->getSentBulksRequest($bulkId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getSentBulksResponse($response, $request->getUri());
                },
                function (GuzzleException $exception) {
                    $statusCode = $exception->getCode();

                    $response = ($exception instanceof RequestException) ? $exception->getResponse() : null;

                    $exception = new ApiException(
                        "[{$statusCode}] {$exception->getMessage()}",
                        $statusCode,
                        $response?->getHeaders(),
                        ($response !== null) ? (string)$response->getBody() : null
                    );

                    throw $this->getSentBulksApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getSentBulks'
     *
     * @param string $bulkId Unique ID of the bulk. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getSentBulksRequest(string $bulkId): Request
    {
        $allData = [
             'bulkId' => $bulkId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'bulkId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/tts/3/bulks';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($bulkId !== null) {
            $queryParams['bulkId'] = $bulkId;
        }

        $headers = [
            'Accept' => 'application/json',

        ];

        // for model (json/xml)
        if (count($formParams) > 0) {
            $formParams = \json_decode($this->objectSerializer->serialize($formParams), true);

            if ($headers['Content-Type'] === 'multipart/form-data') {
                $boundary = '----' . hash('sha256', uniqid('', true));
                $headers['Content-Type'] .= '; boundary=' . $boundary;
                $multipartContents = [];

                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = (\is_array($formParamValue)) ? $formParamValue : [$formParamValue];

                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }

                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents, $boundary);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = $this->objectSerializer->serialize($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        $apiKey = $this->config->getApiKey();

        if ($apiKey !== null) {
            $headers[$this->config->getApiKeyHeader()] = $apiKey;
        }

        $defaultHeaders = [];

        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = \array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        foreach ($queryParams as $key => $value) {
            if (\is_array($value)) {
                continue;
            }

            $queryParams[$key] = $this->objectSerializer->toString($value);
        }

        $query = Query::build($queryParams);

        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'getSentBulks'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\CallsBulkResponse|null
     */
    private function getSentBulksResponse(ResponseInterface $response, UriInterface $requestUri): mixed
    {
        $statusCode = $response->getStatusCode();
        $responseBody = $response->getBody();
        $responseHeaders = $response->getHeaders();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf('[%d] API Error (%s)', $statusCode, $requestUri),
                $statusCode,
                $responseHeaders,
                $responseBody
            );
        }

        $responseResult = null;

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsBulkResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getSentBulks'
     */
    private function getSentBulksApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode >= 400 && $statusCode <= 499) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode >= 500 && $statusCode <= 599) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        $data = $this->objectSerializer->deserialize(
            $apiException->getResponseBody(),
            '\Infobip\Model\CallsBulkResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation getSentBulksStatus
     *
     * Get sent bulk's status
     *
     * @param string $bulkId Unique ID of the bulk. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\CallsBulkStatusResponse
     */
    public function getSentBulksStatus(string $bulkId)
    {
        $request = $this->getSentBulksStatusRequest($bulkId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getSentBulksStatusResponse($response, $request->getUri());
            } catch (GuzzleException $exception) {
                $errorResponse = ($exception instanceof RequestException) ? $exception->getResponse() : null;

                throw new ApiException(
                    "[{$exception->getCode()}] {$exception->getMessage()}",
                    $exception->getCode(),
                    $errorResponse?->getHeaders(),
                    ($errorResponse !== null) ? (string)$errorResponse->getBody() : null
                );
            }
        } catch (ApiException $exception) {
            throw $this->getSentBulksStatusApiException($exception);
        }
    }

    /**
     * Operation getSentBulksStatusAsync
     *
     * Get sent bulk's status
     *
     * @param string $bulkId Unique ID of the bulk. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getSentBulksStatusAsync(string $bulkId): PromiseInterface
    {
        $request = $this->getSentBulksStatusRequest($bulkId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getSentBulksStatusResponse($response, $request->getUri());
                },
                function (GuzzleException $exception) {
                    $statusCode = $exception->getCode();

                    $response = ($exception instanceof RequestException) ? $exception->getResponse() : null;

                    $exception = new ApiException(
                        "[{$statusCode}] {$exception->getMessage()}",
                        $statusCode,
                        $response?->getHeaders(),
                        ($response !== null) ? (string)$response->getBody() : null
                    );

                    throw $this->getSentBulksStatusApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getSentBulksStatus'
     *
     * @param string $bulkId Unique ID of the bulk. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getSentBulksStatusRequest(string $bulkId): Request
    {
        $allData = [
             'bulkId' => $bulkId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'bulkId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/tts/3/bulks/status';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($bulkId !== null) {
            $queryParams['bulkId'] = $bulkId;
        }

        $headers = [
            'Accept' => 'application/json',

        ];

        // for model (json/xml)
        if (count($formParams) > 0) {
            $formParams = \json_decode($this->objectSerializer->serialize($formParams), true);

            if ($headers['Content-Type'] === 'multipart/form-data') {
                $boundary = '----' . hash('sha256', uniqid('', true));
                $headers['Content-Type'] .= '; boundary=' . $boundary;
                $multipartContents = [];

                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = (\is_array($formParamValue)) ? $formParamValue : [$formParamValue];

                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }

                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents, $boundary);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = $this->objectSerializer->serialize($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        $apiKey = $this->config->getApiKey();

        if ($apiKey !== null) {
            $headers[$this->config->getApiKeyHeader()] = $apiKey;
        }

        $defaultHeaders = [];

        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = \array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        foreach ($queryParams as $key => $value) {
            if (\is_array($value)) {
                continue;
            }

            $queryParams[$key] = $this->objectSerializer->toString($value);
        }

        $query = Query::build($queryParams);

        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'getSentBulksStatus'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\CallsBulkStatusResponse|null
     */
    private function getSentBulksStatusResponse(ResponseInterface $response, UriInterface $requestUri): mixed
    {
        $statusCode = $response->getStatusCode();
        $responseBody = $response->getBody();
        $responseHeaders = $response->getHeaders();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf('[%d] API Error (%s)', $statusCode, $requestUri),
                $statusCode,
                $responseHeaders,
                $responseBody
            );
        }

        $responseResult = null;

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsBulkStatusResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getSentBulksStatus'
     */
    private function getSentBulksStatusApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode >= 400 && $statusCode <= 499) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode >= 500 && $statusCode <= 599) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        $data = $this->objectSerializer->deserialize(
            $apiException->getResponseBody(),
            '\Infobip\Model\CallsBulkStatusResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation getVoices
     *
     * Get Voices
     *
     * @param string $language Represents the language abbreviation. (e.g. &#x60;en&#x60;). You can find the list of supported languages in corresponding section for sending voice message. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\CallsGetVoicesResponse
     */
    public function getVoices(string $language)
    {
        $request = $this->getVoicesRequest($language);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getVoicesResponse($response, $request->getUri());
            } catch (GuzzleException $exception) {
                $errorResponse = ($exception instanceof RequestException) ? $exception->getResponse() : null;

                throw new ApiException(
                    "[{$exception->getCode()}] {$exception->getMessage()}",
                    $exception->getCode(),
                    $errorResponse?->getHeaders(),
                    ($errorResponse !== null) ? (string)$errorResponse->getBody() : null
                );
            }
        } catch (ApiException $exception) {
            throw $this->getVoicesApiException($exception);
        }
    }

    /**
     * Operation getVoicesAsync
     *
     * Get Voices
     *
     * @param string $language Represents the language abbreviation. (e.g. &#x60;en&#x60;). You can find the list of supported languages in corresponding section for sending voice message. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getVoicesAsync(string $language): PromiseInterface
    {
        $request = $this->getVoicesRequest($language);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getVoicesResponse($response, $request->getUri());
                },
                function (GuzzleException $exception) {
                    $statusCode = $exception->getCode();

                    $response = ($exception instanceof RequestException) ? $exception->getResponse() : null;

                    $exception = new ApiException(
                        "[{$statusCode}] {$exception->getMessage()}",
                        $statusCode,
                        $response?->getHeaders(),
                        ($response !== null) ? (string)$response->getBody() : null
                    );

                    throw $this->getVoicesApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getVoices'
     *
     * @param string $language Represents the language abbreviation. (e.g. &#x60;en&#x60;). You can find the list of supported languages in corresponding section for sending voice message. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getVoicesRequest(string $language): Request
    {
        $allData = [
             'language' => $language,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'language' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/tts/3/voices/{language}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($language !== null) {
            $resourcePath = str_replace(
                '{' . 'language' . '}',
                $this->objectSerializer->toPathValue($language),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',

        ];

        // for model (json/xml)
        if (count($formParams) > 0) {
            $formParams = \json_decode($this->objectSerializer->serialize($formParams), true);

            if ($headers['Content-Type'] === 'multipart/form-data') {
                $boundary = '----' . hash('sha256', uniqid('', true));
                $headers['Content-Type'] .= '; boundary=' . $boundary;
                $multipartContents = [];

                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = (\is_array($formParamValue)) ? $formParamValue : [$formParamValue];

                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }

                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents, $boundary);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = $this->objectSerializer->serialize($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        $apiKey = $this->config->getApiKey();

        if ($apiKey !== null) {
            $headers[$this->config->getApiKeyHeader()] = $apiKey;
        }

        $defaultHeaders = [];

        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = \array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        foreach ($queryParams as $key => $value) {
            if (\is_array($value)) {
                continue;
            }

            $queryParams[$key] = $this->objectSerializer->toString($value);
        }

        $query = Query::build($queryParams);

        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'getVoices'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\CallsGetVoicesResponse|null
     */
    private function getVoicesResponse(ResponseInterface $response, UriInterface $requestUri): mixed
    {
        $statusCode = $response->getStatusCode();
        $responseBody = $response->getBody();
        $responseHeaders = $response->getHeaders();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf('[%d] API Error (%s)', $statusCode, $requestUri),
                $statusCode,
                $responseHeaders,
                $responseBody
            );
        }

        $responseResult = null;

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsGetVoicesResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getVoices'
     */
    private function getVoicesApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode >= 400 && $statusCode <= 499) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode >= 500 && $statusCode <= 599) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        $data = $this->objectSerializer->deserialize(
            $apiException->getResponseBody(),
            '\Infobip\Model\CallsGetVoicesResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation manageSentBulksStatus
     *
     * Manage sent bulk's status
     *
     * @param string $bulkId Unique ID of the bulk. (required)
     * @param \Infobip\Model\CallsUpdateStatusRequest $callsUpdateStatusRequest callsUpdateStatusRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\CallsBulkStatusResponse
     */
    public function manageSentBulksStatus(string $bulkId, \Infobip\Model\CallsUpdateStatusRequest $callsUpdateStatusRequest)
    {
        $request = $this->manageSentBulksStatusRequest($bulkId, $callsUpdateStatusRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->manageSentBulksStatusResponse($response, $request->getUri());
            } catch (GuzzleException $exception) {
                $errorResponse = ($exception instanceof RequestException) ? $exception->getResponse() : null;

                throw new ApiException(
                    "[{$exception->getCode()}] {$exception->getMessage()}",
                    $exception->getCode(),
                    $errorResponse?->getHeaders(),
                    ($errorResponse !== null) ? (string)$errorResponse->getBody() : null
                );
            }
        } catch (ApiException $exception) {
            throw $this->manageSentBulksStatusApiException($exception);
        }
    }

    /**
     * Operation manageSentBulksStatusAsync
     *
     * Manage sent bulk's status
     *
     * @param string $bulkId Unique ID of the bulk. (required)
     * @param \Infobip\Model\CallsUpdateStatusRequest $callsUpdateStatusRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function manageSentBulksStatusAsync(string $bulkId, \Infobip\Model\CallsUpdateStatusRequest $callsUpdateStatusRequest): PromiseInterface
    {
        $request = $this->manageSentBulksStatusRequest($bulkId, $callsUpdateStatusRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->manageSentBulksStatusResponse($response, $request->getUri());
                },
                function (GuzzleException $exception) {
                    $statusCode = $exception->getCode();

                    $response = ($exception instanceof RequestException) ? $exception->getResponse() : null;

                    $exception = new ApiException(
                        "[{$statusCode}] {$exception->getMessage()}",
                        $statusCode,
                        $response?->getHeaders(),
                        ($response !== null) ? (string)$response->getBody() : null
                    );

                    throw $this->manageSentBulksStatusApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'manageSentBulksStatus'
     *
     * @param string $bulkId Unique ID of the bulk. (required)
     * @param \Infobip\Model\CallsUpdateStatusRequest $callsUpdateStatusRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function manageSentBulksStatusRequest(string $bulkId, \Infobip\Model\CallsUpdateStatusRequest $callsUpdateStatusRequest): Request
    {
        $allData = [
             'bulkId' => $bulkId,
             'callsUpdateStatusRequest' => $callsUpdateStatusRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'bulkId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsUpdateStatusRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/tts/3/bulks/status';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($bulkId !== null) {
            $queryParams['bulkId'] = $bulkId;
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsUpdateStatusRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsUpdateStatusRequest)
                : $callsUpdateStatusRequest;
        } elseif (count($formParams) > 0) {
            $formParams = \json_decode($this->objectSerializer->serialize($formParams), true);

            if ($headers['Content-Type'] === 'multipart/form-data') {
                $boundary = '----' . hash('sha256', uniqid('', true));
                $headers['Content-Type'] .= '; boundary=' . $boundary;
                $multipartContents = [];

                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = (\is_array($formParamValue)) ? $formParamValue : [$formParamValue];

                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }

                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents, $boundary);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = $this->objectSerializer->serialize($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        $apiKey = $this->config->getApiKey();

        if ($apiKey !== null) {
            $headers[$this->config->getApiKeyHeader()] = $apiKey;
        }

        $defaultHeaders = [];

        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = \array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        foreach ($queryParams as $key => $value) {
            if (\is_array($value)) {
                continue;
            }

            $queryParams[$key] = $this->objectSerializer->toString($value);
        }

        $query = Query::build($queryParams);

        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'manageSentBulksStatus'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\CallsBulkStatusResponse|null
     */
    private function manageSentBulksStatusResponse(ResponseInterface $response, UriInterface $requestUri): mixed
    {
        $statusCode = $response->getStatusCode();
        $responseBody = $response->getBody();
        $responseHeaders = $response->getHeaders();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf('[%d] API Error (%s)', $statusCode, $requestUri),
                $statusCode,
                $responseHeaders,
                $responseBody
            );
        }

        $responseResult = null;

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsBulkStatusResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'manageSentBulksStatus'
     */
    private function manageSentBulksStatusApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode >= 400 && $statusCode <= 499) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode >= 500 && $statusCode <= 599) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        $data = $this->objectSerializer->deserialize(
            $apiException->getResponseBody(),
            '\Infobip\Model\CallsBulkStatusResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation rescheduleSentBulk
     *
     * Reschedule sent bulk
     *
     * @param string $bulkId Unique ID of the bulk. (required)
     * @param \Infobip\Model\CallsBulkRequest $callsBulkRequest callsBulkRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\CallsBulkResponse
     */
    public function rescheduleSentBulk(string $bulkId, \Infobip\Model\CallsBulkRequest $callsBulkRequest)
    {
        $request = $this->rescheduleSentBulkRequest($bulkId, $callsBulkRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->rescheduleSentBulkResponse($response, $request->getUri());
            } catch (GuzzleException $exception) {
                $errorResponse = ($exception instanceof RequestException) ? $exception->getResponse() : null;

                throw new ApiException(
                    "[{$exception->getCode()}] {$exception->getMessage()}",
                    $exception->getCode(),
                    $errorResponse?->getHeaders(),
                    ($errorResponse !== null) ? (string)$errorResponse->getBody() : null
                );
            }
        } catch (ApiException $exception) {
            throw $this->rescheduleSentBulkApiException($exception);
        }
    }

    /**
     * Operation rescheduleSentBulkAsync
     *
     * Reschedule sent bulk
     *
     * @param string $bulkId Unique ID of the bulk. (required)
     * @param \Infobip\Model\CallsBulkRequest $callsBulkRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function rescheduleSentBulkAsync(string $bulkId, \Infobip\Model\CallsBulkRequest $callsBulkRequest): PromiseInterface
    {
        $request = $this->rescheduleSentBulkRequest($bulkId, $callsBulkRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->rescheduleSentBulkResponse($response, $request->getUri());
                },
                function (GuzzleException $exception) {
                    $statusCode = $exception->getCode();

                    $response = ($exception instanceof RequestException) ? $exception->getResponse() : null;

                    $exception = new ApiException(
                        "[{$statusCode}] {$exception->getMessage()}",
                        $statusCode,
                        $response?->getHeaders(),
                        ($response !== null) ? (string)$response->getBody() : null
                    );

                    throw $this->rescheduleSentBulkApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'rescheduleSentBulk'
     *
     * @param string $bulkId Unique ID of the bulk. (required)
     * @param \Infobip\Model\CallsBulkRequest $callsBulkRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function rescheduleSentBulkRequest(string $bulkId, \Infobip\Model\CallsBulkRequest $callsBulkRequest): Request
    {
        $allData = [
             'bulkId' => $bulkId,
             'callsBulkRequest' => $callsBulkRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'bulkId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsBulkRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/tts/3/bulks';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($bulkId !== null) {
            $queryParams['bulkId'] = $bulkId;
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsBulkRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsBulkRequest)
                : $callsBulkRequest;
        } elseif (count($formParams) > 0) {
            $formParams = \json_decode($this->objectSerializer->serialize($formParams), true);

            if ($headers['Content-Type'] === 'multipart/form-data') {
                $boundary = '----' . hash('sha256', uniqid('', true));
                $headers['Content-Type'] .= '; boundary=' . $boundary;
                $multipartContents = [];

                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = (\is_array($formParamValue)) ? $formParamValue : [$formParamValue];

                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }

                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents, $boundary);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = $this->objectSerializer->serialize($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        $apiKey = $this->config->getApiKey();

        if ($apiKey !== null) {
            $headers[$this->config->getApiKeyHeader()] = $apiKey;
        }

        $defaultHeaders = [];

        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = \array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        foreach ($queryParams as $key => $value) {
            if (\is_array($value)) {
                continue;
            }

            $queryParams[$key] = $this->objectSerializer->toString($value);
        }

        $query = Query::build($queryParams);

        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'rescheduleSentBulk'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\CallsBulkResponse|null
     */
    private function rescheduleSentBulkResponse(ResponseInterface $response, UriInterface $requestUri): mixed
    {
        $statusCode = $response->getStatusCode();
        $responseBody = $response->getBody();
        $responseHeaders = $response->getHeaders();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf('[%d] API Error (%s)', $statusCode, $requestUri),
                $statusCode,
                $responseHeaders,
                $responseBody
            );
        }

        $responseResult = null;

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsBulkResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'rescheduleSentBulk'
     */
    private function rescheduleSentBulkApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode >= 400 && $statusCode <= 499) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode >= 500 && $statusCode <= 599) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        $data = $this->objectSerializer->deserialize(
            $apiException->getResponseBody(),
            '\Infobip\Model\CallsBulkResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation sendAdvancedVoiceTts
     *
     * Send advanced voice message
     *
     * @param \Infobip\Model\CallsAdvancedBody $callsAdvancedBody callsAdvancedBody (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\CallsVoiceResponse
     */
    public function sendAdvancedVoiceTts(\Infobip\Model\CallsAdvancedBody $callsAdvancedBody)
    {
        $request = $this->sendAdvancedVoiceTtsRequest($callsAdvancedBody);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendAdvancedVoiceTtsResponse($response, $request->getUri());
            } catch (GuzzleException $exception) {
                $errorResponse = ($exception instanceof RequestException) ? $exception->getResponse() : null;

                throw new ApiException(
                    "[{$exception->getCode()}] {$exception->getMessage()}",
                    $exception->getCode(),
                    $errorResponse?->getHeaders(),
                    ($errorResponse !== null) ? (string)$errorResponse->getBody() : null
                );
            }
        } catch (ApiException $exception) {
            throw $this->sendAdvancedVoiceTtsApiException($exception);
        }
    }

    /**
     * Operation sendAdvancedVoiceTtsAsync
     *
     * Send advanced voice message
     *
     * @param \Infobip\Model\CallsAdvancedBody $callsAdvancedBody (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendAdvancedVoiceTtsAsync(\Infobip\Model\CallsAdvancedBody $callsAdvancedBody): PromiseInterface
    {
        $request = $this->sendAdvancedVoiceTtsRequest($callsAdvancedBody);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendAdvancedVoiceTtsResponse($response, $request->getUri());
                },
                function (GuzzleException $exception) {
                    $statusCode = $exception->getCode();

                    $response = ($exception instanceof RequestException) ? $exception->getResponse() : null;

                    $exception = new ApiException(
                        "[{$statusCode}] {$exception->getMessage()}",
                        $statusCode,
                        $response?->getHeaders(),
                        ($response !== null) ? (string)$response->getBody() : null
                    );

                    throw $this->sendAdvancedVoiceTtsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendAdvancedVoiceTts'
     *
     * @param \Infobip\Model\CallsAdvancedBody $callsAdvancedBody (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendAdvancedVoiceTtsRequest(\Infobip\Model\CallsAdvancedBody $callsAdvancedBody): Request
    {
        $allData = [
             'callsAdvancedBody' => $callsAdvancedBody,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callsAdvancedBody' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/tts/3/advanced';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsAdvancedBody)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsAdvancedBody)
                : $callsAdvancedBody;
        } elseif (count($formParams) > 0) {
            $formParams = \json_decode($this->objectSerializer->serialize($formParams), true);

            if ($headers['Content-Type'] === 'multipart/form-data') {
                $boundary = '----' . hash('sha256', uniqid('', true));
                $headers['Content-Type'] .= '; boundary=' . $boundary;
                $multipartContents = [];

                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = (\is_array($formParamValue)) ? $formParamValue : [$formParamValue];

                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }

                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents, $boundary);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = $this->objectSerializer->serialize($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        $apiKey = $this->config->getApiKey();

        if ($apiKey !== null) {
            $headers[$this->config->getApiKeyHeader()] = $apiKey;
        }

        $defaultHeaders = [];

        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = \array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        foreach ($queryParams as $key => $value) {
            if (\is_array($value)) {
                continue;
            }

            $queryParams[$key] = $this->objectSerializer->toString($value);
        }

        $query = Query::build($queryParams);

        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'sendAdvancedVoiceTts'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\CallsVoiceResponse|null
     */
    private function sendAdvancedVoiceTtsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
    {
        $statusCode = $response->getStatusCode();
        $responseBody = $response->getBody();
        $responseHeaders = $response->getHeaders();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf('[%d] API Error (%s)', $statusCode, $requestUri),
                $statusCode,
                $responseHeaders,
                $responseBody
            );
        }

        $responseResult = null;

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsVoiceResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendAdvancedVoiceTts'
     */
    private function sendAdvancedVoiceTtsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode >= 400 && $statusCode <= 499) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode >= 500 && $statusCode <= 599) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        $data = $this->objectSerializer->deserialize(
            $apiException->getResponseBody(),
            '\Infobip\Model\CallsVoiceResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation sendMultipleVoiceTts
     *
     * Send multiple voice messages
     *
     * @param \Infobip\Model\CallsMultiBody $callsMultiBody callsMultiBody (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\CallsVoiceResponse
     */
    public function sendMultipleVoiceTts(\Infobip\Model\CallsMultiBody $callsMultiBody)
    {
        $request = $this->sendMultipleVoiceTtsRequest($callsMultiBody);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendMultipleVoiceTtsResponse($response, $request->getUri());
            } catch (GuzzleException $exception) {
                $errorResponse = ($exception instanceof RequestException) ? $exception->getResponse() : null;

                throw new ApiException(
                    "[{$exception->getCode()}] {$exception->getMessage()}",
                    $exception->getCode(),
                    $errorResponse?->getHeaders(),
                    ($errorResponse !== null) ? (string)$errorResponse->getBody() : null
                );
            }
        } catch (ApiException $exception) {
            throw $this->sendMultipleVoiceTtsApiException($exception);
        }
    }

    /**
     * Operation sendMultipleVoiceTtsAsync
     *
     * Send multiple voice messages
     *
     * @param \Infobip\Model\CallsMultiBody $callsMultiBody (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendMultipleVoiceTtsAsync(\Infobip\Model\CallsMultiBody $callsMultiBody): PromiseInterface
    {
        $request = $this->sendMultipleVoiceTtsRequest($callsMultiBody);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendMultipleVoiceTtsResponse($response, $request->getUri());
                },
                function (GuzzleException $exception) {
                    $statusCode = $exception->getCode();

                    $response = ($exception instanceof RequestException) ? $exception->getResponse() : null;

                    $exception = new ApiException(
                        "[{$statusCode}] {$exception->getMessage()}",
                        $statusCode,
                        $response?->getHeaders(),
                        ($response !== null) ? (string)$response->getBody() : null
                    );

                    throw $this->sendMultipleVoiceTtsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendMultipleVoiceTts'
     *
     * @param \Infobip\Model\CallsMultiBody $callsMultiBody (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendMultipleVoiceTtsRequest(\Infobip\Model\CallsMultiBody $callsMultiBody): Request
    {
        $allData = [
             'callsMultiBody' => $callsMultiBody,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callsMultiBody' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/tts/3/multi';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsMultiBody)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsMultiBody)
                : $callsMultiBody;
        } elseif (count($formParams) > 0) {
            $formParams = \json_decode($this->objectSerializer->serialize($formParams), true);

            if ($headers['Content-Type'] === 'multipart/form-data') {
                $boundary = '----' . hash('sha256', uniqid('', true));
                $headers['Content-Type'] .= '; boundary=' . $boundary;
                $multipartContents = [];

                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = (\is_array($formParamValue)) ? $formParamValue : [$formParamValue];

                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }

                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents, $boundary);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = $this->objectSerializer->serialize($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        $apiKey = $this->config->getApiKey();

        if ($apiKey !== null) {
            $headers[$this->config->getApiKeyHeader()] = $apiKey;
        }

        $defaultHeaders = [];

        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = \array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        foreach ($queryParams as $key => $value) {
            if (\is_array($value)) {
                continue;
            }

            $queryParams[$key] = $this->objectSerializer->toString($value);
        }

        $query = Query::build($queryParams);

        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'sendMultipleVoiceTts'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\CallsVoiceResponse|null
     */
    private function sendMultipleVoiceTtsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
    {
        $statusCode = $response->getStatusCode();
        $responseBody = $response->getBody();
        $responseHeaders = $response->getHeaders();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf('[%d] API Error (%s)', $statusCode, $requestUri),
                $statusCode,
                $responseHeaders,
                $responseBody
            );
        }

        $responseResult = null;

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsVoiceResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendMultipleVoiceTts'
     */
    private function sendMultipleVoiceTtsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode >= 400 && $statusCode <= 499) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode >= 500 && $statusCode <= 599) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        $data = $this->objectSerializer->deserialize(
            $apiException->getResponseBody(),
            '\Infobip\Model\CallsVoiceResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation sendSingleVoiceTts
     *
     * Send single voice message
     *
     * @param \Infobip\Model\CallsSingleBody $callsSingleBody callsSingleBody (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\CallsVoiceResponse
     */
    public function sendSingleVoiceTts(\Infobip\Model\CallsSingleBody $callsSingleBody)
    {
        $request = $this->sendSingleVoiceTtsRequest($callsSingleBody);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendSingleVoiceTtsResponse($response, $request->getUri());
            } catch (GuzzleException $exception) {
                $errorResponse = ($exception instanceof RequestException) ? $exception->getResponse() : null;

                throw new ApiException(
                    "[{$exception->getCode()}] {$exception->getMessage()}",
                    $exception->getCode(),
                    $errorResponse?->getHeaders(),
                    ($errorResponse !== null) ? (string)$errorResponse->getBody() : null
                );
            }
        } catch (ApiException $exception) {
            throw $this->sendSingleVoiceTtsApiException($exception);
        }
    }

    /**
     * Operation sendSingleVoiceTtsAsync
     *
     * Send single voice message
     *
     * @param \Infobip\Model\CallsSingleBody $callsSingleBody (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendSingleVoiceTtsAsync(\Infobip\Model\CallsSingleBody $callsSingleBody): PromiseInterface
    {
        $request = $this->sendSingleVoiceTtsRequest($callsSingleBody);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendSingleVoiceTtsResponse($response, $request->getUri());
                },
                function (GuzzleException $exception) {
                    $statusCode = $exception->getCode();

                    $response = ($exception instanceof RequestException) ? $exception->getResponse() : null;

                    $exception = new ApiException(
                        "[{$statusCode}] {$exception->getMessage()}",
                        $statusCode,
                        $response?->getHeaders(),
                        ($response !== null) ? (string)$response->getBody() : null
                    );

                    throw $this->sendSingleVoiceTtsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendSingleVoiceTts'
     *
     * @param \Infobip\Model\CallsSingleBody $callsSingleBody (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendSingleVoiceTtsRequest(\Infobip\Model\CallsSingleBody $callsSingleBody): Request
    {
        $allData = [
             'callsSingleBody' => $callsSingleBody,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callsSingleBody' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/tts/3/single';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsSingleBody)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsSingleBody)
                : $callsSingleBody;
        } elseif (count($formParams) > 0) {
            $formParams = \json_decode($this->objectSerializer->serialize($formParams), true);

            if ($headers['Content-Type'] === 'multipart/form-data') {
                $boundary = '----' . hash('sha256', uniqid('', true));
                $headers['Content-Type'] .= '; boundary=' . $boundary;
                $multipartContents = [];

                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = (\is_array($formParamValue)) ? $formParamValue : [$formParamValue];

                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }

                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents, $boundary);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = $this->objectSerializer->serialize($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        $apiKey = $this->config->getApiKey();

        if ($apiKey !== null) {
            $headers[$this->config->getApiKeyHeader()] = $apiKey;
        }

        $defaultHeaders = [];

        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = \array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        foreach ($queryParams as $key => $value) {
            if (\is_array($value)) {
                continue;
            }

            $queryParams[$key] = $this->objectSerializer->toString($value);
        }

        $query = Query::build($queryParams);

        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'sendSingleVoiceTts'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\CallsVoiceResponse|null
     */
    private function sendSingleVoiceTtsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
    {
        $statusCode = $response->getStatusCode();
        $responseBody = $response->getBody();
        $responseHeaders = $response->getHeaders();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf('[%d] API Error (%s)', $statusCode, $requestUri),
                $statusCode,
                $responseHeaders,
                $responseBody
            );
        }

        $responseResult = null;

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsVoiceResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendSingleVoiceTts'
     */
    private function sendSingleVoiceTtsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode >= 400 && $statusCode <= 499) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode >= 500 && $statusCode <= 599) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        $data = $this->objectSerializer->deserialize(
            $apiException->getResponseBody(),
            '\Infobip\Model\CallsVoiceResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }
}
