<?php

// phpcs:ignorefile

/**
 * FlowApi
 * PHP version 8.3
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
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
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

final class FlowApi
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
     * Operation addFlowParticipants
     *
     * Add participants to flow
     *
     * @param int $campaignId Unique identifier of the flow that participant will be added to. (required)
     * @param \Infobip\Model\FlowAddFlowParticipantsRequest $flowAddFlowParticipantsRequest flowAddFlowParticipantsRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\FlowAddFlowParticipantsResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function addFlowParticipants(int $campaignId, \Infobip\Model\FlowAddFlowParticipantsRequest $flowAddFlowParticipantsRequest)
    {
        $request = $this->addFlowParticipantsRequest($campaignId, $flowAddFlowParticipantsRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->addFlowParticipantsResponse($response, $request->getUri());
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
            throw $this->addFlowParticipantsApiException($exception);
        }
    }

    /**
     * Operation addFlowParticipantsAsync
     *
     * Add participants to flow
     *
     * @param int $campaignId Unique identifier of the flow that participant will be added to. (required)
     * @param \Infobip\Model\FlowAddFlowParticipantsRequest $flowAddFlowParticipantsRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function addFlowParticipantsAsync(int $campaignId, \Infobip\Model\FlowAddFlowParticipantsRequest $flowAddFlowParticipantsRequest): PromiseInterface
    {
        $request = $this->addFlowParticipantsRequest($campaignId, $flowAddFlowParticipantsRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->addFlowParticipantsResponse($response, $request->getUri());
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

                    throw $this->addFlowParticipantsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'addFlowParticipants'
     *
     * @param int $campaignId Unique identifier of the flow that participant will be added to. (required)
     * @param \Infobip\Model\FlowAddFlowParticipantsRequest $flowAddFlowParticipantsRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function addFlowParticipantsRequest(int $campaignId, \Infobip\Model\FlowAddFlowParticipantsRequest $flowAddFlowParticipantsRequest): Request
    {
        $allData = [
             'campaignId' => $campaignId,
             'flowAddFlowParticipantsRequest' => $flowAddFlowParticipantsRequest,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'campaignId' => [
                        new Assert\NotBlank(),
                    ],
                    'flowAddFlowParticipantsRequest' => [
                        new Assert\NotNull(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/moments/1/flows/{campaignId}/participants';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($campaignId !== null) {
            $resourcePath = str_replace(
                '{' . 'campaignId' . '}',
                $this->objectSerializer->toPathValue($campaignId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        if (isset($flowAddFlowParticipantsRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($flowAddFlowParticipantsRequest)
                : $flowAddFlowParticipantsRequest;
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
     * Create response for operation 'addFlowParticipants'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\FlowAddFlowParticipantsResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function addFlowParticipantsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\FlowAddFlowParticipantsResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'addFlowParticipants'
     */
    private function addFlowParticipantsApiException(ApiException $apiException): ApiException
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
     * Operation getFlowParticipantsAddedReport
     *
     * Get a report on participants added to flow
     *
     * @param int $campaignId Unique identifier of the flow that participant will be added to. (required)
     * @param string $operationId Unique identifier of the operation. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\FlowParticipantsReportResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getFlowParticipantsAddedReport(int $campaignId, string $operationId)
    {
        $request = $this->getFlowParticipantsAddedReportRequest($campaignId, $operationId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getFlowParticipantsAddedReportResponse($response, $request->getUri());
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
            throw $this->getFlowParticipantsAddedReportApiException($exception);
        }
    }

    /**
     * Operation getFlowParticipantsAddedReportAsync
     *
     * Get a report on participants added to flow
     *
     * @param int $campaignId Unique identifier of the flow that participant will be added to. (required)
     * @param string $operationId Unique identifier of the operation. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getFlowParticipantsAddedReportAsync(int $campaignId, string $operationId): PromiseInterface
    {
        $request = $this->getFlowParticipantsAddedReportRequest($campaignId, $operationId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getFlowParticipantsAddedReportResponse($response, $request->getUri());
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

                    throw $this->getFlowParticipantsAddedReportApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getFlowParticipantsAddedReport'
     *
     * @param int $campaignId Unique identifier of the flow that participant will be added to. (required)
     * @param string $operationId Unique identifier of the operation. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getFlowParticipantsAddedReportRequest(int $campaignId, string $operationId): Request
    {
        $allData = [
             'campaignId' => $campaignId,
             'operationId' => $operationId,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'campaignId' => [
                        new Assert\NotBlank(),
                    ],
                    'operationId' => [
                        new Assert\NotBlank(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/moments/1/flows/{campaignId}/participants/report';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($operationId !== null) {
            $queryParams['operationId'] = $operationId;
        }

        // path params
        if ($campaignId !== null) {
            $resourcePath = str_replace(
                '{' . 'campaignId' . '}',
                $this->objectSerializer->toPathValue($campaignId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
        ];


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
     * Create response for operation 'getFlowParticipantsAddedReport'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\FlowParticipantsReportResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getFlowParticipantsAddedReportResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\FlowParticipantsReportResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getFlowParticipantsAddedReport'
     */
    private function getFlowParticipantsAddedReportApiException(ApiException $apiException): ApiException
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
     * Operation removePeopleFromFlow
     *
     * Remove person from flow
     *
     * @param int $campaignId Unique identifier of the flow that person will be removed from. (required)
     * @param null|string $phone Person&#39;s phone number. (optional)
     * @param null|string $email Person&#39;s email address. (optional)
     * @param null|string $externalId Unique ID for the person from an external system. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function removePeopleFromFlow(int $campaignId, ?string $phone = null, ?string $email = null, ?string $externalId = null)
    {
        $request = $this->removePeopleFromFlowRequest($campaignId, $phone, $email, $externalId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->removePeopleFromFlowResponse($response, $request->getUri());
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
            throw $this->removePeopleFromFlowApiException($exception);
        }
    }

    /**
     * Operation removePeopleFromFlowAsync
     *
     * Remove person from flow
     *
     * @param int $campaignId Unique identifier of the flow that person will be removed from. (required)
     * @param null|string $phone Person&#39;s phone number. (optional)
     * @param null|string $email Person&#39;s email address. (optional)
     * @param null|string $externalId Unique ID for the person from an external system. (optional)
     *
     * @throws InvalidArgumentException
     */
    public function removePeopleFromFlowAsync(int $campaignId, ?string $phone = null, ?string $email = null, ?string $externalId = null): PromiseInterface
    {
        $request = $this->removePeopleFromFlowRequest($campaignId, $phone, $email, $externalId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->removePeopleFromFlowResponse($response, $request->getUri());
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

                    throw $this->removePeopleFromFlowApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'removePeopleFromFlow'
     *
     * @param int $campaignId Unique identifier of the flow that person will be removed from. (required)
     * @param null|string $phone Person&#39;s phone number. (optional)
     * @param null|string $email Person&#39;s email address. (optional)
     * @param null|string $externalId Unique ID for the person from an external system. (optional)
     *
     * @throws InvalidArgumentException
     */
    private function removePeopleFromFlowRequest(int $campaignId, ?string $phone = null, ?string $email = null, ?string $externalId = null): Request
    {
        $allData = [
             'campaignId' => $campaignId,
             'phone' => $phone,
             'email' => $email,
             'externalId' => $externalId,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'campaignId' => [
                        new Assert\NotBlank(),
                    ],
                    'phone' => [
                    ],
                    'email' => [
                    ],
                    'externalId' => [
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/communication/1/flows/{campaignId}/participants';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($phone !== null) {
            $queryParams['phone'] = $phone;
        }

        // query params
        if ($email !== null) {
            $queryParams['email'] = $email;
        }

        // query params
        if ($externalId !== null) {
            $queryParams['externalId'] = $externalId;
        }

        // path params
        if ($campaignId !== null) {
            $resourcePath = str_replace(
                '{' . 'campaignId' . '}',
                $this->objectSerializer->toPathValue($campaignId),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
        ];


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
     * Create response for operation 'removePeopleFromFlow'
     * @throws ApiException on non-2xx response
     * @return null
     */
    private function removePeopleFromFlowResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
     * Adapt given ApiException for operation 'removePeopleFromFlow'
     */
    private function removePeopleFromFlowApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\FlowExceptionResponse',
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
        if ($statusCode === 404) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\FlowExceptionResponse',
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
