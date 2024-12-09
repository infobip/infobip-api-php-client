<?php

// phpcs:ignorefile

/**
 * EmailApi
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

final class EmailApi
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
     * Operation addDomain
     *
     * Add new domain
     *
     * @param \Infobip\Model\EmailAddDomainRequest $emailAddDomainRequest emailAddDomainRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailDomainResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function addDomain(\Infobip\Model\EmailAddDomainRequest $emailAddDomainRequest)
    {
        $request = $this->addDomainRequest($emailAddDomainRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->addDomainResponse($response, $request->getUri());
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
            throw $this->addDomainApiException($exception);
        }
    }

    /**
     * Operation addDomainAsync
     *
     * Add new domain
     *
     * @param \Infobip\Model\EmailAddDomainRequest $emailAddDomainRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function addDomainAsync(\Infobip\Model\EmailAddDomainRequest $emailAddDomainRequest): PromiseInterface
    {
        $request = $this->addDomainRequest($emailAddDomainRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->addDomainResponse($response, $request->getUri());
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

                    throw $this->addDomainApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'addDomain'
     *
     * @param \Infobip\Model\EmailAddDomainRequest $emailAddDomainRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function addDomainRequest(\Infobip\Model\EmailAddDomainRequest $emailAddDomainRequest): Request
    {
        $allData = [
             'emailAddDomainRequest' => $emailAddDomainRequest,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'emailAddDomainRequest' => [
                        new Assert\NotNull(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/domains';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($emailAddDomainRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($emailAddDomainRequest)
                : $emailAddDomainRequest;
        } elseif (count($formParams) > 0) {
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
     * Create response for operation 'addDomain'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailDomainResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function addDomainResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailDomainResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'addDomain'
     */
    private function addDomainApiException(ApiException $apiException): ApiException
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
        if ($statusCode === 409) {
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
     * Operation addSuppressions
     *
     * Add suppressions
     *
     * @param \Infobip\Model\EmailAddSuppressionRequest $emailAddSuppressionRequest emailAddSuppressionRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function addSuppressions(\Infobip\Model\EmailAddSuppressionRequest $emailAddSuppressionRequest)
    {
        $request = $this->addSuppressionsRequest($emailAddSuppressionRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->addSuppressionsResponse($response, $request->getUri());
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
            throw $this->addSuppressionsApiException($exception);
        }
    }

    /**
     * Operation addSuppressionsAsync
     *
     * Add suppressions
     *
     * @param \Infobip\Model\EmailAddSuppressionRequest $emailAddSuppressionRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function addSuppressionsAsync(\Infobip\Model\EmailAddSuppressionRequest $emailAddSuppressionRequest): PromiseInterface
    {
        $request = $this->addSuppressionsRequest($emailAddSuppressionRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->addSuppressionsResponse($response, $request->getUri());
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

                    throw $this->addSuppressionsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'addSuppressions'
     *
     * @param \Infobip\Model\EmailAddSuppressionRequest $emailAddSuppressionRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function addSuppressionsRequest(\Infobip\Model\EmailAddSuppressionRequest $emailAddSuppressionRequest): Request
    {
        $allData = [
             'emailAddSuppressionRequest' => $emailAddSuppressionRequest,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'emailAddSuppressionRequest' => [
                        new Assert\NotNull(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/suppressions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($emailAddSuppressionRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($emailAddSuppressionRequest)
                : $emailAddSuppressionRequest;
        } elseif (count($formParams) > 0) {
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
     * Create response for operation 'addSuppressions'
     * @throws ApiException on non-2xx response
     * @return null
     */
    private function addSuppressionsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
     * Adapt given ApiException for operation 'addSuppressions'
     */
    private function addSuppressionsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 403) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation assignIpToDomain
     *
     * Assign dedicated ip address to the provided domain for the account id
     *
     * @param \Infobip\Model\EmailDomainIpRequest $emailDomainIpRequest emailDomainIpRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailSimpleApiResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function assignIpToDomain(\Infobip\Model\EmailDomainIpRequest $emailDomainIpRequest)
    {
        $request = $this->assignIpToDomainRequest($emailDomainIpRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->assignIpToDomainResponse($response, $request->getUri());
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
            throw $this->assignIpToDomainApiException($exception);
        }
    }

    /**
     * Operation assignIpToDomainAsync
     *
     * Assign dedicated ip address to the provided domain for the account id
     *
     * @param \Infobip\Model\EmailDomainIpRequest $emailDomainIpRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function assignIpToDomainAsync(\Infobip\Model\EmailDomainIpRequest $emailDomainIpRequest): PromiseInterface
    {
        $request = $this->assignIpToDomainRequest($emailDomainIpRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->assignIpToDomainResponse($response, $request->getUri());
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

                    throw $this->assignIpToDomainApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'assignIpToDomain'
     *
     * @param \Infobip\Model\EmailDomainIpRequest $emailDomainIpRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function assignIpToDomainRequest(\Infobip\Model\EmailDomainIpRequest $emailDomainIpRequest): Request
    {
        $allData = [
             'emailDomainIpRequest' => $emailDomainIpRequest,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'emailDomainIpRequest' => [
                        new Assert\NotNull(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/domain-ips';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($emailDomainIpRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($emailDomainIpRequest)
                : $emailDomainIpRequest;
        } elseif (count($formParams) > 0) {
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
     * Create response for operation 'assignIpToDomain'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailSimpleApiResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function assignIpToDomainResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailSimpleApiResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'assignIpToDomain'
     */
    private function assignIpToDomainApiException(ApiException $apiException): ApiException
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
     * Operation deleteDomain
     *
     * Delete existing domain
     *
     * @param string $domainName Domain name which needs to be deleted. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function deleteDomain(string $domainName)
    {
        $request = $this->deleteDomainRequest($domainName);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->deleteDomainResponse($response, $request->getUri());
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
            throw $this->deleteDomainApiException($exception);
        }
    }

    /**
     * Operation deleteDomainAsync
     *
     * Delete existing domain
     *
     * @param string $domainName Domain name which needs to be deleted. (required)
     *
     * @throws InvalidArgumentException
     */
    public function deleteDomainAsync(string $domainName): PromiseInterface
    {
        $request = $this->deleteDomainRequest($domainName);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->deleteDomainResponse($response, $request->getUri());
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

                    throw $this->deleteDomainApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'deleteDomain'
     *
     * @param string $domainName Domain name which needs to be deleted. (required)
     *
     * @throws InvalidArgumentException
     */
    private function deleteDomainRequest(string $domainName): Request
    {
        $allData = [
             'domainName' => $domainName,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'domainName' => [
                        new Assert\NotBlank(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/domains/{domainName}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($domainName !== null) {
            $resourcePath = str_replace(
                '{' . 'domainName' . '}',
                $this->objectSerializer->toPathValue($domainName),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
        ];

        // for model (json/xml)
        if (count($formParams) > 0) {
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
     * Create response for operation 'deleteDomain'
     * @throws ApiException on non-2xx response
     * @return null
     */
    private function deleteDomainResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
     * Adapt given ApiException for operation 'deleteDomain'
     */
    private function deleteDomainApiException(ApiException $apiException): ApiException
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
     * Operation deleteSuppressions
     *
     * Delete suppressions
     *
     * @param \Infobip\Model\EmailDeleteSuppressionRequest $emailDeleteSuppressionRequest emailDeleteSuppressionRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function deleteSuppressions(\Infobip\Model\EmailDeleteSuppressionRequest $emailDeleteSuppressionRequest)
    {
        $request = $this->deleteSuppressionsRequest($emailDeleteSuppressionRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->deleteSuppressionsResponse($response, $request->getUri());
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
            throw $this->deleteSuppressionsApiException($exception);
        }
    }

    /**
     * Operation deleteSuppressionsAsync
     *
     * Delete suppressions
     *
     * @param \Infobip\Model\EmailDeleteSuppressionRequest $emailDeleteSuppressionRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function deleteSuppressionsAsync(\Infobip\Model\EmailDeleteSuppressionRequest $emailDeleteSuppressionRequest): PromiseInterface
    {
        $request = $this->deleteSuppressionsRequest($emailDeleteSuppressionRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->deleteSuppressionsResponse($response, $request->getUri());
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

                    throw $this->deleteSuppressionsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'deleteSuppressions'
     *
     * @param \Infobip\Model\EmailDeleteSuppressionRequest $emailDeleteSuppressionRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function deleteSuppressionsRequest(\Infobip\Model\EmailDeleteSuppressionRequest $emailDeleteSuppressionRequest): Request
    {
        $allData = [
             'emailDeleteSuppressionRequest' => $emailDeleteSuppressionRequest,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'emailDeleteSuppressionRequest' => [
                        new Assert\NotNull(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/suppressions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($emailDeleteSuppressionRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($emailDeleteSuppressionRequest)
                : $emailDeleteSuppressionRequest;
        } elseif (count($formParams) > 0) {
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
     * Create response for operation 'deleteSuppressions'
     * @throws ApiException on non-2xx response
     * @return null
     */
    private function deleteSuppressionsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
     * Adapt given ApiException for operation 'deleteSuppressions'
     */
    private function deleteSuppressionsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 403) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getAllDomainIps
     *
     * List all dedicated ips for domain and for provided account id
     *
     * @param string $domainName Name of the domain. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailDomainIpResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getAllDomainIps(string $domainName)
    {
        $request = $this->getAllDomainIpsRequest($domainName);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getAllDomainIpsResponse($response, $request->getUri());
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
            throw $this->getAllDomainIpsApiException($exception);
        }
    }

    /**
     * Operation getAllDomainIpsAsync
     *
     * List all dedicated ips for domain and for provided account id
     *
     * @param string $domainName Name of the domain. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getAllDomainIpsAsync(string $domainName): PromiseInterface
    {
        $request = $this->getAllDomainIpsRequest($domainName);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getAllDomainIpsResponse($response, $request->getUri());
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

                    throw $this->getAllDomainIpsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getAllDomainIps'
     *
     * @param string $domainName Name of the domain. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getAllDomainIpsRequest(string $domainName): Request
    {
        $allData = [
             'domainName' => $domainName,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'domainName' => [
                        new Assert\NotBlank(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/domain-ips';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($domainName !== null) {
            $queryParams['domainName'] = $domainName;
        }

        $headers = [
            'Accept' => 'application/json',
        ];

        // for model (json/xml)
        if (count($formParams) > 0) {
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
     * Create response for operation 'getAllDomainIps'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailDomainIpResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getAllDomainIpsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailDomainIpResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getAllDomainIps'
     */
    private function getAllDomainIpsApiException(ApiException $apiException): ApiException
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
     * Operation getAllDomains
     *
     * Get all domains for the account
     *
     * @param int $size Maximum number of domains to be viewed per page. Default value is 10 with a maximum of 20 records per page. (optional, default to 10)
     * @param int $page Page number you want to see. Default is 0. (optional, default to 0)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailAllDomainsResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getAllDomains(int $size = 10, int $page = 0)
    {
        $request = $this->getAllDomainsRequest($size, $page);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getAllDomainsResponse($response, $request->getUri());
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
            throw $this->getAllDomainsApiException($exception);
        }
    }

    /**
     * Operation getAllDomainsAsync
     *
     * Get all domains for the account
     *
     * @param int $size Maximum number of domains to be viewed per page. Default value is 10 with a maximum of 20 records per page. (optional, default to 10)
     * @param int $page Page number you want to see. Default is 0. (optional, default to 0)
     *
     * @throws InvalidArgumentException
     */
    public function getAllDomainsAsync(int $size = 10, int $page = 0): PromiseInterface
    {
        $request = $this->getAllDomainsRequest($size, $page);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getAllDomainsResponse($response, $request->getUri());
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

                    throw $this->getAllDomainsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getAllDomains'
     *
     * @param int $size Maximum number of domains to be viewed per page. Default value is 10 with a maximum of 20 records per page. (optional, default to 10)
     * @param int $page Page number you want to see. Default is 0. (optional, default to 0)
     *
     * @throws InvalidArgumentException
     */
    private function getAllDomainsRequest(int $size = 10, int $page = 0): Request
    {
        $allData = [
             'size' => $size,
             'page' => $page,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'size' => [
                        new Assert\LessThanOrEqual(20),
                        new Assert\GreaterThanOrEqual(1),
                    ],
                    'page' => [
                        new Assert\GreaterThanOrEqual(0),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/domains';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($size !== null) {
            $queryParams['size'] = $size;
        }

        // query params
        if ($page !== null) {
            $queryParams['page'] = $page;
        }

        $headers = [
            'Accept' => 'application/json',
        ];

        // for model (json/xml)
        if (count($formParams) > 0) {
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
     * Create response for operation 'getAllDomains'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailAllDomainsResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getAllDomainsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailAllDomainsResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getAllDomains'
     */
    private function getAllDomainsApiException(ApiException $apiException): ApiException
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
     * Operation getAllIps
     *
     * List all dedicated ips for provided account id
     *
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailDomainIpResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getAllIps()
    {
        $request = $this->getAllIpsRequest();

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getAllIpsResponse($response, $request->getUri());
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
            throw $this->getAllIpsApiException($exception);
        }
    }

    /**
     * Operation getAllIpsAsync
     *
     * List all dedicated ips for provided account id
     *
     *
     * @throws InvalidArgumentException
     */
    public function getAllIpsAsync(): PromiseInterface
    {
        $request = $this->getAllIpsRequest();

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getAllIpsResponse($response, $request->getUri());
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

                    throw $this->getAllIpsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getAllIps'
     *
     *
     * @throws InvalidArgumentException
     */
    private function getAllIpsRequest(): Request
    {
        $allData = [
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/ips';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
        ];

        // for model (json/xml)
        if (count($formParams) > 0) {
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
     * Create response for operation 'getAllIps'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailDomainIpResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getAllIpsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailDomainIpResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getAllIps'
     */
    private function getAllIpsApiException(ApiException $apiException): ApiException
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
     * Operation getDomainDetails
     *
     * Get domain details
     *
     * @param string $domainName Domain for which the details need to be viewed. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailDomainResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getDomainDetails(string $domainName)
    {
        $request = $this->getDomainDetailsRequest($domainName);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getDomainDetailsResponse($response, $request->getUri());
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
            throw $this->getDomainDetailsApiException($exception);
        }
    }

    /**
     * Operation getDomainDetailsAsync
     *
     * Get domain details
     *
     * @param string $domainName Domain for which the details need to be viewed. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getDomainDetailsAsync(string $domainName): PromiseInterface
    {
        $request = $this->getDomainDetailsRequest($domainName);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getDomainDetailsResponse($response, $request->getUri());
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

                    throw $this->getDomainDetailsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getDomainDetails'
     *
     * @param string $domainName Domain for which the details need to be viewed. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getDomainDetailsRequest(string $domainName): Request
    {
        $allData = [
             'domainName' => $domainName,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'domainName' => [
                        new Assert\NotBlank(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/domains/{domainName}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($domainName !== null) {
            $resourcePath = str_replace(
                '{' . 'domainName' . '}',
                $this->objectSerializer->toPathValue($domainName),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
        ];

        // for model (json/xml)
        if (count($formParams) > 0) {
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
     * Create response for operation 'getDomainDetails'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailDomainResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getDomainDetailsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailDomainResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getDomainDetails'
     */
    private function getDomainDetailsApiException(ApiException $apiException): ApiException
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
     * Operation getDomains
     *
     * Get suppression domains
     *
     * @param int $page Requested page number. (optional, default to 0)
     * @param int $size Requested page size. (optional, default to 100)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailDomainInfoPageResponse|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError
     */
    public function getDomains(int $page = 0, int $size = 100)
    {
        $request = $this->getDomainsRequest($page, $size);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getDomainsResponse($response, $request->getUri());
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
            throw $this->getDomainsApiException($exception);
        }
    }

    /**
     * Operation getDomainsAsync
     *
     * Get suppression domains
     *
     * @param int $page Requested page number. (optional, default to 0)
     * @param int $size Requested page size. (optional, default to 100)
     *
     * @throws InvalidArgumentException
     */
    public function getDomainsAsync(int $page = 0, int $size = 100): PromiseInterface
    {
        $request = $this->getDomainsRequest($page, $size);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getDomainsResponse($response, $request->getUri());
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

                    throw $this->getDomainsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getDomains'
     *
     * @param int $page Requested page number. (optional, default to 0)
     * @param int $size Requested page size. (optional, default to 100)
     *
     * @throws InvalidArgumentException
     */
    private function getDomainsRequest(int $page = 0, int $size = 100): Request
    {
        $allData = [
             'page' => $page,
             'size' => $size,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'page' => [
                        new Assert\GreaterThanOrEqual(0),
                    ],
                    'size' => [
                        new Assert\GreaterThanOrEqual(1),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/suppressions/domains';
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
     * Create response for operation 'getDomains'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailDomainInfoPageResponse|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|null
     */
    private function getDomainsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailDomainInfoPageResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getDomains'
     */
    private function getDomainsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 403) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getEmailDeliveryReports
     *
     * Email delivery reports
     *
     * @param null|string $bulkId Bulk ID for which report is requested. (optional)
     * @param null|string $messageId The ID that uniquely identifies the sent email. (optional)
     * @param null|string $campaignReferenceId The ID that allows you to track, analyze, and show an aggregated overview and the performance of individual campaigns. (optional)
     * @param null|int $limit Maximum number of reports. (optional)
     * @param null|string $applicationId [Application](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#application) identifier used for filtering. (optional)
     * @param null|string $entityId [Entity](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#entity) identifier used for filtering. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailReportsResult|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getEmailDeliveryReports(?string $bulkId = null, ?string $messageId = null, ?string $campaignReferenceId = null, ?int $limit = null, ?string $applicationId = null, ?string $entityId = null)
    {
        $request = $this->getEmailDeliveryReportsRequest($bulkId, $messageId, $campaignReferenceId, $limit, $applicationId, $entityId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getEmailDeliveryReportsResponse($response, $request->getUri());
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
            throw $this->getEmailDeliveryReportsApiException($exception);
        }
    }

    /**
     * Operation getEmailDeliveryReportsAsync
     *
     * Email delivery reports
     *
     * @param null|string $bulkId Bulk ID for which report is requested. (optional)
     * @param null|string $messageId The ID that uniquely identifies the sent email. (optional)
     * @param null|string $campaignReferenceId The ID that allows you to track, analyze, and show an aggregated overview and the performance of individual campaigns. (optional)
     * @param null|int $limit Maximum number of reports. (optional)
     * @param null|string $applicationId [Application](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#application) identifier used for filtering. (optional)
     * @param null|string $entityId [Entity](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#entity) identifier used for filtering. (optional)
     *
     * @throws InvalidArgumentException
     */
    public function getEmailDeliveryReportsAsync(?string $bulkId = null, ?string $messageId = null, ?string $campaignReferenceId = null, ?int $limit = null, ?string $applicationId = null, ?string $entityId = null): PromiseInterface
    {
        $request = $this->getEmailDeliveryReportsRequest($bulkId, $messageId, $campaignReferenceId, $limit, $applicationId, $entityId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getEmailDeliveryReportsResponse($response, $request->getUri());
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

                    throw $this->getEmailDeliveryReportsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getEmailDeliveryReports'
     *
     * @param null|string $bulkId Bulk ID for which report is requested. (optional)
     * @param null|string $messageId The ID that uniquely identifies the sent email. (optional)
     * @param null|string $campaignReferenceId The ID that allows you to track, analyze, and show an aggregated overview and the performance of individual campaigns. (optional)
     * @param null|int $limit Maximum number of reports. (optional)
     * @param null|string $applicationId [Application](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#application) identifier used for filtering. (optional)
     * @param null|string $entityId [Entity](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#entity) identifier used for filtering. (optional)
     *
     * @throws InvalidArgumentException
     */
    private function getEmailDeliveryReportsRequest(?string $bulkId = null, ?string $messageId = null, ?string $campaignReferenceId = null, ?int $limit = null, ?string $applicationId = null, ?string $entityId = null): Request
    {
        $allData = [
             'bulkId' => $bulkId,
             'messageId' => $messageId,
             'campaignReferenceId' => $campaignReferenceId,
             'limit' => $limit,
             'applicationId' => $applicationId,
             'entityId' => $entityId,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'bulkId' => [
                    ],
                    'messageId' => [
                    ],
                    'campaignReferenceId' => [
                    ],
                    'limit' => [
                        new Assert\LessThanOrEqual(1000),
                    ],
                    'applicationId' => [
                    ],
                    'entityId' => [
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/reports';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($bulkId !== null) {
            $queryParams['bulkId'] = $bulkId;
        }

        // query params
        if ($messageId !== null) {
            $queryParams['messageId'] = $messageId;
        }

        // query params
        if ($campaignReferenceId !== null) {
            $queryParams['campaignReferenceId'] = $campaignReferenceId;
        }

        // query params
        if ($limit !== null) {
            $queryParams['limit'] = $limit;
        }

        // query params
        if ($applicationId !== null) {
            $queryParams['applicationId'] = $applicationId;
        }

        // query params
        if ($entityId !== null) {
            $queryParams['entityId'] = $entityId;
        }

        $headers = [
            'Accept' => 'application/json',
        ];

        // for model (json/xml)
        if (count($formParams) > 0) {
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
     * Create response for operation 'getEmailDeliveryReports'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailReportsResult|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getEmailDeliveryReportsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailReportsResult', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getEmailDeliveryReports'
     */
    private function getEmailDeliveryReportsApiException(ApiException $apiException): ApiException
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
     * Operation getEmailLogs
     *
     * Get email logs
     *
     * @param null|string $messageId The ID that uniquely identifies the sent email. (optional)
     * @param null|string $from From email address. (optional)
     * @param null|string $to The recipient email address. (optional)
     * @param null|string $bulkId Bulk ID that uniquely identifies the request. (optional)
     * @param null|string $campaignReferenceId The ID that allows you to track, analyze, and show an aggregated overview and the performance of individual campaigns. (optional)
     * @param null|string $generalStatus Indicates whether the initiated email has been successfully sent, not sent, delivered, not delivered, waiting for delivery or any other possible status. (optional)
     * @param null|\DateTime $sentSince Tells when the email was initiated. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ&#x60;. (optional)
     * @param null|\DateTime $sentUntil Tells when the email request was processed by Infobip.Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ&#x60;. (optional)
     * @param null|int $limit Maximum number of logs. (optional)
     * @param null|string $applicationId [Application](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#application) identifier used for filtering. (optional)
     * @param null|string $entityId [Entity](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#entity) identifier used for filtering. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailLogsResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getEmailLogs(?string $messageId = null, ?string $from = null, ?string $to = null, ?string $bulkId = null, ?string $campaignReferenceId = null, ?string $generalStatus = null, ?\DateTime $sentSince = null, ?\DateTime $sentUntil = null, ?int $limit = null, ?string $applicationId = null, ?string $entityId = null)
    {
        $request = $this->getEmailLogsRequest($messageId, $from, $to, $bulkId, $campaignReferenceId, $generalStatus, $sentSince, $sentUntil, $limit, $applicationId, $entityId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getEmailLogsResponse($response, $request->getUri());
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
            throw $this->getEmailLogsApiException($exception);
        }
    }

    /**
     * Operation getEmailLogsAsync
     *
     * Get email logs
     *
     * @param null|string $messageId The ID that uniquely identifies the sent email. (optional)
     * @param null|string $from From email address. (optional)
     * @param null|string $to The recipient email address. (optional)
     * @param null|string $bulkId Bulk ID that uniquely identifies the request. (optional)
     * @param null|string $campaignReferenceId The ID that allows you to track, analyze, and show an aggregated overview and the performance of individual campaigns. (optional)
     * @param null|string $generalStatus Indicates whether the initiated email has been successfully sent, not sent, delivered, not delivered, waiting for delivery or any other possible status. (optional)
     * @param null|\DateTime $sentSince Tells when the email was initiated. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ&#x60;. (optional)
     * @param null|\DateTime $sentUntil Tells when the email request was processed by Infobip.Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ&#x60;. (optional)
     * @param null|int $limit Maximum number of logs. (optional)
     * @param null|string $applicationId [Application](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#application) identifier used for filtering. (optional)
     * @param null|string $entityId [Entity](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#entity) identifier used for filtering. (optional)
     *
     * @throws InvalidArgumentException
     */
    public function getEmailLogsAsync(?string $messageId = null, ?string $from = null, ?string $to = null, ?string $bulkId = null, ?string $campaignReferenceId = null, ?string $generalStatus = null, ?\DateTime $sentSince = null, ?\DateTime $sentUntil = null, ?int $limit = null, ?string $applicationId = null, ?string $entityId = null): PromiseInterface
    {
        $request = $this->getEmailLogsRequest($messageId, $from, $to, $bulkId, $campaignReferenceId, $generalStatus, $sentSince, $sentUntil, $limit, $applicationId, $entityId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getEmailLogsResponse($response, $request->getUri());
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

                    throw $this->getEmailLogsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getEmailLogs'
     *
     * @param null|string $messageId The ID that uniquely identifies the sent email. (optional)
     * @param null|string $from From email address. (optional)
     * @param null|string $to The recipient email address. (optional)
     * @param null|string $bulkId Bulk ID that uniquely identifies the request. (optional)
     * @param null|string $campaignReferenceId The ID that allows you to track, analyze, and show an aggregated overview and the performance of individual campaigns. (optional)
     * @param null|string $generalStatus Indicates whether the initiated email has been successfully sent, not sent, delivered, not delivered, waiting for delivery or any other possible status. (optional)
     * @param null|\DateTime $sentSince Tells when the email was initiated. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ&#x60;. (optional)
     * @param null|\DateTime $sentUntil Tells when the email request was processed by Infobip.Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ&#x60;. (optional)
     * @param null|int $limit Maximum number of logs. (optional)
     * @param null|string $applicationId [Application](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#application) identifier used for filtering. (optional)
     * @param null|string $entityId [Entity](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#entity) identifier used for filtering. (optional)
     *
     * @throws InvalidArgumentException
     */
    private function getEmailLogsRequest(?string $messageId = null, ?string $from = null, ?string $to = null, ?string $bulkId = null, ?string $campaignReferenceId = null, ?string $generalStatus = null, ?\DateTime $sentSince = null, ?\DateTime $sentUntil = null, ?int $limit = null, ?string $applicationId = null, ?string $entityId = null): Request
    {
        $allData = [
             'messageId' => $messageId,
             'from' => $from,
             'to' => $to,
             'bulkId' => $bulkId,
             'campaignReferenceId' => $campaignReferenceId,
             'generalStatus' => $generalStatus,
             'sentSince' => $sentSince,
             'sentUntil' => $sentUntil,
             'limit' => $limit,
             'applicationId' => $applicationId,
             'entityId' => $entityId,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'messageId' => [
                    ],
                    'from' => [
                    ],
                    'to' => [
                    ],
                    'bulkId' => [
                    ],
                    'campaignReferenceId' => [
                    ],
                    'generalStatus' => [
                    ],
                    'sentSince' => [
                    ],
                    'sentUntil' => [
                    ],
                    'limit' => [
                        new Assert\LessThanOrEqual(1000),
                    ],
                    'applicationId' => [
                    ],
                    'entityId' => [
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/logs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($messageId !== null) {
            $queryParams['messageId'] = $messageId;
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
        if ($bulkId !== null) {
            $queryParams['bulkId'] = $bulkId;
        }

        // query params
        if ($campaignReferenceId !== null) {
            $queryParams['campaignReferenceId'] = $campaignReferenceId;
        }

        // query params
        if ($generalStatus !== null) {
            $queryParams['generalStatus'] = $generalStatus;
        }

        // query params
        if ($sentSince !== null) {
            $queryParams['sentSince'] = $sentSince;
        }

        // query params
        if ($sentUntil !== null) {
            $queryParams['sentUntil'] = $sentUntil;
        }

        // query params
        if ($limit !== null) {
            $queryParams['limit'] = $limit;
        }

        // query params
        if ($applicationId !== null) {
            $queryParams['applicationId'] = $applicationId;
        }

        // query params
        if ($entityId !== null) {
            $queryParams['entityId'] = $entityId;
        }

        $headers = [
            'Accept' => 'application/json',
        ];

        // for model (json/xml)
        if (count($formParams) > 0) {
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
     * Create response for operation 'getEmailLogs'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailLogsResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getEmailLogsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailLogsResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getEmailLogs'
     */
    private function getEmailLogsApiException(ApiException $apiException): ApiException
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
     * Operation getScheduledEmailStatuses
     *
     * Get sent email bulks status
     *
     * @param string $bulkId The ID uniquely identifies the sent email request. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailBulkStatusResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getScheduledEmailStatuses(string $bulkId)
    {
        $request = $this->getScheduledEmailStatusesRequest($bulkId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getScheduledEmailStatusesResponse($response, $request->getUri());
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
            throw $this->getScheduledEmailStatusesApiException($exception);
        }
    }

    /**
     * Operation getScheduledEmailStatusesAsync
     *
     * Get sent email bulks status
     *
     * @param string $bulkId The ID uniquely identifies the sent email request. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getScheduledEmailStatusesAsync(string $bulkId): PromiseInterface
    {
        $request = $this->getScheduledEmailStatusesRequest($bulkId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getScheduledEmailStatusesResponse($response, $request->getUri());
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

                    throw $this->getScheduledEmailStatusesApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getScheduledEmailStatuses'
     *
     * @param string $bulkId The ID uniquely identifies the sent email request. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getScheduledEmailStatusesRequest(string $bulkId): Request
    {
        $allData = [
             'bulkId' => $bulkId,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'bulkId' => [
                        new Assert\NotBlank(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/bulks/status';
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
     * Create response for operation 'getScheduledEmailStatuses'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailBulkStatusResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getScheduledEmailStatusesResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailBulkStatusResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getScheduledEmailStatuses'
     */
    private function getScheduledEmailStatusesApiException(ApiException $apiException): ApiException
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
     * Operation getScheduledEmails
     *
     * Get sent email bulks
     *
     * @param string $bulkId The ID uniquely identifies the sent email request. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailBulkScheduleResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getScheduledEmails(string $bulkId)
    {
        $request = $this->getScheduledEmailsRequest($bulkId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getScheduledEmailsResponse($response, $request->getUri());
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
            throw $this->getScheduledEmailsApiException($exception);
        }
    }

    /**
     * Operation getScheduledEmailsAsync
     *
     * Get sent email bulks
     *
     * @param string $bulkId The ID uniquely identifies the sent email request. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getScheduledEmailsAsync(string $bulkId): PromiseInterface
    {
        $request = $this->getScheduledEmailsRequest($bulkId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getScheduledEmailsResponse($response, $request->getUri());
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

                    throw $this->getScheduledEmailsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getScheduledEmails'
     *
     * @param string $bulkId The ID uniquely identifies the sent email request. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getScheduledEmailsRequest(string $bulkId): Request
    {
        $allData = [
             'bulkId' => $bulkId,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'bulkId' => [
                        new Assert\NotBlank(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/bulks';
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
     * Create response for operation 'getScheduledEmails'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailBulkScheduleResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getScheduledEmailsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailBulkScheduleResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getScheduledEmails'
     */
    private function getScheduledEmailsApiException(ApiException $apiException): ApiException
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
     * Operation getSuppressions
     *
     * Get suppressions
     *
     * @param string $domainName Name of the requested domain. (required)
     * @param \Infobip\Model\EmailGetSuppressionType $type Type of suppression. (required)
     * @param null|string $emailAddress Email address that is suppressed. (optional)
     * @param null|string $recipientDomain Recipient domain that is suppressed. (optional)
     * @param null|\DateTime $createdDateFrom Start date for searching suppressions. (optional)
     * @param null|\DateTime $createdDateTo End date for searching suppressions. (optional)
     * @param int $page Requested page number. (optional, default to 0)
     * @param int $size Requested page size. (optional, default to 100)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailSuppressionInfoPageResponse|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError
     */
    public function getSuppressions(string $domainName, \Infobip\Model\EmailGetSuppressionType $type, ?string $emailAddress = null, ?string $recipientDomain = null, ?\DateTime $createdDateFrom = null, ?\DateTime $createdDateTo = null, int $page = 0, int $size = 100)
    {
        $request = $this->getSuppressionsRequest($domainName, $type, $emailAddress, $recipientDomain, $createdDateFrom, $createdDateTo, $page, $size);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getSuppressionsResponse($response, $request->getUri());
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
            throw $this->getSuppressionsApiException($exception);
        }
    }

    /**
     * Operation getSuppressionsAsync
     *
     * Get suppressions
     *
     * @param string $domainName Name of the requested domain. (required)
     * @param \Infobip\Model\EmailGetSuppressionType $type Type of suppression. (required)
     * @param null|string $emailAddress Email address that is suppressed. (optional)
     * @param null|string $recipientDomain Recipient domain that is suppressed. (optional)
     * @param null|\DateTime $createdDateFrom Start date for searching suppressions. (optional)
     * @param null|\DateTime $createdDateTo End date for searching suppressions. (optional)
     * @param int $page Requested page number. (optional, default to 0)
     * @param int $size Requested page size. (optional, default to 100)
     *
     * @throws InvalidArgumentException
     */
    public function getSuppressionsAsync(string $domainName, \Infobip\Model\EmailGetSuppressionType $type, ?string $emailAddress = null, ?string $recipientDomain = null, ?\DateTime $createdDateFrom = null, ?\DateTime $createdDateTo = null, int $page = 0, int $size = 100): PromiseInterface
    {
        $request = $this->getSuppressionsRequest($domainName, $type, $emailAddress, $recipientDomain, $createdDateFrom, $createdDateTo, $page, $size);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getSuppressionsResponse($response, $request->getUri());
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

                    throw $this->getSuppressionsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getSuppressions'
     *
     * @param string $domainName Name of the requested domain. (required)
     * @param \Infobip\Model\EmailGetSuppressionType $type Type of suppression. (required)
     * @param null|string $emailAddress Email address that is suppressed. (optional)
     * @param null|string $recipientDomain Recipient domain that is suppressed. (optional)
     * @param null|\DateTime $createdDateFrom Start date for searching suppressions. (optional)
     * @param null|\DateTime $createdDateTo End date for searching suppressions. (optional)
     * @param int $page Requested page number. (optional, default to 0)
     * @param int $size Requested page size. (optional, default to 100)
     *
     * @throws InvalidArgumentException
     */
    private function getSuppressionsRequest(string $domainName, \Infobip\Model\EmailGetSuppressionType $type, ?string $emailAddress = null, ?string $recipientDomain = null, ?\DateTime $createdDateFrom = null, ?\DateTime $createdDateTo = null, int $page = 0, int $size = 100): Request
    {
        $allData = [
             'domainName' => $domainName,
             'type' => $type,
             'emailAddress' => $emailAddress,
             'recipientDomain' => $recipientDomain,
             'createdDateFrom' => $createdDateFrom,
             'createdDateTo' => $createdDateTo,
             'page' => $page,
             'size' => $size,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'domainName' => [
                        new Assert\NotBlank(),
                    ],
                    'type' => [
                        new Assert\NotNull(),
                    ],
                    'emailAddress' => [
                    ],
                    'recipientDomain' => [
                    ],
                    'createdDateFrom' => [
                    ],
                    'createdDateTo' => [
                    ],
                    'page' => [
                        new Assert\GreaterThanOrEqual(0),
                    ],
                    'size' => [
                        new Assert\LessThanOrEqual(1000),
                        new Assert\GreaterThanOrEqual(1),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/suppressions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($domainName !== null) {
            $queryParams['domainName'] = $domainName;
        }

        // query params
        if ($type !== null) {
            $queryParams['type'] = $type;
        }

        // query params
        if ($emailAddress !== null) {
            $queryParams['emailAddress'] = $emailAddress;
        }

        // query params
        if ($recipientDomain !== null) {
            $queryParams['recipientDomain'] = $recipientDomain;
        }

        // query params
        if ($createdDateFrom !== null) {
            $queryParams['createdDateFrom'] = $createdDateFrom;
        }

        // query params
        if ($createdDateTo !== null) {
            $queryParams['createdDateTo'] = $createdDateTo;
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
     * Create response for operation 'getSuppressions'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailSuppressionInfoPageResponse|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|null
     */
    private function getSuppressionsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailSuppressionInfoPageResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getSuppressions'
     */
    private function getSuppressionsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();

        if ($statusCode === 400) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 403) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 429) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                '\Infobip\Model\ApiError',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation removeIpFromDomain
     *
     * Remove dedicated ip address from the provided domain
     *
     * @param string $domainName Name of the domain. (required)
     * @param string $ipAddress Dedicated ip address. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailSimpleApiResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function removeIpFromDomain(string $domainName, string $ipAddress)
    {
        $request = $this->removeIpFromDomainRequest($domainName, $ipAddress);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->removeIpFromDomainResponse($response, $request->getUri());
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
            throw $this->removeIpFromDomainApiException($exception);
        }
    }

    /**
     * Operation removeIpFromDomainAsync
     *
     * Remove dedicated ip address from the provided domain
     *
     * @param string $domainName Name of the domain. (required)
     * @param string $ipAddress Dedicated ip address. (required)
     *
     * @throws InvalidArgumentException
     */
    public function removeIpFromDomainAsync(string $domainName, string $ipAddress): PromiseInterface
    {
        $request = $this->removeIpFromDomainRequest($domainName, $ipAddress);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->removeIpFromDomainResponse($response, $request->getUri());
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

                    throw $this->removeIpFromDomainApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'removeIpFromDomain'
     *
     * @param string $domainName Name of the domain. (required)
     * @param string $ipAddress Dedicated ip address. (required)
     *
     * @throws InvalidArgumentException
     */
    private function removeIpFromDomainRequest(string $domainName, string $ipAddress): Request
    {
        $allData = [
             'domainName' => $domainName,
             'ipAddress' => $ipAddress,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'domainName' => [
                        new Assert\NotBlank(),
                    ],
                    'ipAddress' => [
                        new Assert\NotBlank(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/domain-ips';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($domainName !== null) {
            $queryParams['domainName'] = $domainName;
        }

        // query params
        if ($ipAddress !== null) {
            $queryParams['ipAddress'] = $ipAddress;
        }

        $headers = [
            'Accept' => 'application/json',
        ];

        // for model (json/xml)
        if (count($formParams) > 0) {
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
     * Create response for operation 'removeIpFromDomain'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailSimpleApiResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function removeIpFromDomainResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailSimpleApiResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'removeIpFromDomain'
     */
    private function removeIpFromDomainApiException(ApiException $apiException): ApiException
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
     * Operation rescheduleEmails
     *
     * Reschedule Email messages
     *
     * @param string $bulkId bulkId (required)
     * @param \Infobip\Model\EmailBulkRescheduleRequest $emailBulkRescheduleRequest emailBulkRescheduleRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailBulkRescheduleResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function rescheduleEmails(string $bulkId, \Infobip\Model\EmailBulkRescheduleRequest $emailBulkRescheduleRequest)
    {
        $request = $this->rescheduleEmailsRequest($bulkId, $emailBulkRescheduleRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->rescheduleEmailsResponse($response, $request->getUri());
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
            throw $this->rescheduleEmailsApiException($exception);
        }
    }

    /**
     * Operation rescheduleEmailsAsync
     *
     * Reschedule Email messages
     *
     * @param string $bulkId (required)
     * @param \Infobip\Model\EmailBulkRescheduleRequest $emailBulkRescheduleRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function rescheduleEmailsAsync(string $bulkId, \Infobip\Model\EmailBulkRescheduleRequest $emailBulkRescheduleRequest): PromiseInterface
    {
        $request = $this->rescheduleEmailsRequest($bulkId, $emailBulkRescheduleRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->rescheduleEmailsResponse($response, $request->getUri());
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

                    throw $this->rescheduleEmailsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'rescheduleEmails'
     *
     * @param string $bulkId (required)
     * @param \Infobip\Model\EmailBulkRescheduleRequest $emailBulkRescheduleRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function rescheduleEmailsRequest(string $bulkId, \Infobip\Model\EmailBulkRescheduleRequest $emailBulkRescheduleRequest): Request
    {
        $allData = [
             'bulkId' => $bulkId,
             'emailBulkRescheduleRequest' => $emailBulkRescheduleRequest,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'bulkId' => [
                        new Assert\NotBlank(),
                    ],
                    'emailBulkRescheduleRequest' => [
                        new Assert\NotNull(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/bulks';
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
        if (isset($emailBulkRescheduleRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($emailBulkRescheduleRequest)
                : $emailBulkRescheduleRequest;
        } elseif (count($formParams) > 0) {
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
     * Create response for operation 'rescheduleEmails'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailBulkRescheduleResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function rescheduleEmailsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailBulkRescheduleResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'rescheduleEmails'
     */
    private function rescheduleEmailsApiException(ApiException $apiException): ApiException
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
     * Operation sendEmail
     *
     * Send fully featured email
     *
     * @param string[] $to Email address of the recipient in a form of &#x60;To&#x3D;\\\&quot;john.smith@somecompany.com\\\&quot;&#x60;. As optional feature on this field, a specific placeholder can be defined whose value will apply only for this destination. Given &#x60;To&#x60; value should look like: &#x60;To&#x3D; {\\\&quot;to\\\&quot;: \\\&quot;john.smith@somecompany.com\\\&quot;,\\\&quot;placeholders\\\&quot;: {\\\&quot;name\\\&quot;: \\\&quot;John\\\&quot;}}&#x60; &#x60;To&#x3D; {\\\&quot;to\\\&quot;: \\\&quot;alice.grey@somecompany.com\\\&quot;,\\\&quot;placeholders\\\&quot;: {\\\&quot;name\\\&quot;: \\\&quot;Alice\\\&quot;}}&#x60;.  Note: Maximum number of recipients per request is 1000 overall including to, cc and bcc field. (required)
     * @param null|string $from Email address with optional sender name.  Note: This field is required if &#x60;templateId&#x60; is not present. (optional)
     * @param null|string[] $cc CC recipient email address. As optional feature on this field, a specific placeholder can be defined whose value will apply only for this destination.  Note: Maximum number of recipients per request is 1000 overall including to, cc and bcc field. (optional)
     * @param null|string[] $bcc BCC recipient email address. As optional feature on this field, a specific placeholder can be defined whose value will apply only for this destination.  Note: Maximum number of recipients per request is 1000 overall including to, cc and bcc field. (optional)
     * @param null|string $subject Message subject.  Note: This field is required if &#x60;templateId&#x60; is not present. (optional)
     * @param null|string $text Body of the message. (optional)
     * @param null|string $html HTML body of the message. If &#x60;html&#x60; and &#x60;text&#x60; fields are present, the &#x60;text&#x60; field will be ignored and &#x60;html&#x60; will be delivered as a message body. (optional)
     * @param null|string $ampHtml Amp HTML body of the message. If &#x60;ampHtml&#x60; is present, &#x60;html&#x60; is mandatory. Amp HTML is not supported by all the email clients. Please check this link for configuring gmail client https://developers.google.com/gmail/ampemail/. (optional)
     * @param null|int $templateId Template ID used for generating email content. The template is created over Infobip web interface. If &#x60;templateId&#x60; is present, then &#x60;html&#x60; and &#x60;text&#x60; values are ignored.  Note: &#x60;templateId&#x60; only supports the value of &#x60;Broadcast&#x60;. &#x60;Content&#x60; and &#x60;Flow&#x60; are not supported. (optional)
     * @param null|\SplFileObject[] $attachment File attachment. (optional)
     * @param null|\SplFileObject[] $inlineImage Allows for inserting an image file inside the HTML code of the email by using &#x60;cid:FILENAME&#x60; instead of providing an external link to the image. (optional)
     * @param null|bool $intermediateReport The real-time Intermediate delivery report that will be sent on your callback server. (optional)
     * @param null|string $notifyUrl The URL on your callback server on which the Delivery report will be sent. (optional)
     * @param null|string $notifyContentType Preferred Delivery report content type. Can be &#x60;application/json&#x60; or &#x60;application/xml&#x60;. (optional)
     * @param null|string $callbackData Additional client data that will be sent on the notifyUrl. (optional)
     * @param bool $track Enable or disable open and click tracking. Passing true will only enable tracking and the statistics would be visible in the web interface alone. This can be explicitly overridden by &#x60;trackClicks&#x60; and &#x60;trackOpens&#x60;. (optional, default to true)
     * @param null|bool $trackClicks This parameter enables or disables track click feature.  Note: Option to disable click tracking per URL is available. For detailed usage, please refer to the [documentation](https://www.infobip.com/docs/email/tracking-service#disable-click-tracking-on-urls). (optional)
     * @param null|bool $trackOpens This parameter enables or disables track open feature. (optional)
     * @param null|string $trackingUrl The URL on your callback server on which the open and click notifications will be sent. See [Tracking Notifications](https://www.infobip.com/docs/email/send-email-over-api#tracking-notifications) for details. (optional)
     * @param null|string $bulkId The ID uniquely identifies the sent email request. This filter will enable you to query delivery reports for all the messages using just one request. You will receive a &#x60;bulkId&#x60; in the response after sending an email request. If you don&#39;t set your own &#x60;bulkId&#x60;, unique ID will be generated by our system and returned in the API response. (Optional Field) (optional)
     * @param null|string $messageId The ID that uniquely identifies the message sent to a recipient. (Optional Field) (optional)
     * @param null|string $campaignReferenceId The ID that allows you to track, analyze, and show an aggregated overview and the performance of individual campaigns. (optional)
     * @param null|string $replyTo Email address to which recipients of the email can reply. (optional)
     * @param null|string $defaultPlaceholders General placeholder, given in a form of json example: &#x60;defaultPlaceholders&#x3D;{\\\&quot;ph1\\\&quot;: \\\&quot;Success\\\&quot;}&#x60;, which will replace given key &#x60;{{ph1}}&#x60; with given value &#x60;Success&#x60; anywhere in the email (subject, text, html...). In case of more destinations in &#x60;To&#x60; field, this placeholder will resolve the same value for key &#x60;ph1&#x60;. (optional)
     * @param bool $preserveRecipients If set to &#x60;true&#x60;, the &#x60;to&#x60; recipients will see the list of all other recipients to get the email and the response will return only one &#x60;messageId&#x60;. Otherwise, each recipient will see just their own email and the response will return a unique &#x60;messageId&#x60; for each email recipient. (optional, default to false)
     * @param null|\DateTime $sendAt To schedule message at a given time. Time provided should be in UTC in the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ&#x60; and cannot exceed 30 days in the future. (optional)
     * @param null|string $landingPagePlaceholders Personalize opt out landing page by inserting placeholders. Insert placeholder or tag while designing landing page. (optional)
     * @param null|string $landingPageId The ID of an opt out landing page to be used and displayed once an end user clicks the unsubscribe link. If not present, default opt out landing page will be displayed. Create a landing page in your Infobip account and use its ID, e.g., &#x60;1_23456&#x60;. (optional)
     * @param string $templateLanguageVersion Specifies template language version that will be used in the current message template. Use version 1 for previous version of template language. Use version 2 for features of the new template language. If not present version 1 will be used as default version. (optional, default to '1')
     * @param null|string $clientPriority Adds a priority rating to this email message. Allowed values are &#x60;HIGH&#x60;, &#x60;STANDARD&#x60; and &#x60;LOW&#x60;. Messages with a higher priority value sent by your account are prioritized over messages with a lower priority value sent by your account. If no priority value is provided, messages will be treated with &#x60;STANDARD&#x60; priority by default. (optional)
     * @param null|string $applicationId Required for application use in a send request for outbound traffic. Returned in notification events. (optional)
     * @param null|string $entityId Required for entity use in a send request for outbound traffic. Returned in notification events. (optional)
     * @param null|string $headers Additional email headers for customization that can be provided in a form of JSON. Example: &#x60;headers&#x3D;{\\\&quot;X-CustomHeader\\\&quot;: \\\&quot;Header value\\\&quot;}&#x60;.  There are a few exceptions of headers which are not adjustable through this option: &#x60;To&#x60;, &#x60;Cc&#x60;, &#x60;Bcc&#x60;, &#x60;From&#x60;, &#x60;Subject&#x60;,&#x60;Content-Type&#x60;, &#x60;DKIM-Signature&#x60;, &#x60;Content-Transfer-Encoding&#x60;, &#x60;Return-Path&#x60;, &#x60;MIME-Version&#x60; (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailSendResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendEmail(array $to, ?string $from = null, ?array $cc = null, ?array $bcc = null, ?string $subject = null, ?string $text = null, ?string $html = null, ?string $ampHtml = null, ?int $templateId = null, ?array $attachment = null, ?array $inlineImage = null, ?bool $intermediateReport = null, ?string $notifyUrl = null, ?string $notifyContentType = null, ?string $callbackData = null, bool $track = true, ?bool $trackClicks = null, ?bool $trackOpens = null, ?string $trackingUrl = null, ?string $bulkId = null, ?string $messageId = null, ?string $campaignReferenceId = null, ?string $replyTo = null, ?string $defaultPlaceholders = null, bool $preserveRecipients = false, ?\DateTime $sendAt = null, ?string $landingPagePlaceholders = null, ?string $landingPageId = null, string $templateLanguageVersion = '1', ?string $clientPriority = null, ?string $applicationId = null, ?string $entityId = null, ?string $headers = null)
    {
        $request = $this->sendEmailRequest($to, $from, $cc, $bcc, $subject, $text, $html, $ampHtml, $templateId, $attachment, $inlineImage, $intermediateReport, $notifyUrl, $notifyContentType, $callbackData, $track, $trackClicks, $trackOpens, $trackingUrl, $bulkId, $messageId, $campaignReferenceId, $replyTo, $defaultPlaceholders, $preserveRecipients, $sendAt, $landingPagePlaceholders, $landingPageId, $templateLanguageVersion, $clientPriority, $applicationId, $entityId, $headers);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendEmailResponse($response, $request->getUri());
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
            throw $this->sendEmailApiException($exception);
        }
    }

    /**
     * Operation sendEmailAsync
     *
     * Send fully featured email
     *
     * @param string[] $to Email address of the recipient in a form of &#x60;To&#x3D;\\\&quot;john.smith@somecompany.com\\\&quot;&#x60;. As optional feature on this field, a specific placeholder can be defined whose value will apply only for this destination. Given &#x60;To&#x60; value should look like: &#x60;To&#x3D; {\\\&quot;to\\\&quot;: \\\&quot;john.smith@somecompany.com\\\&quot;,\\\&quot;placeholders\\\&quot;: {\\\&quot;name\\\&quot;: \\\&quot;John\\\&quot;}}&#x60; &#x60;To&#x3D; {\\\&quot;to\\\&quot;: \\\&quot;alice.grey@somecompany.com\\\&quot;,\\\&quot;placeholders\\\&quot;: {\\\&quot;name\\\&quot;: \\\&quot;Alice\\\&quot;}}&#x60;.  Note: Maximum number of recipients per request is 1000 overall including to, cc and bcc field. (required)
     * @param null|string $from Email address with optional sender name.  Note: This field is required if &#x60;templateId&#x60; is not present. (optional)
     * @param null|string[] $cc CC recipient email address. As optional feature on this field, a specific placeholder can be defined whose value will apply only for this destination.  Note: Maximum number of recipients per request is 1000 overall including to, cc and bcc field. (optional)
     * @param null|string[] $bcc BCC recipient email address. As optional feature on this field, a specific placeholder can be defined whose value will apply only for this destination.  Note: Maximum number of recipients per request is 1000 overall including to, cc and bcc field. (optional)
     * @param null|string $subject Message subject.  Note: This field is required if &#x60;templateId&#x60; is not present. (optional)
     * @param null|string $text Body of the message. (optional)
     * @param null|string $html HTML body of the message. If &#x60;html&#x60; and &#x60;text&#x60; fields are present, the &#x60;text&#x60; field will be ignored and &#x60;html&#x60; will be delivered as a message body. (optional)
     * @param null|string $ampHtml Amp HTML body of the message. If &#x60;ampHtml&#x60; is present, &#x60;html&#x60; is mandatory. Amp HTML is not supported by all the email clients. Please check this link for configuring gmail client https://developers.google.com/gmail/ampemail/. (optional)
     * @param null|int $templateId Template ID used for generating email content. The template is created over Infobip web interface. If &#x60;templateId&#x60; is present, then &#x60;html&#x60; and &#x60;text&#x60; values are ignored.  Note: &#x60;templateId&#x60; only supports the value of &#x60;Broadcast&#x60;. &#x60;Content&#x60; and &#x60;Flow&#x60; are not supported. (optional)
     * @param null|\SplFileObject[] $attachment File attachment. (optional)
     * @param null|\SplFileObject[] $inlineImage Allows for inserting an image file inside the HTML code of the email by using &#x60;cid:FILENAME&#x60; instead of providing an external link to the image. (optional)
     * @param null|bool $intermediateReport The real-time Intermediate delivery report that will be sent on your callback server. (optional)
     * @param null|string $notifyUrl The URL on your callback server on which the Delivery report will be sent. (optional)
     * @param null|string $notifyContentType Preferred Delivery report content type. Can be &#x60;application/json&#x60; or &#x60;application/xml&#x60;. (optional)
     * @param null|string $callbackData Additional client data that will be sent on the notifyUrl. (optional)
     * @param bool $track Enable or disable open and click tracking. Passing true will only enable tracking and the statistics would be visible in the web interface alone. This can be explicitly overridden by &#x60;trackClicks&#x60; and &#x60;trackOpens&#x60;. (optional, default to true)
     * @param null|bool $trackClicks This parameter enables or disables track click feature.  Note: Option to disable click tracking per URL is available. For detailed usage, please refer to the [documentation](https://www.infobip.com/docs/email/tracking-service#disable-click-tracking-on-urls). (optional)
     * @param null|bool $trackOpens This parameter enables or disables track open feature. (optional)
     * @param null|string $trackingUrl The URL on your callback server on which the open and click notifications will be sent. See [Tracking Notifications](https://www.infobip.com/docs/email/send-email-over-api#tracking-notifications) for details. (optional)
     * @param null|string $bulkId The ID uniquely identifies the sent email request. This filter will enable you to query delivery reports for all the messages using just one request. You will receive a &#x60;bulkId&#x60; in the response after sending an email request. If you don&#39;t set your own &#x60;bulkId&#x60;, unique ID will be generated by our system and returned in the API response. (Optional Field) (optional)
     * @param null|string $messageId The ID that uniquely identifies the message sent to a recipient. (Optional Field) (optional)
     * @param null|string $campaignReferenceId The ID that allows you to track, analyze, and show an aggregated overview and the performance of individual campaigns. (optional)
     * @param null|string $replyTo Email address to which recipients of the email can reply. (optional)
     * @param null|string $defaultPlaceholders General placeholder, given in a form of json example: &#x60;defaultPlaceholders&#x3D;{\\\&quot;ph1\\\&quot;: \\\&quot;Success\\\&quot;}&#x60;, which will replace given key &#x60;{{ph1}}&#x60; with given value &#x60;Success&#x60; anywhere in the email (subject, text, html...). In case of more destinations in &#x60;To&#x60; field, this placeholder will resolve the same value for key &#x60;ph1&#x60;. (optional)
     * @param bool $preserveRecipients If set to &#x60;true&#x60;, the &#x60;to&#x60; recipients will see the list of all other recipients to get the email and the response will return only one &#x60;messageId&#x60;. Otherwise, each recipient will see just their own email and the response will return a unique &#x60;messageId&#x60; for each email recipient. (optional, default to false)
     * @param null|\DateTime $sendAt To schedule message at a given time. Time provided should be in UTC in the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ&#x60; and cannot exceed 30 days in the future. (optional)
     * @param null|string $landingPagePlaceholders Personalize opt out landing page by inserting placeholders. Insert placeholder or tag while designing landing page. (optional)
     * @param null|string $landingPageId The ID of an opt out landing page to be used and displayed once an end user clicks the unsubscribe link. If not present, default opt out landing page will be displayed. Create a landing page in your Infobip account and use its ID, e.g., &#x60;1_23456&#x60;. (optional)
     * @param string $templateLanguageVersion Specifies template language version that will be used in the current message template. Use version 1 for previous version of template language. Use version 2 for features of the new template language. If not present version 1 will be used as default version. (optional, default to '1')
     * @param null|string $clientPriority Adds a priority rating to this email message. Allowed values are &#x60;HIGH&#x60;, &#x60;STANDARD&#x60; and &#x60;LOW&#x60;. Messages with a higher priority value sent by your account are prioritized over messages with a lower priority value sent by your account. If no priority value is provided, messages will be treated with &#x60;STANDARD&#x60; priority by default. (optional)
     * @param null|string $applicationId Required for application use in a send request for outbound traffic. Returned in notification events. (optional)
     * @param null|string $entityId Required for entity use in a send request for outbound traffic. Returned in notification events. (optional)
     * @param null|string $headers Additional email headers for customization that can be provided in a form of JSON. Example: &#x60;headers&#x3D;{\\\&quot;X-CustomHeader\\\&quot;: \\\&quot;Header value\\\&quot;}&#x60;.  There are a few exceptions of headers which are not adjustable through this option: &#x60;To&#x60;, &#x60;Cc&#x60;, &#x60;Bcc&#x60;, &#x60;From&#x60;, &#x60;Subject&#x60;,&#x60;Content-Type&#x60;, &#x60;DKIM-Signature&#x60;, &#x60;Content-Transfer-Encoding&#x60;, &#x60;Return-Path&#x60;, &#x60;MIME-Version&#x60; (optional)
     *
     * @throws InvalidArgumentException
     */
    public function sendEmailAsync(array $to, ?string $from = null, ?array $cc = null, ?array $bcc = null, ?string $subject = null, ?string $text = null, ?string $html = null, ?string $ampHtml = null, ?int $templateId = null, ?array $attachment = null, ?array $inlineImage = null, ?bool $intermediateReport = null, ?string $notifyUrl = null, ?string $notifyContentType = null, ?string $callbackData = null, bool $track = true, ?bool $trackClicks = null, ?bool $trackOpens = null, ?string $trackingUrl = null, ?string $bulkId = null, ?string $messageId = null, ?string $campaignReferenceId = null, ?string $replyTo = null, ?string $defaultPlaceholders = null, bool $preserveRecipients = false, ?\DateTime $sendAt = null, ?string $landingPagePlaceholders = null, ?string $landingPageId = null, string $templateLanguageVersion = '1', ?string $clientPriority = null, ?string $applicationId = null, ?string $entityId = null, ?string $headers = null): PromiseInterface
    {
        $request = $this->sendEmailRequest($to, $from, $cc, $bcc, $subject, $text, $html, $ampHtml, $templateId, $attachment, $inlineImage, $intermediateReport, $notifyUrl, $notifyContentType, $callbackData, $track, $trackClicks, $trackOpens, $trackingUrl, $bulkId, $messageId, $campaignReferenceId, $replyTo, $defaultPlaceholders, $preserveRecipients, $sendAt, $landingPagePlaceholders, $landingPageId, $templateLanguageVersion, $clientPriority, $applicationId, $entityId, $headers);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendEmailResponse($response, $request->getUri());
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

                    throw $this->sendEmailApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendEmail'
     *
     * @param string[] $to Email address of the recipient in a form of &#x60;To&#x3D;\\\&quot;john.smith@somecompany.com\\\&quot;&#x60;. As optional feature on this field, a specific placeholder can be defined whose value will apply only for this destination. Given &#x60;To&#x60; value should look like: &#x60;To&#x3D; {\\\&quot;to\\\&quot;: \\\&quot;john.smith@somecompany.com\\\&quot;,\\\&quot;placeholders\\\&quot;: {\\\&quot;name\\\&quot;: \\\&quot;John\\\&quot;}}&#x60; &#x60;To&#x3D; {\\\&quot;to\\\&quot;: \\\&quot;alice.grey@somecompany.com\\\&quot;,\\\&quot;placeholders\\\&quot;: {\\\&quot;name\\\&quot;: \\\&quot;Alice\\\&quot;}}&#x60;.  Note: Maximum number of recipients per request is 1000 overall including to, cc and bcc field. (required)
     * @param null|string $from Email address with optional sender name.  Note: This field is required if &#x60;templateId&#x60; is not present. (optional)
     * @param null|string[] $cc CC recipient email address. As optional feature on this field, a specific placeholder can be defined whose value will apply only for this destination.  Note: Maximum number of recipients per request is 1000 overall including to, cc and bcc field. (optional)
     * @param null|string[] $bcc BCC recipient email address. As optional feature on this field, a specific placeholder can be defined whose value will apply only for this destination.  Note: Maximum number of recipients per request is 1000 overall including to, cc and bcc field. (optional)
     * @param null|string $subject Message subject.  Note: This field is required if &#x60;templateId&#x60; is not present. (optional)
     * @param null|string $text Body of the message. (optional)
     * @param null|string $html HTML body of the message. If &#x60;html&#x60; and &#x60;text&#x60; fields are present, the &#x60;text&#x60; field will be ignored and &#x60;html&#x60; will be delivered as a message body. (optional)
     * @param null|string $ampHtml Amp HTML body of the message. If &#x60;ampHtml&#x60; is present, &#x60;html&#x60; is mandatory. Amp HTML is not supported by all the email clients. Please check this link for configuring gmail client https://developers.google.com/gmail/ampemail/. (optional)
     * @param null|int $templateId Template ID used for generating email content. The template is created over Infobip web interface. If &#x60;templateId&#x60; is present, then &#x60;html&#x60; and &#x60;text&#x60; values are ignored.  Note: &#x60;templateId&#x60; only supports the value of &#x60;Broadcast&#x60;. &#x60;Content&#x60; and &#x60;Flow&#x60; are not supported. (optional)
     * @param null|\SplFileObject[] $attachment File attachment. (optional)
     * @param null|\SplFileObject[] $inlineImage Allows for inserting an image file inside the HTML code of the email by using &#x60;cid:FILENAME&#x60; instead of providing an external link to the image. (optional)
     * @param null|bool $intermediateReport The real-time Intermediate delivery report that will be sent on your callback server. (optional)
     * @param null|string $notifyUrl The URL on your callback server on which the Delivery report will be sent. (optional)
     * @param null|string $notifyContentType Preferred Delivery report content type. Can be &#x60;application/json&#x60; or &#x60;application/xml&#x60;. (optional)
     * @param null|string $callbackData Additional client data that will be sent on the notifyUrl. (optional)
     * @param bool $track Enable or disable open and click tracking. Passing true will only enable tracking and the statistics would be visible in the web interface alone. This can be explicitly overridden by &#x60;trackClicks&#x60; and &#x60;trackOpens&#x60;. (optional, default to true)
     * @param null|bool $trackClicks This parameter enables or disables track click feature.  Note: Option to disable click tracking per URL is available. For detailed usage, please refer to the [documentation](https://www.infobip.com/docs/email/tracking-service#disable-click-tracking-on-urls). (optional)
     * @param null|bool $trackOpens This parameter enables or disables track open feature. (optional)
     * @param null|string $trackingUrl The URL on your callback server on which the open and click notifications will be sent. See [Tracking Notifications](https://www.infobip.com/docs/email/send-email-over-api#tracking-notifications) for details. (optional)
     * @param null|string $bulkId The ID uniquely identifies the sent email request. This filter will enable you to query delivery reports for all the messages using just one request. You will receive a &#x60;bulkId&#x60; in the response after sending an email request. If you don&#39;t set your own &#x60;bulkId&#x60;, unique ID will be generated by our system and returned in the API response. (Optional Field) (optional)
     * @param null|string $messageId The ID that uniquely identifies the message sent to a recipient. (Optional Field) (optional)
     * @param null|string $campaignReferenceId The ID that allows you to track, analyze, and show an aggregated overview and the performance of individual campaigns. (optional)
     * @param null|string $replyTo Email address to which recipients of the email can reply. (optional)
     * @param null|string $defaultPlaceholders General placeholder, given in a form of json example: &#x60;defaultPlaceholders&#x3D;{\\\&quot;ph1\\\&quot;: \\\&quot;Success\\\&quot;}&#x60;, which will replace given key &#x60;{{ph1}}&#x60; with given value &#x60;Success&#x60; anywhere in the email (subject, text, html...). In case of more destinations in &#x60;To&#x60; field, this placeholder will resolve the same value for key &#x60;ph1&#x60;. (optional)
     * @param bool $preserveRecipients If set to &#x60;true&#x60;, the &#x60;to&#x60; recipients will see the list of all other recipients to get the email and the response will return only one &#x60;messageId&#x60;. Otherwise, each recipient will see just their own email and the response will return a unique &#x60;messageId&#x60; for each email recipient. (optional, default to false)
     * @param null|\DateTime $sendAt To schedule message at a given time. Time provided should be in UTC in the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ&#x60; and cannot exceed 30 days in the future. (optional)
     * @param null|string $landingPagePlaceholders Personalize opt out landing page by inserting placeholders. Insert placeholder or tag while designing landing page. (optional)
     * @param null|string $landingPageId The ID of an opt out landing page to be used and displayed once an end user clicks the unsubscribe link. If not present, default opt out landing page will be displayed. Create a landing page in your Infobip account and use its ID, e.g., &#x60;1_23456&#x60;. (optional)
     * @param string $templateLanguageVersion Specifies template language version that will be used in the current message template. Use version 1 for previous version of template language. Use version 2 for features of the new template language. If not present version 1 will be used as default version. (optional, default to '1')
     * @param null|string $clientPriority Adds a priority rating to this email message. Allowed values are &#x60;HIGH&#x60;, &#x60;STANDARD&#x60; and &#x60;LOW&#x60;. Messages with a higher priority value sent by your account are prioritized over messages with a lower priority value sent by your account. If no priority value is provided, messages will be treated with &#x60;STANDARD&#x60; priority by default. (optional)
     * @param null|string $applicationId Required for application use in a send request for outbound traffic. Returned in notification events. (optional)
     * @param null|string $entityId Required for entity use in a send request for outbound traffic. Returned in notification events. (optional)
     * @param null|string $headers Additional email headers for customization that can be provided in a form of JSON. Example: &#x60;headers&#x3D;{\\\&quot;X-CustomHeader\\\&quot;: \\\&quot;Header value\\\&quot;}&#x60;.  There are a few exceptions of headers which are not adjustable through this option: &#x60;To&#x60;, &#x60;Cc&#x60;, &#x60;Bcc&#x60;, &#x60;From&#x60;, &#x60;Subject&#x60;,&#x60;Content-Type&#x60;, &#x60;DKIM-Signature&#x60;, &#x60;Content-Transfer-Encoding&#x60;, &#x60;Return-Path&#x60;, &#x60;MIME-Version&#x60; (optional)
     *
     * @throws InvalidArgumentException
     */
    private function sendEmailRequest(array $to, ?string $from = null, ?array $cc = null, ?array $bcc = null, ?string $subject = null, ?string $text = null, ?string $html = null, ?string $ampHtml = null, ?int $templateId = null, ?array $attachment = null, ?array $inlineImage = null, ?bool $intermediateReport = null, ?string $notifyUrl = null, ?string $notifyContentType = null, ?string $callbackData = null, bool $track = true, ?bool $trackClicks = null, ?bool $trackOpens = null, ?string $trackingUrl = null, ?string $bulkId = null, ?string $messageId = null, ?string $campaignReferenceId = null, ?string $replyTo = null, ?string $defaultPlaceholders = null, bool $preserveRecipients = false, ?\DateTime $sendAt = null, ?string $landingPagePlaceholders = null, ?string $landingPageId = null, string $templateLanguageVersion = '1', ?string $clientPriority = null, ?string $applicationId = null, ?string $entityId = null, ?string $headers = null): Request
    {
        $allData = [
             'to' => $to,
             'from' => $from,
             'cc' => $cc,
             'bcc' => $bcc,
             'subject' => $subject,
             'text' => $text,
             'html' => $html,
             'ampHtml' => $ampHtml,
             'templateId' => $templateId,
             'attachment' => $attachment,
             'inlineImage' => $inlineImage,
             'intermediateReport' => $intermediateReport,
             'notifyUrl' => $notifyUrl,
             'notifyContentType' => $notifyContentType,
             'callbackData' => $callbackData,
             'track' => $track,
             'trackClicks' => $trackClicks,
             'trackOpens' => $trackOpens,
             'trackingUrl' => $trackingUrl,
             'bulkId' => $bulkId,
             'messageId' => $messageId,
             'campaignReferenceId' => $campaignReferenceId,
             'replyTo' => $replyTo,
             'defaultPlaceholders' => $defaultPlaceholders,
             'preserveRecipients' => $preserveRecipients,
             'sendAt' => $sendAt,
             'landingPagePlaceholders' => $landingPagePlaceholders,
             'landingPageId' => $landingPageId,
             'templateLanguageVersion' => $templateLanguageVersion,
             'clientPriority' => $clientPriority,
             'applicationId' => $applicationId,
             'entityId' => $entityId,
             'headers' => $headers,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'to' => [
                        new Assert\NotNull(),
                    ],
                    'from' => [
                    ],
                    'cc' => [
                    ],
                    'bcc' => [
                    ],
                    'subject' => [
                    ],
                    'text' => [
                    ],
                    'html' => [
                    ],
                    'ampHtml' => [
                    ],
                    'templateId' => [
                    ],
                    'attachment' => [
                    ],
                    'inlineImage' => [
                    ],
                    'intermediateReport' => [
                    ],
                    'notifyUrl' => [
                    ],
                    'notifyContentType' => [
                    ],
                    'callbackData' => [
                    ],
                    'track' => [
                    ],
                    'trackClicks' => [
                    ],
                    'trackOpens' => [
                    ],
                    'trackingUrl' => [
                    ],
                    'bulkId' => [
                    ],
                    'messageId' => [
                    ],
                    'campaignReferenceId' => [
                    ],
                    'replyTo' => [
                    ],
                    'defaultPlaceholders' => [
                    ],
                    'preserveRecipients' => [
                    ],
                    'sendAt' => [
                    ],
                    'landingPagePlaceholders' => [
                    ],
                    'landingPageId' => [
                    ],
                    'templateLanguageVersion' => [
                    ],
                    'clientPriority' => [
                    ],
                    'applicationId' => [
                    ],
                    'entityId' => [
                    ],
                    'headers' => [
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/3/send';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // form params
        if ($from !== null) {
            $formParams['from'] = $this->objectSerializer->toFormValue($from);
        }

        // form params
        if ($to !== null) {
            foreach ($to as $formParamValueItem) {
                $formParams['to'][] = $this->objectSerializer->toFormValue($formParamValueItem);
            }
        }

        // form params
        if ($cc !== null) {
            foreach ($cc as $formParamValueItem) {
                $formParams['cc'][] = $this->objectSerializer->toFormValue($formParamValueItem);
            }
        }

        // form params
        if ($bcc !== null) {
            foreach ($bcc as $formParamValueItem) {
                $formParams['bcc'][] = $this->objectSerializer->toFormValue($formParamValueItem);
            }
        }

        // form params
        if ($subject !== null) {
            $formParams['subject'] = $this->objectSerializer->toFormValue($subject);
        }

        // form params
        if ($text !== null) {
            $formParams['text'] = $this->objectSerializer->toFormValue($text);
        }

        // form params
        if ($html !== null) {
            $formParams['html'] = $this->objectSerializer->toFormValue($html);
        }

        // form params
        if ($ampHtml !== null) {
            $formParams['ampHtml'] = $this->objectSerializer->toFormValue($ampHtml);
        }

        // form params
        if ($templateId !== null) {
            $formParams['templateId'] = $this->objectSerializer->toFormValue($templateId);
        }

        // form params
        if ($attachment !== null) {
            $formParams['attachment'] = [];
            $paramFiles = is_array($attachment) ? $attachment : [$attachment];
            foreach ($paramFiles as $paramFile) {
                $formParams['attachment'][] = Utils::tryFopen(
                    $this->objectSerializer->toFormValue($paramFile),
                    'rb'
                );
            }
        }

        // form params
        if ($inlineImage !== null) {
            $formParams['inlineImage'] = [];
            $paramFiles = is_array($inlineImage) ? $inlineImage : [$inlineImage];
            foreach ($paramFiles as $paramFile) {
                $formParams['inlineImage'][] = Utils::tryFopen(
                    $this->objectSerializer->toFormValue($paramFile),
                    'rb'
                );
            }
        }

        // form params
        if ($intermediateReport !== null) {
            $formParams['intermediateReport'] = $this->objectSerializer->toFormValue($intermediateReport);
        }

        // form params
        if ($notifyUrl !== null) {
            $formParams['notifyUrl'] = $this->objectSerializer->toFormValue($notifyUrl);
        }

        // form params
        if ($notifyContentType !== null) {
            $formParams['notifyContentType'] = $this->objectSerializer->toFormValue($notifyContentType);
        }

        // form params
        if ($callbackData !== null) {
            $formParams['callbackData'] = $this->objectSerializer->toFormValue($callbackData);
        }

        // form params
        if ($track !== null) {
            $formParams['track'] = $this->objectSerializer->toFormValue($track);
        }

        // form params
        if ($trackClicks !== null) {
            $formParams['trackClicks'] = $this->objectSerializer->toFormValue($trackClicks);
        }

        // form params
        if ($trackOpens !== null) {
            $formParams['trackOpens'] = $this->objectSerializer->toFormValue($trackOpens);
        }

        // form params
        if ($trackingUrl !== null) {
            $formParams['trackingUrl'] = $this->objectSerializer->toFormValue($trackingUrl);
        }

        // form params
        if ($bulkId !== null) {
            $formParams['bulkId'] = $this->objectSerializer->toFormValue($bulkId);
        }

        // form params
        if ($messageId !== null) {
            $formParams['messageId'] = $this->objectSerializer->toFormValue($messageId);
        }

        // form params
        if ($campaignReferenceId !== null) {
            $formParams['campaignReferenceId'] = $this->objectSerializer->toFormValue($campaignReferenceId);
        }

        // form params
        if ($replyTo !== null) {
            $formParams['replyTo'] = $this->objectSerializer->toFormValue($replyTo);
        }

        // form params
        if ($defaultPlaceholders !== null) {
            $formParams['defaultPlaceholders'] = $this->objectSerializer->toFormValue($defaultPlaceholders);
        }

        // form params
        if ($preserveRecipients !== null) {
            $formParams['preserveRecipients'] = $this->objectSerializer->toFormValue($preserveRecipients);
        }

        // form params
        if ($sendAt !== null) {
            $formParams['sendAt'] = $this->objectSerializer->toFormValue($sendAt);
        }

        // form params
        if ($landingPagePlaceholders !== null) {
            $formParams['landingPagePlaceholders'] = $this->objectSerializer->toFormValue($landingPagePlaceholders);
        }

        // form params
        if ($landingPageId !== null) {
            $formParams['landingPageId'] = $this->objectSerializer->toFormValue($landingPageId);
        }

        // form params
        if ($templateLanguageVersion !== null) {
            $formParams['templateLanguageVersion'] = $this->objectSerializer->toFormValue($templateLanguageVersion);
        }

        // form params
        if ($clientPriority !== null) {
            $formParams['clientPriority'] = $this->objectSerializer->toFormValue($clientPriority);
        }

        // form params
        if ($applicationId !== null) {
            $formParams['applicationId'] = $this->objectSerializer->toFormValue($applicationId);
        }

        // form params
        if ($entityId !== null) {
            $formParams['entityId'] = $this->objectSerializer->toFormValue($entityId);
        }

        // form params
        if ($headers !== null) {
            $formParams['headers'] = $this->objectSerializer->toFormValue($headers);
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'multipart/form-data',
        ];

        // for model (json/xml)
        if (count($formParams) > 0) {
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
     * Create response for operation 'sendEmail'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailSendResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendEmailResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailSendResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendEmail'
     */
    private function sendEmailApiException(ApiException $apiException): ApiException
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
     * Operation updateReturnPath
     *
     * Update return path
     *
     * @param string $domainName Domain for which the return path address needs to be updated. (required)
     * @param \Infobip\Model\EmailReturnPathAddressRequest $emailReturnPathAddressRequest emailReturnPathAddressRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailDomainResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function updateReturnPath(string $domainName, \Infobip\Model\EmailReturnPathAddressRequest $emailReturnPathAddressRequest)
    {
        $request = $this->updateReturnPathRequest($domainName, $emailReturnPathAddressRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->updateReturnPathResponse($response, $request->getUri());
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
            throw $this->updateReturnPathApiException($exception);
        }
    }

    /**
     * Operation updateReturnPathAsync
     *
     * Update return path
     *
     * @param string $domainName Domain for which the return path address needs to be updated. (required)
     * @param \Infobip\Model\EmailReturnPathAddressRequest $emailReturnPathAddressRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function updateReturnPathAsync(string $domainName, \Infobip\Model\EmailReturnPathAddressRequest $emailReturnPathAddressRequest): PromiseInterface
    {
        $request = $this->updateReturnPathRequest($domainName, $emailReturnPathAddressRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->updateReturnPathResponse($response, $request->getUri());
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

                    throw $this->updateReturnPathApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'updateReturnPath'
     *
     * @param string $domainName Domain for which the return path address needs to be updated. (required)
     * @param \Infobip\Model\EmailReturnPathAddressRequest $emailReturnPathAddressRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function updateReturnPathRequest(string $domainName, \Infobip\Model\EmailReturnPathAddressRequest $emailReturnPathAddressRequest): Request
    {
        $allData = [
             'domainName' => $domainName,
             'emailReturnPathAddressRequest' => $emailReturnPathAddressRequest,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'domainName' => [
                        new Assert\NotBlank(),
                    ],
                    'emailReturnPathAddressRequest' => [
                        new Assert\NotNull(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/domains/{domainName}/return-path';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($domainName !== null) {
            $resourcePath = str_replace(
                '{' . 'domainName' . '}',
                $this->objectSerializer->toPathValue($domainName),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($emailReturnPathAddressRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($emailReturnPathAddressRequest)
                : $emailReturnPathAddressRequest;
        } elseif (count($formParams) > 0) {
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
     * Create response for operation 'updateReturnPath'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailDomainResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function updateReturnPathResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailDomainResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'updateReturnPath'
     */
    private function updateReturnPathApiException(ApiException $apiException): ApiException
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
     * Operation updateScheduledEmailStatuses
     *
     * Update scheduled Email messages status
     *
     * @param string $bulkId The ID uniquely identifies the sent email request. (required)
     * @param \Infobip\Model\EmailBulkUpdateStatusRequest $emailBulkUpdateStatusRequest emailBulkUpdateStatusRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailBulkUpdateStatusResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function updateScheduledEmailStatuses(string $bulkId, \Infobip\Model\EmailBulkUpdateStatusRequest $emailBulkUpdateStatusRequest)
    {
        $request = $this->updateScheduledEmailStatusesRequest($bulkId, $emailBulkUpdateStatusRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->updateScheduledEmailStatusesResponse($response, $request->getUri());
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
            throw $this->updateScheduledEmailStatusesApiException($exception);
        }
    }

    /**
     * Operation updateScheduledEmailStatusesAsync
     *
     * Update scheduled Email messages status
     *
     * @param string $bulkId The ID uniquely identifies the sent email request. (required)
     * @param \Infobip\Model\EmailBulkUpdateStatusRequest $emailBulkUpdateStatusRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function updateScheduledEmailStatusesAsync(string $bulkId, \Infobip\Model\EmailBulkUpdateStatusRequest $emailBulkUpdateStatusRequest): PromiseInterface
    {
        $request = $this->updateScheduledEmailStatusesRequest($bulkId, $emailBulkUpdateStatusRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->updateScheduledEmailStatusesResponse($response, $request->getUri());
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

                    throw $this->updateScheduledEmailStatusesApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'updateScheduledEmailStatuses'
     *
     * @param string $bulkId The ID uniquely identifies the sent email request. (required)
     * @param \Infobip\Model\EmailBulkUpdateStatusRequest $emailBulkUpdateStatusRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function updateScheduledEmailStatusesRequest(string $bulkId, \Infobip\Model\EmailBulkUpdateStatusRequest $emailBulkUpdateStatusRequest): Request
    {
        $allData = [
             'bulkId' => $bulkId,
             'emailBulkUpdateStatusRequest' => $emailBulkUpdateStatusRequest,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'bulkId' => [
                        new Assert\NotBlank(),
                    ],
                    'emailBulkUpdateStatusRequest' => [
                        new Assert\NotNull(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/bulks/status';
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
        if (isset($emailBulkUpdateStatusRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($emailBulkUpdateStatusRequest)
                : $emailBulkUpdateStatusRequest;
        } elseif (count($formParams) > 0) {
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
     * Create response for operation 'updateScheduledEmailStatuses'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailBulkUpdateStatusResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function updateScheduledEmailStatusesResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailBulkUpdateStatusResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'updateScheduledEmailStatuses'
     */
    private function updateScheduledEmailStatusesApiException(ApiException $apiException): ApiException
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
     * Operation updateTrackingEvents
     *
     * Update tracking events
     *
     * @param string $domainName Domain for which the tracking events need to be updated. (required)
     * @param \Infobip\Model\EmailTrackingEventRequest $emailTrackingEventRequest emailTrackingEventRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailDomainResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function updateTrackingEvents(string $domainName, \Infobip\Model\EmailTrackingEventRequest $emailTrackingEventRequest)
    {
        $request = $this->updateTrackingEventsRequest($domainName, $emailTrackingEventRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->updateTrackingEventsResponse($response, $request->getUri());
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
            throw $this->updateTrackingEventsApiException($exception);
        }
    }

    /**
     * Operation updateTrackingEventsAsync
     *
     * Update tracking events
     *
     * @param string $domainName Domain for which the tracking events need to be updated. (required)
     * @param \Infobip\Model\EmailTrackingEventRequest $emailTrackingEventRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function updateTrackingEventsAsync(string $domainName, \Infobip\Model\EmailTrackingEventRequest $emailTrackingEventRequest): PromiseInterface
    {
        $request = $this->updateTrackingEventsRequest($domainName, $emailTrackingEventRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->updateTrackingEventsResponse($response, $request->getUri());
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

                    throw $this->updateTrackingEventsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'updateTrackingEvents'
     *
     * @param string $domainName Domain for which the tracking events need to be updated. (required)
     * @param \Infobip\Model\EmailTrackingEventRequest $emailTrackingEventRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function updateTrackingEventsRequest(string $domainName, \Infobip\Model\EmailTrackingEventRequest $emailTrackingEventRequest): Request
    {
        $allData = [
             'domainName' => $domainName,
             'emailTrackingEventRequest' => $emailTrackingEventRequest,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'domainName' => [
                        new Assert\NotBlank(),
                    ],
                    'emailTrackingEventRequest' => [
                        new Assert\NotNull(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/domains/{domainName}/tracking';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($domainName !== null) {
            $resourcePath = str_replace(
                '{' . 'domainName' . '}',
                $this->objectSerializer->toPathValue($domainName),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($emailTrackingEventRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($emailTrackingEventRequest)
                : $emailTrackingEventRequest;
        } elseif (count($formParams) > 0) {
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
     * Create response for operation 'updateTrackingEvents'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailDomainResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function updateTrackingEventsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailDomainResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'updateTrackingEvents'
     */
    private function updateTrackingEventsApiException(ApiException $apiException): ApiException
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
     * Operation validateEmailAddresses
     *
     * Validate email addresses
     *
     * @param \Infobip\Model\EmailValidationRequest $emailValidationRequest emailValidationRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\EmailValidationResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function validateEmailAddresses(\Infobip\Model\EmailValidationRequest $emailValidationRequest)
    {
        $request = $this->validateEmailAddressesRequest($emailValidationRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->validateEmailAddressesResponse($response, $request->getUri());
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
            throw $this->validateEmailAddressesApiException($exception);
        }
    }

    /**
     * Operation validateEmailAddressesAsync
     *
     * Validate email addresses
     *
     * @param \Infobip\Model\EmailValidationRequest $emailValidationRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function validateEmailAddressesAsync(\Infobip\Model\EmailValidationRequest $emailValidationRequest): PromiseInterface
    {
        $request = $this->validateEmailAddressesRequest($emailValidationRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->validateEmailAddressesResponse($response, $request->getUri());
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

                    throw $this->validateEmailAddressesApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'validateEmailAddresses'
     *
     * @param \Infobip\Model\EmailValidationRequest $emailValidationRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function validateEmailAddressesRequest(\Infobip\Model\EmailValidationRequest $emailValidationRequest): Request
    {
        $allData = [
             'emailValidationRequest' => $emailValidationRequest,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'emailValidationRequest' => [
                        new Assert\NotNull(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/2/validation';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($emailValidationRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($emailValidationRequest)
                : $emailValidationRequest;
        } elseif (count($formParams) > 0) {
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
     * Create response for operation 'validateEmailAddresses'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\EmailValidationResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function validateEmailAddressesResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\EmailValidationResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'validateEmailAddresses'
     */
    private function validateEmailAddressesApiException(ApiException $apiException): ApiException
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
     * Operation verifyDomain
     *
     * Verify Domain
     *
     * @param string $domainName Name of the domain that has to be verified. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function verifyDomain(string $domainName)
    {
        $request = $this->verifyDomainRequest($domainName);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->verifyDomainResponse($response, $request->getUri());
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
            throw $this->verifyDomainApiException($exception);
        }
    }

    /**
     * Operation verifyDomainAsync
     *
     * Verify Domain
     *
     * @param string $domainName Name of the domain that has to be verified. (required)
     *
     * @throws InvalidArgumentException
     */
    public function verifyDomainAsync(string $domainName): PromiseInterface
    {
        $request = $this->verifyDomainRequest($domainName);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->verifyDomainResponse($response, $request->getUri());
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

                    throw $this->verifyDomainApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'verifyDomain'
     *
     * @param string $domainName Name of the domain that has to be verified. (required)
     *
     * @throws InvalidArgumentException
     */
    private function verifyDomainRequest(string $domainName): Request
    {
        $allData = [
             'domainName' => $domainName,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'domainName' => [
                        new Assert\NotBlank(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/email/1/domains/{domainName}/verify';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($domainName !== null) {
            $resourcePath = str_replace(
                '{' . 'domainName' . '}',
                $this->objectSerializer->toPathValue($domainName),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
        ];

        // for model (json/xml)
        if (count($formParams) > 0) {
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
     * Create response for operation 'verifyDomain'
     * @throws ApiException on non-2xx response
     * @return null
     */
    private function verifyDomainResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
     * Adapt given ApiException for operation 'verifyDomain'
     */
    private function verifyDomainApiException(ApiException $apiException): ApiException
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

}
