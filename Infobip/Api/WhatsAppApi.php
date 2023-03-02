<?php

// phpcs:ignorefile

/**
 * WhatsAppApi
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

final class WhatsAppApi
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
     * Operation confirmWhatsAppIdentity
     *
     * Confirm identity
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $userNumber End user&#39;s number. Must be in international format. (required)
     * @param \Infobip\Model\WhatsAppIdentityConfirmation $whatsAppIdentityConfirmation whatsAppIdentityConfirmation (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function confirmWhatsAppIdentity(string $sender, string $userNumber, \Infobip\Model\WhatsAppIdentityConfirmation $whatsAppIdentityConfirmation)
    {
        $request = $this->confirmWhatsAppIdentityRequest($sender, $userNumber, $whatsAppIdentityConfirmation);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->confirmWhatsAppIdentityResponse($response, $request->getUri());
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
            throw $this->confirmWhatsAppIdentityApiException($exception);
        }
    }

    /**
     * Operation confirmWhatsAppIdentityAsync
     *
     * Confirm identity
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $userNumber End user&#39;s number. Must be in international format. (required)
     * @param \Infobip\Model\WhatsAppIdentityConfirmation $whatsAppIdentityConfirmation (required)
     *
     * @throws InvalidArgumentException
     */
    public function confirmWhatsAppIdentityAsync(string $sender, string $userNumber, \Infobip\Model\WhatsAppIdentityConfirmation $whatsAppIdentityConfirmation): PromiseInterface
    {
        $request = $this->confirmWhatsAppIdentityRequest($sender, $userNumber, $whatsAppIdentityConfirmation);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->confirmWhatsAppIdentityResponse($response, $request->getUri());
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

                    throw $this->confirmWhatsAppIdentityApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'confirmWhatsAppIdentity'
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $userNumber End user&#39;s number. Must be in international format. (required)
     * @param \Infobip\Model\WhatsAppIdentityConfirmation $whatsAppIdentityConfirmation (required)
     *
     * @throws InvalidArgumentException
     */
    private function confirmWhatsAppIdentityRequest(string $sender, string $userNumber, \Infobip\Model\WhatsAppIdentityConfirmation $whatsAppIdentityConfirmation): Request
    {
        $allData = [
             'sender' => $sender,
             'userNumber' => $userNumber,
             'whatsAppIdentityConfirmation' => $whatsAppIdentityConfirmation,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'sender' => [
                        new Assert\NotBlank(),
                    ],
                    'userNumber' => [
                        new Assert\NotBlank(),
                    ],
                    'whatsAppIdentityConfirmation' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/{sender}/contacts/{userNumber}/identity';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($sender !== null) {
            $resourcePath = str_replace(
                '{' . 'sender' . '}',
                $this->objectSerializer->toPathValue($sender),
                $resourcePath
            );
        }

        // path params
        if ($userNumber !== null) {
            $resourcePath = str_replace(
                '{' . 'userNumber' . '}',
                $this->objectSerializer->toPathValue($userNumber),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($whatsAppIdentityConfirmation)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($whatsAppIdentityConfirmation)
                : $whatsAppIdentityConfirmation;
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
     * Create response for operation 'confirmWhatsAppIdentity'
     * @throws ApiException on non-2xx response
     * @return null
     */
    private function confirmWhatsAppIdentityResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'confirmWhatsAppIdentity'
     */
    private function confirmWhatsAppIdentityApiException(ApiException $apiException): ApiException
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

        return $apiException;
    }

    /**
     * Operation createWhatsAppTemplate
     *
     * Create WhatsApp Template
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param \Infobip\Model\WhatsAppTemplatePublicApiRequest $whatsAppTemplatePublicApiRequest whatsAppTemplatePublicApiRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WhatsAppTemplateApiResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function createWhatsAppTemplate(string $sender, \Infobip\Model\WhatsAppTemplatePublicApiRequest $whatsAppTemplatePublicApiRequest)
    {
        $request = $this->createWhatsAppTemplateRequest($sender, $whatsAppTemplatePublicApiRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->createWhatsAppTemplateResponse($response, $request->getUri());
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
            throw $this->createWhatsAppTemplateApiException($exception);
        }
    }

    /**
     * Operation createWhatsAppTemplateAsync
     *
     * Create WhatsApp Template
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param \Infobip\Model\WhatsAppTemplatePublicApiRequest $whatsAppTemplatePublicApiRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function createWhatsAppTemplateAsync(string $sender, \Infobip\Model\WhatsAppTemplatePublicApiRequest $whatsAppTemplatePublicApiRequest): PromiseInterface
    {
        $request = $this->createWhatsAppTemplateRequest($sender, $whatsAppTemplatePublicApiRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->createWhatsAppTemplateResponse($response, $request->getUri());
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

                    throw $this->createWhatsAppTemplateApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'createWhatsAppTemplate'
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param \Infobip\Model\WhatsAppTemplatePublicApiRequest $whatsAppTemplatePublicApiRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function createWhatsAppTemplateRequest(string $sender, \Infobip\Model\WhatsAppTemplatePublicApiRequest $whatsAppTemplatePublicApiRequest): Request
    {
        $allData = [
             'sender' => $sender,
             'whatsAppTemplatePublicApiRequest' => $whatsAppTemplatePublicApiRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'sender' => [
                        new Assert\NotBlank(),
                    ],
                    'whatsAppTemplatePublicApiRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/2/senders/{sender}/templates';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($sender !== null) {
            $resourcePath = str_replace(
                '{' . 'sender' . '}',
                $this->objectSerializer->toPathValue($sender),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($whatsAppTemplatePublicApiRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($whatsAppTemplatePublicApiRequest)
                : $whatsAppTemplatePublicApiRequest;
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
     * Create response for operation 'createWhatsAppTemplate'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WhatsAppTemplateApiResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function createWhatsAppTemplateResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WhatsAppTemplateApiResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'createWhatsAppTemplate'
     */
    private function createWhatsAppTemplateApiException(ApiException $apiException): ApiException
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
        if ($statusCode === 403) {
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

        return $apiException;
    }

    /**
     * Operation deleteWhatsAppMedia
     *
     * Delete media
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param \Infobip\Model\WhatsAppUrlDeletionRequest $whatsAppUrlDeletionRequest whatsAppUrlDeletionRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function deleteWhatsAppMedia(string $sender, \Infobip\Model\WhatsAppUrlDeletionRequest $whatsAppUrlDeletionRequest)
    {
        $request = $this->deleteWhatsAppMediaRequest($sender, $whatsAppUrlDeletionRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->deleteWhatsAppMediaResponse($response, $request->getUri());
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
            throw $this->deleteWhatsAppMediaApiException($exception);
        }
    }

    /**
     * Operation deleteWhatsAppMediaAsync
     *
     * Delete media
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param \Infobip\Model\WhatsAppUrlDeletionRequest $whatsAppUrlDeletionRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function deleteWhatsAppMediaAsync(string $sender, \Infobip\Model\WhatsAppUrlDeletionRequest $whatsAppUrlDeletionRequest): PromiseInterface
    {
        $request = $this->deleteWhatsAppMediaRequest($sender, $whatsAppUrlDeletionRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->deleteWhatsAppMediaResponse($response, $request->getUri());
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

                    throw $this->deleteWhatsAppMediaApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'deleteWhatsAppMedia'
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param \Infobip\Model\WhatsAppUrlDeletionRequest $whatsAppUrlDeletionRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function deleteWhatsAppMediaRequest(string $sender, \Infobip\Model\WhatsAppUrlDeletionRequest $whatsAppUrlDeletionRequest): Request
    {
        $allData = [
             'sender' => $sender,
             'whatsAppUrlDeletionRequest' => $whatsAppUrlDeletionRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'sender' => [
                        new Assert\NotBlank(),
                    ],
                    'whatsAppUrlDeletionRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/senders/{sender}/media';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($sender !== null) {
            $resourcePath = str_replace(
                '{' . 'sender' . '}',
                $this->objectSerializer->toPathValue($sender),
                $resourcePath
            );
        }

        $headers = [

            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($whatsAppUrlDeletionRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($whatsAppUrlDeletionRequest)
                : $whatsAppUrlDeletionRequest;
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
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'deleteWhatsAppMedia'
     * @throws ApiException on non-2xx response
     * @return null
     */
    private function deleteWhatsAppMediaResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'deleteWhatsAppMedia'
     */
    private function deleteWhatsAppMediaApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();


        return $apiException;
    }

    /**
     * Operation deleteWhatsAppTemplate
     *
     * Delete WhatsApp Template
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $templateName Template name. Must only contain lowercase alphanumeric characters and underscores. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function deleteWhatsAppTemplate(string $sender, string $templateName)
    {
        $request = $this->deleteWhatsAppTemplateRequest($sender, $templateName);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->deleteWhatsAppTemplateResponse($response, $request->getUri());
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
            throw $this->deleteWhatsAppTemplateApiException($exception);
        }
    }

    /**
     * Operation deleteWhatsAppTemplateAsync
     *
     * Delete WhatsApp Template
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $templateName Template name. Must only contain lowercase alphanumeric characters and underscores. (required)
     *
     * @throws InvalidArgumentException
     */
    public function deleteWhatsAppTemplateAsync(string $sender, string $templateName): PromiseInterface
    {
        $request = $this->deleteWhatsAppTemplateRequest($sender, $templateName);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->deleteWhatsAppTemplateResponse($response, $request->getUri());
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

                    throw $this->deleteWhatsAppTemplateApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'deleteWhatsAppTemplate'
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $templateName Template name. Must only contain lowercase alphanumeric characters and underscores. (required)
     *
     * @throws InvalidArgumentException
     */
    private function deleteWhatsAppTemplateRequest(string $sender, string $templateName): Request
    {
        $allData = [
             'sender' => $sender,
             'templateName' => $templateName,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'sender' => [
                        new Assert\NotBlank(),
                    ],
                    'templateName' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/2/senders/{sender}/templates/{templateName}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($sender !== null) {
            $resourcePath = str_replace(
                '{' . 'sender' . '}',
                $this->objectSerializer->toPathValue($sender),
                $resourcePath
            );
        }

        // path params
        if ($templateName !== null) {
            $resourcePath = str_replace(
                '{' . 'templateName' . '}',
                $this->objectSerializer->toPathValue($templateName),
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
     * Create response for operation 'deleteWhatsAppTemplate'
     * @throws ApiException on non-2xx response
     * @return null
     */
    private function deleteWhatsAppTemplateResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'deleteWhatsAppTemplate'
     */
    private function deleteWhatsAppTemplateApiException(ApiException $apiException): ApiException
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
        if ($statusCode === 403) {
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

        return $apiException;
    }

    /**
     * Operation downloadWhatsAppInboundMedia
     *
     * Download inbound media
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $mediaId ID of the media. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \SplFileObject
     */
    public function downloadWhatsAppInboundMedia(string $sender, string $mediaId)
    {
        $request = $this->downloadWhatsAppInboundMediaRequest($sender, $mediaId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->downloadWhatsAppInboundMediaResponse($response, $request->getUri());
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
            throw $this->downloadWhatsAppInboundMediaApiException($exception);
        }
    }

    /**
     * Operation downloadWhatsAppInboundMediaAsync
     *
     * Download inbound media
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $mediaId ID of the media. (required)
     *
     * @throws InvalidArgumentException
     */
    public function downloadWhatsAppInboundMediaAsync(string $sender, string $mediaId): PromiseInterface
    {
        $request = $this->downloadWhatsAppInboundMediaRequest($sender, $mediaId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->downloadWhatsAppInboundMediaResponse($response, $request->getUri());
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

                    throw $this->downloadWhatsAppInboundMediaApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'downloadWhatsAppInboundMedia'
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $mediaId ID of the media. (required)
     *
     * @throws InvalidArgumentException
     */
    private function downloadWhatsAppInboundMediaRequest(string $sender, string $mediaId): Request
    {
        $allData = [
             'sender' => $sender,
             'mediaId' => $mediaId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'sender' => [
                        new Assert\NotBlank(),
                    ],
                    'mediaId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/senders/{sender}/media/{mediaId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($sender !== null) {
            $resourcePath = str_replace(
                '{' . 'sender' . '}',
                $this->objectSerializer->toPathValue($sender),
                $resourcePath
            );
        }

        // path params
        if ($mediaId !== null) {
            $resourcePath = str_replace(
                '{' . 'mediaId' . '}',
                $this->objectSerializer->toPathValue($mediaId),
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
     * Create response for operation 'downloadWhatsAppInboundMedia'
     * @throws ApiException on non-2xx response
     * @return \SplFileObject|null
     */
    private function downloadWhatsAppInboundMediaResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
     * Adapt given ApiException for operation 'downloadWhatsAppInboundMedia'
     */
    private function downloadWhatsAppInboundMediaApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();


        return $apiException;
    }

    /**
     * Operation getWhatsAppIdentity
     *
     * Get identity
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $userNumber End user&#39;s number. Must be in international format. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WhatsAppIdentityInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getWhatsAppIdentity(string $sender, string $userNumber)
    {
        $request = $this->getWhatsAppIdentityRequest($sender, $userNumber);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getWhatsAppIdentityResponse($response, $request->getUri());
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
            throw $this->getWhatsAppIdentityApiException($exception);
        }
    }

    /**
     * Operation getWhatsAppIdentityAsync
     *
     * Get identity
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $userNumber End user&#39;s number. Must be in international format. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getWhatsAppIdentityAsync(string $sender, string $userNumber): PromiseInterface
    {
        $request = $this->getWhatsAppIdentityRequest($sender, $userNumber);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getWhatsAppIdentityResponse($response, $request->getUri());
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

                    throw $this->getWhatsAppIdentityApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getWhatsAppIdentity'
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $userNumber End user&#39;s number. Must be in international format. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getWhatsAppIdentityRequest(string $sender, string $userNumber): Request
    {
        $allData = [
             'sender' => $sender,
             'userNumber' => $userNumber,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'sender' => [
                        new Assert\NotBlank(),
                    ],
                    'userNumber' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/{sender}/contacts/{userNumber}/identity';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($sender !== null) {
            $resourcePath = str_replace(
                '{' . 'sender' . '}',
                $this->objectSerializer->toPathValue($sender),
                $resourcePath
            );
        }

        // path params
        if ($userNumber !== null) {
            $resourcePath = str_replace(
                '{' . 'userNumber' . '}',
                $this->objectSerializer->toPathValue($userNumber),
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
     * Create response for operation 'getWhatsAppIdentity'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WhatsAppIdentityInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getWhatsAppIdentityResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WhatsAppIdentityInfo', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getWhatsAppIdentity'
     */
    private function getWhatsAppIdentityApiException(ApiException $apiException): ApiException
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

        return $apiException;
    }

    /**
     * Operation getWhatsAppMediaMetadata
     *
     * Get media metadata
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $mediaId ID of the media. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function getWhatsAppMediaMetadata(string $sender, string $mediaId)
    {
        $request = $this->getWhatsAppMediaMetadataRequest($sender, $mediaId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getWhatsAppMediaMetadataResponse($response, $request->getUri());
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
            throw $this->getWhatsAppMediaMetadataApiException($exception);
        }
    }

    /**
     * Operation getWhatsAppMediaMetadataAsync
     *
     * Get media metadata
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $mediaId ID of the media. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getWhatsAppMediaMetadataAsync(string $sender, string $mediaId): PromiseInterface
    {
        $request = $this->getWhatsAppMediaMetadataRequest($sender, $mediaId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getWhatsAppMediaMetadataResponse($response, $request->getUri());
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

                    throw $this->getWhatsAppMediaMetadataApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getWhatsAppMediaMetadata'
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $mediaId ID of the media. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getWhatsAppMediaMetadataRequest(string $sender, string $mediaId): Request
    {
        $allData = [
             'sender' => $sender,
             'mediaId' => $mediaId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'sender' => [
                        new Assert\NotBlank(),
                    ],
                    'mediaId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/senders/{sender}/media/{mediaId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($sender !== null) {
            $resourcePath = str_replace(
                '{' . 'sender' . '}',
                $this->objectSerializer->toPathValue($sender),
                $resourcePath
            );
        }

        // path params
        if ($mediaId !== null) {
            $resourcePath = str_replace(
                '{' . 'mediaId' . '}',
                $this->objectSerializer->toPathValue($mediaId),
                $resourcePath
            );
        }

        $headers = [


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
            'HEAD',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create response for operation 'getWhatsAppMediaMetadata'
     * @throws ApiException on non-2xx response
     * @return null
     */
    private function getWhatsAppMediaMetadataResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getWhatsAppMediaMetadata'
     */
    private function getWhatsAppMediaMetadataApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();


        return $apiException;
    }

    /**
     * Operation getWhatsAppTemplates
     *
     * Get WhatsApp Templates
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WhatsAppTemplatesApiResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getWhatsAppTemplates(string $sender)
    {
        $request = $this->getWhatsAppTemplatesRequest($sender);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getWhatsAppTemplatesResponse($response, $request->getUri());
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
            throw $this->getWhatsAppTemplatesApiException($exception);
        }
    }

    /**
     * Operation getWhatsAppTemplatesAsync
     *
     * Get WhatsApp Templates
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getWhatsAppTemplatesAsync(string $sender): PromiseInterface
    {
        $request = $this->getWhatsAppTemplatesRequest($sender);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getWhatsAppTemplatesResponse($response, $request->getUri());
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

                    throw $this->getWhatsAppTemplatesApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getWhatsAppTemplates'
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getWhatsAppTemplatesRequest(string $sender): Request
    {
        $allData = [
             'sender' => $sender,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'sender' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/2/senders/{sender}/templates';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($sender !== null) {
            $resourcePath = str_replace(
                '{' . 'sender' . '}',
                $this->objectSerializer->toPathValue($sender),
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
     * Create response for operation 'getWhatsAppTemplates'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WhatsAppTemplatesApiResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getWhatsAppTemplatesResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WhatsAppTemplatesApiResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getWhatsAppTemplates'
     */
    private function getWhatsAppTemplatesApiException(ApiException $apiException): ApiException
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
        if ($statusCode === 403) {
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

        return $apiException;
    }

    /**
     * Operation markWhatsAppMessageAsRead
     *
     * Mark as read
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $messageId ID of the message to be marked as read. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function markWhatsAppMessageAsRead(string $sender, string $messageId)
    {
        $request = $this->markWhatsAppMessageAsReadRequest($sender, $messageId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->markWhatsAppMessageAsReadResponse($response, $request->getUri());
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
            throw $this->markWhatsAppMessageAsReadApiException($exception);
        }
    }

    /**
     * Operation markWhatsAppMessageAsReadAsync
     *
     * Mark as read
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $messageId ID of the message to be marked as read. (required)
     *
     * @throws InvalidArgumentException
     */
    public function markWhatsAppMessageAsReadAsync(string $sender, string $messageId): PromiseInterface
    {
        $request = $this->markWhatsAppMessageAsReadRequest($sender, $messageId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->markWhatsAppMessageAsReadResponse($response, $request->getUri());
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

                    throw $this->markWhatsAppMessageAsReadApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'markWhatsAppMessageAsRead'
     *
     * @param string $sender Registered WhatsApp sender number. Must be in international format. (required)
     * @param string $messageId ID of the message to be marked as read. (required)
     *
     * @throws InvalidArgumentException
     */
    private function markWhatsAppMessageAsReadRequest(string $sender, string $messageId): Request
    {
        $allData = [
             'sender' => $sender,
             'messageId' => $messageId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'sender' => [
                        new Assert\NotBlank(),
                    ],
                    'messageId' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/senders/{sender}/message/{messageId}/read';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($sender !== null) {
            $resourcePath = str_replace(
                '{' . 'sender' . '}',
                $this->objectSerializer->toPathValue($sender),
                $resourcePath
            );
        }

        // path params
        if ($messageId !== null) {
            $resourcePath = str_replace(
                '{' . 'messageId' . '}',
                $this->objectSerializer->toPathValue($messageId),
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
     * Create response for operation 'markWhatsAppMessageAsRead'
     * @throws ApiException on non-2xx response
     * @return null
     */
    private function markWhatsAppMessageAsReadResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'markWhatsAppMessageAsRead'
     */
    private function markWhatsAppMessageAsReadApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\WhatsAppMarkAsReadErrorResponse',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation sendWhatsAppAudioMessage
     *
     * Send WhatsApp audio message
     *
     * @param \Infobip\Model\WhatsAppAudioMessage $whatsAppAudioMessage whatsAppAudioMessage (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendWhatsAppAudioMessage(\Infobip\Model\WhatsAppAudioMessage $whatsAppAudioMessage)
    {
        $request = $this->sendWhatsAppAudioMessageRequest($whatsAppAudioMessage);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendWhatsAppAudioMessageResponse($response, $request->getUri());
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
            throw $this->sendWhatsAppAudioMessageApiException($exception);
        }
    }

    /**
     * Operation sendWhatsAppAudioMessageAsync
     *
     * Send WhatsApp audio message
     *
     * @param \Infobip\Model\WhatsAppAudioMessage $whatsAppAudioMessage (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendWhatsAppAudioMessageAsync(\Infobip\Model\WhatsAppAudioMessage $whatsAppAudioMessage): PromiseInterface
    {
        $request = $this->sendWhatsAppAudioMessageRequest($whatsAppAudioMessage);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendWhatsAppAudioMessageResponse($response, $request->getUri());
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

                    throw $this->sendWhatsAppAudioMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendWhatsAppAudioMessage'
     *
     * @param \Infobip\Model\WhatsAppAudioMessage $whatsAppAudioMessage (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendWhatsAppAudioMessageRequest(\Infobip\Model\WhatsAppAudioMessage $whatsAppAudioMessage): Request
    {
        $allData = [
             'whatsAppAudioMessage' => $whatsAppAudioMessage,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'whatsAppAudioMessage' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/message/audio';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($whatsAppAudioMessage)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($whatsAppAudioMessage)
                : $whatsAppAudioMessage;
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
     * Create response for operation 'sendWhatsAppAudioMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendWhatsAppAudioMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WhatsAppSingleMessageInfo', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendWhatsAppAudioMessage'
     */
    private function sendWhatsAppAudioMessageApiException(ApiException $apiException): ApiException
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

        return $apiException;
    }

    /**
     * Operation sendWhatsAppContactMessage
     *
     * Send WhatsApp contact message
     *
     * @param \Infobip\Model\WhatsAppContactsMessage $whatsAppContactsMessage whatsAppContactsMessage (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendWhatsAppContactMessage(\Infobip\Model\WhatsAppContactsMessage $whatsAppContactsMessage)
    {
        $request = $this->sendWhatsAppContactMessageRequest($whatsAppContactsMessage);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendWhatsAppContactMessageResponse($response, $request->getUri());
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
            throw $this->sendWhatsAppContactMessageApiException($exception);
        }
    }

    /**
     * Operation sendWhatsAppContactMessageAsync
     *
     * Send WhatsApp contact message
     *
     * @param \Infobip\Model\WhatsAppContactsMessage $whatsAppContactsMessage (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendWhatsAppContactMessageAsync(\Infobip\Model\WhatsAppContactsMessage $whatsAppContactsMessage): PromiseInterface
    {
        $request = $this->sendWhatsAppContactMessageRequest($whatsAppContactsMessage);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendWhatsAppContactMessageResponse($response, $request->getUri());
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

                    throw $this->sendWhatsAppContactMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendWhatsAppContactMessage'
     *
     * @param \Infobip\Model\WhatsAppContactsMessage $whatsAppContactsMessage (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendWhatsAppContactMessageRequest(\Infobip\Model\WhatsAppContactsMessage $whatsAppContactsMessage): Request
    {
        $allData = [
             'whatsAppContactsMessage' => $whatsAppContactsMessage,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'whatsAppContactsMessage' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/message/contact';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($whatsAppContactsMessage)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($whatsAppContactsMessage)
                : $whatsAppContactsMessage;
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
     * Create response for operation 'sendWhatsAppContactMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendWhatsAppContactMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WhatsAppSingleMessageInfo', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendWhatsAppContactMessage'
     */
    private function sendWhatsAppContactMessageApiException(ApiException $apiException): ApiException
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

        return $apiException;
    }

    /**
     * Operation sendWhatsAppDocumentMessage
     *
     * Send WhatsApp document message
     *
     * @param \Infobip\Model\WhatsAppDocumentMessage $whatsAppDocumentMessage whatsAppDocumentMessage (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendWhatsAppDocumentMessage(\Infobip\Model\WhatsAppDocumentMessage $whatsAppDocumentMessage)
    {
        $request = $this->sendWhatsAppDocumentMessageRequest($whatsAppDocumentMessage);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendWhatsAppDocumentMessageResponse($response, $request->getUri());
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
            throw $this->sendWhatsAppDocumentMessageApiException($exception);
        }
    }

    /**
     * Operation sendWhatsAppDocumentMessageAsync
     *
     * Send WhatsApp document message
     *
     * @param \Infobip\Model\WhatsAppDocumentMessage $whatsAppDocumentMessage (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendWhatsAppDocumentMessageAsync(\Infobip\Model\WhatsAppDocumentMessage $whatsAppDocumentMessage): PromiseInterface
    {
        $request = $this->sendWhatsAppDocumentMessageRequest($whatsAppDocumentMessage);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendWhatsAppDocumentMessageResponse($response, $request->getUri());
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

                    throw $this->sendWhatsAppDocumentMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendWhatsAppDocumentMessage'
     *
     * @param \Infobip\Model\WhatsAppDocumentMessage $whatsAppDocumentMessage (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendWhatsAppDocumentMessageRequest(\Infobip\Model\WhatsAppDocumentMessage $whatsAppDocumentMessage): Request
    {
        $allData = [
             'whatsAppDocumentMessage' => $whatsAppDocumentMessage,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'whatsAppDocumentMessage' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/message/document';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($whatsAppDocumentMessage)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($whatsAppDocumentMessage)
                : $whatsAppDocumentMessage;
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
     * Create response for operation 'sendWhatsAppDocumentMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendWhatsAppDocumentMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WhatsAppSingleMessageInfo', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendWhatsAppDocumentMessage'
     */
    private function sendWhatsAppDocumentMessageApiException(ApiException $apiException): ApiException
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

        return $apiException;
    }

    /**
     * Operation sendWhatsAppImageMessage
     *
     * Send WhatsApp image message
     *
     * @param \Infobip\Model\WhatsAppImageMessage $whatsAppImageMessage whatsAppImageMessage (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendWhatsAppImageMessage(\Infobip\Model\WhatsAppImageMessage $whatsAppImageMessage)
    {
        $request = $this->sendWhatsAppImageMessageRequest($whatsAppImageMessage);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendWhatsAppImageMessageResponse($response, $request->getUri());
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
            throw $this->sendWhatsAppImageMessageApiException($exception);
        }
    }

    /**
     * Operation sendWhatsAppImageMessageAsync
     *
     * Send WhatsApp image message
     *
     * @param \Infobip\Model\WhatsAppImageMessage $whatsAppImageMessage (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendWhatsAppImageMessageAsync(\Infobip\Model\WhatsAppImageMessage $whatsAppImageMessage): PromiseInterface
    {
        $request = $this->sendWhatsAppImageMessageRequest($whatsAppImageMessage);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendWhatsAppImageMessageResponse($response, $request->getUri());
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

                    throw $this->sendWhatsAppImageMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendWhatsAppImageMessage'
     *
     * @param \Infobip\Model\WhatsAppImageMessage $whatsAppImageMessage (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendWhatsAppImageMessageRequest(\Infobip\Model\WhatsAppImageMessage $whatsAppImageMessage): Request
    {
        $allData = [
             'whatsAppImageMessage' => $whatsAppImageMessage,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'whatsAppImageMessage' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/message/image';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($whatsAppImageMessage)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($whatsAppImageMessage)
                : $whatsAppImageMessage;
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
     * Create response for operation 'sendWhatsAppImageMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendWhatsAppImageMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WhatsAppSingleMessageInfo', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendWhatsAppImageMessage'
     */
    private function sendWhatsAppImageMessageApiException(ApiException $apiException): ApiException
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

        return $apiException;
    }

    /**
     * Operation sendWhatsAppInteractiveButtonsMessage
     *
     * Send WhatsApp interactive buttons message
     *
     * @param \Infobip\Model\WhatsAppInteractiveButtonsMessage $whatsAppInteractiveButtonsMessage whatsAppInteractiveButtonsMessage (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendWhatsAppInteractiveButtonsMessage(\Infobip\Model\WhatsAppInteractiveButtonsMessage $whatsAppInteractiveButtonsMessage)
    {
        $request = $this->sendWhatsAppInteractiveButtonsMessageRequest($whatsAppInteractiveButtonsMessage);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendWhatsAppInteractiveButtonsMessageResponse($response, $request->getUri());
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
            throw $this->sendWhatsAppInteractiveButtonsMessageApiException($exception);
        }
    }

    /**
     * Operation sendWhatsAppInteractiveButtonsMessageAsync
     *
     * Send WhatsApp interactive buttons message
     *
     * @param \Infobip\Model\WhatsAppInteractiveButtonsMessage $whatsAppInteractiveButtonsMessage (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendWhatsAppInteractiveButtonsMessageAsync(\Infobip\Model\WhatsAppInteractiveButtonsMessage $whatsAppInteractiveButtonsMessage): PromiseInterface
    {
        $request = $this->sendWhatsAppInteractiveButtonsMessageRequest($whatsAppInteractiveButtonsMessage);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendWhatsAppInteractiveButtonsMessageResponse($response, $request->getUri());
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

                    throw $this->sendWhatsAppInteractiveButtonsMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendWhatsAppInteractiveButtonsMessage'
     *
     * @param \Infobip\Model\WhatsAppInteractiveButtonsMessage $whatsAppInteractiveButtonsMessage (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendWhatsAppInteractiveButtonsMessageRequest(\Infobip\Model\WhatsAppInteractiveButtonsMessage $whatsAppInteractiveButtonsMessage): Request
    {
        $allData = [
             'whatsAppInteractiveButtonsMessage' => $whatsAppInteractiveButtonsMessage,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'whatsAppInteractiveButtonsMessage' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/message/interactive/buttons';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($whatsAppInteractiveButtonsMessage)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($whatsAppInteractiveButtonsMessage)
                : $whatsAppInteractiveButtonsMessage;
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
     * Create response for operation 'sendWhatsAppInteractiveButtonsMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendWhatsAppInteractiveButtonsMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WhatsAppSingleMessageInfo', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendWhatsAppInteractiveButtonsMessage'
     */
    private function sendWhatsAppInteractiveButtonsMessageApiException(ApiException $apiException): ApiException
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

        return $apiException;
    }

    /**
     * Operation sendWhatsAppInteractiveListMessage
     *
     * Send WhatsApp interactive list message
     *
     * @param \Infobip\Model\WhatsAppInteractiveListMessage $whatsAppInteractiveListMessage whatsAppInteractiveListMessage (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendWhatsAppInteractiveListMessage(\Infobip\Model\WhatsAppInteractiveListMessage $whatsAppInteractiveListMessage)
    {
        $request = $this->sendWhatsAppInteractiveListMessageRequest($whatsAppInteractiveListMessage);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendWhatsAppInteractiveListMessageResponse($response, $request->getUri());
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
            throw $this->sendWhatsAppInteractiveListMessageApiException($exception);
        }
    }

    /**
     * Operation sendWhatsAppInteractiveListMessageAsync
     *
     * Send WhatsApp interactive list message
     *
     * @param \Infobip\Model\WhatsAppInteractiveListMessage $whatsAppInteractiveListMessage (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendWhatsAppInteractiveListMessageAsync(\Infobip\Model\WhatsAppInteractiveListMessage $whatsAppInteractiveListMessage): PromiseInterface
    {
        $request = $this->sendWhatsAppInteractiveListMessageRequest($whatsAppInteractiveListMessage);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendWhatsAppInteractiveListMessageResponse($response, $request->getUri());
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

                    throw $this->sendWhatsAppInteractiveListMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendWhatsAppInteractiveListMessage'
     *
     * @param \Infobip\Model\WhatsAppInteractiveListMessage $whatsAppInteractiveListMessage (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendWhatsAppInteractiveListMessageRequest(\Infobip\Model\WhatsAppInteractiveListMessage $whatsAppInteractiveListMessage): Request
    {
        $allData = [
             'whatsAppInteractiveListMessage' => $whatsAppInteractiveListMessage,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'whatsAppInteractiveListMessage' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/message/interactive/list';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($whatsAppInteractiveListMessage)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($whatsAppInteractiveListMessage)
                : $whatsAppInteractiveListMessage;
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
     * Create response for operation 'sendWhatsAppInteractiveListMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendWhatsAppInteractiveListMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WhatsAppSingleMessageInfo', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendWhatsAppInteractiveListMessage'
     */
    private function sendWhatsAppInteractiveListMessageApiException(ApiException $apiException): ApiException
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

        return $apiException;
    }

    /**
     * Operation sendWhatsAppInteractiveMultiProductMessage
     *
     * Send WhatsApp interactive multi-product message
     *
     * @param \Infobip\Model\WhatsAppInteractiveMultiProductMessage $whatsAppInteractiveMultiProductMessage whatsAppInteractiveMultiProductMessage (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendWhatsAppInteractiveMultiProductMessage(\Infobip\Model\WhatsAppInteractiveMultiProductMessage $whatsAppInteractiveMultiProductMessage)
    {
        $request = $this->sendWhatsAppInteractiveMultiProductMessageRequest($whatsAppInteractiveMultiProductMessage);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendWhatsAppInteractiveMultiProductMessageResponse($response, $request->getUri());
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
            throw $this->sendWhatsAppInteractiveMultiProductMessageApiException($exception);
        }
    }

    /**
     * Operation sendWhatsAppInteractiveMultiProductMessageAsync
     *
     * Send WhatsApp interactive multi-product message
     *
     * @param \Infobip\Model\WhatsAppInteractiveMultiProductMessage $whatsAppInteractiveMultiProductMessage (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendWhatsAppInteractiveMultiProductMessageAsync(\Infobip\Model\WhatsAppInteractiveMultiProductMessage $whatsAppInteractiveMultiProductMessage): PromiseInterface
    {
        $request = $this->sendWhatsAppInteractiveMultiProductMessageRequest($whatsAppInteractiveMultiProductMessage);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendWhatsAppInteractiveMultiProductMessageResponse($response, $request->getUri());
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

                    throw $this->sendWhatsAppInteractiveMultiProductMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendWhatsAppInteractiveMultiProductMessage'
     *
     * @param \Infobip\Model\WhatsAppInteractiveMultiProductMessage $whatsAppInteractiveMultiProductMessage (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendWhatsAppInteractiveMultiProductMessageRequest(\Infobip\Model\WhatsAppInteractiveMultiProductMessage $whatsAppInteractiveMultiProductMessage): Request
    {
        $allData = [
             'whatsAppInteractiveMultiProductMessage' => $whatsAppInteractiveMultiProductMessage,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'whatsAppInteractiveMultiProductMessage' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/message/interactive/multi-product';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($whatsAppInteractiveMultiProductMessage)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($whatsAppInteractiveMultiProductMessage)
                : $whatsAppInteractiveMultiProductMessage;
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
     * Create response for operation 'sendWhatsAppInteractiveMultiProductMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendWhatsAppInteractiveMultiProductMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WhatsAppSingleMessageInfo', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendWhatsAppInteractiveMultiProductMessage'
     */
    private function sendWhatsAppInteractiveMultiProductMessageApiException(ApiException $apiException): ApiException
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

        return $apiException;
    }

    /**
     * Operation sendWhatsAppInteractiveProductMessage
     *
     * Send WhatsApp interactive product message
     *
     * @param \Infobip\Model\WhatsAppInteractiveProductMessage $whatsAppInteractiveProductMessage whatsAppInteractiveProductMessage (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendWhatsAppInteractiveProductMessage(\Infobip\Model\WhatsAppInteractiveProductMessage $whatsAppInteractiveProductMessage)
    {
        $request = $this->sendWhatsAppInteractiveProductMessageRequest($whatsAppInteractiveProductMessage);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendWhatsAppInteractiveProductMessageResponse($response, $request->getUri());
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
            throw $this->sendWhatsAppInteractiveProductMessageApiException($exception);
        }
    }

    /**
     * Operation sendWhatsAppInteractiveProductMessageAsync
     *
     * Send WhatsApp interactive product message
     *
     * @param \Infobip\Model\WhatsAppInteractiveProductMessage $whatsAppInteractiveProductMessage (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendWhatsAppInteractiveProductMessageAsync(\Infobip\Model\WhatsAppInteractiveProductMessage $whatsAppInteractiveProductMessage): PromiseInterface
    {
        $request = $this->sendWhatsAppInteractiveProductMessageRequest($whatsAppInteractiveProductMessage);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendWhatsAppInteractiveProductMessageResponse($response, $request->getUri());
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

                    throw $this->sendWhatsAppInteractiveProductMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendWhatsAppInteractiveProductMessage'
     *
     * @param \Infobip\Model\WhatsAppInteractiveProductMessage $whatsAppInteractiveProductMessage (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendWhatsAppInteractiveProductMessageRequest(\Infobip\Model\WhatsAppInteractiveProductMessage $whatsAppInteractiveProductMessage): Request
    {
        $allData = [
             'whatsAppInteractiveProductMessage' => $whatsAppInteractiveProductMessage,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'whatsAppInteractiveProductMessage' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/message/interactive/product';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($whatsAppInteractiveProductMessage)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($whatsAppInteractiveProductMessage)
                : $whatsAppInteractiveProductMessage;
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
     * Create response for operation 'sendWhatsAppInteractiveProductMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendWhatsAppInteractiveProductMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WhatsAppSingleMessageInfo', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendWhatsAppInteractiveProductMessage'
     */
    private function sendWhatsAppInteractiveProductMessageApiException(ApiException $apiException): ApiException
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

        return $apiException;
    }

    /**
     * Operation sendWhatsAppLocationMessage
     *
     * Send WhatsApp location message
     *
     * @param \Infobip\Model\WhatsAppLocationMessage $whatsAppLocationMessage whatsAppLocationMessage (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendWhatsAppLocationMessage(\Infobip\Model\WhatsAppLocationMessage $whatsAppLocationMessage)
    {
        $request = $this->sendWhatsAppLocationMessageRequest($whatsAppLocationMessage);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendWhatsAppLocationMessageResponse($response, $request->getUri());
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
            throw $this->sendWhatsAppLocationMessageApiException($exception);
        }
    }

    /**
     * Operation sendWhatsAppLocationMessageAsync
     *
     * Send WhatsApp location message
     *
     * @param \Infobip\Model\WhatsAppLocationMessage $whatsAppLocationMessage (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendWhatsAppLocationMessageAsync(\Infobip\Model\WhatsAppLocationMessage $whatsAppLocationMessage): PromiseInterface
    {
        $request = $this->sendWhatsAppLocationMessageRequest($whatsAppLocationMessage);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendWhatsAppLocationMessageResponse($response, $request->getUri());
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

                    throw $this->sendWhatsAppLocationMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendWhatsAppLocationMessage'
     *
     * @param \Infobip\Model\WhatsAppLocationMessage $whatsAppLocationMessage (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendWhatsAppLocationMessageRequest(\Infobip\Model\WhatsAppLocationMessage $whatsAppLocationMessage): Request
    {
        $allData = [
             'whatsAppLocationMessage' => $whatsAppLocationMessage,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'whatsAppLocationMessage' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/message/location';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($whatsAppLocationMessage)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($whatsAppLocationMessage)
                : $whatsAppLocationMessage;
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
     * Create response for operation 'sendWhatsAppLocationMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendWhatsAppLocationMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WhatsAppSingleMessageInfo', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendWhatsAppLocationMessage'
     */
    private function sendWhatsAppLocationMessageApiException(ApiException $apiException): ApiException
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

        return $apiException;
    }

    /**
     * Operation sendWhatsAppStickerMessage
     *
     * Send WhatsApp sticker message
     *
     * @param \Infobip\Model\WhatsAppStickerMessage $whatsAppStickerMessage whatsAppStickerMessage (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendWhatsAppStickerMessage(\Infobip\Model\WhatsAppStickerMessage $whatsAppStickerMessage)
    {
        $request = $this->sendWhatsAppStickerMessageRequest($whatsAppStickerMessage);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendWhatsAppStickerMessageResponse($response, $request->getUri());
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
            throw $this->sendWhatsAppStickerMessageApiException($exception);
        }
    }

    /**
     * Operation sendWhatsAppStickerMessageAsync
     *
     * Send WhatsApp sticker message
     *
     * @param \Infobip\Model\WhatsAppStickerMessage $whatsAppStickerMessage (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendWhatsAppStickerMessageAsync(\Infobip\Model\WhatsAppStickerMessage $whatsAppStickerMessage): PromiseInterface
    {
        $request = $this->sendWhatsAppStickerMessageRequest($whatsAppStickerMessage);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendWhatsAppStickerMessageResponse($response, $request->getUri());
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

                    throw $this->sendWhatsAppStickerMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendWhatsAppStickerMessage'
     *
     * @param \Infobip\Model\WhatsAppStickerMessage $whatsAppStickerMessage (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendWhatsAppStickerMessageRequest(\Infobip\Model\WhatsAppStickerMessage $whatsAppStickerMessage): Request
    {
        $allData = [
             'whatsAppStickerMessage' => $whatsAppStickerMessage,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'whatsAppStickerMessage' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/message/sticker';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($whatsAppStickerMessage)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($whatsAppStickerMessage)
                : $whatsAppStickerMessage;
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
     * Create response for operation 'sendWhatsAppStickerMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendWhatsAppStickerMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WhatsAppSingleMessageInfo', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendWhatsAppStickerMessage'
     */
    private function sendWhatsAppStickerMessageApiException(ApiException $apiException): ApiException
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

        return $apiException;
    }

    /**
     * Operation sendWhatsAppTemplateMessage
     *
     * Send WhatsApp template message
     *
     * @param \Infobip\Model\WhatsAppBulkMessage $whatsAppBulkMessage whatsAppBulkMessage (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WhatsAppBulkMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendWhatsAppTemplateMessage(\Infobip\Model\WhatsAppBulkMessage $whatsAppBulkMessage)
    {
        $request = $this->sendWhatsAppTemplateMessageRequest($whatsAppBulkMessage);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendWhatsAppTemplateMessageResponse($response, $request->getUri());
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
            throw $this->sendWhatsAppTemplateMessageApiException($exception);
        }
    }

    /**
     * Operation sendWhatsAppTemplateMessageAsync
     *
     * Send WhatsApp template message
     *
     * @param \Infobip\Model\WhatsAppBulkMessage $whatsAppBulkMessage (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendWhatsAppTemplateMessageAsync(\Infobip\Model\WhatsAppBulkMessage $whatsAppBulkMessage): PromiseInterface
    {
        $request = $this->sendWhatsAppTemplateMessageRequest($whatsAppBulkMessage);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendWhatsAppTemplateMessageResponse($response, $request->getUri());
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

                    throw $this->sendWhatsAppTemplateMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendWhatsAppTemplateMessage'
     *
     * @param \Infobip\Model\WhatsAppBulkMessage $whatsAppBulkMessage (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendWhatsAppTemplateMessageRequest(\Infobip\Model\WhatsAppBulkMessage $whatsAppBulkMessage): Request
    {
        $allData = [
             'whatsAppBulkMessage' => $whatsAppBulkMessage,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'whatsAppBulkMessage' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/message/template';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($whatsAppBulkMessage)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($whatsAppBulkMessage)
                : $whatsAppBulkMessage;
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
     * Create response for operation 'sendWhatsAppTemplateMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WhatsAppBulkMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendWhatsAppTemplateMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WhatsAppBulkMessageInfo', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendWhatsAppTemplateMessage'
     */
    private function sendWhatsAppTemplateMessageApiException(ApiException $apiException): ApiException
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

        return $apiException;
    }

    /**
     * Operation sendWhatsAppTextMessage
     *
     * Send WhatsApp text message
     *
     * @param \Infobip\Model\WhatsAppTextMessage $whatsAppTextMessage whatsAppTextMessage (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendWhatsAppTextMessage(\Infobip\Model\WhatsAppTextMessage $whatsAppTextMessage)
    {
        $request = $this->sendWhatsAppTextMessageRequest($whatsAppTextMessage);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendWhatsAppTextMessageResponse($response, $request->getUri());
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
            throw $this->sendWhatsAppTextMessageApiException($exception);
        }
    }

    /**
     * Operation sendWhatsAppTextMessageAsync
     *
     * Send WhatsApp text message
     *
     * @param \Infobip\Model\WhatsAppTextMessage $whatsAppTextMessage (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendWhatsAppTextMessageAsync(\Infobip\Model\WhatsAppTextMessage $whatsAppTextMessage): PromiseInterface
    {
        $request = $this->sendWhatsAppTextMessageRequest($whatsAppTextMessage);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendWhatsAppTextMessageResponse($response, $request->getUri());
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

                    throw $this->sendWhatsAppTextMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendWhatsAppTextMessage'
     *
     * @param \Infobip\Model\WhatsAppTextMessage $whatsAppTextMessage (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendWhatsAppTextMessageRequest(\Infobip\Model\WhatsAppTextMessage $whatsAppTextMessage): Request
    {
        $allData = [
             'whatsAppTextMessage' => $whatsAppTextMessage,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'whatsAppTextMessage' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/message/text';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($whatsAppTextMessage)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($whatsAppTextMessage)
                : $whatsAppTextMessage;
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
     * Create response for operation 'sendWhatsAppTextMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendWhatsAppTextMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WhatsAppSingleMessageInfo', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendWhatsAppTextMessage'
     */
    private function sendWhatsAppTextMessageApiException(ApiException $apiException): ApiException
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

        return $apiException;
    }

    /**
     * Operation sendWhatsAppVideoMessage
     *
     * Send WhatsApp video message
     *
     * @param \Infobip\Model\WhatsAppVideoMessage $whatsAppVideoMessage whatsAppVideoMessage (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendWhatsAppVideoMessage(\Infobip\Model\WhatsAppVideoMessage $whatsAppVideoMessage)
    {
        $request = $this->sendWhatsAppVideoMessageRequest($whatsAppVideoMessage);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendWhatsAppVideoMessageResponse($response, $request->getUri());
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
            throw $this->sendWhatsAppVideoMessageApiException($exception);
        }
    }

    /**
     * Operation sendWhatsAppVideoMessageAsync
     *
     * Send WhatsApp video message
     *
     * @param \Infobip\Model\WhatsAppVideoMessage $whatsAppVideoMessage (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendWhatsAppVideoMessageAsync(\Infobip\Model\WhatsAppVideoMessage $whatsAppVideoMessage): PromiseInterface
    {
        $request = $this->sendWhatsAppVideoMessageRequest($whatsAppVideoMessage);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendWhatsAppVideoMessageResponse($response, $request->getUri());
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

                    throw $this->sendWhatsAppVideoMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendWhatsAppVideoMessage'
     *
     * @param \Infobip\Model\WhatsAppVideoMessage $whatsAppVideoMessage (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendWhatsAppVideoMessageRequest(\Infobip\Model\WhatsAppVideoMessage $whatsAppVideoMessage): Request
    {
        $allData = [
             'whatsAppVideoMessage' => $whatsAppVideoMessage,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'whatsAppVideoMessage' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/whatsapp/1/message/video';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($whatsAppVideoMessage)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($whatsAppVideoMessage)
                : $whatsAppVideoMessage;
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
     * Create response for operation 'sendWhatsAppVideoMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WhatsAppSingleMessageInfo|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendWhatsAppVideoMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WhatsAppSingleMessageInfo', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendWhatsAppVideoMessage'
     */
    private function sendWhatsAppVideoMessageApiException(ApiException $apiException): ApiException
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

        return $apiException;
    }
}
