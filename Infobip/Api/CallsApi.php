<?php

// phpcs:ignorefile

/**
 * CallsApi
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

final class CallsApi
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
     * Operation addExistingConferenceCall
     *
     * Add existing call
     *
     * @param string $conferenceId Conference ID. (required)
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsAddExistingCallRequest $callsAddExistingCallRequest callsAddExistingCallRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsConference|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function addExistingConferenceCall(string $conferenceId, string $callId, \Infobip\Model\CallsAddExistingCallRequest $callsAddExistingCallRequest)
    {
        $request = $this->addExistingConferenceCallRequest($conferenceId, $callId, $callsAddExistingCallRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->addExistingConferenceCallResponse($response, $request->getUri());
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
            throw $this->addExistingConferenceCallApiException($exception);
        }
    }

    /**
     * Operation addExistingConferenceCallAsync
     *
     * Add existing call
     *
     * @param string $conferenceId Conference ID. (required)
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsAddExistingCallRequest $callsAddExistingCallRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function addExistingConferenceCallAsync(string $conferenceId, string $callId, \Infobip\Model\CallsAddExistingCallRequest $callsAddExistingCallRequest): PromiseInterface
    {
        $request = $this->addExistingConferenceCallRequest($conferenceId, $callId, $callsAddExistingCallRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->addExistingConferenceCallResponse($response, $request->getUri());
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

                    throw $this->addExistingConferenceCallApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'addExistingConferenceCall'
     *
     * @param string $conferenceId Conference ID. (required)
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsAddExistingCallRequest $callsAddExistingCallRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function addExistingConferenceCallRequest(string $conferenceId, string $callId, \Infobip\Model\CallsAddExistingCallRequest $callsAddExistingCallRequest): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
             'callId' => $callId,
             'callsAddExistingCallRequest' => $callsAddExistingCallRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                        new Assert\NotBlank(),
                    ],
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsAddExistingCallRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/conferences/{conferenceId}/call/{callId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($conferenceId !== null) {
            $resourcePath = str_replace(
                '{' . 'conferenceId' . '}',
                $this->objectSerializer->toPathValue($conferenceId),
                $resourcePath
            );
        }

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsAddExistingCallRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsAddExistingCallRequest)
                : $callsAddExistingCallRequest;
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
     * Create response for operation 'addExistingConferenceCall'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsConference|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function addExistingConferenceCallResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsConference', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'addExistingConferenceCall'
     */
    private function addExistingConferenceCallApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation addNewConferenceCall
     *
     * Add new call
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsAddNewCallRequest $callsAddNewCallRequest callsAddNewCallRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsConferenceAndCall|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function addNewConferenceCall(string $conferenceId, \Infobip\Model\CallsAddNewCallRequest $callsAddNewCallRequest)
    {
        $request = $this->addNewConferenceCallRequest($conferenceId, $callsAddNewCallRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->addNewConferenceCallResponse($response, $request->getUri());
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
            throw $this->addNewConferenceCallApiException($exception);
        }
    }

    /**
     * Operation addNewConferenceCallAsync
     *
     * Add new call
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsAddNewCallRequest $callsAddNewCallRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function addNewConferenceCallAsync(string $conferenceId, \Infobip\Model\CallsAddNewCallRequest $callsAddNewCallRequest): PromiseInterface
    {
        $request = $this->addNewConferenceCallRequest($conferenceId, $callsAddNewCallRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->addNewConferenceCallResponse($response, $request->getUri());
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

                    throw $this->addNewConferenceCallApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'addNewConferenceCall'
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsAddNewCallRequest $callsAddNewCallRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function addNewConferenceCallRequest(string $conferenceId, \Infobip\Model\CallsAddNewCallRequest $callsAddNewCallRequest): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
             'callsAddNewCallRequest' => $callsAddNewCallRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsAddNewCallRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/conferences/{conferenceId}/call';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($conferenceId !== null) {
            $resourcePath = str_replace(
                '{' . 'conferenceId' . '}',
                $this->objectSerializer->toPathValue($conferenceId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsAddNewCallRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsAddNewCallRequest)
                : $callsAddNewCallRequest;
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
     * Create response for operation 'addNewConferenceCall'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsConferenceAndCall|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function addNewConferenceCallResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsConferenceAndCall', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'addNewConferenceCall'
     */
    private function addNewConferenceCallApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation answerCall
     *
     * Answer
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsAnswerRequest $callsAnswerRequest callsAnswerRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function answerCall(string $callId, \Infobip\Model\CallsAnswerRequest $callsAnswerRequest)
    {
        $request = $this->answerCallRequest($callId, $callsAnswerRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->answerCallResponse($response, $request->getUri());
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
            throw $this->answerCallApiException($exception);
        }
    }

    /**
     * Operation answerCallAsync
     *
     * Answer
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsAnswerRequest $callsAnswerRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function answerCallAsync(string $callId, \Infobip\Model\CallsAnswerRequest $callsAnswerRequest): PromiseInterface
    {
        $request = $this->answerCallRequest($callId, $callsAnswerRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->answerCallResponse($response, $request->getUri());
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

                    throw $this->answerCallApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'answerCall'
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsAnswerRequest $callsAnswerRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function answerCallRequest(string $callId, \Infobip\Model\CallsAnswerRequest $callsAnswerRequest): Request
    {
        $allData = [
             'callId' => $callId,
             'callsAnswerRequest' => $callsAnswerRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsAnswerRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/answer';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsAnswerRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsAnswerRequest)
                : $callsAnswerRequest;
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
     * Create response for operation 'answerCall'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function answerCallResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'answerCall'
     */
    private function answerCallApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation applicationTransfer
     *
     * Request application transfer
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsApplicationTransferRequest $callsApplicationTransferRequest callsApplicationTransferRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function applicationTransfer(string $callId, \Infobip\Model\CallsApplicationTransferRequest $callsApplicationTransferRequest)
    {
        $request = $this->applicationTransferRequest($callId, $callsApplicationTransferRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->applicationTransferResponse($response, $request->getUri());
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
            throw $this->applicationTransferApiException($exception);
        }
    }

    /**
     * Operation applicationTransferAsync
     *
     * Request application transfer
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsApplicationTransferRequest $callsApplicationTransferRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function applicationTransferAsync(string $callId, \Infobip\Model\CallsApplicationTransferRequest $callsApplicationTransferRequest): PromiseInterface
    {
        $request = $this->applicationTransferRequest($callId, $callsApplicationTransferRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->applicationTransferResponse($response, $request->getUri());
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

                    throw $this->applicationTransferApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'applicationTransfer'
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsApplicationTransferRequest $callsApplicationTransferRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function applicationTransferRequest(string $callId, \Infobip\Model\CallsApplicationTransferRequest $callsApplicationTransferRequest): Request
    {
        $allData = [
             'callId' => $callId,
             'callsApplicationTransferRequest' => $callsApplicationTransferRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsApplicationTransferRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/application-transfer';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsApplicationTransferRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsApplicationTransferRequest)
                : $callsApplicationTransferRequest;
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
     * Create response for operation 'applicationTransfer'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function applicationTransferResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'applicationTransfer'
     */
    private function applicationTransferApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation applicationTransferAccept
     *
     * Accept application transfer
     *
     * @param string $callId Call ID. (required)
     * @param string $transferId The unique identifier of a transfer, sent to the receiving application in an &#x60;ApplicationTransferRequestedEvent&#x60;. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function applicationTransferAccept(string $callId, string $transferId)
    {
        $request = $this->applicationTransferAcceptRequest($callId, $transferId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->applicationTransferAcceptResponse($response, $request->getUri());
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
            throw $this->applicationTransferAcceptApiException($exception);
        }
    }

    /**
     * Operation applicationTransferAcceptAsync
     *
     * Accept application transfer
     *
     * @param string $callId Call ID. (required)
     * @param string $transferId The unique identifier of a transfer, sent to the receiving application in an &#x60;ApplicationTransferRequestedEvent&#x60;. (required)
     *
     * @throws InvalidArgumentException
     */
    public function applicationTransferAcceptAsync(string $callId, string $transferId): PromiseInterface
    {
        $request = $this->applicationTransferAcceptRequest($callId, $transferId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->applicationTransferAcceptResponse($response, $request->getUri());
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

                    throw $this->applicationTransferAcceptApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'applicationTransferAccept'
     *
     * @param string $callId Call ID. (required)
     * @param string $transferId The unique identifier of a transfer, sent to the receiving application in an &#x60;ApplicationTransferRequestedEvent&#x60;. (required)
     *
     * @throws InvalidArgumentException
     */
    private function applicationTransferAcceptRequest(string $callId, string $transferId): Request
    {
        $allData = [
             'callId' => $callId,
             'transferId' => $transferId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                    'transferId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/application-transfer/{transferId}/accept';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
                $resourcePath
            );
        }

        // path params
        if ($transferId !== null) {
            $resourcePath = str_replace(
                '{' . 'transferId' . '}',
                $this->objectSerializer->toPathValue($transferId),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'applicationTransferAccept'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function applicationTransferAcceptResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'applicationTransferAccept'
     */
    private function applicationTransferAcceptApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation applicationTransferReject
     *
     * Reject application transfer
     *
     * @param string $callId Call ID. (required)
     * @param string $transferId The unique identifier of a transfer, sent to the receiving application in an &#x60;ApplicationTransferRequestedEvent&#x60;. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function applicationTransferReject(string $callId, string $transferId)
    {
        $request = $this->applicationTransferRejectRequest($callId, $transferId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->applicationTransferRejectResponse($response, $request->getUri());
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
            throw $this->applicationTransferRejectApiException($exception);
        }
    }

    /**
     * Operation applicationTransferRejectAsync
     *
     * Reject application transfer
     *
     * @param string $callId Call ID. (required)
     * @param string $transferId The unique identifier of a transfer, sent to the receiving application in an &#x60;ApplicationTransferRequestedEvent&#x60;. (required)
     *
     * @throws InvalidArgumentException
     */
    public function applicationTransferRejectAsync(string $callId, string $transferId): PromiseInterface
    {
        $request = $this->applicationTransferRejectRequest($callId, $transferId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->applicationTransferRejectResponse($response, $request->getUri());
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

                    throw $this->applicationTransferRejectApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'applicationTransferReject'
     *
     * @param string $callId Call ID. (required)
     * @param string $transferId The unique identifier of a transfer, sent to the receiving application in an &#x60;ApplicationTransferRequestedEvent&#x60;. (required)
     *
     * @throws InvalidArgumentException
     */
    private function applicationTransferRejectRequest(string $callId, string $transferId): Request
    {
        $allData = [
             'callId' => $callId,
             'transferId' => $transferId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                    'transferId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/application-transfer/{transferId}/reject';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
                $resourcePath
            );
        }

        // path params
        if ($transferId !== null) {
            $resourcePath = str_replace(
                '{' . 'transferId' . '}',
                $this->objectSerializer->toPathValue($transferId),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'applicationTransferReject'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function applicationTransferRejectResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'applicationTransferReject'
     */
    private function applicationTransferRejectApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation callCaptureDtmf
     *
     * Capture DTMF
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsDtmfCaptureRequest $callsDtmfCaptureRequest callsDtmfCaptureRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function callCaptureDtmf(string $callId, \Infobip\Model\CallsDtmfCaptureRequest $callsDtmfCaptureRequest)
    {
        $request = $this->callCaptureDtmfRequest($callId, $callsDtmfCaptureRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->callCaptureDtmfResponse($response, $request->getUri());
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
            throw $this->callCaptureDtmfApiException($exception);
        }
    }

    /**
     * Operation callCaptureDtmfAsync
     *
     * Capture DTMF
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsDtmfCaptureRequest $callsDtmfCaptureRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function callCaptureDtmfAsync(string $callId, \Infobip\Model\CallsDtmfCaptureRequest $callsDtmfCaptureRequest): PromiseInterface
    {
        $request = $this->callCaptureDtmfRequest($callId, $callsDtmfCaptureRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->callCaptureDtmfResponse($response, $request->getUri());
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

                    throw $this->callCaptureDtmfApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'callCaptureDtmf'
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsDtmfCaptureRequest $callsDtmfCaptureRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function callCaptureDtmfRequest(string $callId, \Infobip\Model\CallsDtmfCaptureRequest $callsDtmfCaptureRequest): Request
    {
        $allData = [
             'callId' => $callId,
             'callsDtmfCaptureRequest' => $callsDtmfCaptureRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsDtmfCaptureRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/capture/dtmf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsDtmfCaptureRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsDtmfCaptureRequest)
                : $callsDtmfCaptureRequest;
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
     * Create response for operation 'callCaptureDtmf'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function callCaptureDtmfResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'callCaptureDtmf'
     */
    private function callCaptureDtmfApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation callPlayFile
     *
     * Play file
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsPlayRequest $callsPlayRequest callsPlayRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function callPlayFile(string $callId, \Infobip\Model\CallsPlayRequest $callsPlayRequest)
    {
        $request = $this->callPlayFileRequest($callId, $callsPlayRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->callPlayFileResponse($response, $request->getUri());
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
            throw $this->callPlayFileApiException($exception);
        }
    }

    /**
     * Operation callPlayFileAsync
     *
     * Play file
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsPlayRequest $callsPlayRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function callPlayFileAsync(string $callId, \Infobip\Model\CallsPlayRequest $callsPlayRequest): PromiseInterface
    {
        $request = $this->callPlayFileRequest($callId, $callsPlayRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->callPlayFileResponse($response, $request->getUri());
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

                    throw $this->callPlayFileApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'callPlayFile'
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsPlayRequest $callsPlayRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function callPlayFileRequest(string $callId, \Infobip\Model\CallsPlayRequest $callsPlayRequest): Request
    {
        $allData = [
             'callId' => $callId,
             'callsPlayRequest' => $callsPlayRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsPlayRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/play';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsPlayRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsPlayRequest)
                : $callsPlayRequest;
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
     * Create response for operation 'callPlayFile'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function callPlayFileResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'callPlayFile'
     */
    private function callPlayFileApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation callSayText
     *
     * Say text
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsSayRequest $callsSayRequest callsSayRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function callSayText(string $callId, \Infobip\Model\CallsSayRequest $callsSayRequest)
    {
        $request = $this->callSayTextRequest($callId, $callsSayRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->callSayTextResponse($response, $request->getUri());
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
            throw $this->callSayTextApiException($exception);
        }
    }

    /**
     * Operation callSayTextAsync
     *
     * Say text
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsSayRequest $callsSayRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function callSayTextAsync(string $callId, \Infobip\Model\CallsSayRequest $callsSayRequest): PromiseInterface
    {
        $request = $this->callSayTextRequest($callId, $callsSayRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->callSayTextResponse($response, $request->getUri());
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

                    throw $this->callSayTextApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'callSayText'
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsSayRequest $callsSayRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function callSayTextRequest(string $callId, \Infobip\Model\CallsSayRequest $callsSayRequest): Request
    {
        $allData = [
             'callId' => $callId,
             'callsSayRequest' => $callsSayRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsSayRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/say';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsSayRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsSayRequest)
                : $callsSayRequest;
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
     * Create response for operation 'callSayText'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function callSayTextResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'callSayText'
     */
    private function callSayTextApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation callSendDtmf
     *
     * Send DTMF
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsDtmfSendRequest $callsDtmfSendRequest callsDtmfSendRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function callSendDtmf(string $callId, \Infobip\Model\CallsDtmfSendRequest $callsDtmfSendRequest)
    {
        $request = $this->callSendDtmfRequest($callId, $callsDtmfSendRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->callSendDtmfResponse($response, $request->getUri());
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
            throw $this->callSendDtmfApiException($exception);
        }
    }

    /**
     * Operation callSendDtmfAsync
     *
     * Send DTMF
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsDtmfSendRequest $callsDtmfSendRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function callSendDtmfAsync(string $callId, \Infobip\Model\CallsDtmfSendRequest $callsDtmfSendRequest): PromiseInterface
    {
        $request = $this->callSendDtmfRequest($callId, $callsDtmfSendRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->callSendDtmfResponse($response, $request->getUri());
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

                    throw $this->callSendDtmfApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'callSendDtmf'
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsDtmfSendRequest $callsDtmfSendRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function callSendDtmfRequest(string $callId, \Infobip\Model\CallsDtmfSendRequest $callsDtmfSendRequest): Request
    {
        $allData = [
             'callId' => $callId,
             'callsDtmfSendRequest' => $callsDtmfSendRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsDtmfSendRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/send-dtmf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsDtmfSendRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsDtmfSendRequest)
                : $callsDtmfSendRequest;
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
     * Create response for operation 'callSendDtmf'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function callSendDtmfResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'callSendDtmf'
     */
    private function callSendDtmfApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation callStartRecording
     *
     * Start recording
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsRecordingStartRequest $callsRecordingStartRequest callsRecordingStartRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function callStartRecording(string $callId, \Infobip\Model\CallsRecordingStartRequest $callsRecordingStartRequest)
    {
        $request = $this->callStartRecordingRequest($callId, $callsRecordingStartRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->callStartRecordingResponse($response, $request->getUri());
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
            throw $this->callStartRecordingApiException($exception);
        }
    }

    /**
     * Operation callStartRecordingAsync
     *
     * Start recording
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsRecordingStartRequest $callsRecordingStartRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function callStartRecordingAsync(string $callId, \Infobip\Model\CallsRecordingStartRequest $callsRecordingStartRequest): PromiseInterface
    {
        $request = $this->callStartRecordingRequest($callId, $callsRecordingStartRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->callStartRecordingResponse($response, $request->getUri());
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

                    throw $this->callStartRecordingApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'callStartRecording'
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsRecordingStartRequest $callsRecordingStartRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function callStartRecordingRequest(string $callId, \Infobip\Model\CallsRecordingStartRequest $callsRecordingStartRequest): Request
    {
        $allData = [
             'callId' => $callId,
             'callsRecordingStartRequest' => $callsRecordingStartRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsRecordingStartRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/start-recording';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsRecordingStartRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsRecordingStartRequest)
                : $callsRecordingStartRequest;
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
     * Create response for operation 'callStartRecording'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function callStartRecordingResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'callStartRecording'
     */
    private function callStartRecordingApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation callStopPlayingFile
     *
     * Stop playing file
     *
     * @param string $callId Call ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function callStopPlayingFile(string $callId)
    {
        $request = $this->callStopPlayingFileRequest($callId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->callStopPlayingFileResponse($response, $request->getUri());
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
            throw $this->callStopPlayingFileApiException($exception);
        }
    }

    /**
     * Operation callStopPlayingFileAsync
     *
     * Stop playing file
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function callStopPlayingFileAsync(string $callId): PromiseInterface
    {
        $request = $this->callStopPlayingFileRequest($callId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->callStopPlayingFileResponse($response, $request->getUri());
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

                    throw $this->callStopPlayingFileApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'callStopPlayingFile'
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function callStopPlayingFileRequest(string $callId): Request
    {
        $allData = [
             'callId' => $callId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/stop-play';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'callStopPlayingFile'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function callStopPlayingFileResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'callStopPlayingFile'
     */
    private function callStopPlayingFileApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation callStopRecording
     *
     * Stop recording
     *
     * @param string $callId Call ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function callStopRecording(string $callId)
    {
        $request = $this->callStopRecordingRequest($callId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->callStopRecordingResponse($response, $request->getUri());
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
            throw $this->callStopRecordingApiException($exception);
        }
    }

    /**
     * Operation callStopRecordingAsync
     *
     * Stop recording
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function callStopRecordingAsync(string $callId): PromiseInterface
    {
        $request = $this->callStopRecordingRequest($callId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->callStopRecordingResponse($response, $request->getUri());
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

                    throw $this->callStopRecordingApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'callStopRecording'
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function callStopRecordingRequest(string $callId): Request
    {
        $allData = [
             'callId' => $callId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/stop-recording';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'callStopRecording'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function callStopRecordingResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'callStopRecording'
     */
    private function callStopRecordingApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation cancelBulk
     *
     * Cancel
     *
     * @param string $bulkId Bulk ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallBulkStatus|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function cancelBulk(string $bulkId)
    {
        $request = $this->cancelBulkRequest($bulkId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->cancelBulkResponse($response, $request->getUri());
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
            throw $this->cancelBulkApiException($exception);
        }
    }

    /**
     * Operation cancelBulkAsync
     *
     * Cancel
     *
     * @param string $bulkId Bulk ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function cancelBulkAsync(string $bulkId): PromiseInterface
    {
        $request = $this->cancelBulkRequest($bulkId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->cancelBulkResponse($response, $request->getUri());
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

                    throw $this->cancelBulkApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'cancelBulk'
     *
     * @param string $bulkId Bulk ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function cancelBulkRequest(string $bulkId): Request
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

        $resourcePath = '/calls/1/bulks/{bulkId}/cancel';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($bulkId !== null) {
            $resourcePath = str_replace(
                '{' . 'bulkId' . '}',
                $this->objectSerializer->toPathValue($bulkId),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'cancelBulk'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallBulkStatus|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function cancelBulkResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallBulkStatus', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'cancelBulk'
     */
    private function cancelBulkApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation composeConferenceRecording
     *
     * Compose conference recording on calls
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsOnDemandComposition $callsOnDemandComposition callsOnDemandComposition (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function composeConferenceRecording(string $conferenceId, \Infobip\Model\CallsOnDemandComposition $callsOnDemandComposition)
    {
        $request = $this->composeConferenceRecordingRequest($conferenceId, $callsOnDemandComposition);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->composeConferenceRecordingResponse($response, $request->getUri());
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
            throw $this->composeConferenceRecordingApiException($exception);
        }
    }

    /**
     * Operation composeConferenceRecordingAsync
     *
     * Compose conference recording on calls
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsOnDemandComposition $callsOnDemandComposition (required)
     *
     * @throws InvalidArgumentException
     */
    public function composeConferenceRecordingAsync(string $conferenceId, \Infobip\Model\CallsOnDemandComposition $callsOnDemandComposition): PromiseInterface
    {
        $request = $this->composeConferenceRecordingRequest($conferenceId, $callsOnDemandComposition);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->composeConferenceRecordingResponse($response, $request->getUri());
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

                    throw $this->composeConferenceRecordingApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'composeConferenceRecording'
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsOnDemandComposition $callsOnDemandComposition (required)
     *
     * @throws InvalidArgumentException
     */
    private function composeConferenceRecordingRequest(string $conferenceId, \Infobip\Model\CallsOnDemandComposition $callsOnDemandComposition): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
             'callsOnDemandComposition' => $callsOnDemandComposition,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsOnDemandComposition' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/recordings/conferences/{conferenceId}/compose';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($conferenceId !== null) {
            $resourcePath = str_replace(
                '{' . 'conferenceId' . '}',
                $this->objectSerializer->toPathValue($conferenceId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsOnDemandComposition)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsOnDemandComposition)
                : $callsOnDemandComposition;
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
     * Create response for operation 'composeConferenceRecording'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function composeConferenceRecordingResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'composeConferenceRecording'
     */
    private function composeConferenceRecordingApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation composeDialogRecording
     *
     * Compose dialog recording on calls
     *
     * @param string $dialogId Dialog ID. (required)
     * @param \Infobip\Model\CallsOnDemandComposition $callsOnDemandComposition callsOnDemandComposition (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function composeDialogRecording(string $dialogId, \Infobip\Model\CallsOnDemandComposition $callsOnDemandComposition)
    {
        $request = $this->composeDialogRecordingRequest($dialogId, $callsOnDemandComposition);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->composeDialogRecordingResponse($response, $request->getUri());
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
            throw $this->composeDialogRecordingApiException($exception);
        }
    }

    /**
     * Operation composeDialogRecordingAsync
     *
     * Compose dialog recording on calls
     *
     * @param string $dialogId Dialog ID. (required)
     * @param \Infobip\Model\CallsOnDemandComposition $callsOnDemandComposition (required)
     *
     * @throws InvalidArgumentException
     */
    public function composeDialogRecordingAsync(string $dialogId, \Infobip\Model\CallsOnDemandComposition $callsOnDemandComposition): PromiseInterface
    {
        $request = $this->composeDialogRecordingRequest($dialogId, $callsOnDemandComposition);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->composeDialogRecordingResponse($response, $request->getUri());
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

                    throw $this->composeDialogRecordingApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'composeDialogRecording'
     *
     * @param string $dialogId Dialog ID. (required)
     * @param \Infobip\Model\CallsOnDemandComposition $callsOnDemandComposition (required)
     *
     * @throws InvalidArgumentException
     */
    private function composeDialogRecordingRequest(string $dialogId, \Infobip\Model\CallsOnDemandComposition $callsOnDemandComposition): Request
    {
        $allData = [
             'dialogId' => $dialogId,
             'callsOnDemandComposition' => $callsOnDemandComposition,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'dialogId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsOnDemandComposition' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/recordings/dialogs/{dialogId}/compose';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($dialogId !== null) {
            $resourcePath = str_replace(
                '{' . 'dialogId' . '}',
                $this->objectSerializer->toPathValue($dialogId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsOnDemandComposition)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsOnDemandComposition)
                : $callsOnDemandComposition;
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
     * Create response for operation 'composeDialogRecording'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function composeDialogRecordingResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'composeDialogRecording'
     */
    private function composeDialogRecordingApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation conferencePlayFile
     *
     * Play file
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsPlayRequest $callsPlayRequest callsPlayRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function conferencePlayFile(string $conferenceId, \Infobip\Model\CallsPlayRequest $callsPlayRequest)
    {
        $request = $this->conferencePlayFileRequest($conferenceId, $callsPlayRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->conferencePlayFileResponse($response, $request->getUri());
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
            throw $this->conferencePlayFileApiException($exception);
        }
    }

    /**
     * Operation conferencePlayFileAsync
     *
     * Play file
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsPlayRequest $callsPlayRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function conferencePlayFileAsync(string $conferenceId, \Infobip\Model\CallsPlayRequest $callsPlayRequest): PromiseInterface
    {
        $request = $this->conferencePlayFileRequest($conferenceId, $callsPlayRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->conferencePlayFileResponse($response, $request->getUri());
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

                    throw $this->conferencePlayFileApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'conferencePlayFile'
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsPlayRequest $callsPlayRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function conferencePlayFileRequest(string $conferenceId, \Infobip\Model\CallsPlayRequest $callsPlayRequest): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
             'callsPlayRequest' => $callsPlayRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsPlayRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/conferences/{conferenceId}/play';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($conferenceId !== null) {
            $resourcePath = str_replace(
                '{' . 'conferenceId' . '}',
                $this->objectSerializer->toPathValue($conferenceId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsPlayRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsPlayRequest)
                : $callsPlayRequest;
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
     * Create response for operation 'conferencePlayFile'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function conferencePlayFileResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'conferencePlayFile'
     */
    private function conferencePlayFileApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation conferenceSayText
     *
     * Say text
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsSayRequest $callsSayRequest callsSayRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function conferenceSayText(string $conferenceId, \Infobip\Model\CallsSayRequest $callsSayRequest)
    {
        $request = $this->conferenceSayTextRequest($conferenceId, $callsSayRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->conferenceSayTextResponse($response, $request->getUri());
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
            throw $this->conferenceSayTextApiException($exception);
        }
    }

    /**
     * Operation conferenceSayTextAsync
     *
     * Say text
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsSayRequest $callsSayRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function conferenceSayTextAsync(string $conferenceId, \Infobip\Model\CallsSayRequest $callsSayRequest): PromiseInterface
    {
        $request = $this->conferenceSayTextRequest($conferenceId, $callsSayRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->conferenceSayTextResponse($response, $request->getUri());
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

                    throw $this->conferenceSayTextApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'conferenceSayText'
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsSayRequest $callsSayRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function conferenceSayTextRequest(string $conferenceId, \Infobip\Model\CallsSayRequest $callsSayRequest): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
             'callsSayRequest' => $callsSayRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsSayRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/conferences/{conferenceId}/say';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($conferenceId !== null) {
            $resourcePath = str_replace(
                '{' . 'conferenceId' . '}',
                $this->objectSerializer->toPathValue($conferenceId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsSayRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsSayRequest)
                : $callsSayRequest;
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
     * Create response for operation 'conferenceSayText'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function conferenceSayTextResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'conferenceSayText'
     */
    private function conferenceSayTextApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation conferenceStartRecording
     *
     * Start recording
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsStartRecordingRequest $callsStartRecordingRequest callsStartRecordingRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function conferenceStartRecording(string $conferenceId, \Infobip\Model\CallsStartRecordingRequest $callsStartRecordingRequest)
    {
        $request = $this->conferenceStartRecordingRequest($conferenceId, $callsStartRecordingRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->conferenceStartRecordingResponse($response, $request->getUri());
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
            throw $this->conferenceStartRecordingApiException($exception);
        }
    }

    /**
     * Operation conferenceStartRecordingAsync
     *
     * Start recording
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsStartRecordingRequest $callsStartRecordingRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function conferenceStartRecordingAsync(string $conferenceId, \Infobip\Model\CallsStartRecordingRequest $callsStartRecordingRequest): PromiseInterface
    {
        $request = $this->conferenceStartRecordingRequest($conferenceId, $callsStartRecordingRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->conferenceStartRecordingResponse($response, $request->getUri());
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

                    throw $this->conferenceStartRecordingApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'conferenceStartRecording'
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsStartRecordingRequest $callsStartRecordingRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function conferenceStartRecordingRequest(string $conferenceId, \Infobip\Model\CallsStartRecordingRequest $callsStartRecordingRequest): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
             'callsStartRecordingRequest' => $callsStartRecordingRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsStartRecordingRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/conferences/{conferenceId}/start-recording';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($conferenceId !== null) {
            $resourcePath = str_replace(
                '{' . 'conferenceId' . '}',
                $this->objectSerializer->toPathValue($conferenceId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsStartRecordingRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsStartRecordingRequest)
                : $callsStartRecordingRequest;
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
     * Create response for operation 'conferenceStartRecording'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function conferenceStartRecordingResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'conferenceStartRecording'
     */
    private function conferenceStartRecordingApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation conferenceStopPlayingFile
     *
     * Stop playing file
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function conferenceStopPlayingFile(string $conferenceId)
    {
        $request = $this->conferenceStopPlayingFileRequest($conferenceId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->conferenceStopPlayingFileResponse($response, $request->getUri());
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
            throw $this->conferenceStopPlayingFileApiException($exception);
        }
    }

    /**
     * Operation conferenceStopPlayingFileAsync
     *
     * Stop playing file
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function conferenceStopPlayingFileAsync(string $conferenceId): PromiseInterface
    {
        $request = $this->conferenceStopPlayingFileRequest($conferenceId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->conferenceStopPlayingFileResponse($response, $request->getUri());
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

                    throw $this->conferenceStopPlayingFileApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'conferenceStopPlayingFile'
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function conferenceStopPlayingFileRequest(string $conferenceId): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/conferences/{conferenceId}/stop-play';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($conferenceId !== null) {
            $resourcePath = str_replace(
                '{' . 'conferenceId' . '}',
                $this->objectSerializer->toPathValue($conferenceId),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'conferenceStopPlayingFile'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function conferenceStopPlayingFileResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'conferenceStopPlayingFile'
     */
    private function conferenceStopPlayingFileApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation conferenceStopRecording
     *
     * Stop recording
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function conferenceStopRecording(string $conferenceId)
    {
        $request = $this->conferenceStopRecordingRequest($conferenceId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->conferenceStopRecordingResponse($response, $request->getUri());
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
            throw $this->conferenceStopRecordingApiException($exception);
        }
    }

    /**
     * Operation conferenceStopRecordingAsync
     *
     * Stop recording
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function conferenceStopRecordingAsync(string $conferenceId): PromiseInterface
    {
        $request = $this->conferenceStopRecordingRequest($conferenceId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->conferenceStopRecordingResponse($response, $request->getUri());
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

                    throw $this->conferenceStopRecordingApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'conferenceStopRecording'
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function conferenceStopRecordingRequest(string $conferenceId): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/conferences/{conferenceId}/stop-recording';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($conferenceId !== null) {
            $resourcePath = str_replace(
                '{' . 'conferenceId' . '}',
                $this->objectSerializer->toPathValue($conferenceId),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'conferenceStopRecording'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function conferenceStopRecordingResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'conferenceStopRecording'
     */
    private function conferenceStopRecordingApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation connectCalls
     *
     * Connect calls
     *
     * @param \Infobip\Model\CallsConnectRequest $callsConnectRequest callsConnectRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsConference|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function connectCalls(\Infobip\Model\CallsConnectRequest $callsConnectRequest)
    {
        $request = $this->connectCallsRequest($callsConnectRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->connectCallsResponse($response, $request->getUri());
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
            throw $this->connectCallsApiException($exception);
        }
    }

    /**
     * Operation connectCallsAsync
     *
     * Connect calls
     *
     * @param \Infobip\Model\CallsConnectRequest $callsConnectRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function connectCallsAsync(\Infobip\Model\CallsConnectRequest $callsConnectRequest): PromiseInterface
    {
        $request = $this->connectCallsRequest($callsConnectRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->connectCallsResponse($response, $request->getUri());
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

                    throw $this->connectCallsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'connectCalls'
     *
     * @param \Infobip\Model\CallsConnectRequest $callsConnectRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function connectCallsRequest(\Infobip\Model\CallsConnectRequest $callsConnectRequest): Request
    {
        $allData = [
             'callsConnectRequest' => $callsConnectRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callsConnectRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/connect';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsConnectRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsConnectRequest)
                : $callsConnectRequest;
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
     * Create response for operation 'connectCalls'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsConference|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function connectCallsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsConference', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'connectCalls'
     */
    private function connectCallsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation connectWithNewCall
     *
     * Connect with new call
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsConnectWithNewCallRequest $callsConnectWithNewCallRequest callsConnectWithNewCallRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsConferenceAndCall|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function connectWithNewCall(string $callId, \Infobip\Model\CallsConnectWithNewCallRequest $callsConnectWithNewCallRequest)
    {
        $request = $this->connectWithNewCallRequest($callId, $callsConnectWithNewCallRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->connectWithNewCallResponse($response, $request->getUri());
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
            throw $this->connectWithNewCallApiException($exception);
        }
    }

    /**
     * Operation connectWithNewCallAsync
     *
     * Connect with new call
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsConnectWithNewCallRequest $callsConnectWithNewCallRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function connectWithNewCallAsync(string $callId, \Infobip\Model\CallsConnectWithNewCallRequest $callsConnectWithNewCallRequest): PromiseInterface
    {
        $request = $this->connectWithNewCallRequest($callId, $callsConnectWithNewCallRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->connectWithNewCallResponse($response, $request->getUri());
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

                    throw $this->connectWithNewCallApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'connectWithNewCall'
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsConnectWithNewCallRequest $callsConnectWithNewCallRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function connectWithNewCallRequest(string $callId, \Infobip\Model\CallsConnectWithNewCallRequest $callsConnectWithNewCallRequest): Request
    {
        $allData = [
             'callId' => $callId,
             'callsConnectWithNewCallRequest' => $callsConnectWithNewCallRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsConnectWithNewCallRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/connect';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsConnectWithNewCallRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsConnectWithNewCallRequest)
                : $callsConnectWithNewCallRequest;
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
     * Create response for operation 'connectWithNewCall'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsConferenceAndCall|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function connectWithNewCallResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsConferenceAndCall', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'connectWithNewCall'
     */
    private function connectWithNewCallApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation createBulk
     *
     * Create bulk of calls
     *
     * @param \Infobip\Model\CallBulkRequest $callBulkRequest callBulkRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallBulkResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function createBulk(\Infobip\Model\CallBulkRequest $callBulkRequest)
    {
        $request = $this->createBulkRequest($callBulkRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->createBulkResponse($response, $request->getUri());
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
            throw $this->createBulkApiException($exception);
        }
    }

    /**
     * Operation createBulkAsync
     *
     * Create bulk of calls
     *
     * @param \Infobip\Model\CallBulkRequest $callBulkRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function createBulkAsync(\Infobip\Model\CallBulkRequest $callBulkRequest): PromiseInterface
    {
        $request = $this->createBulkRequest($callBulkRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->createBulkResponse($response, $request->getUri());
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

                    throw $this->createBulkApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'createBulk'
     *
     * @param \Infobip\Model\CallBulkRequest $callBulkRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function createBulkRequest(\Infobip\Model\CallBulkRequest $callBulkRequest): Request
    {
        $allData = [
             'callBulkRequest' => $callBulkRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callBulkRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/bulks';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callBulkRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callBulkRequest)
                : $callBulkRequest;
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
     * Create response for operation 'createBulk'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallBulkResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function createBulkResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 201) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallBulkResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'createBulk'
     */
    private function createBulkApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation createCall
     *
     * Create call
     *
     * @param \Infobip\Model\CallRequest $callRequest callRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\Call|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function createCall(\Infobip\Model\CallRequest $callRequest)
    {
        $request = $this->createCallRequest($callRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->createCallResponse($response, $request->getUri());
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
            throw $this->createCallApiException($exception);
        }
    }

    /**
     * Operation createCallAsync
     *
     * Create call
     *
     * @param \Infobip\Model\CallRequest $callRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function createCallAsync(\Infobip\Model\CallRequest $callRequest): PromiseInterface
    {
        $request = $this->createCallRequest($callRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->createCallResponse($response, $request->getUri());
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

                    throw $this->createCallApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'createCall'
     *
     * @param \Infobip\Model\CallRequest $callRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function createCallRequest(\Infobip\Model\CallRequest $callRequest): Request
    {
        $allData = [
             'callRequest' => $callRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callRequest)
                : $callRequest;
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
     * Create response for operation 'createCall'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\Call|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function createCallResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 201) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\Call', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'createCall'
     */
    private function createCallApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation createConference
     *
     * Create conference
     *
     * @param \Infobip\Model\CallsConferenceRequest $callsConferenceRequest callsConferenceRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsConference|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function createConference(\Infobip\Model\CallsConferenceRequest $callsConferenceRequest)
    {
        $request = $this->createConferenceRequest($callsConferenceRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->createConferenceResponse($response, $request->getUri());
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
            throw $this->createConferenceApiException($exception);
        }
    }

    /**
     * Operation createConferenceAsync
     *
     * Create conference
     *
     * @param \Infobip\Model\CallsConferenceRequest $callsConferenceRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function createConferenceAsync(\Infobip\Model\CallsConferenceRequest $callsConferenceRequest): PromiseInterface
    {
        $request = $this->createConferenceRequest($callsConferenceRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->createConferenceResponse($response, $request->getUri());
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

                    throw $this->createConferenceApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'createConference'
     *
     * @param \Infobip\Model\CallsConferenceRequest $callsConferenceRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function createConferenceRequest(\Infobip\Model\CallsConferenceRequest $callsConferenceRequest): Request
    {
        $allData = [
             'callsConferenceRequest' => $callsConferenceRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callsConferenceRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/conferences';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsConferenceRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsConferenceRequest)
                : $callsConferenceRequest;
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
     * Create response for operation 'createConference'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsConference|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function createConferenceResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 201) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsConference', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'createConference'
     */
    private function createConferenceApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation createDialog
     *
     * Create dialog
     *
     * @param \Infobip\Model\CallsDialogRequest $callsDialogRequest callsDialogRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsDialogResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function createDialog(\Infobip\Model\CallsDialogRequest $callsDialogRequest)
    {
        $request = $this->createDialogRequest($callsDialogRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->createDialogResponse($response, $request->getUri());
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
            throw $this->createDialogApiException($exception);
        }
    }

    /**
     * Operation createDialogAsync
     *
     * Create dialog
     *
     * @param \Infobip\Model\CallsDialogRequest $callsDialogRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function createDialogAsync(\Infobip\Model\CallsDialogRequest $callsDialogRequest): PromiseInterface
    {
        $request = $this->createDialogRequest($callsDialogRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->createDialogResponse($response, $request->getUri());
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

                    throw $this->createDialogApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'createDialog'
     *
     * @param \Infobip\Model\CallsDialogRequest $callsDialogRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function createDialogRequest(\Infobip\Model\CallsDialogRequest $callsDialogRequest): Request
    {
        $allData = [
             'callsDialogRequest' => $callsDialogRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callsDialogRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/dialogs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsDialogRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsDialogRequest)
                : $callsDialogRequest;
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
     * Create response for operation 'createDialog'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsDialogResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function createDialogResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 201) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsDialogResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'createDialog'
     */
    private function createDialogApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation createMediaStreamConfig
     *
     * Create a media-stream configuration
     *
     * @param \Infobip\Model\CallsMediaStreamConfigRequest $callsMediaStreamConfigRequest callsMediaStreamConfigRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsMediaStreamConfigResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function createMediaStreamConfig(\Infobip\Model\CallsMediaStreamConfigRequest $callsMediaStreamConfigRequest)
    {
        $request = $this->createMediaStreamConfigRequest($callsMediaStreamConfigRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->createMediaStreamConfigResponse($response, $request->getUri());
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
            throw $this->createMediaStreamConfigApiException($exception);
        }
    }

    /**
     * Operation createMediaStreamConfigAsync
     *
     * Create a media-stream configuration
     *
     * @param \Infobip\Model\CallsMediaStreamConfigRequest $callsMediaStreamConfigRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function createMediaStreamConfigAsync(\Infobip\Model\CallsMediaStreamConfigRequest $callsMediaStreamConfigRequest): PromiseInterface
    {
        $request = $this->createMediaStreamConfigRequest($callsMediaStreamConfigRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->createMediaStreamConfigResponse($response, $request->getUri());
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

                    throw $this->createMediaStreamConfigApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'createMediaStreamConfig'
     *
     * @param \Infobip\Model\CallsMediaStreamConfigRequest $callsMediaStreamConfigRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function createMediaStreamConfigRequest(\Infobip\Model\CallsMediaStreamConfigRequest $callsMediaStreamConfigRequest): Request
    {
        $allData = [
             'callsMediaStreamConfigRequest' => $callsMediaStreamConfigRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callsMediaStreamConfigRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/media-stream-configs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsMediaStreamConfigRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsMediaStreamConfigRequest)
                : $callsMediaStreamConfigRequest;
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
     * Create response for operation 'createMediaStreamConfig'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsMediaStreamConfigResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function createMediaStreamConfigResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 201) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsMediaStreamConfigResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'createMediaStreamConfig'
     */
    private function createMediaStreamConfigApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation deleteCallRecordings
     *
     * Delete call recordings
     *
     * @param string $callId Call ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallRecording|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function deleteCallRecordings(string $callId)
    {
        $request = $this->deleteCallRecordingsRequest($callId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->deleteCallRecordingsResponse($response, $request->getUri());
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
            throw $this->deleteCallRecordingsApiException($exception);
        }
    }

    /**
     * Operation deleteCallRecordingsAsync
     *
     * Delete call recordings
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function deleteCallRecordingsAsync(string $callId): PromiseInterface
    {
        $request = $this->deleteCallRecordingsRequest($callId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->deleteCallRecordingsResponse($response, $request->getUri());
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

                    throw $this->deleteCallRecordingsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'deleteCallRecordings'
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function deleteCallRecordingsRequest(string $callId): Request
    {
        $allData = [
             'callId' => $callId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/recordings/calls/{callId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
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
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'deleteCallRecordings'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallRecording|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function deleteCallRecordingsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallRecording', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'deleteCallRecordings'
     */
    private function deleteCallRecordingsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation deleteCallsFile
     *
     * Delete file
     *
     * @param string $fileId File ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsFile|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function deleteCallsFile(string $fileId)
    {
        $request = $this->deleteCallsFileRequest($fileId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->deleteCallsFileResponse($response, $request->getUri());
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
            throw $this->deleteCallsFileApiException($exception);
        }
    }

    /**
     * Operation deleteCallsFileAsync
     *
     * Delete file
     *
     * @param string $fileId File ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function deleteCallsFileAsync(string $fileId): PromiseInterface
    {
        $request = $this->deleteCallsFileRequest($fileId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->deleteCallsFileResponse($response, $request->getUri());
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

                    throw $this->deleteCallsFileApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'deleteCallsFile'
     *
     * @param string $fileId File ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function deleteCallsFileRequest(string $fileId): Request
    {
        $allData = [
             'fileId' => $fileId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'fileId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/files/{fileId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($fileId !== null) {
            $resourcePath = str_replace(
                '{' . 'fileId' . '}',
                $this->objectSerializer->toPathValue($fileId),
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
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'deleteCallsFile'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsFile|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function deleteCallsFileResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsFile', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'deleteCallsFile'
     */
    private function deleteCallsFileApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation deleteConferenceRecordings
     *
     * Delete conference recordings
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsConferenceRecording|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function deleteConferenceRecordings(string $conferenceId)
    {
        $request = $this->deleteConferenceRecordingsRequest($conferenceId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->deleteConferenceRecordingsResponse($response, $request->getUri());
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
            throw $this->deleteConferenceRecordingsApiException($exception);
        }
    }

    /**
     * Operation deleteConferenceRecordingsAsync
     *
     * Delete conference recordings
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function deleteConferenceRecordingsAsync(string $conferenceId): PromiseInterface
    {
        $request = $this->deleteConferenceRecordingsRequest($conferenceId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->deleteConferenceRecordingsResponse($response, $request->getUri());
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

                    throw $this->deleteConferenceRecordingsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'deleteConferenceRecordings'
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function deleteConferenceRecordingsRequest(string $conferenceId): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/recordings/conferences/{conferenceId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($conferenceId !== null) {
            $resourcePath = str_replace(
                '{' . 'conferenceId' . '}',
                $this->objectSerializer->toPathValue($conferenceId),
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
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'deleteConferenceRecordings'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsConferenceRecording|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function deleteConferenceRecordingsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsConferenceRecording', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'deleteConferenceRecordings'
     */
    private function deleteConferenceRecordingsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation deleteDialogRecordings
     *
     * Delete dialog recordings
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsDialogRecordingResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function deleteDialogRecordings(string $dialogId)
    {
        $request = $this->deleteDialogRecordingsRequest($dialogId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->deleteDialogRecordingsResponse($response, $request->getUri());
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
            throw $this->deleteDialogRecordingsApiException($exception);
        }
    }

    /**
     * Operation deleteDialogRecordingsAsync
     *
     * Delete dialog recordings
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function deleteDialogRecordingsAsync(string $dialogId): PromiseInterface
    {
        $request = $this->deleteDialogRecordingsRequest($dialogId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->deleteDialogRecordingsResponse($response, $request->getUri());
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

                    throw $this->deleteDialogRecordingsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'deleteDialogRecordings'
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function deleteDialogRecordingsRequest(string $dialogId): Request
    {
        $allData = [
             'dialogId' => $dialogId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'dialogId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/recordings/dialogs/{dialogId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($dialogId !== null) {
            $resourcePath = str_replace(
                '{' . 'dialogId' . '}',
                $this->objectSerializer->toPathValue($dialogId),
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
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'deleteDialogRecordings'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsDialogRecordingResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function deleteDialogRecordingsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsDialogRecordingResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'deleteDialogRecordings'
     */
    private function deleteDialogRecordingsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation deleteMediaStreamConfig
     *
     * Delete a media-stream configuration
     *
     * @param string $mediaStreamConfigId Media-stream configuration ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsMediaStreamConfigResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function deleteMediaStreamConfig(string $mediaStreamConfigId)
    {
        $request = $this->deleteMediaStreamConfigRequest($mediaStreamConfigId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->deleteMediaStreamConfigResponse($response, $request->getUri());
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
            throw $this->deleteMediaStreamConfigApiException($exception);
        }
    }

    /**
     * Operation deleteMediaStreamConfigAsync
     *
     * Delete a media-stream configuration
     *
     * @param string $mediaStreamConfigId Media-stream configuration ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function deleteMediaStreamConfigAsync(string $mediaStreamConfigId): PromiseInterface
    {
        $request = $this->deleteMediaStreamConfigRequest($mediaStreamConfigId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->deleteMediaStreamConfigResponse($response, $request->getUri());
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

                    throw $this->deleteMediaStreamConfigApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'deleteMediaStreamConfig'
     *
     * @param string $mediaStreamConfigId Media-stream configuration ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function deleteMediaStreamConfigRequest(string $mediaStreamConfigId): Request
    {
        $allData = [
             'mediaStreamConfigId' => $mediaStreamConfigId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'mediaStreamConfigId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/media-stream-configs/{mediaStreamConfigId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($mediaStreamConfigId !== null) {
            $resourcePath = str_replace(
                '{' . 'mediaStreamConfigId' . '}',
                $this->objectSerializer->toPathValue($mediaStreamConfigId),
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
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'deleteMediaStreamConfig'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsMediaStreamConfigResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function deleteMediaStreamConfigResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsMediaStreamConfigResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'deleteMediaStreamConfig'
     */
    private function deleteMediaStreamConfigApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation deleteRecordingFile
     *
     * Delete recording file
     *
     * @param string $fileId File ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsRecordingFile|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function deleteRecordingFile(string $fileId)
    {
        $request = $this->deleteRecordingFileRequest($fileId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->deleteRecordingFileResponse($response, $request->getUri());
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
            throw $this->deleteRecordingFileApiException($exception);
        }
    }

    /**
     * Operation deleteRecordingFileAsync
     *
     * Delete recording file
     *
     * @param string $fileId File ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function deleteRecordingFileAsync(string $fileId): PromiseInterface
    {
        $request = $this->deleteRecordingFileRequest($fileId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->deleteRecordingFileResponse($response, $request->getUri());
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

                    throw $this->deleteRecordingFileApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'deleteRecordingFile'
     *
     * @param string $fileId File ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function deleteRecordingFileRequest(string $fileId): Request
    {
        $allData = [
             'fileId' => $fileId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'fileId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/recordings/files/{fileId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($fileId !== null) {
            $resourcePath = str_replace(
                '{' . 'fileId' . '}',
                $this->objectSerializer->toPathValue($fileId),
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
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'deleteRecordingFile'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsRecordingFile|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function deleteRecordingFileResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsRecordingFile', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'deleteRecordingFile'
     */
    private function deleteRecordingFileApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation dialogPlayFile
     *
     * Play file
     *
     * @param string $dialogId Dialog ID. (required)
     * @param \Infobip\Model\CallsDialogPlayRequest $callsDialogPlayRequest callsDialogPlayRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function dialogPlayFile(string $dialogId, \Infobip\Model\CallsDialogPlayRequest $callsDialogPlayRequest)
    {
        $request = $this->dialogPlayFileRequest($dialogId, $callsDialogPlayRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->dialogPlayFileResponse($response, $request->getUri());
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
            throw $this->dialogPlayFileApiException($exception);
        }
    }

    /**
     * Operation dialogPlayFileAsync
     *
     * Play file
     *
     * @param string $dialogId Dialog ID. (required)
     * @param \Infobip\Model\CallsDialogPlayRequest $callsDialogPlayRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function dialogPlayFileAsync(string $dialogId, \Infobip\Model\CallsDialogPlayRequest $callsDialogPlayRequest): PromiseInterface
    {
        $request = $this->dialogPlayFileRequest($dialogId, $callsDialogPlayRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->dialogPlayFileResponse($response, $request->getUri());
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

                    throw $this->dialogPlayFileApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'dialogPlayFile'
     *
     * @param string $dialogId Dialog ID. (required)
     * @param \Infobip\Model\CallsDialogPlayRequest $callsDialogPlayRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function dialogPlayFileRequest(string $dialogId, \Infobip\Model\CallsDialogPlayRequest $callsDialogPlayRequest): Request
    {
        $allData = [
             'dialogId' => $dialogId,
             'callsDialogPlayRequest' => $callsDialogPlayRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'dialogId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsDialogPlayRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/dialogs/{dialogId}/play';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($dialogId !== null) {
            $resourcePath = str_replace(
                '{' . 'dialogId' . '}',
                $this->objectSerializer->toPathValue($dialogId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsDialogPlayRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsDialogPlayRequest)
                : $callsDialogPlayRequest;
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
     * Create response for operation 'dialogPlayFile'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function dialogPlayFileResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'dialogPlayFile'
     */
    private function dialogPlayFileApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation dialogSayText
     *
     * Say text
     *
     * @param string $dialogId Dialog ID. (required)
     * @param \Infobip\Model\CallsDialogSayRequest $callsDialogSayRequest callsDialogSayRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function dialogSayText(string $dialogId, \Infobip\Model\CallsDialogSayRequest $callsDialogSayRequest)
    {
        $request = $this->dialogSayTextRequest($dialogId, $callsDialogSayRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->dialogSayTextResponse($response, $request->getUri());
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
            throw $this->dialogSayTextApiException($exception);
        }
    }

    /**
     * Operation dialogSayTextAsync
     *
     * Say text
     *
     * @param string $dialogId Dialog ID. (required)
     * @param \Infobip\Model\CallsDialogSayRequest $callsDialogSayRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function dialogSayTextAsync(string $dialogId, \Infobip\Model\CallsDialogSayRequest $callsDialogSayRequest): PromiseInterface
    {
        $request = $this->dialogSayTextRequest($dialogId, $callsDialogSayRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->dialogSayTextResponse($response, $request->getUri());
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

                    throw $this->dialogSayTextApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'dialogSayText'
     *
     * @param string $dialogId Dialog ID. (required)
     * @param \Infobip\Model\CallsDialogSayRequest $callsDialogSayRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function dialogSayTextRequest(string $dialogId, \Infobip\Model\CallsDialogSayRequest $callsDialogSayRequest): Request
    {
        $allData = [
             'dialogId' => $dialogId,
             'callsDialogSayRequest' => $callsDialogSayRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'dialogId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsDialogSayRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/dialogs/{dialogId}/say';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($dialogId !== null) {
            $resourcePath = str_replace(
                '{' . 'dialogId' . '}',
                $this->objectSerializer->toPathValue($dialogId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsDialogSayRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsDialogSayRequest)
                : $callsDialogSayRequest;
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
     * Create response for operation 'dialogSayText'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function dialogSayTextResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'dialogSayText'
     */
    private function dialogSayTextApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation dialogStartRecording
     *
     * Start recording
     *
     * @param string $dialogId Dialog ID. (required)
     * @param \Infobip\Model\CallsDialogRecordingRequest $callsDialogRecordingRequest callsDialogRecordingRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function dialogStartRecording(string $dialogId, \Infobip\Model\CallsDialogRecordingRequest $callsDialogRecordingRequest)
    {
        $request = $this->dialogStartRecordingRequest($dialogId, $callsDialogRecordingRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->dialogStartRecordingResponse($response, $request->getUri());
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
            throw $this->dialogStartRecordingApiException($exception);
        }
    }

    /**
     * Operation dialogStartRecordingAsync
     *
     * Start recording
     *
     * @param string $dialogId Dialog ID. (required)
     * @param \Infobip\Model\CallsDialogRecordingRequest $callsDialogRecordingRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function dialogStartRecordingAsync(string $dialogId, \Infobip\Model\CallsDialogRecordingRequest $callsDialogRecordingRequest): PromiseInterface
    {
        $request = $this->dialogStartRecordingRequest($dialogId, $callsDialogRecordingRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->dialogStartRecordingResponse($response, $request->getUri());
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

                    throw $this->dialogStartRecordingApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'dialogStartRecording'
     *
     * @param string $dialogId Dialog ID. (required)
     * @param \Infobip\Model\CallsDialogRecordingRequest $callsDialogRecordingRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function dialogStartRecordingRequest(string $dialogId, \Infobip\Model\CallsDialogRecordingRequest $callsDialogRecordingRequest): Request
    {
        $allData = [
             'dialogId' => $dialogId,
             'callsDialogRecordingRequest' => $callsDialogRecordingRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'dialogId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsDialogRecordingRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/dialogs/{dialogId}/start-recording';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($dialogId !== null) {
            $resourcePath = str_replace(
                '{' . 'dialogId' . '}',
                $this->objectSerializer->toPathValue($dialogId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsDialogRecordingRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsDialogRecordingRequest)
                : $callsDialogRecordingRequest;
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
     * Create response for operation 'dialogStartRecording'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function dialogStartRecordingResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'dialogStartRecording'
     */
    private function dialogStartRecordingApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation dialogStopPlayingFile
     *
     * Stop playing file
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function dialogStopPlayingFile(string $dialogId)
    {
        $request = $this->dialogStopPlayingFileRequest($dialogId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->dialogStopPlayingFileResponse($response, $request->getUri());
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
            throw $this->dialogStopPlayingFileApiException($exception);
        }
    }

    /**
     * Operation dialogStopPlayingFileAsync
     *
     * Stop playing file
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function dialogStopPlayingFileAsync(string $dialogId): PromiseInterface
    {
        $request = $this->dialogStopPlayingFileRequest($dialogId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->dialogStopPlayingFileResponse($response, $request->getUri());
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

                    throw $this->dialogStopPlayingFileApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'dialogStopPlayingFile'
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function dialogStopPlayingFileRequest(string $dialogId): Request
    {
        $allData = [
             'dialogId' => $dialogId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'dialogId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/dialogs/{dialogId}/stop-play';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($dialogId !== null) {
            $resourcePath = str_replace(
                '{' . 'dialogId' . '}',
                $this->objectSerializer->toPathValue($dialogId),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'dialogStopPlayingFile'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function dialogStopPlayingFileResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'dialogStopPlayingFile'
     */
    private function dialogStopPlayingFileApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation dialogStopRecording
     *
     * Stop recording
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function dialogStopRecording(string $dialogId)
    {
        $request = $this->dialogStopRecordingRequest($dialogId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->dialogStopRecordingResponse($response, $request->getUri());
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
            throw $this->dialogStopRecordingApiException($exception);
        }
    }

    /**
     * Operation dialogStopRecordingAsync
     *
     * Stop recording
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function dialogStopRecordingAsync(string $dialogId): PromiseInterface
    {
        $request = $this->dialogStopRecordingRequest($dialogId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->dialogStopRecordingResponse($response, $request->getUri());
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

                    throw $this->dialogStopRecordingApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'dialogStopRecording'
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function dialogStopRecordingRequest(string $dialogId): Request
    {
        $allData = [
             'dialogId' => $dialogId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'dialogId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/dialogs/{dialogId}/stop-recording';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($dialogId !== null) {
            $resourcePath = str_replace(
                '{' . 'dialogId' . '}',
                $this->objectSerializer->toPathValue($dialogId),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'dialogStopRecording'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function dialogStopRecordingResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'dialogStopRecording'
     */
    private function dialogStopRecordingApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation downloadRecordingFile
     *
     * Download recording file
     *
     * @param string $fileId File ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \SplFileObject|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function downloadRecordingFile(string $fileId)
    {
        $request = $this->downloadRecordingFileRequest($fileId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->downloadRecordingFileResponse($response, $request->getUri());
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
            throw $this->downloadRecordingFileApiException($exception);
        }
    }

    /**
     * Operation downloadRecordingFileAsync
     *
     * Download recording file
     *
     * @param string $fileId File ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function downloadRecordingFileAsync(string $fileId): PromiseInterface
    {
        $request = $this->downloadRecordingFileRequest($fileId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->downloadRecordingFileResponse($response, $request->getUri());
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

                    throw $this->downloadRecordingFileApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'downloadRecordingFile'
     *
     * @param string $fileId File ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function downloadRecordingFileRequest(string $fileId): Request
    {
        $allData = [
             'fileId' => $fileId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'fileId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/recordings/files/{fileId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($fileId !== null) {
            $resourcePath = str_replace(
                '{' . 'fileId' . '}',
                $this->objectSerializer->toPathValue($fileId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/octet-stream',

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
     * Create response for operation 'downloadRecordingFile'
     * @throws ApiException on non-2xx response
     * @return \SplFileObject|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function downloadRecordingFileResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\SplFileObject', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'downloadRecordingFile'
     */
    private function downloadRecordingFileApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getBulkStatus
     *
     * Get bulk status
     *
     * @param string $bulkId Bulk ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallBulkStatus|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getBulkStatus(string $bulkId)
    {
        $request = $this->getBulkStatusRequest($bulkId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getBulkStatusResponse($response, $request->getUri());
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
            throw $this->getBulkStatusApiException($exception);
        }
    }

    /**
     * Operation getBulkStatusAsync
     *
     * Get bulk status
     *
     * @param string $bulkId Bulk ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getBulkStatusAsync(string $bulkId): PromiseInterface
    {
        $request = $this->getBulkStatusRequest($bulkId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getBulkStatusResponse($response, $request->getUri());
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

                    throw $this->getBulkStatusApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getBulkStatus'
     *
     * @param string $bulkId Bulk ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getBulkStatusRequest(string $bulkId): Request
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

        $resourcePath = '/calls/1/bulks/{bulkId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($bulkId !== null) {
            $resourcePath = str_replace(
                '{' . 'bulkId' . '}',
                $this->objectSerializer->toPathValue($bulkId),
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
     * Create response for operation 'getBulkStatus'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallBulkStatus|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getBulkStatusResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallBulkStatus', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getBulkStatus'
     */
    private function getBulkStatusApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getCall
     *
     * Get call
     *
     * @param string $callId Call ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\Call|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getCall(string $callId)
    {
        $request = $this->getCallRequest($callId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getCallResponse($response, $request->getUri());
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
            throw $this->getCallApiException($exception);
        }
    }

    /**
     * Operation getCallAsync
     *
     * Get call
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getCallAsync(string $callId): PromiseInterface
    {
        $request = $this->getCallRequest($callId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getCallResponse($response, $request->getUri());
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

                    throw $this->getCallApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getCall'
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getCallRequest(string $callId): Request
    {
        $allData = [
             'callId' => $callId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
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
     * Create response for operation 'getCall'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\Call|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getCallResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\Call', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getCall'
     */
    private function getCallApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getCallHistory
     *
     * Get call history
     *
     * @param string $callId Call ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallLog|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getCallHistory(string $callId)
    {
        $request = $this->getCallHistoryRequest($callId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getCallHistoryResponse($response, $request->getUri());
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
            throw $this->getCallHistoryApiException($exception);
        }
    }

    /**
     * Operation getCallHistoryAsync
     *
     * Get call history
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getCallHistoryAsync(string $callId): PromiseInterface
    {
        $request = $this->getCallHistoryRequest($callId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getCallHistoryResponse($response, $request->getUri());
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

                    throw $this->getCallHistoryApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getCallHistory'
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getCallHistoryRequest(string $callId): Request
    {
        $allData = [
             'callId' => $callId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/history';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
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
     * Create response for operation 'getCallHistory'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallLog|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getCallHistoryResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallLog', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getCallHistory'
     */
    private function getCallHistoryApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getCallRecordings
     *
     * Get call recordings
     *
     * @param string $callId Call ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallRecording|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getCallRecordings(string $callId)
    {
        $request = $this->getCallRecordingsRequest($callId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getCallRecordingsResponse($response, $request->getUri());
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
            throw $this->getCallRecordingsApiException($exception);
        }
    }

    /**
     * Operation getCallRecordingsAsync
     *
     * Get call recordings
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getCallRecordingsAsync(string $callId): PromiseInterface
    {
        $request = $this->getCallRecordingsRequest($callId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getCallRecordingsResponse($response, $request->getUri());
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

                    throw $this->getCallRecordingsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getCallRecordings'
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getCallRecordingsRequest(string $callId): Request
    {
        $allData = [
             'callId' => $callId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/recordings/calls/{callId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
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
     * Create response for operation 'getCallRecordings'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallRecording|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getCallRecordingsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallRecording', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getCallRecordings'
     */
    private function getCallRecordingsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getCalls
     *
     * Get calls
     *
     * @param null|\Infobip\Model\CallEndpointType $type Call endpoint type. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|string $from Caller identifier. (optional)
     * @param null|string $to Callee identifier. (optional)
     * @param null|\Infobip\Model\CallDirection $direction Call direction. (optional)
     * @param null|\Infobip\Model\CallState $status Call state. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the call has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param null|string $conferenceId Conference ID. (optional)
     * @param null|string $dialogId Dialog ID. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getCalls(?\Infobip\Model\CallEndpointType $type = null, ?string $applicationId = null, ?string $from = null, ?string $to = null, ?\Infobip\Model\CallDirection $direction = null, ?\Infobip\Model\CallState $status = null, ?\DateTime $startTimeAfter = null, ?string $conferenceId = null, ?string $dialogId = null, int $page = 0, int $size = 20)
    {
        $request = $this->getCallsRequest($type, $applicationId, $from, $to, $direction, $status, $startTimeAfter, $conferenceId, $dialogId, $page, $size);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getCallsResponse($response, $request->getUri());
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
            throw $this->getCallsApiException($exception);
        }
    }

    /**
     * Operation getCallsAsync
     *
     * Get calls
     *
     * @param null|\Infobip\Model\CallEndpointType $type Call endpoint type. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|string $from Caller identifier. (optional)
     * @param null|string $to Callee identifier. (optional)
     * @param null|\Infobip\Model\CallDirection $direction Call direction. (optional)
     * @param null|\Infobip\Model\CallState $status Call state. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the call has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param null|string $conferenceId Conference ID. (optional)
     * @param null|string $dialogId Dialog ID. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    public function getCallsAsync(?\Infobip\Model\CallEndpointType $type = null, ?string $applicationId = null, ?string $from = null, ?string $to = null, ?\Infobip\Model\CallDirection $direction = null, ?\Infobip\Model\CallState $status = null, ?\DateTime $startTimeAfter = null, ?string $conferenceId = null, ?string $dialogId = null, int $page = 0, int $size = 20): PromiseInterface
    {
        $request = $this->getCallsRequest($type, $applicationId, $from, $to, $direction, $status, $startTimeAfter, $conferenceId, $dialogId, $page, $size);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getCallsResponse($response, $request->getUri());
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

                    throw $this->getCallsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getCalls'
     *
     * @param null|\Infobip\Model\CallEndpointType $type Call endpoint type. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|string $from Caller identifier. (optional)
     * @param null|string $to Callee identifier. (optional)
     * @param null|\Infobip\Model\CallDirection $direction Call direction. (optional)
     * @param null|\Infobip\Model\CallState $status Call state. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the call has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param null|string $conferenceId Conference ID. (optional)
     * @param null|string $dialogId Dialog ID. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    private function getCallsRequest(?\Infobip\Model\CallEndpointType $type = null, ?string $applicationId = null, ?string $from = null, ?string $to = null, ?\Infobip\Model\CallDirection $direction = null, ?\Infobip\Model\CallState $status = null, ?\DateTime $startTimeAfter = null, ?string $conferenceId = null, ?string $dialogId = null, int $page = 0, int $size = 20): Request
    {
        $allData = [
             'type' => $type,
             'applicationId' => $applicationId,
             'from' => $from,
             'to' => $to,
             'direction' => $direction,
             'status' => $status,
             'startTimeAfter' => $startTimeAfter,
             'conferenceId' => $conferenceId,
             'dialogId' => $dialogId,
             'page' => $page,
             'size' => $size,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'type' => [
                        new Assert\Choice(['PHONE','SIP','WEBRTC','VIBER',]),
                    ],
                    'applicationId' => [
                    ],
                    'from' => [
                    ],
                    'to' => [
                    ],
                    'direction' => [
                        new Assert\Choice(['INBOUND','OUTBOUND',]),
                    ],
                    'status' => [
                        new Assert\Choice(['CALLING','RINGING','PRE_ESTABLISHED','ESTABLISHED','FINISHED','FAILED','CANCELLED','NO_ANSWER','BUSY',]),
                    ],
                    'startTimeAfter' => [
                    ],
                    'conferenceId' => [
                    ],
                    'dialogId' => [
                    ],
                    'page' => [
                        new Assert\GreaterThan(0),
                    ],
                    'size' => [
                        new Assert\LessThan(100),
                        new Assert\GreaterThan(1),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($type !== null) {
            $queryParams['type'] = $type;
        }

        // query params
        if ($applicationId !== null) {
            $queryParams['applicationId'] = $applicationId;
        }

        // query params
        if ($from !== null) {
            $queryParams['from'] = $from;
        }

        // query params
        if ($to !== null) {
            $queryParams['to'] = $to;
        }

        // query params
        if ($direction !== null) {
            $queryParams['direction'] = $direction;
        }

        // query params
        if ($status !== null) {
            $queryParams['status'] = $status;
        }

        // query params
        if ($startTimeAfter !== null) {
            $queryParams['startTimeAfter'] = $startTimeAfter;
        }

        // query params
        if ($conferenceId !== null) {
            $queryParams['conferenceId'] = $conferenceId;
        }

        // query params
        if ($dialogId !== null) {
            $queryParams['dialogId'] = $dialogId;
        }

        // query params
        if ($page !== null) {
            $queryParams['page'] = $page;
        }

        // query params
        if ($size !== null) {
            $queryParams['size'] = $size;
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
     * Create response for operation 'getCalls'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getCallsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallPage', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getCalls'
     */
    private function getCallsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getCallsFile
     *
     * Get file
     *
     * @param string $fileId File ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsFile|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getCallsFile(string $fileId)
    {
        $request = $this->getCallsFileRequest($fileId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getCallsFileResponse($response, $request->getUri());
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
            throw $this->getCallsFileApiException($exception);
        }
    }

    /**
     * Operation getCallsFileAsync
     *
     * Get file
     *
     * @param string $fileId File ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getCallsFileAsync(string $fileId): PromiseInterface
    {
        $request = $this->getCallsFileRequest($fileId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getCallsFileResponse($response, $request->getUri());
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

                    throw $this->getCallsFileApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getCallsFile'
     *
     * @param string $fileId File ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getCallsFileRequest(string $fileId): Request
    {
        $allData = [
             'fileId' => $fileId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'fileId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/files/{fileId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($fileId !== null) {
            $resourcePath = str_replace(
                '{' . 'fileId' . '}',
                $this->objectSerializer->toPathValue($fileId),
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
     * Create response for operation 'getCallsFile'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsFile|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getCallsFileResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsFile', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getCallsFile'
     */
    private function getCallsFileApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getCallsFiles
     *
     * Get files
     *
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsFilePage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getCallsFiles(int $page = 0, int $size = 20)
    {
        $request = $this->getCallsFilesRequest($page, $size);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getCallsFilesResponse($response, $request->getUri());
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
            throw $this->getCallsFilesApiException($exception);
        }
    }

    /**
     * Operation getCallsFilesAsync
     *
     * Get files
     *
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    public function getCallsFilesAsync(int $page = 0, int $size = 20): PromiseInterface
    {
        $request = $this->getCallsFilesRequest($page, $size);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getCallsFilesResponse($response, $request->getUri());
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

                    throw $this->getCallsFilesApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getCallsFiles'
     *
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    private function getCallsFilesRequest(int $page = 0, int $size = 20): Request
    {
        $allData = [
             'page' => $page,
             'size' => $size,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'page' => [
                        new Assert\GreaterThan(0),
                    ],
                    'size' => [
                        new Assert\LessThan(100),
                        new Assert\GreaterThan(1),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/files';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($page !== null) {
            $queryParams['page'] = $page;
        }

        // query params
        if ($size !== null) {
            $queryParams['size'] = $size;
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
     * Create response for operation 'getCallsFiles'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsFilePage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getCallsFilesResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsFilePage', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getCallsFiles'
     */
    private function getCallsFilesApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getCallsHistory
     *
     * Get calls history
     *
     * @param null|\Infobip\Model\CallEndpointType $type Call endpoint type. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|string $from Caller identifier. (optional)
     * @param null|string $to Callee identifier. (optional)
     * @param null|\Infobip\Model\CallDirection $direction Call direction. (optional)
     * @param null|\Infobip\Model\CallState $status Call state. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the call has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param null|\DateTime $endTimeBefore Date and time for when the call has been finished. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param null|string $conferenceId Conference ID. (optional)
     * @param null|string $dialogId Dialog ID. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallLogPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getCallsHistory(?\Infobip\Model\CallEndpointType $type = null, ?string $applicationId = null, ?string $from = null, ?string $to = null, ?\Infobip\Model\CallDirection $direction = null, ?\Infobip\Model\CallState $status = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, ?string $conferenceId = null, ?string $dialogId = null, int $page = 0, int $size = 20)
    {
        $request = $this->getCallsHistoryRequest($type, $applicationId, $from, $to, $direction, $status, $startTimeAfter, $endTimeBefore, $conferenceId, $dialogId, $page, $size);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getCallsHistoryResponse($response, $request->getUri());
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
            throw $this->getCallsHistoryApiException($exception);
        }
    }

    /**
     * Operation getCallsHistoryAsync
     *
     * Get calls history
     *
     * @param null|\Infobip\Model\CallEndpointType $type Call endpoint type. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|string $from Caller identifier. (optional)
     * @param null|string $to Callee identifier. (optional)
     * @param null|\Infobip\Model\CallDirection $direction Call direction. (optional)
     * @param null|\Infobip\Model\CallState $status Call state. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the call has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param null|\DateTime $endTimeBefore Date and time for when the call has been finished. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param null|string $conferenceId Conference ID. (optional)
     * @param null|string $dialogId Dialog ID. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    public function getCallsHistoryAsync(?\Infobip\Model\CallEndpointType $type = null, ?string $applicationId = null, ?string $from = null, ?string $to = null, ?\Infobip\Model\CallDirection $direction = null, ?\Infobip\Model\CallState $status = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, ?string $conferenceId = null, ?string $dialogId = null, int $page = 0, int $size = 20): PromiseInterface
    {
        $request = $this->getCallsHistoryRequest($type, $applicationId, $from, $to, $direction, $status, $startTimeAfter, $endTimeBefore, $conferenceId, $dialogId, $page, $size);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getCallsHistoryResponse($response, $request->getUri());
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

                    throw $this->getCallsHistoryApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getCallsHistory'
     *
     * @param null|\Infobip\Model\CallEndpointType $type Call endpoint type. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|string $from Caller identifier. (optional)
     * @param null|string $to Callee identifier. (optional)
     * @param null|\Infobip\Model\CallDirection $direction Call direction. (optional)
     * @param null|\Infobip\Model\CallState $status Call state. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the call has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param null|\DateTime $endTimeBefore Date and time for when the call has been finished. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param null|string $conferenceId Conference ID. (optional)
     * @param null|string $dialogId Dialog ID. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    private function getCallsHistoryRequest(?\Infobip\Model\CallEndpointType $type = null, ?string $applicationId = null, ?string $from = null, ?string $to = null, ?\Infobip\Model\CallDirection $direction = null, ?\Infobip\Model\CallState $status = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, ?string $conferenceId = null, ?string $dialogId = null, int $page = 0, int $size = 20): Request
    {
        $allData = [
             'type' => $type,
             'applicationId' => $applicationId,
             'from' => $from,
             'to' => $to,
             'direction' => $direction,
             'status' => $status,
             'startTimeAfter' => $startTimeAfter,
             'endTimeBefore' => $endTimeBefore,
             'conferenceId' => $conferenceId,
             'dialogId' => $dialogId,
             'page' => $page,
             'size' => $size,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'type' => [
                        new Assert\Choice(['PHONE','SIP','WEBRTC','VIBER',]),
                    ],
                    'applicationId' => [
                    ],
                    'from' => [
                    ],
                    'to' => [
                    ],
                    'direction' => [
                        new Assert\Choice(['INBOUND','OUTBOUND',]),
                    ],
                    'status' => [
                        new Assert\Choice(['CALLING','RINGING','PRE_ESTABLISHED','ESTABLISHED','FINISHED','FAILED','CANCELLED','NO_ANSWER','BUSY',]),
                    ],
                    'startTimeAfter' => [
                    ],
                    'endTimeBefore' => [
                    ],
                    'conferenceId' => [
                    ],
                    'dialogId' => [
                    ],
                    'page' => [
                        new Assert\GreaterThan(0),
                    ],
                    'size' => [
                        new Assert\LessThan(100),
                        new Assert\GreaterThan(1),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/history';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($type !== null) {
            $queryParams['type'] = $type;
        }

        // query params
        if ($applicationId !== null) {
            $queryParams['applicationId'] = $applicationId;
        }

        // query params
        if ($from !== null) {
            $queryParams['from'] = $from;
        }

        // query params
        if ($to !== null) {
            $queryParams['to'] = $to;
        }

        // query params
        if ($direction !== null) {
            $queryParams['direction'] = $direction;
        }

        // query params
        if ($status !== null) {
            $queryParams['status'] = $status;
        }

        // query params
        if ($startTimeAfter !== null) {
            $queryParams['startTimeAfter'] = $startTimeAfter;
        }

        // query params
        if ($endTimeBefore !== null) {
            $queryParams['endTimeBefore'] = $endTimeBefore;
        }

        // query params
        if ($conferenceId !== null) {
            $queryParams['conferenceId'] = $conferenceId;
        }

        // query params
        if ($dialogId !== null) {
            $queryParams['dialogId'] = $dialogId;
        }

        // query params
        if ($page !== null) {
            $queryParams['page'] = $page;
        }

        // query params
        if ($size !== null) {
            $queryParams['size'] = $size;
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
     * Create response for operation 'getCallsHistory'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallLogPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getCallsHistoryResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallLogPage', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getCallsHistory'
     */
    private function getCallsHistoryApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getCallsRecordings
     *
     * Get calls recordings
     *
     * @param null|string $callId Call ID. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|string $endpointIdentifier Endpoint identifier. (optional)
     * @param null|\DateTime $startTimeAfter Date and time when the (first) call recording started. (optional)
     * @param null|\DateTime $endTimeBefore Date and time when the (last) call recording ended. (optional)
     * @param null|\Infobip\Model\CallDirection $direction Call direction. (optional)
     * @param null|\Infobip\Model\CallEndpointType $endpointType Endpoint type. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallRecordingPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getCallsRecordings(?string $callId = null, ?string $applicationId = null, ?string $endpointIdentifier = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, ?\Infobip\Model\CallDirection $direction = null, ?\Infobip\Model\CallEndpointType $endpointType = null, int $page = 0, int $size = 20)
    {
        $request = $this->getCallsRecordingsRequest($callId, $applicationId, $endpointIdentifier, $startTimeAfter, $endTimeBefore, $direction, $endpointType, $page, $size);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getCallsRecordingsResponse($response, $request->getUri());
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
            throw $this->getCallsRecordingsApiException($exception);
        }
    }

    /**
     * Operation getCallsRecordingsAsync
     *
     * Get calls recordings
     *
     * @param null|string $callId Call ID. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|string $endpointIdentifier Endpoint identifier. (optional)
     * @param null|\DateTime $startTimeAfter Date and time when the (first) call recording started. (optional)
     * @param null|\DateTime $endTimeBefore Date and time when the (last) call recording ended. (optional)
     * @param null|\Infobip\Model\CallDirection $direction Call direction. (optional)
     * @param null|\Infobip\Model\CallEndpointType $endpointType Endpoint type. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    public function getCallsRecordingsAsync(?string $callId = null, ?string $applicationId = null, ?string $endpointIdentifier = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, ?\Infobip\Model\CallDirection $direction = null, ?\Infobip\Model\CallEndpointType $endpointType = null, int $page = 0, int $size = 20): PromiseInterface
    {
        $request = $this->getCallsRecordingsRequest($callId, $applicationId, $endpointIdentifier, $startTimeAfter, $endTimeBefore, $direction, $endpointType, $page, $size);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getCallsRecordingsResponse($response, $request->getUri());
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

                    throw $this->getCallsRecordingsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getCallsRecordings'
     *
     * @param null|string $callId Call ID. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|string $endpointIdentifier Endpoint identifier. (optional)
     * @param null|\DateTime $startTimeAfter Date and time when the (first) call recording started. (optional)
     * @param null|\DateTime $endTimeBefore Date and time when the (last) call recording ended. (optional)
     * @param null|\Infobip\Model\CallDirection $direction Call direction. (optional)
     * @param null|\Infobip\Model\CallEndpointType $endpointType Endpoint type. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    private function getCallsRecordingsRequest(?string $callId = null, ?string $applicationId = null, ?string $endpointIdentifier = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, ?\Infobip\Model\CallDirection $direction = null, ?\Infobip\Model\CallEndpointType $endpointType = null, int $page = 0, int $size = 20): Request
    {
        $allData = [
             'callId' => $callId,
             'applicationId' => $applicationId,
             'endpointIdentifier' => $endpointIdentifier,
             'startTimeAfter' => $startTimeAfter,
             'endTimeBefore' => $endTimeBefore,
             'direction' => $direction,
             'endpointType' => $endpointType,
             'page' => $page,
             'size' => $size,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                    ],
                    'applicationId' => [
                    ],
                    'endpointIdentifier' => [
                    ],
                    'startTimeAfter' => [
                    ],
                    'endTimeBefore' => [
                    ],
                    'direction' => [
                        new Assert\Choice(['INBOUND','OUTBOUND',]),
                    ],
                    'endpointType' => [
                        new Assert\Choice(['PHONE','SIP','WEBRTC','VIBER',]),
                    ],
                    'page' => [
                        new Assert\GreaterThan(0),
                    ],
                    'size' => [
                        new Assert\LessThan(100),
                        new Assert\GreaterThan(1),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/recordings/calls';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($callId !== null) {
            $queryParams['callId'] = $callId;
        }

        // query params
        if ($applicationId !== null) {
            $queryParams['applicationId'] = $applicationId;
        }

        // query params
        if ($endpointIdentifier !== null) {
            $queryParams['endpointIdentifier'] = $endpointIdentifier;
        }

        // query params
        if ($startTimeAfter !== null) {
            $queryParams['startTimeAfter'] = $startTimeAfter;
        }

        // query params
        if ($endTimeBefore !== null) {
            $queryParams['endTimeBefore'] = $endTimeBefore;
        }

        // query params
        if ($direction !== null) {
            $queryParams['direction'] = $direction;
        }

        // query params
        if ($endpointType !== null) {
            $queryParams['endpointType'] = $endpointType;
        }

        // query params
        if ($page !== null) {
            $queryParams['page'] = $page;
        }

        // query params
        if ($size !== null) {
            $queryParams['size'] = $size;
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
     * Create response for operation 'getCallsRecordings'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallRecordingPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getCallsRecordingsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallRecordingPage', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getCallsRecordings'
     */
    private function getCallsRecordingsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getConference
     *
     * Get conference
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsConference|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getConference(string $conferenceId)
    {
        $request = $this->getConferenceRequest($conferenceId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getConferenceResponse($response, $request->getUri());
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
            throw $this->getConferenceApiException($exception);
        }
    }

    /**
     * Operation getConferenceAsync
     *
     * Get conference
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getConferenceAsync(string $conferenceId): PromiseInterface
    {
        $request = $this->getConferenceRequest($conferenceId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getConferenceResponse($response, $request->getUri());
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

                    throw $this->getConferenceApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getConference'
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getConferenceRequest(string $conferenceId): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/conferences/{conferenceId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($conferenceId !== null) {
            $resourcePath = str_replace(
                '{' . 'conferenceId' . '}',
                $this->objectSerializer->toPathValue($conferenceId),
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
     * Create response for operation 'getConference'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsConference|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getConferenceResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsConference', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getConference'
     */
    private function getConferenceApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getConferenceHistory
     *
     * Get conference history
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsConferenceLog|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getConferenceHistory(string $conferenceId)
    {
        $request = $this->getConferenceHistoryRequest($conferenceId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getConferenceHistoryResponse($response, $request->getUri());
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
            throw $this->getConferenceHistoryApiException($exception);
        }
    }

    /**
     * Operation getConferenceHistoryAsync
     *
     * Get conference history
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getConferenceHistoryAsync(string $conferenceId): PromiseInterface
    {
        $request = $this->getConferenceHistoryRequest($conferenceId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getConferenceHistoryResponse($response, $request->getUri());
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

                    throw $this->getConferenceHistoryApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getConferenceHistory'
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getConferenceHistoryRequest(string $conferenceId): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/conferences/{conferenceId}/history';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($conferenceId !== null) {
            $resourcePath = str_replace(
                '{' . 'conferenceId' . '}',
                $this->objectSerializer->toPathValue($conferenceId),
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
     * Create response for operation 'getConferenceHistory'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsConferenceLog|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getConferenceHistoryResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsConferenceLog', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getConferenceHistory'
     */
    private function getConferenceHistoryApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getConferenceRecordings
     *
     * Get conference recordings
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsConferenceRecording|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getConferenceRecordings(string $conferenceId)
    {
        $request = $this->getConferenceRecordingsRequest($conferenceId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getConferenceRecordingsResponse($response, $request->getUri());
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
            throw $this->getConferenceRecordingsApiException($exception);
        }
    }

    /**
     * Operation getConferenceRecordingsAsync
     *
     * Get conference recordings
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getConferenceRecordingsAsync(string $conferenceId): PromiseInterface
    {
        $request = $this->getConferenceRecordingsRequest($conferenceId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getConferenceRecordingsResponse($response, $request->getUri());
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

                    throw $this->getConferenceRecordingsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getConferenceRecordings'
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getConferenceRecordingsRequest(string $conferenceId): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/recordings/conferences/{conferenceId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($conferenceId !== null) {
            $resourcePath = str_replace(
                '{' . 'conferenceId' . '}',
                $this->objectSerializer->toPathValue($conferenceId),
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
     * Create response for operation 'getConferenceRecordings'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsConferenceRecording|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getConferenceRecordingsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsConferenceRecording', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getConferenceRecordings'
     */
    private function getConferenceRecordingsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getConferences
     *
     * Get conferences
     *
     * @param null|string $name Conference name. (optional)
     * @param null|string $callId Call ID. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the conference has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsConferencePage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getConferences(?string $name = null, ?string $callId = null, ?string $applicationId = null, ?\DateTime $startTimeAfter = null, int $page = 0, int $size = 20)
    {
        $request = $this->getConferencesRequest($name, $callId, $applicationId, $startTimeAfter, $page, $size);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getConferencesResponse($response, $request->getUri());
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
            throw $this->getConferencesApiException($exception);
        }
    }

    /**
     * Operation getConferencesAsync
     *
     * Get conferences
     *
     * @param null|string $name Conference name. (optional)
     * @param null|string $callId Call ID. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the conference has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    public function getConferencesAsync(?string $name = null, ?string $callId = null, ?string $applicationId = null, ?\DateTime $startTimeAfter = null, int $page = 0, int $size = 20): PromiseInterface
    {
        $request = $this->getConferencesRequest($name, $callId, $applicationId, $startTimeAfter, $page, $size);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getConferencesResponse($response, $request->getUri());
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

                    throw $this->getConferencesApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getConferences'
     *
     * @param null|string $name Conference name. (optional)
     * @param null|string $callId Call ID. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the conference has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    private function getConferencesRequest(?string $name = null, ?string $callId = null, ?string $applicationId = null, ?\DateTime $startTimeAfter = null, int $page = 0, int $size = 20): Request
    {
        $allData = [
             'name' => $name,
             'callId' => $callId,
             'applicationId' => $applicationId,
             'startTimeAfter' => $startTimeAfter,
             'page' => $page,
             'size' => $size,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'name' => [
                    ],
                    'callId' => [
                    ],
                    'applicationId' => [
                    ],
                    'startTimeAfter' => [
                    ],
                    'page' => [
                        new Assert\GreaterThan(0),
                    ],
                    'size' => [
                        new Assert\LessThan(100),
                        new Assert\GreaterThan(1),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/conferences';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($name !== null) {
            $queryParams['name'] = $name;
        }

        // query params
        if ($callId !== null) {
            $queryParams['callId'] = $callId;
        }

        // query params
        if ($applicationId !== null) {
            $queryParams['applicationId'] = $applicationId;
        }

        // query params
        if ($startTimeAfter !== null) {
            $queryParams['startTimeAfter'] = $startTimeAfter;
        }

        // query params
        if ($page !== null) {
            $queryParams['page'] = $page;
        }

        // query params
        if ($size !== null) {
            $queryParams['size'] = $size;
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
     * Create response for operation 'getConferences'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsConferencePage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getConferencesResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsConferencePage', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getConferences'
     */
    private function getConferencesApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getConferencesHistory
     *
     * Get conferences history
     *
     * @param null|string $name Conference name. (optional)
     * @param null|string $callId Call ID. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the conference has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param null|\DateTime $endTimeBefore Date and time for when the conference has been finished. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsConferenceLogPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getConferencesHistory(?string $name = null, ?string $callId = null, ?string $applicationId = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, int $page = 0, int $size = 20)
    {
        $request = $this->getConferencesHistoryRequest($name, $callId, $applicationId, $startTimeAfter, $endTimeBefore, $page, $size);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getConferencesHistoryResponse($response, $request->getUri());
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
            throw $this->getConferencesHistoryApiException($exception);
        }
    }

    /**
     * Operation getConferencesHistoryAsync
     *
     * Get conferences history
     *
     * @param null|string $name Conference name. (optional)
     * @param null|string $callId Call ID. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the conference has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param null|\DateTime $endTimeBefore Date and time for when the conference has been finished. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    public function getConferencesHistoryAsync(?string $name = null, ?string $callId = null, ?string $applicationId = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, int $page = 0, int $size = 20): PromiseInterface
    {
        $request = $this->getConferencesHistoryRequest($name, $callId, $applicationId, $startTimeAfter, $endTimeBefore, $page, $size);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getConferencesHistoryResponse($response, $request->getUri());
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

                    throw $this->getConferencesHistoryApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getConferencesHistory'
     *
     * @param null|string $name Conference name. (optional)
     * @param null|string $callId Call ID. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the conference has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param null|\DateTime $endTimeBefore Date and time for when the conference has been finished. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    private function getConferencesHistoryRequest(?string $name = null, ?string $callId = null, ?string $applicationId = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, int $page = 0, int $size = 20): Request
    {
        $allData = [
             'name' => $name,
             'callId' => $callId,
             'applicationId' => $applicationId,
             'startTimeAfter' => $startTimeAfter,
             'endTimeBefore' => $endTimeBefore,
             'page' => $page,
             'size' => $size,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'name' => [
                    ],
                    'callId' => [
                    ],
                    'applicationId' => [
                    ],
                    'startTimeAfter' => [
                    ],
                    'endTimeBefore' => [
                    ],
                    'page' => [
                        new Assert\GreaterThan(0),
                    ],
                    'size' => [
                        new Assert\LessThan(100),
                        new Assert\GreaterThan(1),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/conferences/history';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($name !== null) {
            $queryParams['name'] = $name;
        }

        // query params
        if ($callId !== null) {
            $queryParams['callId'] = $callId;
        }

        // query params
        if ($applicationId !== null) {
            $queryParams['applicationId'] = $applicationId;
        }

        // query params
        if ($startTimeAfter !== null) {
            $queryParams['startTimeAfter'] = $startTimeAfter;
        }

        // query params
        if ($endTimeBefore !== null) {
            $queryParams['endTimeBefore'] = $endTimeBefore;
        }

        // query params
        if ($page !== null) {
            $queryParams['page'] = $page;
        }

        // query params
        if ($size !== null) {
            $queryParams['size'] = $size;
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
     * Create response for operation 'getConferencesHistory'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsConferenceLogPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getConferencesHistoryResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsConferenceLogPage', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getConferencesHistory'
     */
    private function getConferencesHistoryApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getConferencesRecordings
     *
     * Get conferences recordings
     *
     * @param null|string $conferenceId Conference ID. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|string $conferenceName Conference name. (optional)
     * @param null|string $callId Filter all conference recordings where call ID was included in the recording. (optional)
     * @param null|\DateTime $startTimeAfter Date and time when the (first) conference recording started. (optional)
     * @param null|\DateTime $endTimeBefore Date and time when the (last) conference recording ended. (optional)
     * @param null|bool $composition Flag indicating whether auto-compose feature was turned on for the recording. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsConferenceRecordingPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getConferencesRecordings(?string $conferenceId = null, ?string $applicationId = null, ?string $conferenceName = null, ?string $callId = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, ?bool $composition = null, int $page = 0, int $size = 20)
    {
        $request = $this->getConferencesRecordingsRequest($conferenceId, $applicationId, $conferenceName, $callId, $startTimeAfter, $endTimeBefore, $composition, $page, $size);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getConferencesRecordingsResponse($response, $request->getUri());
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
            throw $this->getConferencesRecordingsApiException($exception);
        }
    }

    /**
     * Operation getConferencesRecordingsAsync
     *
     * Get conferences recordings
     *
     * @param null|string $conferenceId Conference ID. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|string $conferenceName Conference name. (optional)
     * @param null|string $callId Filter all conference recordings where call ID was included in the recording. (optional)
     * @param null|\DateTime $startTimeAfter Date and time when the (first) conference recording started. (optional)
     * @param null|\DateTime $endTimeBefore Date and time when the (last) conference recording ended. (optional)
     * @param null|bool $composition Flag indicating whether auto-compose feature was turned on for the recording. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    public function getConferencesRecordingsAsync(?string $conferenceId = null, ?string $applicationId = null, ?string $conferenceName = null, ?string $callId = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, ?bool $composition = null, int $page = 0, int $size = 20): PromiseInterface
    {
        $request = $this->getConferencesRecordingsRequest($conferenceId, $applicationId, $conferenceName, $callId, $startTimeAfter, $endTimeBefore, $composition, $page, $size);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getConferencesRecordingsResponse($response, $request->getUri());
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

                    throw $this->getConferencesRecordingsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getConferencesRecordings'
     *
     * @param null|string $conferenceId Conference ID. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|string $conferenceName Conference name. (optional)
     * @param null|string $callId Filter all conference recordings where call ID was included in the recording. (optional)
     * @param null|\DateTime $startTimeAfter Date and time when the (first) conference recording started. (optional)
     * @param null|\DateTime $endTimeBefore Date and time when the (last) conference recording ended. (optional)
     * @param null|bool $composition Flag indicating whether auto-compose feature was turned on for the recording. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    private function getConferencesRecordingsRequest(?string $conferenceId = null, ?string $applicationId = null, ?string $conferenceName = null, ?string $callId = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, ?bool $composition = null, int $page = 0, int $size = 20): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
             'applicationId' => $applicationId,
             'conferenceName' => $conferenceName,
             'callId' => $callId,
             'startTimeAfter' => $startTimeAfter,
             'endTimeBefore' => $endTimeBefore,
             'composition' => $composition,
             'page' => $page,
             'size' => $size,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                    ],
                    'applicationId' => [
                    ],
                    'conferenceName' => [
                    ],
                    'callId' => [
                    ],
                    'startTimeAfter' => [
                    ],
                    'endTimeBefore' => [
                    ],
                    'composition' => [
                    ],
                    'page' => [
                        new Assert\GreaterThan(0),
                    ],
                    'size' => [
                        new Assert\LessThan(100),
                        new Assert\GreaterThan(1),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/recordings/conferences';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($conferenceId !== null) {
            $queryParams['conferenceId'] = $conferenceId;
        }

        // query params
        if ($applicationId !== null) {
            $queryParams['applicationId'] = $applicationId;
        }

        // query params
        if ($conferenceName !== null) {
            $queryParams['conferenceName'] = $conferenceName;
        }

        // query params
        if ($callId !== null) {
            $queryParams['callId'] = $callId;
        }

        // query params
        if ($startTimeAfter !== null) {
            $queryParams['startTimeAfter'] = $startTimeAfter;
        }

        // query params
        if ($endTimeBefore !== null) {
            $queryParams['endTimeBefore'] = $endTimeBefore;
        }

        // query params
        if ($composition !== null) {
            $queryParams['composition'] = $composition;
        }

        // query params
        if ($page !== null) {
            $queryParams['page'] = $page;
        }

        // query params
        if ($size !== null) {
            $queryParams['size'] = $size;
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
     * Create response for operation 'getConferencesRecordings'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsConferenceRecordingPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getConferencesRecordingsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsConferenceRecordingPage', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getConferencesRecordings'
     */
    private function getConferencesRecordingsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getDialog
     *
     * Get dialog
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsDialogResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getDialog(string $dialogId)
    {
        $request = $this->getDialogRequest($dialogId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getDialogResponse($response, $request->getUri());
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
            throw $this->getDialogApiException($exception);
        }
    }

    /**
     * Operation getDialogAsync
     *
     * Get dialog
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getDialogAsync(string $dialogId): PromiseInterface
    {
        $request = $this->getDialogRequest($dialogId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getDialogResponse($response, $request->getUri());
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

                    throw $this->getDialogApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getDialog'
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getDialogRequest(string $dialogId): Request
    {
        $allData = [
             'dialogId' => $dialogId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'dialogId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/dialogs/{dialogId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($dialogId !== null) {
            $resourcePath = str_replace(
                '{' . 'dialogId' . '}',
                $this->objectSerializer->toPathValue($dialogId),
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
     * Create response for operation 'getDialog'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsDialogResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getDialogResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsDialogResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getDialog'
     */
    private function getDialogApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getDialogHistory
     *
     * Get dialog history
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsDialogLogResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getDialogHistory(string $dialogId)
    {
        $request = $this->getDialogHistoryRequest($dialogId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getDialogHistoryResponse($response, $request->getUri());
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
            throw $this->getDialogHistoryApiException($exception);
        }
    }

    /**
     * Operation getDialogHistoryAsync
     *
     * Get dialog history
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getDialogHistoryAsync(string $dialogId): PromiseInterface
    {
        $request = $this->getDialogHistoryRequest($dialogId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getDialogHistoryResponse($response, $request->getUri());
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

                    throw $this->getDialogHistoryApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getDialogHistory'
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getDialogHistoryRequest(string $dialogId): Request
    {
        $allData = [
             'dialogId' => $dialogId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'dialogId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/dialogs/{dialogId}/history';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($dialogId !== null) {
            $resourcePath = str_replace(
                '{' . 'dialogId' . '}',
                $this->objectSerializer->toPathValue($dialogId),
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
     * Create response for operation 'getDialogHistory'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsDialogLogResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getDialogHistoryResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsDialogLogResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getDialogHistory'
     */
    private function getDialogHistoryApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getDialogRecordings
     *
     * Get dialog recordings
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsDialogRecordingResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getDialogRecordings(string $dialogId)
    {
        $request = $this->getDialogRecordingsRequest($dialogId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getDialogRecordingsResponse($response, $request->getUri());
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
            throw $this->getDialogRecordingsApiException($exception);
        }
    }

    /**
     * Operation getDialogRecordingsAsync
     *
     * Get dialog recordings
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getDialogRecordingsAsync(string $dialogId): PromiseInterface
    {
        $request = $this->getDialogRecordingsRequest($dialogId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getDialogRecordingsResponse($response, $request->getUri());
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

                    throw $this->getDialogRecordingsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getDialogRecordings'
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getDialogRecordingsRequest(string $dialogId): Request
    {
        $allData = [
             'dialogId' => $dialogId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'dialogId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/recordings/dialogs/{dialogId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($dialogId !== null) {
            $resourcePath = str_replace(
                '{' . 'dialogId' . '}',
                $this->objectSerializer->toPathValue($dialogId),
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
     * Create response for operation 'getDialogRecordings'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsDialogRecordingResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getDialogRecordingsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsDialogRecordingResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getDialogRecordings'
     */
    private function getDialogRecordingsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getDialogs
     *
     * Get dialogs
     *
     * @param null|string $applicationId Application ID. (optional)
     * @param null|\Infobip\Model\CallsDialogState $state Dialog state. (optional)
     * @param null|string $parentCallId Parent call ID. (optional)
     * @param null|string $childCallId Child call ID. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the dialog has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsDialogPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getDialogs(?string $applicationId = null, ?\Infobip\Model\CallsDialogState $state = null, ?string $parentCallId = null, ?string $childCallId = null, ?\DateTime $startTimeAfter = null, int $page = 0, int $size = 20)
    {
        $request = $this->getDialogsRequest($applicationId, $state, $parentCallId, $childCallId, $startTimeAfter, $page, $size);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getDialogsResponse($response, $request->getUri());
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
            throw $this->getDialogsApiException($exception);
        }
    }

    /**
     * Operation getDialogsAsync
     *
     * Get dialogs
     *
     * @param null|string $applicationId Application ID. (optional)
     * @param null|\Infobip\Model\CallsDialogState $state Dialog state. (optional)
     * @param null|string $parentCallId Parent call ID. (optional)
     * @param null|string $childCallId Child call ID. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the dialog has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    public function getDialogsAsync(?string $applicationId = null, ?\Infobip\Model\CallsDialogState $state = null, ?string $parentCallId = null, ?string $childCallId = null, ?\DateTime $startTimeAfter = null, int $page = 0, int $size = 20): PromiseInterface
    {
        $request = $this->getDialogsRequest($applicationId, $state, $parentCallId, $childCallId, $startTimeAfter, $page, $size);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getDialogsResponse($response, $request->getUri());
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

                    throw $this->getDialogsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getDialogs'
     *
     * @param null|string $applicationId Application ID. (optional)
     * @param null|\Infobip\Model\CallsDialogState $state Dialog state. (optional)
     * @param null|string $parentCallId Parent call ID. (optional)
     * @param null|string $childCallId Child call ID. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the dialog has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    private function getDialogsRequest(?string $applicationId = null, ?\Infobip\Model\CallsDialogState $state = null, ?string $parentCallId = null, ?string $childCallId = null, ?\DateTime $startTimeAfter = null, int $page = 0, int $size = 20): Request
    {
        $allData = [
             'applicationId' => $applicationId,
             'state' => $state,
             'parentCallId' => $parentCallId,
             'childCallId' => $childCallId,
             'startTimeAfter' => $startTimeAfter,
             'page' => $page,
             'size' => $size,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'applicationId' => [
                    ],
                    'state' => [
                        new Assert\Choice(['CREATED','ESTABLISHED','FINISHED','FAILED',]),
                    ],
                    'parentCallId' => [
                    ],
                    'childCallId' => [
                    ],
                    'startTimeAfter' => [
                    ],
                    'page' => [
                        new Assert\GreaterThan(0),
                    ],
                    'size' => [
                        new Assert\LessThan(100),
                        new Assert\GreaterThan(1),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/dialogs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($applicationId !== null) {
            $queryParams['applicationId'] = $applicationId;
        }

        // query params
        if ($state !== null) {
            $queryParams['state'] = $state;
        }

        // query params
        if ($parentCallId !== null) {
            $queryParams['parentCallId'] = $parentCallId;
        }

        // query params
        if ($childCallId !== null) {
            $queryParams['childCallId'] = $childCallId;
        }

        // query params
        if ($startTimeAfter !== null) {
            $queryParams['startTimeAfter'] = $startTimeAfter;
        }

        // query params
        if ($page !== null) {
            $queryParams['page'] = $page;
        }

        // query params
        if ($size !== null) {
            $queryParams['size'] = $size;
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
     * Create response for operation 'getDialogs'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsDialogPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getDialogsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsDialogPage', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getDialogs'
     */
    private function getDialogsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getDialogsHistory
     *
     * Get dialogs history
     *
     * @param null|string $applicationId Application ID. (optional)
     * @param null|\Infobip\Model\CallsDialogState $state Dialog state. (optional)
     * @param null|string $parentCallId Parent call ID. (optional)
     * @param null|string $childCallId Child call ID. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the dialog has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param null|\DateTime $endTimeBefore Date and time for when the dialog has been finished. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsDialogLogPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getDialogsHistory(?string $applicationId = null, ?\Infobip\Model\CallsDialogState $state = null, ?string $parentCallId = null, ?string $childCallId = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, int $page = 0, int $size = 20)
    {
        $request = $this->getDialogsHistoryRequest($applicationId, $state, $parentCallId, $childCallId, $startTimeAfter, $endTimeBefore, $page, $size);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getDialogsHistoryResponse($response, $request->getUri());
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
            throw $this->getDialogsHistoryApiException($exception);
        }
    }

    /**
     * Operation getDialogsHistoryAsync
     *
     * Get dialogs history
     *
     * @param null|string $applicationId Application ID. (optional)
     * @param null|\Infobip\Model\CallsDialogState $state Dialog state. (optional)
     * @param null|string $parentCallId Parent call ID. (optional)
     * @param null|string $childCallId Child call ID. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the dialog has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param null|\DateTime $endTimeBefore Date and time for when the dialog has been finished. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    public function getDialogsHistoryAsync(?string $applicationId = null, ?\Infobip\Model\CallsDialogState $state = null, ?string $parentCallId = null, ?string $childCallId = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, int $page = 0, int $size = 20): PromiseInterface
    {
        $request = $this->getDialogsHistoryRequest($applicationId, $state, $parentCallId, $childCallId, $startTimeAfter, $endTimeBefore, $page, $size);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getDialogsHistoryResponse($response, $request->getUri());
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

                    throw $this->getDialogsHistoryApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getDialogsHistory'
     *
     * @param null|string $applicationId Application ID. (optional)
     * @param null|\Infobip\Model\CallsDialogState $state Dialog state. (optional)
     * @param null|string $parentCallId Parent call ID. (optional)
     * @param null|string $childCallId Child call ID. (optional)
     * @param null|\DateTime $startTimeAfter Date and time for when the dialog has been created. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param null|\DateTime $endTimeBefore Date and time for when the dialog has been finished. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSS+ZZZZ&#x60;. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    private function getDialogsHistoryRequest(?string $applicationId = null, ?\Infobip\Model\CallsDialogState $state = null, ?string $parentCallId = null, ?string $childCallId = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, int $page = 0, int $size = 20): Request
    {
        $allData = [
             'applicationId' => $applicationId,
             'state' => $state,
             'parentCallId' => $parentCallId,
             'childCallId' => $childCallId,
             'startTimeAfter' => $startTimeAfter,
             'endTimeBefore' => $endTimeBefore,
             'page' => $page,
             'size' => $size,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'applicationId' => [
                    ],
                    'state' => [
                        new Assert\Choice(['CREATED','ESTABLISHED','FINISHED','FAILED',]),
                    ],
                    'parentCallId' => [
                    ],
                    'childCallId' => [
                    ],
                    'startTimeAfter' => [
                    ],
                    'endTimeBefore' => [
                    ],
                    'page' => [
                        new Assert\GreaterThan(0),
                    ],
                    'size' => [
                        new Assert\LessThan(100),
                        new Assert\GreaterThan(1),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/dialogs/history';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($applicationId !== null) {
            $queryParams['applicationId'] = $applicationId;
        }

        // query params
        if ($state !== null) {
            $queryParams['state'] = $state;
        }

        // query params
        if ($parentCallId !== null) {
            $queryParams['parentCallId'] = $parentCallId;
        }

        // query params
        if ($childCallId !== null) {
            $queryParams['childCallId'] = $childCallId;
        }

        // query params
        if ($startTimeAfter !== null) {
            $queryParams['startTimeAfter'] = $startTimeAfter;
        }

        // query params
        if ($endTimeBefore !== null) {
            $queryParams['endTimeBefore'] = $endTimeBefore;
        }

        // query params
        if ($page !== null) {
            $queryParams['page'] = $page;
        }

        // query params
        if ($size !== null) {
            $queryParams['size'] = $size;
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
     * Create response for operation 'getDialogsHistory'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsDialogLogPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getDialogsHistoryResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsDialogLogPage', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getDialogsHistory'
     */
    private function getDialogsHistoryApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getDialogsRecordings
     *
     * Get dialogs recordings
     *
     * @param null|string $dialogId Dialog ID. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|string $callId Filter all dialog recordings where call ID was included in the recording. (optional)
     * @param null|\DateTime $startTimeAfter Date and time when the (first) dialog recording started. (optional)
     * @param null|\DateTime $endTimeBefore Date and time when the (last) dialog recording ended. (optional)
     * @param null|bool $composition Flag indicating whether auto-compose feature was turned on for the recording. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsDialogRecordingPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getDialogsRecordings(?string $dialogId = null, ?string $applicationId = null, ?string $callId = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, ?bool $composition = null, int $page = 0, int $size = 20)
    {
        $request = $this->getDialogsRecordingsRequest($dialogId, $applicationId, $callId, $startTimeAfter, $endTimeBefore, $composition, $page, $size);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getDialogsRecordingsResponse($response, $request->getUri());
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
            throw $this->getDialogsRecordingsApiException($exception);
        }
    }

    /**
     * Operation getDialogsRecordingsAsync
     *
     * Get dialogs recordings
     *
     * @param null|string $dialogId Dialog ID. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|string $callId Filter all dialog recordings where call ID was included in the recording. (optional)
     * @param null|\DateTime $startTimeAfter Date and time when the (first) dialog recording started. (optional)
     * @param null|\DateTime $endTimeBefore Date and time when the (last) dialog recording ended. (optional)
     * @param null|bool $composition Flag indicating whether auto-compose feature was turned on for the recording. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    public function getDialogsRecordingsAsync(?string $dialogId = null, ?string $applicationId = null, ?string $callId = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, ?bool $composition = null, int $page = 0, int $size = 20): PromiseInterface
    {
        $request = $this->getDialogsRecordingsRequest($dialogId, $applicationId, $callId, $startTimeAfter, $endTimeBefore, $composition, $page, $size);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getDialogsRecordingsResponse($response, $request->getUri());
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

                    throw $this->getDialogsRecordingsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getDialogsRecordings'
     *
     * @param null|string $dialogId Dialog ID. (optional)
     * @param null|string $applicationId Application ID. (optional)
     * @param null|string $callId Filter all dialog recordings where call ID was included in the recording. (optional)
     * @param null|\DateTime $startTimeAfter Date and time when the (first) dialog recording started. (optional)
     * @param null|\DateTime $endTimeBefore Date and time when the (last) dialog recording ended. (optional)
     * @param null|bool $composition Flag indicating whether auto-compose feature was turned on for the recording. (optional)
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    private function getDialogsRecordingsRequest(?string $dialogId = null, ?string $applicationId = null, ?string $callId = null, ?\DateTime $startTimeAfter = null, ?\DateTime $endTimeBefore = null, ?bool $composition = null, int $page = 0, int $size = 20): Request
    {
        $allData = [
             'dialogId' => $dialogId,
             'applicationId' => $applicationId,
             'callId' => $callId,
             'startTimeAfter' => $startTimeAfter,
             'endTimeBefore' => $endTimeBefore,
             'composition' => $composition,
             'page' => $page,
             'size' => $size,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'dialogId' => [
                    ],
                    'applicationId' => [
                    ],
                    'callId' => [
                    ],
                    'startTimeAfter' => [
                    ],
                    'endTimeBefore' => [
                    ],
                    'composition' => [
                    ],
                    'page' => [
                        new Assert\GreaterThan(0),
                    ],
                    'size' => [
                        new Assert\LessThan(100),
                        new Assert\GreaterThan(1),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/recordings/dialogs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($dialogId !== null) {
            $queryParams['dialogId'] = $dialogId;
        }

        // query params
        if ($applicationId !== null) {
            $queryParams['applicationId'] = $applicationId;
        }

        // query params
        if ($callId !== null) {
            $queryParams['callId'] = $callId;
        }

        // query params
        if ($startTimeAfter !== null) {
            $queryParams['startTimeAfter'] = $startTimeAfter;
        }

        // query params
        if ($endTimeBefore !== null) {
            $queryParams['endTimeBefore'] = $endTimeBefore;
        }

        // query params
        if ($composition !== null) {
            $queryParams['composition'] = $composition;
        }

        // query params
        if ($page !== null) {
            $queryParams['page'] = $page;
        }

        // query params
        if ($size !== null) {
            $queryParams['size'] = $size;
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
     * Create response for operation 'getDialogsRecordings'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsDialogRecordingPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getDialogsRecordingsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsDialogRecordingPage', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getDialogsRecordings'
     */
    private function getDialogsRecordingsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getMediaStreamConfig
     *
     * Get media-stream configuration
     *
     * @param string $mediaStreamConfigId Media-stream configuration ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsMediaStreamConfigResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getMediaStreamConfig(string $mediaStreamConfigId)
    {
        $request = $this->getMediaStreamConfigRequest($mediaStreamConfigId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getMediaStreamConfigResponse($response, $request->getUri());
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
            throw $this->getMediaStreamConfigApiException($exception);
        }
    }

    /**
     * Operation getMediaStreamConfigAsync
     *
     * Get media-stream configuration
     *
     * @param string $mediaStreamConfigId Media-stream configuration ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getMediaStreamConfigAsync(string $mediaStreamConfigId): PromiseInterface
    {
        $request = $this->getMediaStreamConfigRequest($mediaStreamConfigId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getMediaStreamConfigResponse($response, $request->getUri());
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

                    throw $this->getMediaStreamConfigApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getMediaStreamConfig'
     *
     * @param string $mediaStreamConfigId Media-stream configuration ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getMediaStreamConfigRequest(string $mediaStreamConfigId): Request
    {
        $allData = [
             'mediaStreamConfigId' => $mediaStreamConfigId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'mediaStreamConfigId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/media-stream-configs/{mediaStreamConfigId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($mediaStreamConfigId !== null) {
            $resourcePath = str_replace(
                '{' . 'mediaStreamConfigId' . '}',
                $this->objectSerializer->toPathValue($mediaStreamConfigId),
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
     * Create response for operation 'getMediaStreamConfig'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsMediaStreamConfigResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getMediaStreamConfigResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsMediaStreamConfigResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getMediaStreamConfig'
     */
    private function getMediaStreamConfigApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getMediaStreamConfigs
     *
     * Get media-stream configs
     *
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsMediaStreamConfigPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getMediaStreamConfigs(int $page = 0, int $size = 20)
    {
        $request = $this->getMediaStreamConfigsRequest($page, $size);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getMediaStreamConfigsResponse($response, $request->getUri());
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
            throw $this->getMediaStreamConfigsApiException($exception);
        }
    }

    /**
     * Operation getMediaStreamConfigsAsync
     *
     * Get media-stream configs
     *
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    public function getMediaStreamConfigsAsync(int $page = 0, int $size = 20): PromiseInterface
    {
        $request = $this->getMediaStreamConfigsRequest($page, $size);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getMediaStreamConfigsResponse($response, $request->getUri());
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

                    throw $this->getMediaStreamConfigsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getMediaStreamConfigs'
     *
     * @param int $page Results page to retrieve (0..N). (optional, default to 0)
     * @param int $size Number of records per page. (optional, default to 20)
     *
     * @throws InvalidArgumentException
     */
    private function getMediaStreamConfigsRequest(int $page = 0, int $size = 20): Request
    {
        $allData = [
             'page' => $page,
             'size' => $size,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'page' => [
                        new Assert\GreaterThan(0),
                    ],
                    'size' => [
                        new Assert\LessThan(100),
                        new Assert\GreaterThan(1),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/media-stream-configs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($page !== null) {
            $queryParams['page'] = $page;
        }

        // query params
        if ($size !== null) {
            $queryParams['size'] = $size;
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
     * Create response for operation 'getMediaStreamConfigs'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsMediaStreamConfigPage|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getMediaStreamConfigsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsMediaStreamConfigPage', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getMediaStreamConfigs'
     */
    private function getMediaStreamConfigsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation hangupCall
     *
     * Hangup
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsHangupRequest $callsHangupRequest callsHangupRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\Call|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function hangupCall(string $callId, \Infobip\Model\CallsHangupRequest $callsHangupRequest)
    {
        $request = $this->hangupCallRequest($callId, $callsHangupRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->hangupCallResponse($response, $request->getUri());
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
            throw $this->hangupCallApiException($exception);
        }
    }

    /**
     * Operation hangupCallAsync
     *
     * Hangup
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsHangupRequest $callsHangupRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function hangupCallAsync(string $callId, \Infobip\Model\CallsHangupRequest $callsHangupRequest): PromiseInterface
    {
        $request = $this->hangupCallRequest($callId, $callsHangupRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->hangupCallResponse($response, $request->getUri());
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

                    throw $this->hangupCallApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'hangupCall'
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsHangupRequest $callsHangupRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function hangupCallRequest(string $callId, \Infobip\Model\CallsHangupRequest $callsHangupRequest): Request
    {
        $allData = [
             'callId' => $callId,
             'callsHangupRequest' => $callsHangupRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsHangupRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/hangup';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsHangupRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsHangupRequest)
                : $callsHangupRequest;
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
     * Create response for operation 'hangupCall'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\Call|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function hangupCallResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\Call', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'hangupCall'
     */
    private function hangupCallApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation hangupConference
     *
     * Hangup conference
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsConference|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function hangupConference(string $conferenceId)
    {
        $request = $this->hangupConferenceRequest($conferenceId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->hangupConferenceResponse($response, $request->getUri());
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
            throw $this->hangupConferenceApiException($exception);
        }
    }

    /**
     * Operation hangupConferenceAsync
     *
     * Hangup conference
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function hangupConferenceAsync(string $conferenceId): PromiseInterface
    {
        $request = $this->hangupConferenceRequest($conferenceId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->hangupConferenceResponse($response, $request->getUri());
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

                    throw $this->hangupConferenceApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'hangupConference'
     *
     * @param string $conferenceId Conference ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function hangupConferenceRequest(string $conferenceId): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/conferences/{conferenceId}/hangup';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($conferenceId !== null) {
            $resourcePath = str_replace(
                '{' . 'conferenceId' . '}',
                $this->objectSerializer->toPathValue($conferenceId),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'hangupConference'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsConference|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function hangupConferenceResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsConference', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'hangupConference'
     */
    private function hangupConferenceApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation hangupDialog
     *
     * Hangup dialog
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsDialogResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function hangupDialog(string $dialogId)
    {
        $request = $this->hangupDialogRequest($dialogId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->hangupDialogResponse($response, $request->getUri());
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
            throw $this->hangupDialogApiException($exception);
        }
    }

    /**
     * Operation hangupDialogAsync
     *
     * Hangup dialog
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function hangupDialogAsync(string $dialogId): PromiseInterface
    {
        $request = $this->hangupDialogRequest($dialogId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->hangupDialogResponse($response, $request->getUri());
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

                    throw $this->hangupDialogApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'hangupDialog'
     *
     * @param string $dialogId Dialog ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function hangupDialogRequest(string $dialogId): Request
    {
        $allData = [
             'dialogId' => $dialogId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'dialogId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/dialogs/{dialogId}/hangup';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($dialogId !== null) {
            $resourcePath = str_replace(
                '{' . 'dialogId' . '}',
                $this->objectSerializer->toPathValue($dialogId),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'hangupDialog'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsDialogResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function hangupDialogResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsDialogResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'hangupDialog'
     */
    private function hangupDialogApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation pauseBulk
     *
     * Pause
     *
     * @param string $bulkId Bulk ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallBulkStatus|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function pauseBulk(string $bulkId)
    {
        $request = $this->pauseBulkRequest($bulkId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->pauseBulkResponse($response, $request->getUri());
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
            throw $this->pauseBulkApiException($exception);
        }
    }

    /**
     * Operation pauseBulkAsync
     *
     * Pause
     *
     * @param string $bulkId Bulk ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function pauseBulkAsync(string $bulkId): PromiseInterface
    {
        $request = $this->pauseBulkRequest($bulkId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->pauseBulkResponse($response, $request->getUri());
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

                    throw $this->pauseBulkApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'pauseBulk'
     *
     * @param string $bulkId Bulk ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function pauseBulkRequest(string $bulkId): Request
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

        $resourcePath = '/calls/1/bulks/{bulkId}/pause';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($bulkId !== null) {
            $resourcePath = str_replace(
                '{' . 'bulkId' . '}',
                $this->objectSerializer->toPathValue($bulkId),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'pauseBulk'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallBulkStatus|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function pauseBulkResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallBulkStatus', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'pauseBulk'
     */
    private function pauseBulkApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation preAnswerCall
     *
     * Pre-answer
     *
     * @param string $callId Call ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function preAnswerCall(string $callId)
    {
        $request = $this->preAnswerCallRequest($callId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->preAnswerCallResponse($response, $request->getUri());
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
            throw $this->preAnswerCallApiException($exception);
        }
    }

    /**
     * Operation preAnswerCallAsync
     *
     * Pre-answer
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function preAnswerCallAsync(string $callId): PromiseInterface
    {
        $request = $this->preAnswerCallRequest($callId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->preAnswerCallResponse($response, $request->getUri());
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

                    throw $this->preAnswerCallApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'preAnswerCall'
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function preAnswerCallRequest(string $callId): Request
    {
        $allData = [
             'callId' => $callId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/pre-answer';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'preAnswerCall'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function preAnswerCallResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'preAnswerCall'
     */
    private function preAnswerCallApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation removeConferenceCall
     *
     * Remove call
     *
     * @param string $conferenceId Conference ID. (required)
     * @param string $callId Call ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function removeConferenceCall(string $conferenceId, string $callId)
    {
        $request = $this->removeConferenceCallRequest($conferenceId, $callId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->removeConferenceCallResponse($response, $request->getUri());
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
            throw $this->removeConferenceCallApiException($exception);
        }
    }

    /**
     * Operation removeConferenceCallAsync
     *
     * Remove call
     *
     * @param string $conferenceId Conference ID. (required)
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function removeConferenceCallAsync(string $conferenceId, string $callId): PromiseInterface
    {
        $request = $this->removeConferenceCallRequest($conferenceId, $callId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->removeConferenceCallResponse($response, $request->getUri());
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

                    throw $this->removeConferenceCallApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'removeConferenceCall'
     *
     * @param string $conferenceId Conference ID. (required)
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function removeConferenceCallRequest(string $conferenceId, string $callId): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
             'callId' => $callId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                        new Assert\NotBlank(),
                    ],
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/conferences/{conferenceId}/call/{callId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($conferenceId !== null) {
            $resourcePath = str_replace(
                '{' . 'conferenceId' . '}',
                $this->objectSerializer->toPathValue($conferenceId),
                $resourcePath
            );
        }

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
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
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'removeConferenceCall'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function removeConferenceCallResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'removeConferenceCall'
     */
    private function removeConferenceCallApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation rescheduleBulk
     *
     * Reschedule
     *
     * @param string $bulkId Bulk ID. (required)
     * @param \Infobip\Model\CallsRescheduleRequest $callsRescheduleRequest callsRescheduleRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallBulkStatus|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function rescheduleBulk(string $bulkId, \Infobip\Model\CallsRescheduleRequest $callsRescheduleRequest)
    {
        $request = $this->rescheduleBulkRequest($bulkId, $callsRescheduleRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->rescheduleBulkResponse($response, $request->getUri());
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
            throw $this->rescheduleBulkApiException($exception);
        }
    }

    /**
     * Operation rescheduleBulkAsync
     *
     * Reschedule
     *
     * @param string $bulkId Bulk ID. (required)
     * @param \Infobip\Model\CallsRescheduleRequest $callsRescheduleRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function rescheduleBulkAsync(string $bulkId, \Infobip\Model\CallsRescheduleRequest $callsRescheduleRequest): PromiseInterface
    {
        $request = $this->rescheduleBulkRequest($bulkId, $callsRescheduleRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->rescheduleBulkResponse($response, $request->getUri());
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

                    throw $this->rescheduleBulkApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'rescheduleBulk'
     *
     * @param string $bulkId Bulk ID. (required)
     * @param \Infobip\Model\CallsRescheduleRequest $callsRescheduleRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function rescheduleBulkRequest(string $bulkId, \Infobip\Model\CallsRescheduleRequest $callsRescheduleRequest): Request
    {
        $allData = [
             'bulkId' => $bulkId,
             'callsRescheduleRequest' => $callsRescheduleRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'bulkId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsRescheduleRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/bulks/{bulkId}/reschedule';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($bulkId !== null) {
            $resourcePath = str_replace(
                '{' . 'bulkId' . '}',
                $this->objectSerializer->toPathValue($bulkId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsRescheduleRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsRescheduleRequest)
                : $callsRescheduleRequest;
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
     * Create response for operation 'rescheduleBulk'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallBulkStatus|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function rescheduleBulkResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallBulkStatus', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'rescheduleBulk'
     */
    private function rescheduleBulkApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation resumeBulk
     *
     * Resume
     *
     * @param string $bulkId Bulk ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallBulkStatus|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function resumeBulk(string $bulkId)
    {
        $request = $this->resumeBulkRequest($bulkId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->resumeBulkResponse($response, $request->getUri());
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
            throw $this->resumeBulkApiException($exception);
        }
    }

    /**
     * Operation resumeBulkAsync
     *
     * Resume
     *
     * @param string $bulkId Bulk ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function resumeBulkAsync(string $bulkId): PromiseInterface
    {
        $request = $this->resumeBulkRequest($bulkId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->resumeBulkResponse($response, $request->getUri());
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

                    throw $this->resumeBulkApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'resumeBulk'
     *
     * @param string $bulkId Bulk ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function resumeBulkRequest(string $bulkId): Request
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

        $resourcePath = '/calls/1/bulks/{bulkId}/resume';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($bulkId !== null) {
            $resourcePath = str_replace(
                '{' . 'bulkId' . '}',
                $this->objectSerializer->toPathValue($bulkId),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'resumeBulk'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallBulkStatus|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function resumeBulkResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallBulkStatus', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'resumeBulk'
     */
    private function resumeBulkApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation sendRinging
     *
     * Send ringing
     *
     * @param string $callId Call ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendRinging(string $callId)
    {
        $request = $this->sendRingingRequest($callId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendRingingResponse($response, $request->getUri());
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
            throw $this->sendRingingApiException($exception);
        }
    }

    /**
     * Operation sendRingingAsync
     *
     * Send ringing
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendRingingAsync(string $callId): PromiseInterface
    {
        $request = $this->sendRingingRequest($callId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendRingingResponse($response, $request->getUri());
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

                    throw $this->sendRingingApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendRinging'
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendRingingRequest(string $callId): Request
    {
        $allData = [
             'callId' => $callId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/send-ringing';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'sendRinging'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendRingingResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendRinging'
     */
    private function sendRingingApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation startMediaStream
     *
     * Start streaming media
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsStartMediaStreamRequest $callsStartMediaStreamRequest callsStartMediaStreamRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function startMediaStream(string $callId, \Infobip\Model\CallsStartMediaStreamRequest $callsStartMediaStreamRequest)
    {
        $request = $this->startMediaStreamRequest($callId, $callsStartMediaStreamRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->startMediaStreamResponse($response, $request->getUri());
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
            throw $this->startMediaStreamApiException($exception);
        }
    }

    /**
     * Operation startMediaStreamAsync
     *
     * Start streaming media
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsStartMediaStreamRequest $callsStartMediaStreamRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function startMediaStreamAsync(string $callId, \Infobip\Model\CallsStartMediaStreamRequest $callsStartMediaStreamRequest): PromiseInterface
    {
        $request = $this->startMediaStreamRequest($callId, $callsStartMediaStreamRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->startMediaStreamResponse($response, $request->getUri());
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

                    throw $this->startMediaStreamApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'startMediaStream'
     *
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsStartMediaStreamRequest $callsStartMediaStreamRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function startMediaStreamRequest(string $callId, \Infobip\Model\CallsStartMediaStreamRequest $callsStartMediaStreamRequest): Request
    {
        $allData = [
             'callId' => $callId,
             'callsStartMediaStreamRequest' => $callsStartMediaStreamRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsStartMediaStreamRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/start-media-stream';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsStartMediaStreamRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsStartMediaStreamRequest)
                : $callsStartMediaStreamRequest;
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
     * Create response for operation 'startMediaStream'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function startMediaStreamResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'startMediaStream'
     */
    private function startMediaStreamApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation stopMediaStream
     *
     * Stop streaming media
     *
     * @param string $callId Call ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function stopMediaStream(string $callId)
    {
        $request = $this->stopMediaStreamRequest($callId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->stopMediaStreamResponse($response, $request->getUri());
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
            throw $this->stopMediaStreamApiException($exception);
        }
    }

    /**
     * Operation stopMediaStreamAsync
     *
     * Stop streaming media
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function stopMediaStreamAsync(string $callId): PromiseInterface
    {
        $request = $this->stopMediaStreamRequest($callId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->stopMediaStreamResponse($response, $request->getUri());
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

                    throw $this->stopMediaStreamApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'stopMediaStream'
     *
     * @param string $callId Call ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function stopMediaStreamRequest(string $callId): Request
    {
        $allData = [
             'callId' => $callId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/calls/{callId}/stop-media-stream';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'stopMediaStream'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function stopMediaStreamResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'stopMediaStream'
     */
    private function stopMediaStreamApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation updateConference
     *
     * Update all calls
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsUpdateRequest $callsUpdateRequest callsUpdateRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function updateConference(string $conferenceId, \Infobip\Model\CallsUpdateRequest $callsUpdateRequest)
    {
        $request = $this->updateConferenceRequest($conferenceId, $callsUpdateRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->updateConferenceResponse($response, $request->getUri());
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
            throw $this->updateConferenceApiException($exception);
        }
    }

    /**
     * Operation updateConferenceAsync
     *
     * Update all calls
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsUpdateRequest $callsUpdateRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function updateConferenceAsync(string $conferenceId, \Infobip\Model\CallsUpdateRequest $callsUpdateRequest): PromiseInterface
    {
        $request = $this->updateConferenceRequest($conferenceId, $callsUpdateRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->updateConferenceResponse($response, $request->getUri());
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

                    throw $this->updateConferenceApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'updateConference'
     *
     * @param string $conferenceId Conference ID. (required)
     * @param \Infobip\Model\CallsUpdateRequest $callsUpdateRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function updateConferenceRequest(string $conferenceId, \Infobip\Model\CallsUpdateRequest $callsUpdateRequest): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
             'callsUpdateRequest' => $callsUpdateRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsUpdateRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/conferences/{conferenceId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($conferenceId !== null) {
            $resourcePath = str_replace(
                '{' . 'conferenceId' . '}',
                $this->objectSerializer->toPathValue($conferenceId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsUpdateRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsUpdateRequest)
                : $callsUpdateRequest;
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
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'updateConference'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function updateConferenceResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'updateConference'
     */
    private function updateConferenceApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation updateConferenceCall
     *
     * Update call
     *
     * @param string $conferenceId Conference ID. (required)
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsUpdateRequest $callsUpdateRequest callsUpdateRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function updateConferenceCall(string $conferenceId, string $callId, \Infobip\Model\CallsUpdateRequest $callsUpdateRequest)
    {
        $request = $this->updateConferenceCallRequest($conferenceId, $callId, $callsUpdateRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->updateConferenceCallResponse($response, $request->getUri());
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
            throw $this->updateConferenceCallApiException($exception);
        }
    }

    /**
     * Operation updateConferenceCallAsync
     *
     * Update call
     *
     * @param string $conferenceId Conference ID. (required)
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsUpdateRequest $callsUpdateRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function updateConferenceCallAsync(string $conferenceId, string $callId, \Infobip\Model\CallsUpdateRequest $callsUpdateRequest): PromiseInterface
    {
        $request = $this->updateConferenceCallRequest($conferenceId, $callId, $callsUpdateRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->updateConferenceCallResponse($response, $request->getUri());
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

                    throw $this->updateConferenceCallApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'updateConferenceCall'
     *
     * @param string $conferenceId Conference ID. (required)
     * @param string $callId Call ID. (required)
     * @param \Infobip\Model\CallsUpdateRequest $callsUpdateRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function updateConferenceCallRequest(string $conferenceId, string $callId, \Infobip\Model\CallsUpdateRequest $callsUpdateRequest): Request
    {
        $allData = [
             'conferenceId' => $conferenceId,
             'callId' => $callId,
             'callsUpdateRequest' => $callsUpdateRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'conferenceId' => [
                        new Assert\NotBlank(),
                    ],
                    'callId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsUpdateRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/conferences/{conferenceId}/call/{callId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($conferenceId !== null) {
            $resourcePath = str_replace(
                '{' . 'conferenceId' . '}',
                $this->objectSerializer->toPathValue($conferenceId),
                $resourcePath
            );
        }

        // path params
        if ($callId !== null) {
            $resourcePath = str_replace(
                '{' . 'callId' . '}',
                $this->objectSerializer->toPathValue($callId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsUpdateRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsUpdateRequest)
                : $callsUpdateRequest;
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
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'updateConferenceCall'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsActionResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function updateConferenceCallResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsActionResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'updateConferenceCall'
     */
    private function updateConferenceCallApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation updateMediaStreamConfig
     *
     * Update a media-stream configuration
     *
     * @param string $mediaStreamConfigId Media-stream configuration ID. (required)
     * @param \Infobip\Model\CallsMediaStreamConfigRequest $callsMediaStreamConfigRequest callsMediaStreamConfigRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsMediaStreamConfigResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function updateMediaStreamConfig(string $mediaStreamConfigId, \Infobip\Model\CallsMediaStreamConfigRequest $callsMediaStreamConfigRequest)
    {
        $request = $this->updateMediaStreamConfigRequest($mediaStreamConfigId, $callsMediaStreamConfigRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->updateMediaStreamConfigResponse($response, $request->getUri());
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
            throw $this->updateMediaStreamConfigApiException($exception);
        }
    }

    /**
     * Operation updateMediaStreamConfigAsync
     *
     * Update a media-stream configuration
     *
     * @param string $mediaStreamConfigId Media-stream configuration ID. (required)
     * @param \Infobip\Model\CallsMediaStreamConfigRequest $callsMediaStreamConfigRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function updateMediaStreamConfigAsync(string $mediaStreamConfigId, \Infobip\Model\CallsMediaStreamConfigRequest $callsMediaStreamConfigRequest): PromiseInterface
    {
        $request = $this->updateMediaStreamConfigRequest($mediaStreamConfigId, $callsMediaStreamConfigRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->updateMediaStreamConfigResponse($response, $request->getUri());
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

                    throw $this->updateMediaStreamConfigApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'updateMediaStreamConfig'
     *
     * @param string $mediaStreamConfigId Media-stream configuration ID. (required)
     * @param \Infobip\Model\CallsMediaStreamConfigRequest $callsMediaStreamConfigRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function updateMediaStreamConfigRequest(string $mediaStreamConfigId, \Infobip\Model\CallsMediaStreamConfigRequest $callsMediaStreamConfigRequest): Request
    {
        $allData = [
             'mediaStreamConfigId' => $mediaStreamConfigId,
             'callsMediaStreamConfigRequest' => $callsMediaStreamConfigRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'mediaStreamConfigId' => [
                        new Assert\NotBlank(),
                    ],
                    'callsMediaStreamConfigRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/media-stream-configs/{mediaStreamConfigId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($mediaStreamConfigId !== null) {
            $resourcePath = str_replace(
                '{' . 'mediaStreamConfigId' . '}',
                $this->objectSerializer->toPathValue($mediaStreamConfigId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($callsMediaStreamConfigRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($callsMediaStreamConfigRequest)
                : $callsMediaStreamConfigRequest;
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
     * Create response for operation 'updateMediaStreamConfig'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsMediaStreamConfigResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function updateMediaStreamConfigResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsMediaStreamConfigResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'updateMediaStreamConfig'
     */
    private function updateMediaStreamConfigApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation uploadCallsAudioFile
     *
     * Upload audio file
     *
     * @param \SplFileObject $file file (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\CallsFile|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function uploadCallsAudioFile(\SplFileObject $file)
    {
        $request = $this->uploadCallsAudioFileRequest($file);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->uploadCallsAudioFileResponse($response, $request->getUri());
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
            throw $this->uploadCallsAudioFileApiException($exception);
        }
    }

    /**
     * Operation uploadCallsAudioFileAsync
     *
     * Upload audio file
     *
     * @param \SplFileObject $file (required)
     *
     * @throws InvalidArgumentException
     */
    public function uploadCallsAudioFileAsync(\SplFileObject $file): PromiseInterface
    {
        $request = $this->uploadCallsAudioFileRequest($file);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->uploadCallsAudioFileResponse($response, $request->getUri());
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

                    throw $this->uploadCallsAudioFileApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'uploadCallsAudioFile'
     *
     * @param \SplFileObject $file (required)
     *
     * @throws InvalidArgumentException
     */
    private function uploadCallsAudioFileRequest(\SplFileObject $file): Request
    {
        $allData = [
             'file' => $file,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'file' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/calls/1/files';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // form params
        if ($file !== null) {
            $formParams['file'] = [];
            $paramFiles = is_array($file) ? $file : [$file];
            foreach ($paramFiles as $paramFile) {
                $formParams['file'][] = Utils::tryFopen(
                    $this->objectSerializer->toFormValue($paramFile),
                    'rb'
                );
            }
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'multipart/form-data',
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'uploadCallsAudioFile'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\CallsFile|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function uploadCallsAudioFileResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        if ($statusCode === 200) {
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\CallsFile', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'uploadCallsAudioFile'
     */
    private function uploadCallsAudioFileApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }
}
