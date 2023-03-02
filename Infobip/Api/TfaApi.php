<?php

// phpcs:ignorefile

/**
 * TfaApi
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

final class TfaApi
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
     * Operation createTfaApplication
     *
     * Create 2FA application
     *
     * @param \Infobip\Model\TfaApplicationRequest $tfaApplicationRequest tfaApplicationRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaApplicationResponse
     */
    public function createTfaApplication(\Infobip\Model\TfaApplicationRequest $tfaApplicationRequest)
    {
        $request = $this->createTfaApplicationRequest($tfaApplicationRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->createTfaApplicationResponse($response, $request->getUri());
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
            throw $this->createTfaApplicationApiException($exception);
        }
    }

    /**
     * Operation createTfaApplicationAsync
     *
     * Create 2FA application
     *
     * @param \Infobip\Model\TfaApplicationRequest $tfaApplicationRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function createTfaApplicationAsync(\Infobip\Model\TfaApplicationRequest $tfaApplicationRequest): PromiseInterface
    {
        $request = $this->createTfaApplicationRequest($tfaApplicationRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->createTfaApplicationResponse($response, $request->getUri());
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

                    throw $this->createTfaApplicationApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'createTfaApplication'
     *
     * @param \Infobip\Model\TfaApplicationRequest $tfaApplicationRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function createTfaApplicationRequest(\Infobip\Model\TfaApplicationRequest $tfaApplicationRequest): Request
    {
        $allData = [
             'tfaApplicationRequest' => $tfaApplicationRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'tfaApplicationRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/2fa/2/applications';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($tfaApplicationRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($tfaApplicationRequest)
                : $tfaApplicationRequest;
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
     * Create response for operation 'createTfaApplication'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaApplicationResponse|null
     */
    private function createTfaApplicationResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\TfaApplicationResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'createTfaApplication'
     */
    private function createTfaApplicationApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\TfaApplicationResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation createTfaMessageTemplate
     *
     * Create 2FA message template
     *
     * @param string $appId ID of application for which requested message was created. (required)
     * @param \Infobip\Model\TfaCreateMessageRequest $tfaCreateMessageRequest tfaCreateMessageRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaMessage
     */
    public function createTfaMessageTemplate(string $appId, \Infobip\Model\TfaCreateMessageRequest $tfaCreateMessageRequest)
    {
        $request = $this->createTfaMessageTemplateRequest($appId, $tfaCreateMessageRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->createTfaMessageTemplateResponse($response, $request->getUri());
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
            throw $this->createTfaMessageTemplateApiException($exception);
        }
    }

    /**
     * Operation createTfaMessageTemplateAsync
     *
     * Create 2FA message template
     *
     * @param string $appId ID of application for which requested message was created. (required)
     * @param \Infobip\Model\TfaCreateMessageRequest $tfaCreateMessageRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function createTfaMessageTemplateAsync(string $appId, \Infobip\Model\TfaCreateMessageRequest $tfaCreateMessageRequest): PromiseInterface
    {
        $request = $this->createTfaMessageTemplateRequest($appId, $tfaCreateMessageRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->createTfaMessageTemplateResponse($response, $request->getUri());
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

                    throw $this->createTfaMessageTemplateApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'createTfaMessageTemplate'
     *
     * @param string $appId ID of application for which requested message was created. (required)
     * @param \Infobip\Model\TfaCreateMessageRequest $tfaCreateMessageRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function createTfaMessageTemplateRequest(string $appId, \Infobip\Model\TfaCreateMessageRequest $tfaCreateMessageRequest): Request
    {
        $allData = [
             'appId' => $appId,
             'tfaCreateMessageRequest' => $tfaCreateMessageRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'appId' => [
                        new Assert\NotBlank(),
                    ],
                    'tfaCreateMessageRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/2fa/2/applications/{appId}/messages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($appId !== null) {
            $resourcePath = str_replace(
                '{' . 'appId' . '}',
                $this->objectSerializer->toPathValue($appId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($tfaCreateMessageRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($tfaCreateMessageRequest)
                : $tfaCreateMessageRequest;
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
     * Create response for operation 'createTfaMessageTemplate'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaMessage|null
     */
    private function createTfaMessageTemplateResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\TfaMessage', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'createTfaMessageTemplate'
     */
    private function createTfaMessageTemplateApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\TfaMessage',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation getTfaApplication
     *
     * Get 2FA application
     *
     * @param string $appId ID of application for which configuration view was requested. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaApplicationResponse
     */
    public function getTfaApplication(string $appId)
    {
        $request = $this->getTfaApplicationRequest($appId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getTfaApplicationResponse($response, $request->getUri());
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
            throw $this->getTfaApplicationApiException($exception);
        }
    }

    /**
     * Operation getTfaApplicationAsync
     *
     * Get 2FA application
     *
     * @param string $appId ID of application for which configuration view was requested. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getTfaApplicationAsync(string $appId): PromiseInterface
    {
        $request = $this->getTfaApplicationRequest($appId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getTfaApplicationResponse($response, $request->getUri());
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

                    throw $this->getTfaApplicationApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getTfaApplication'
     *
     * @param string $appId ID of application for which configuration view was requested. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getTfaApplicationRequest(string $appId): Request
    {
        $allData = [
             'appId' => $appId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'appId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/2fa/2/applications/{appId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($appId !== null) {
            $resourcePath = str_replace(
                '{' . 'appId' . '}',
                $this->objectSerializer->toPathValue($appId),
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
     * Create response for operation 'getTfaApplication'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaApplicationResponse|null
     */
    private function getTfaApplicationResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\TfaApplicationResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getTfaApplication'
     */
    private function getTfaApplicationApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\TfaApplicationResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation getTfaApplications
     *
     * Get 2FA applications
     *
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaApplicationResponse[]
     */
    public function getTfaApplications()
    {
        $request = $this->getTfaApplicationsRequest();

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getTfaApplicationsResponse($response, $request->getUri());
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
            throw $this->getTfaApplicationsApiException($exception);
        }
    }

    /**
     * Operation getTfaApplicationsAsync
     *
     * Get 2FA applications
     *
     *
     * @throws InvalidArgumentException
     */
    public function getTfaApplicationsAsync(): PromiseInterface
    {
        $request = $this->getTfaApplicationsRequest();

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getTfaApplicationsResponse($response, $request->getUri());
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

                    throw $this->getTfaApplicationsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getTfaApplications'
     *
     *
     * @throws InvalidArgumentException
     */
    private function getTfaApplicationsRequest(): Request
    {
        $allData = [
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/2fa/2/applications';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

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
     * Create response for operation 'getTfaApplications'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaApplicationResponse[]|null
     */
    private function getTfaApplicationsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\TfaApplicationResponse[]', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getTfaApplications'
     */
    private function getTfaApplicationsApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\TfaApplicationResponse[]',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation getTfaMessageTemplate
     *
     * Get 2FA message template
     *
     * @param string $appId ID of application for which requested message was created. (required)
     * @param string $msgId Requested message ID. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaMessage
     */
    public function getTfaMessageTemplate(string $appId, string $msgId)
    {
        $request = $this->getTfaMessageTemplateRequest($appId, $msgId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getTfaMessageTemplateResponse($response, $request->getUri());
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
            throw $this->getTfaMessageTemplateApiException($exception);
        }
    }

    /**
     * Operation getTfaMessageTemplateAsync
     *
     * Get 2FA message template
     *
     * @param string $appId ID of application for which requested message was created. (required)
     * @param string $msgId Requested message ID. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getTfaMessageTemplateAsync(string $appId, string $msgId): PromiseInterface
    {
        $request = $this->getTfaMessageTemplateRequest($appId, $msgId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getTfaMessageTemplateResponse($response, $request->getUri());
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

                    throw $this->getTfaMessageTemplateApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getTfaMessageTemplate'
     *
     * @param string $appId ID of application for which requested message was created. (required)
     * @param string $msgId Requested message ID. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getTfaMessageTemplateRequest(string $appId, string $msgId): Request
    {
        $allData = [
             'appId' => $appId,
             'msgId' => $msgId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'appId' => [
                        new Assert\NotBlank(),
                    ],
                    'msgId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/2fa/2/applications/{appId}/messages/{msgId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($appId !== null) {
            $resourcePath = str_replace(
                '{' . 'appId' . '}',
                $this->objectSerializer->toPathValue($appId),
                $resourcePath
            );
        }

        // path params
        if ($msgId !== null) {
            $resourcePath = str_replace(
                '{' . 'msgId' . '}',
                $this->objectSerializer->toPathValue($msgId),
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
     * Create response for operation 'getTfaMessageTemplate'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaMessage|null
     */
    private function getTfaMessageTemplateResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\TfaMessage', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getTfaMessageTemplate'
     */
    private function getTfaMessageTemplateApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\TfaMessage',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation getTfaMessageTemplates
     *
     * Get 2FA message templates
     *
     * @param string $appId ID of application for which requested message was created. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaMessage[]
     */
    public function getTfaMessageTemplates(string $appId)
    {
        $request = $this->getTfaMessageTemplatesRequest($appId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getTfaMessageTemplatesResponse($response, $request->getUri());
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
            throw $this->getTfaMessageTemplatesApiException($exception);
        }
    }

    /**
     * Operation getTfaMessageTemplatesAsync
     *
     * Get 2FA message templates
     *
     * @param string $appId ID of application for which requested message was created. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getTfaMessageTemplatesAsync(string $appId): PromiseInterface
    {
        $request = $this->getTfaMessageTemplatesRequest($appId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getTfaMessageTemplatesResponse($response, $request->getUri());
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

                    throw $this->getTfaMessageTemplatesApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getTfaMessageTemplates'
     *
     * @param string $appId ID of application for which requested message was created. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getTfaMessageTemplatesRequest(string $appId): Request
    {
        $allData = [
             'appId' => $appId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'appId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/2fa/2/applications/{appId}/messages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($appId !== null) {
            $resourcePath = str_replace(
                '{' . 'appId' . '}',
                $this->objectSerializer->toPathValue($appId),
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
     * Create response for operation 'getTfaMessageTemplates'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaMessage[]|null
     */
    private function getTfaMessageTemplatesResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\TfaMessage[]', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getTfaMessageTemplates'
     */
    private function getTfaMessageTemplatesApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\TfaMessage[]',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation getTfaVerificationStatus
     *
     * Get 2FA verification status
     *
     * @param string $msisdn Filter by msisdn (phone number) for which verification status is checked. (required)
     * @param string $appId ID of 2-FA application for which phone number verification status is requested. (required)
     * @param null|bool $verified Filter by verified (true or false). (optional)
     * @param null|bool $sent Filter by message sent status (true or false). (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaVerificationResponse
     */
    public function getTfaVerificationStatus(string $msisdn, string $appId, ?bool $verified = null, ?bool $sent = null)
    {
        $request = $this->getTfaVerificationStatusRequest($msisdn, $appId, $verified, $sent);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getTfaVerificationStatusResponse($response, $request->getUri());
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
            throw $this->getTfaVerificationStatusApiException($exception);
        }
    }

    /**
     * Operation getTfaVerificationStatusAsync
     *
     * Get 2FA verification status
     *
     * @param string $msisdn Filter by msisdn (phone number) for which verification status is checked. (required)
     * @param string $appId ID of 2-FA application for which phone number verification status is requested. (required)
     * @param null|bool $verified Filter by verified (true or false). (optional)
     * @param null|bool $sent Filter by message sent status (true or false). (optional)
     *
     * @throws InvalidArgumentException
     */
    public function getTfaVerificationStatusAsync(string $msisdn, string $appId, ?bool $verified = null, ?bool $sent = null): PromiseInterface
    {
        $request = $this->getTfaVerificationStatusRequest($msisdn, $appId, $verified, $sent);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getTfaVerificationStatusResponse($response, $request->getUri());
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

                    throw $this->getTfaVerificationStatusApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getTfaVerificationStatus'
     *
     * @param string $msisdn Filter by msisdn (phone number) for which verification status is checked. (required)
     * @param string $appId ID of 2-FA application for which phone number verification status is requested. (required)
     * @param null|bool $verified Filter by verified (true or false). (optional)
     * @param null|bool $sent Filter by message sent status (true or false). (optional)
     *
     * @throws InvalidArgumentException
     */
    private function getTfaVerificationStatusRequest(string $msisdn, string $appId, ?bool $verified = null, ?bool $sent = null): Request
    {
        $allData = [
             'msisdn' => $msisdn,
             'appId' => $appId,
             'verified' => $verified,
             'sent' => $sent,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'msisdn' => [
                        new Assert\NotBlank(),
                    ],
                    'appId' => [
                        new Assert\NotBlank(),
                    ],
                    'verified' => [
                    ],
                    'sent' => [
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/2fa/2/applications/{appId}/verifications';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($msisdn !== null) {
            $queryParams['msisdn'] = $msisdn;
        }

        // query params
        if ($verified !== null) {
            $queryParams['verified'] = $verified;
        }

        // query params
        if ($sent !== null) {
            $queryParams['sent'] = $sent;
        }

        // path params
        if ($appId !== null) {
            $resourcePath = str_replace(
                '{' . 'appId' . '}',
                $this->objectSerializer->toPathValue($appId),
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
     * Create response for operation 'getTfaVerificationStatus'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaVerificationResponse|null
     */
    private function getTfaVerificationStatusResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\TfaVerificationResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getTfaVerificationStatus'
     */
    private function getTfaVerificationStatusApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\TfaVerificationResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation resendTfaPinCodeOverSms
     *
     * Resend 2FA PIN code over SMS
     *
     * @param string $pinId ID of the pin code that has to be verified. (required)
     * @param \Infobip\Model\TfaResendPinRequest $tfaResendPinRequest tfaResendPinRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaStartAuthenticationResponse
     */
    public function resendTfaPinCodeOverSms(string $pinId, \Infobip\Model\TfaResendPinRequest $tfaResendPinRequest)
    {
        $request = $this->resendTfaPinCodeOverSmsRequest($pinId, $tfaResendPinRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->resendTfaPinCodeOverSmsResponse($response, $request->getUri());
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
            throw $this->resendTfaPinCodeOverSmsApiException($exception);
        }
    }

    /**
     * Operation resendTfaPinCodeOverSmsAsync
     *
     * Resend 2FA PIN code over SMS
     *
     * @param string $pinId ID of the pin code that has to be verified. (required)
     * @param \Infobip\Model\TfaResendPinRequest $tfaResendPinRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function resendTfaPinCodeOverSmsAsync(string $pinId, \Infobip\Model\TfaResendPinRequest $tfaResendPinRequest): PromiseInterface
    {
        $request = $this->resendTfaPinCodeOverSmsRequest($pinId, $tfaResendPinRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->resendTfaPinCodeOverSmsResponse($response, $request->getUri());
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

                    throw $this->resendTfaPinCodeOverSmsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'resendTfaPinCodeOverSms'
     *
     * @param string $pinId ID of the pin code that has to be verified. (required)
     * @param \Infobip\Model\TfaResendPinRequest $tfaResendPinRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function resendTfaPinCodeOverSmsRequest(string $pinId, \Infobip\Model\TfaResendPinRequest $tfaResendPinRequest): Request
    {
        $allData = [
             'pinId' => $pinId,
             'tfaResendPinRequest' => $tfaResendPinRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'pinId' => [
                        new Assert\NotBlank(),
                    ],
                    'tfaResendPinRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/2fa/2/pin/{pinId}/resend';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($pinId !== null) {
            $resourcePath = str_replace(
                '{' . 'pinId' . '}',
                $this->objectSerializer->toPathValue($pinId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($tfaResendPinRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($tfaResendPinRequest)
                : $tfaResendPinRequest;
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
     * Create response for operation 'resendTfaPinCodeOverSms'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaStartAuthenticationResponse|null
     */
    private function resendTfaPinCodeOverSmsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\TfaStartAuthenticationResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'resendTfaPinCodeOverSms'
     */
    private function resendTfaPinCodeOverSmsApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\TfaStartAuthenticationResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation resendTfaPinCodeOverVoice
     *
     * Resend 2FA PIN code over Voice
     *
     * @param string $pinId ID of the pin code that has to be verified. (required)
     * @param \Infobip\Model\TfaResendPinRequest $tfaResendPinRequest tfaResendPinRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaStartAuthenticationResponse
     */
    public function resendTfaPinCodeOverVoice(string $pinId, \Infobip\Model\TfaResendPinRequest $tfaResendPinRequest)
    {
        $request = $this->resendTfaPinCodeOverVoiceRequest($pinId, $tfaResendPinRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->resendTfaPinCodeOverVoiceResponse($response, $request->getUri());
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
            throw $this->resendTfaPinCodeOverVoiceApiException($exception);
        }
    }

    /**
     * Operation resendTfaPinCodeOverVoiceAsync
     *
     * Resend 2FA PIN code over Voice
     *
     * @param string $pinId ID of the pin code that has to be verified. (required)
     * @param \Infobip\Model\TfaResendPinRequest $tfaResendPinRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function resendTfaPinCodeOverVoiceAsync(string $pinId, \Infobip\Model\TfaResendPinRequest $tfaResendPinRequest): PromiseInterface
    {
        $request = $this->resendTfaPinCodeOverVoiceRequest($pinId, $tfaResendPinRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->resendTfaPinCodeOverVoiceResponse($response, $request->getUri());
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

                    throw $this->resendTfaPinCodeOverVoiceApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'resendTfaPinCodeOverVoice'
     *
     * @param string $pinId ID of the pin code that has to be verified. (required)
     * @param \Infobip\Model\TfaResendPinRequest $tfaResendPinRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function resendTfaPinCodeOverVoiceRequest(string $pinId, \Infobip\Model\TfaResendPinRequest $tfaResendPinRequest): Request
    {
        $allData = [
             'pinId' => $pinId,
             'tfaResendPinRequest' => $tfaResendPinRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'pinId' => [
                        new Assert\NotBlank(),
                    ],
                    'tfaResendPinRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/2fa/2/pin/{pinId}/resend/voice';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($pinId !== null) {
            $resourcePath = str_replace(
                '{' . 'pinId' . '}',
                $this->objectSerializer->toPathValue($pinId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($tfaResendPinRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($tfaResendPinRequest)
                : $tfaResendPinRequest;
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
     * Create response for operation 'resendTfaPinCodeOverVoice'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaStartAuthenticationResponse|null
     */
    private function resendTfaPinCodeOverVoiceResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\TfaStartAuthenticationResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'resendTfaPinCodeOverVoice'
     */
    private function resendTfaPinCodeOverVoiceApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\TfaStartAuthenticationResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation sendTfaPinCodeOverSms
     *
     * Send 2FA PIN code over SMS
     *
     * @param \Infobip\Model\TfaStartAuthenticationRequest $tfaStartAuthenticationRequest tfaStartAuthenticationRequest (required)
     * @param null|bool $ncNeeded Indicates if Number Lookup is needed before sending the 2FA message. If the parameter value is true, Number Lookup will be requested before sending the SMS. If the value is false, the SMS will be sent without requesting Number Lookup. Field&#39;s default value is &#x60;true&#x60;. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaStartAuthenticationResponse
     */
    public function sendTfaPinCodeOverSms(\Infobip\Model\TfaStartAuthenticationRequest $tfaStartAuthenticationRequest, ?bool $ncNeeded = null)
    {
        $request = $this->sendTfaPinCodeOverSmsRequest($tfaStartAuthenticationRequest, $ncNeeded);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendTfaPinCodeOverSmsResponse($response, $request->getUri());
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
            throw $this->sendTfaPinCodeOverSmsApiException($exception);
        }
    }

    /**
     * Operation sendTfaPinCodeOverSmsAsync
     *
     * Send 2FA PIN code over SMS
     *
     * @param \Infobip\Model\TfaStartAuthenticationRequest $tfaStartAuthenticationRequest (required)
     * @param null|bool $ncNeeded Indicates if Number Lookup is needed before sending the 2FA message. If the parameter value is true, Number Lookup will be requested before sending the SMS. If the value is false, the SMS will be sent without requesting Number Lookup. Field&#39;s default value is &#x60;true&#x60;. (optional)
     *
     * @throws InvalidArgumentException
     */
    public function sendTfaPinCodeOverSmsAsync(\Infobip\Model\TfaStartAuthenticationRequest $tfaStartAuthenticationRequest, ?bool $ncNeeded = null): PromiseInterface
    {
        $request = $this->sendTfaPinCodeOverSmsRequest($tfaStartAuthenticationRequest, $ncNeeded);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendTfaPinCodeOverSmsResponse($response, $request->getUri());
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

                    throw $this->sendTfaPinCodeOverSmsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendTfaPinCodeOverSms'
     *
     * @param \Infobip\Model\TfaStartAuthenticationRequest $tfaStartAuthenticationRequest (required)
     * @param null|bool $ncNeeded Indicates if Number Lookup is needed before sending the 2FA message. If the parameter value is true, Number Lookup will be requested before sending the SMS. If the value is false, the SMS will be sent without requesting Number Lookup. Field&#39;s default value is &#x60;true&#x60;. (optional)
     *
     * @throws InvalidArgumentException
     */
    private function sendTfaPinCodeOverSmsRequest(\Infobip\Model\TfaStartAuthenticationRequest $tfaStartAuthenticationRequest, ?bool $ncNeeded = null): Request
    {
        $allData = [
             'tfaStartAuthenticationRequest' => $tfaStartAuthenticationRequest,
             'ncNeeded' => $ncNeeded,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'tfaStartAuthenticationRequest' => [
                        new Assert\NotNull(),
                    ],
                    'ncNeeded' => [
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/2fa/2/pin';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($ncNeeded !== null) {
            $queryParams['ncNeeded'] = $ncNeeded;
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($tfaStartAuthenticationRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($tfaStartAuthenticationRequest)
                : $tfaStartAuthenticationRequest;
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
     * Create response for operation 'sendTfaPinCodeOverSms'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaStartAuthenticationResponse|null
     */
    private function sendTfaPinCodeOverSmsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\TfaStartAuthenticationResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendTfaPinCodeOverSms'
     */
    private function sendTfaPinCodeOverSmsApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\TfaStartAuthenticationResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation sendTfaPinCodeOverVoice
     *
     * Send 2FA PIN code over Voice
     *
     * @param \Infobip\Model\TfaStartAuthenticationRequest $tfaStartAuthenticationRequest tfaStartAuthenticationRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaStartAuthenticationResponse
     */
    public function sendTfaPinCodeOverVoice(\Infobip\Model\TfaStartAuthenticationRequest $tfaStartAuthenticationRequest)
    {
        $request = $this->sendTfaPinCodeOverVoiceRequest($tfaStartAuthenticationRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendTfaPinCodeOverVoiceResponse($response, $request->getUri());
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
            throw $this->sendTfaPinCodeOverVoiceApiException($exception);
        }
    }

    /**
     * Operation sendTfaPinCodeOverVoiceAsync
     *
     * Send 2FA PIN code over Voice
     *
     * @param \Infobip\Model\TfaStartAuthenticationRequest $tfaStartAuthenticationRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendTfaPinCodeOverVoiceAsync(\Infobip\Model\TfaStartAuthenticationRequest $tfaStartAuthenticationRequest): PromiseInterface
    {
        $request = $this->sendTfaPinCodeOverVoiceRequest($tfaStartAuthenticationRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendTfaPinCodeOverVoiceResponse($response, $request->getUri());
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

                    throw $this->sendTfaPinCodeOverVoiceApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendTfaPinCodeOverVoice'
     *
     * @param \Infobip\Model\TfaStartAuthenticationRequest $tfaStartAuthenticationRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendTfaPinCodeOverVoiceRequest(\Infobip\Model\TfaStartAuthenticationRequest $tfaStartAuthenticationRequest): Request
    {
        $allData = [
             'tfaStartAuthenticationRequest' => $tfaStartAuthenticationRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'tfaStartAuthenticationRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/2fa/2/pin/voice';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($tfaStartAuthenticationRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($tfaStartAuthenticationRequest)
                : $tfaStartAuthenticationRequest;
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
     * Create response for operation 'sendTfaPinCodeOverVoice'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaStartAuthenticationResponse|null
     */
    private function sendTfaPinCodeOverVoiceResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\TfaStartAuthenticationResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendTfaPinCodeOverVoice'
     */
    private function sendTfaPinCodeOverVoiceApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\TfaStartAuthenticationResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation updateTfaApplication
     *
     * Update 2FA application
     *
     * @param string $appId ID of application that should be updated. (required)
     * @param \Infobip\Model\TfaApplicationRequest $tfaApplicationRequest tfaApplicationRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaApplicationResponse
     */
    public function updateTfaApplication(string $appId, \Infobip\Model\TfaApplicationRequest $tfaApplicationRequest)
    {
        $request = $this->updateTfaApplicationRequest($appId, $tfaApplicationRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->updateTfaApplicationResponse($response, $request->getUri());
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
            throw $this->updateTfaApplicationApiException($exception);
        }
    }

    /**
     * Operation updateTfaApplicationAsync
     *
     * Update 2FA application
     *
     * @param string $appId ID of application that should be updated. (required)
     * @param \Infobip\Model\TfaApplicationRequest $tfaApplicationRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function updateTfaApplicationAsync(string $appId, \Infobip\Model\TfaApplicationRequest $tfaApplicationRequest): PromiseInterface
    {
        $request = $this->updateTfaApplicationRequest($appId, $tfaApplicationRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->updateTfaApplicationResponse($response, $request->getUri());
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

                    throw $this->updateTfaApplicationApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'updateTfaApplication'
     *
     * @param string $appId ID of application that should be updated. (required)
     * @param \Infobip\Model\TfaApplicationRequest $tfaApplicationRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function updateTfaApplicationRequest(string $appId, \Infobip\Model\TfaApplicationRequest $tfaApplicationRequest): Request
    {
        $allData = [
             'appId' => $appId,
             'tfaApplicationRequest' => $tfaApplicationRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'appId' => [
                        new Assert\NotBlank(),
                    ],
                    'tfaApplicationRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/2fa/2/applications/{appId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($appId !== null) {
            $resourcePath = str_replace(
                '{' . 'appId' . '}',
                $this->objectSerializer->toPathValue($appId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($tfaApplicationRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($tfaApplicationRequest)
                : $tfaApplicationRequest;
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
     * Create response for operation 'updateTfaApplication'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaApplicationResponse|null
     */
    private function updateTfaApplicationResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\TfaApplicationResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'updateTfaApplication'
     */
    private function updateTfaApplicationApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\TfaApplicationResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation updateTfaMessageTemplate
     *
     * Update 2FA message template
     *
     * @param string $appId ID of application for which requested message was created. (required)
     * @param string $msgId Requested message ID. (required)
     * @param \Infobip\Model\TfaUpdateMessageRequest $tfaUpdateMessageRequest tfaUpdateMessageRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaMessage
     */
    public function updateTfaMessageTemplate(string $appId, string $msgId, \Infobip\Model\TfaUpdateMessageRequest $tfaUpdateMessageRequest)
    {
        $request = $this->updateTfaMessageTemplateRequest($appId, $msgId, $tfaUpdateMessageRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->updateTfaMessageTemplateResponse($response, $request->getUri());
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
            throw $this->updateTfaMessageTemplateApiException($exception);
        }
    }

    /**
     * Operation updateTfaMessageTemplateAsync
     *
     * Update 2FA message template
     *
     * @param string $appId ID of application for which requested message was created. (required)
     * @param string $msgId Requested message ID. (required)
     * @param \Infobip\Model\TfaUpdateMessageRequest $tfaUpdateMessageRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function updateTfaMessageTemplateAsync(string $appId, string $msgId, \Infobip\Model\TfaUpdateMessageRequest $tfaUpdateMessageRequest): PromiseInterface
    {
        $request = $this->updateTfaMessageTemplateRequest($appId, $msgId, $tfaUpdateMessageRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->updateTfaMessageTemplateResponse($response, $request->getUri());
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

                    throw $this->updateTfaMessageTemplateApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'updateTfaMessageTemplate'
     *
     * @param string $appId ID of application for which requested message was created. (required)
     * @param string $msgId Requested message ID. (required)
     * @param \Infobip\Model\TfaUpdateMessageRequest $tfaUpdateMessageRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function updateTfaMessageTemplateRequest(string $appId, string $msgId, \Infobip\Model\TfaUpdateMessageRequest $tfaUpdateMessageRequest): Request
    {
        $allData = [
             'appId' => $appId,
             'msgId' => $msgId,
             'tfaUpdateMessageRequest' => $tfaUpdateMessageRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'appId' => [
                        new Assert\NotBlank(),
                    ],
                    'msgId' => [
                        new Assert\NotBlank(),
                    ],
                    'tfaUpdateMessageRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/2fa/2/applications/{appId}/messages/{msgId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($appId !== null) {
            $resourcePath = str_replace(
                '{' . 'appId' . '}',
                $this->objectSerializer->toPathValue($appId),
                $resourcePath
            );
        }

        // path params
        if ($msgId !== null) {
            $resourcePath = str_replace(
                '{' . 'msgId' . '}',
                $this->objectSerializer->toPathValue($msgId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($tfaUpdateMessageRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($tfaUpdateMessageRequest)
                : $tfaUpdateMessageRequest;
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
     * Create response for operation 'updateTfaMessageTemplate'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaMessage|null
     */
    private function updateTfaMessageTemplateResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\TfaMessage', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'updateTfaMessageTemplate'
     */
    private function updateTfaMessageTemplateApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\TfaMessage',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation verifyTfaPhoneNumber
     *
     * Verify phone number
     *
     * @param string $pinId ID of the pin code that has to be verified. (required)
     * @param \Infobip\Model\TfaVerifyPinRequest $tfaVerifyPinRequest tfaVerifyPinRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaVerifyPinResponse
     */
    public function verifyTfaPhoneNumber(string $pinId, \Infobip\Model\TfaVerifyPinRequest $tfaVerifyPinRequest)
    {
        $request = $this->verifyTfaPhoneNumberRequest($pinId, $tfaVerifyPinRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->verifyTfaPhoneNumberResponse($response, $request->getUri());
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
            throw $this->verifyTfaPhoneNumberApiException($exception);
        }
    }

    /**
     * Operation verifyTfaPhoneNumberAsync
     *
     * Verify phone number
     *
     * @param string $pinId ID of the pin code that has to be verified. (required)
     * @param \Infobip\Model\TfaVerifyPinRequest $tfaVerifyPinRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function verifyTfaPhoneNumberAsync(string $pinId, \Infobip\Model\TfaVerifyPinRequest $tfaVerifyPinRequest): PromiseInterface
    {
        $request = $this->verifyTfaPhoneNumberRequest($pinId, $tfaVerifyPinRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->verifyTfaPhoneNumberResponse($response, $request->getUri());
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

                    throw $this->verifyTfaPhoneNumberApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'verifyTfaPhoneNumber'
     *
     * @param string $pinId ID of the pin code that has to be verified. (required)
     * @param \Infobip\Model\TfaVerifyPinRequest $tfaVerifyPinRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function verifyTfaPhoneNumberRequest(string $pinId, \Infobip\Model\TfaVerifyPinRequest $tfaVerifyPinRequest): Request
    {
        $allData = [
             'pinId' => $pinId,
             'tfaVerifyPinRequest' => $tfaVerifyPinRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'pinId' => [
                        new Assert\NotBlank(),
                    ],
                    'tfaVerifyPinRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/2fa/2/pin/{pinId}/verify';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($pinId !== null) {
            $resourcePath = str_replace(
                '{' . 'pinId' . '}',
                $this->objectSerializer->toPathValue($pinId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($tfaVerifyPinRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($tfaVerifyPinRequest)
                : $tfaVerifyPinRequest;
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
     * Create response for operation 'verifyTfaPhoneNumber'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\TfaVerifyPinResponse|null
     */
    private function verifyTfaPhoneNumberResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\TfaVerifyPinResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'verifyTfaPhoneNumber'
     */
    private function verifyTfaPhoneNumberApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\TfaVerifyPinResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }
}
