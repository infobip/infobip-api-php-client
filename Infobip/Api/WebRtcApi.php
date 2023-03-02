<?php

// phpcs:ignorefile

/**
 * WebRtcApi
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

final class WebRtcApi
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
     * Operation deletePushConfiguration
     *
     * Delete WebRTC push configuration
     *
     * @param string $id Id of the WebRTC push configuration to delete. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function deletePushConfiguration(string $id)
    {
        $request = $this->deletePushConfigurationRequest($id);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->deletePushConfigurationResponse($response, $request->getUri());
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
            throw $this->deletePushConfigurationApiException($exception);
        }
    }

    /**
     * Operation deletePushConfigurationAsync
     *
     * Delete WebRTC push configuration
     *
     * @param string $id Id of the WebRTC push configuration to delete. (required)
     *
     * @throws InvalidArgumentException
     */
    public function deletePushConfigurationAsync(string $id): PromiseInterface
    {
        $request = $this->deletePushConfigurationRequest($id);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->deletePushConfigurationResponse($response, $request->getUri());
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

                    throw $this->deletePushConfigurationApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'deletePushConfiguration'
     *
     * @param string $id Id of the WebRTC push configuration to delete. (required)
     *
     * @throws InvalidArgumentException
     */
    private function deletePushConfigurationRequest(string $id): Request
    {
        $allData = [
             'id' => $id,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'id' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/webrtc/1/webrtc-push-config/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                $this->objectSerializer->toPathValue($id),
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
     * Create response for operation 'deletePushConfiguration'
     * @throws ApiException on non-2xx response
     * @return null
     */
    private function deletePushConfigurationResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
     * Adapt given ApiException for operation 'deletePushConfiguration'
     */
    private function deletePushConfigurationApiException(ApiException $apiException): ApiException
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
     * Operation generateWebRtcToken
     *
     * Generate WebRTC Token
     *
     * @param \Infobip\Model\WebRtcTokenRequestModel $webRtcTokenRequestModel webRtcTokenRequestModel (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WebRtcTokenResponseModel
     */
    public function generateWebRtcToken(\Infobip\Model\WebRtcTokenRequestModel $webRtcTokenRequestModel)
    {
        $request = $this->generateWebRtcTokenRequest($webRtcTokenRequestModel);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->generateWebRtcTokenResponse($response, $request->getUri());
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
            throw $this->generateWebRtcTokenApiException($exception);
        }
    }

    /**
     * Operation generateWebRtcTokenAsync
     *
     * Generate WebRTC Token
     *
     * @param \Infobip\Model\WebRtcTokenRequestModel $webRtcTokenRequestModel (required)
     *
     * @throws InvalidArgumentException
     */
    public function generateWebRtcTokenAsync(\Infobip\Model\WebRtcTokenRequestModel $webRtcTokenRequestModel): PromiseInterface
    {
        $request = $this->generateWebRtcTokenRequest($webRtcTokenRequestModel);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->generateWebRtcTokenResponse($response, $request->getUri());
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

                    throw $this->generateWebRtcTokenApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'generateWebRtcToken'
     *
     * @param \Infobip\Model\WebRtcTokenRequestModel $webRtcTokenRequestModel (required)
     *
     * @throws InvalidArgumentException
     */
    private function generateWebRtcTokenRequest(\Infobip\Model\WebRtcTokenRequestModel $webRtcTokenRequestModel): Request
    {
        $allData = [
             'webRtcTokenRequestModel' => $webRtcTokenRequestModel,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'webRtcTokenRequestModel' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/webrtc/1/token';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($webRtcTokenRequestModel)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($webRtcTokenRequestModel)
                : $webRtcTokenRequestModel;
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
     * Create response for operation 'generateWebRtcToken'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WebRtcTokenResponseModel|null
     */
    private function generateWebRtcTokenResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WebRtcTokenResponseModel', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'generateWebRtcToken'
     */
    private function generateWebRtcTokenApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();


        return $apiException;
    }

    /**
     * Operation getPushConfiguration
     *
     * Get WebRTC push configuration
     *
     * @param string $id Id of the WebRTC push configuration to get. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WebRtcPushConfigurationResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getPushConfiguration(string $id)
    {
        $request = $this->getPushConfigurationRequest($id);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getPushConfigurationResponse($response, $request->getUri());
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
            throw $this->getPushConfigurationApiException($exception);
        }
    }

    /**
     * Operation getPushConfigurationAsync
     *
     * Get WebRTC push configuration
     *
     * @param string $id Id of the WebRTC push configuration to get. (required)
     *
     * @throws InvalidArgumentException
     */
    public function getPushConfigurationAsync(string $id): PromiseInterface
    {
        $request = $this->getPushConfigurationRequest($id);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getPushConfigurationResponse($response, $request->getUri());
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

                    throw $this->getPushConfigurationApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getPushConfiguration'
     *
     * @param string $id Id of the WebRTC push configuration to get. (required)
     *
     * @throws InvalidArgumentException
     */
    private function getPushConfigurationRequest(string $id): Request
    {
        $allData = [
             'id' => $id,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'id' => [
                        new Assert\NotBlank(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/webrtc/1/webrtc-push-config/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                $this->objectSerializer->toPathValue($id),
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
     * Create response for operation 'getPushConfiguration'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WebRtcPushConfigurationResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getPushConfigurationResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WebRtcPushConfigurationResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getPushConfiguration'
     */
    private function getPushConfigurationApiException(ApiException $apiException): ApiException
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
     * Operation getPushConfigurations
     *
     * Get WebRTC push configurations
     *
     * @param int $page Results page to retrieve (0..N). (required)
     * @param int $size Number of records per page. (required)
     * @param null|string $applicationId Id of the application to associate the push configuration with. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WebRtcPushConfigurationPageResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getPushConfigurations(int $page, int $size, ?string $applicationId = null)
    {
        $request = $this->getPushConfigurationsRequest($page, $size, $applicationId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getPushConfigurationsResponse($response, $request->getUri());
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
            throw $this->getPushConfigurationsApiException($exception);
        }
    }

    /**
     * Operation getPushConfigurationsAsync
     *
     * Get WebRTC push configurations
     *
     * @param int $page Results page to retrieve (0..N). (required)
     * @param int $size Number of records per page. (required)
     * @param null|string $applicationId Id of the application to associate the push configuration with. (optional)
     *
     * @throws InvalidArgumentException
     */
    public function getPushConfigurationsAsync(int $page, int $size, ?string $applicationId = null): PromiseInterface
    {
        $request = $this->getPushConfigurationsRequest($page, $size, $applicationId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getPushConfigurationsResponse($response, $request->getUri());
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

                    throw $this->getPushConfigurationsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getPushConfigurations'
     *
     * @param int $page Results page to retrieve (0..N). (required)
     * @param int $size Number of records per page. (required)
     * @param null|string $applicationId Id of the application to associate the push configuration with. (optional)
     *
     * @throws InvalidArgumentException
     */
    private function getPushConfigurationsRequest(int $page, int $size, ?string $applicationId = null): Request
    {
        $allData = [
             'page' => $page,
             'size' => $size,
             'applicationId' => $applicationId,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'page' => [
                        new Assert\NotBlank(),
                        new Assert\GreaterThan(0),
                    ],
                    'size' => [
                        new Assert\NotBlank(),
                        new Assert\LessThan(100),
                        new Assert\GreaterThan(1),
                    ],
                    'applicationId' => [
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/webrtc/1/webrtc-push-config';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($applicationId !== null) {
            $queryParams['applicationId'] = $applicationId;
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
     * Create response for operation 'getPushConfigurations'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WebRtcPushConfigurationPageResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getPushConfigurationsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WebRtcPushConfigurationPageResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getPushConfigurations'
     */
    private function getPushConfigurationsApiException(ApiException $apiException): ApiException
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
     * Operation savePushConfiguration
     *
     * Create WebRTC push configuration
     *
     * @param \Infobip\Model\WebRtcPushConfigurationRequest $webRtcPushConfigurationRequest webRtcPushConfigurationRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WebRtcPushConfigurationResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function savePushConfiguration(\Infobip\Model\WebRtcPushConfigurationRequest $webRtcPushConfigurationRequest)
    {
        $request = $this->savePushConfigurationRequest($webRtcPushConfigurationRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->savePushConfigurationResponse($response, $request->getUri());
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
            throw $this->savePushConfigurationApiException($exception);
        }
    }

    /**
     * Operation savePushConfigurationAsync
     *
     * Create WebRTC push configuration
     *
     * @param \Infobip\Model\WebRtcPushConfigurationRequest $webRtcPushConfigurationRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function savePushConfigurationAsync(\Infobip\Model\WebRtcPushConfigurationRequest $webRtcPushConfigurationRequest): PromiseInterface
    {
        $request = $this->savePushConfigurationRequest($webRtcPushConfigurationRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->savePushConfigurationResponse($response, $request->getUri());
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

                    throw $this->savePushConfigurationApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'savePushConfiguration'
     *
     * @param \Infobip\Model\WebRtcPushConfigurationRequest $webRtcPushConfigurationRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function savePushConfigurationRequest(\Infobip\Model\WebRtcPushConfigurationRequest $webRtcPushConfigurationRequest): Request
    {
        $allData = [
             'webRtcPushConfigurationRequest' => $webRtcPushConfigurationRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'webRtcPushConfigurationRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/webrtc/1/webrtc-push-config';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($webRtcPushConfigurationRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($webRtcPushConfigurationRequest)
                : $webRtcPushConfigurationRequest;
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
     * Create response for operation 'savePushConfiguration'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WebRtcPushConfigurationResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function savePushConfigurationResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WebRtcPushConfigurationResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'savePushConfiguration'
     */
    private function savePushConfigurationApiException(ApiException $apiException): ApiException
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
     * Operation updatePushConfiguration
     *
     * Update WebRTC push configuration
     *
     * @param string $id Id of the WebRTC push configuration to update. (required)
     * @param \Infobip\Model\WebRtcPushConfigurationRequest $webRtcPushConfigurationRequest webRtcPushConfigurationRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\WebRtcPushConfigurationResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function updatePushConfiguration(string $id, \Infobip\Model\WebRtcPushConfigurationRequest $webRtcPushConfigurationRequest)
    {
        $request = $this->updatePushConfigurationRequest($id, $webRtcPushConfigurationRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->updatePushConfigurationResponse($response, $request->getUri());
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
            throw $this->updatePushConfigurationApiException($exception);
        }
    }

    /**
     * Operation updatePushConfigurationAsync
     *
     * Update WebRTC push configuration
     *
     * @param string $id Id of the WebRTC push configuration to update. (required)
     * @param \Infobip\Model\WebRtcPushConfigurationRequest $webRtcPushConfigurationRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function updatePushConfigurationAsync(string $id, \Infobip\Model\WebRtcPushConfigurationRequest $webRtcPushConfigurationRequest): PromiseInterface
    {
        $request = $this->updatePushConfigurationRequest($id, $webRtcPushConfigurationRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->updatePushConfigurationResponse($response, $request->getUri());
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

                    throw $this->updatePushConfigurationApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'updatePushConfiguration'
     *
     * @param string $id Id of the WebRTC push configuration to update. (required)
     * @param \Infobip\Model\WebRtcPushConfigurationRequest $webRtcPushConfigurationRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function updatePushConfigurationRequest(string $id, \Infobip\Model\WebRtcPushConfigurationRequest $webRtcPushConfigurationRequest): Request
    {
        $allData = [
             'id' => $id,
             'webRtcPushConfigurationRequest' => $webRtcPushConfigurationRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'id' => [
                        new Assert\NotBlank(),
                    ],
                    'webRtcPushConfigurationRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/webrtc/1/webrtc-push-config/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                $this->objectSerializer->toPathValue($id),
                $resourcePath
            );
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($webRtcPushConfigurationRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($webRtcPushConfigurationRequest)
                : $webRtcPushConfigurationRequest;
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
     * Create response for operation 'updatePushConfiguration'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\WebRtcPushConfigurationResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function updatePushConfigurationResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\WebRtcPushConfigurationResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'updatePushConfiguration'
     */
    private function updatePushConfigurationApiException(ApiException $apiException): ApiException
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
}
