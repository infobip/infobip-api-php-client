<?php

// phpcs:ignorefile

/**
 * MmsApi
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

final class MmsApi
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
     * Operation getInboundMmsMessages
     *
     * Get inbound MMS messages
     *
     * @param null|int $limit Maximal number of delivery reports that will be returned. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\MmsInboundReportResponse
     */
    public function getInboundMmsMessages(?int $limit = null)
    {
        $request = $this->getInboundMmsMessagesRequest($limit);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getInboundMmsMessagesResponse($response, $request->getUri());
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
            throw $this->getInboundMmsMessagesApiException($exception);
        }
    }

    /**
     * Operation getInboundMmsMessagesAsync
     *
     * Get inbound MMS messages
     *
     * @param null|int $limit Maximal number of delivery reports that will be returned. (optional)
     *
     * @throws InvalidArgumentException
     */
    public function getInboundMmsMessagesAsync(?int $limit = null): PromiseInterface
    {
        $request = $this->getInboundMmsMessagesRequest($limit);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getInboundMmsMessagesResponse($response, $request->getUri());
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

                    throw $this->getInboundMmsMessagesApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getInboundMmsMessages'
     *
     * @param null|int $limit Maximal number of delivery reports that will be returned. (optional)
     *
     * @throws InvalidArgumentException
     */
    private function getInboundMmsMessagesRequest(?int $limit = null): Request
    {
        $allData = [
             'limit' => $limit,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'limit' => [
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/mms/1/inbox/reports';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($limit !== null) {
            $queryParams['limit'] = $limit;
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
     * Create response for operation 'getInboundMmsMessages'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\MmsInboundReportResponse|null
     */
    private function getInboundMmsMessagesResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\MmsInboundReportResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getInboundMmsMessages'
     */
    private function getInboundMmsMessagesApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();


        return $apiException;
    }

    /**
     * Operation getOutboundMmsMessageDeliveryReports
     *
     * Get outbound MMS message delivery reports
     *
     * @param null|string $bulkId ID of bulk for which a delivery report is requested. (optional)
     * @param null|string $messageId ID of MMS for which a delivery report is requested. (optional)
     * @param null|int $limit Maximal number of delivery reports that will be returned. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\MmsReportResponse
     */
    public function getOutboundMmsMessageDeliveryReports(?string $bulkId = null, ?string $messageId = null, ?int $limit = null)
    {
        $request = $this->getOutboundMmsMessageDeliveryReportsRequest($bulkId, $messageId, $limit);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getOutboundMmsMessageDeliveryReportsResponse($response, $request->getUri());
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
            throw $this->getOutboundMmsMessageDeliveryReportsApiException($exception);
        }
    }

    /**
     * Operation getOutboundMmsMessageDeliveryReportsAsync
     *
     * Get outbound MMS message delivery reports
     *
     * @param null|string $bulkId ID of bulk for which a delivery report is requested. (optional)
     * @param null|string $messageId ID of MMS for which a delivery report is requested. (optional)
     * @param null|int $limit Maximal number of delivery reports that will be returned. (optional)
     *
     * @throws InvalidArgumentException
     */
    public function getOutboundMmsMessageDeliveryReportsAsync(?string $bulkId = null, ?string $messageId = null, ?int $limit = null): PromiseInterface
    {
        $request = $this->getOutboundMmsMessageDeliveryReportsRequest($bulkId, $messageId, $limit);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getOutboundMmsMessageDeliveryReportsResponse($response, $request->getUri());
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

                    throw $this->getOutboundMmsMessageDeliveryReportsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getOutboundMmsMessageDeliveryReports'
     *
     * @param null|string $bulkId ID of bulk for which a delivery report is requested. (optional)
     * @param null|string $messageId ID of MMS for which a delivery report is requested. (optional)
     * @param null|int $limit Maximal number of delivery reports that will be returned. (optional)
     *
     * @throws InvalidArgumentException
     */
    private function getOutboundMmsMessageDeliveryReportsRequest(?string $bulkId = null, ?string $messageId = null, ?int $limit = null): Request
    {
        $allData = [
             'bulkId' => $bulkId,
             'messageId' => $messageId,
             'limit' => $limit,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'bulkId' => [
                    ],
                    'messageId' => [
                    ],
                    'limit' => [
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/mms/1/reports';
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
        if ($limit !== null) {
            $queryParams['limit'] = $limit;
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
     * Create response for operation 'getOutboundMmsMessageDeliveryReports'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\MmsReportResponse|null
     */
    private function getOutboundMmsMessageDeliveryReportsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\MmsReportResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getOutboundMmsMessageDeliveryReports'
     */
    private function getOutboundMmsMessageDeliveryReportsApiException(ApiException $apiException): ApiException
    {
        $statusCode = $apiException->getCode();


        return $apiException;
    }

    /**
     * Operation sendMmsMessage
     *
     * Send MMS message
     *
     * @param \Infobip\Model\MmsAdvancedRequest $mmsAdvancedRequest mmsAdvancedRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\MmsSendResult|\Infobip\Model\ApiException|object|object
     */
    public function sendMmsMessage(\Infobip\Model\MmsAdvancedRequest $mmsAdvancedRequest)
    {
        $request = $this->sendMmsMessageRequest($mmsAdvancedRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendMmsMessageResponse($response, $request->getUri());
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
            throw $this->sendMmsMessageApiException($exception);
        }
    }

    /**
     * Operation sendMmsMessageAsync
     *
     * Send MMS message
     *
     * @param \Infobip\Model\MmsAdvancedRequest $mmsAdvancedRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendMmsMessageAsync(\Infobip\Model\MmsAdvancedRequest $mmsAdvancedRequest): PromiseInterface
    {
        $request = $this->sendMmsMessageRequest($mmsAdvancedRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendMmsMessageResponse($response, $request->getUri());
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

                    throw $this->sendMmsMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendMmsMessage'
     *
     * @param \Infobip\Model\MmsAdvancedRequest $mmsAdvancedRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendMmsMessageRequest(\Infobip\Model\MmsAdvancedRequest $mmsAdvancedRequest): Request
    {
        $allData = [
             'mmsAdvancedRequest' => $mmsAdvancedRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'mmsAdvancedRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/mms/1/advanced';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($mmsAdvancedRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($mmsAdvancedRequest)
                : $mmsAdvancedRequest;
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
     * Create response for operation 'sendMmsMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\MmsSendResult|\Infobip\Model\ApiException|object|object|null
     */
    private function sendMmsMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\MmsSendResult', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendMmsMessage'
     */
    private function sendMmsMessageApiException(ApiException $apiException): ApiException
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
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                'object',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                'object',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation uploadBinary
     *
     * Upload binary content
     *
     * @param string $xContentId ContentId that uniquely identifies the binary content. (required)
     * @param string $xMediaType Content mime type. Should be populated by standard MIME types (IANA media types). (required)
     * @param \SplFileObject $body body (required)
     * @param int $xValidityPeriodMinutes Validity period in minutes after which the content will be deleted. (default: 69120 minutes). (optional, default to 69120)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|object|\Infobip\Model\MmsUploadBinaryResult|object
     */
    public function uploadBinary(string $xContentId, string $xMediaType, \SplFileObject $body, int $xValidityPeriodMinutes = 69120)
    {
        $request = $this->uploadBinaryRequest($xContentId, $xMediaType, $body, $xValidityPeriodMinutes);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->uploadBinaryResponse($response, $request->getUri());
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
            throw $this->uploadBinaryApiException($exception);
        }
    }

    /**
     * Operation uploadBinaryAsync
     *
     * Upload binary content
     *
     * @param string $xContentId ContentId that uniquely identifies the binary content. (required)
     * @param string $xMediaType Content mime type. Should be populated by standard MIME types (IANA media types). (required)
     * @param \SplFileObject $body (required)
     * @param int $xValidityPeriodMinutes Validity period in minutes after which the content will be deleted. (default: 69120 minutes). (optional, default to 69120)
     *
     * @throws InvalidArgumentException
     */
    public function uploadBinaryAsync(string $xContentId, string $xMediaType, \SplFileObject $body, int $xValidityPeriodMinutes = 69120): PromiseInterface
    {
        $request = $this->uploadBinaryRequest($xContentId, $xMediaType, $body, $xValidityPeriodMinutes);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->uploadBinaryResponse($response, $request->getUri());
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

                    throw $this->uploadBinaryApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'uploadBinary'
     *
     * @param string $xContentId ContentId that uniquely identifies the binary content. (required)
     * @param string $xMediaType Content mime type. Should be populated by standard MIME types (IANA media types). (required)
     * @param \SplFileObject $body (required)
     * @param int $xValidityPeriodMinutes Validity period in minutes after which the content will be deleted. (default: 69120 minutes). (optional, default to 69120)
     *
     * @throws InvalidArgumentException
     */
    private function uploadBinaryRequest(string $xContentId, string $xMediaType, \SplFileObject $body, int $xValidityPeriodMinutes = 69120): Request
    {
        $allData = [
             'xContentId' => $xContentId,
             'xMediaType' => $xMediaType,
             'body' => $body,
             'xValidityPeriodMinutes' => $xValidityPeriodMinutes,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'xContentId' => [
                        new Assert\NotBlank(),
                    ],
                    'xMediaType' => [
                        new Assert\NotBlank(),
                    ],
                    'body' => [
                        new Assert\NotBlank(),
                    ],
                    'xValidityPeriodMinutes' => [
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/mms/1/content';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // header params
        if ($xContentId !== null) {
            $headerParams['X-Content-Id'] = $this->objectSerializer->toHeaderValue($xContentId);
        }

        // header params
        if ($xMediaType !== null) {
            $headerParams['X-Media-Type'] = $this->objectSerializer->toHeaderValue($xMediaType);
        }

        // header params
        if ($xValidityPeriodMinutes !== null) {
            $headerParams['X-Validity-Period-Minutes'] = $this->objectSerializer->toHeaderValue($xValidityPeriodMinutes);
        }

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/octet-stream',
        ];

        // for model (json/xml)
        if (isset($body)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($body)
                : $body;
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
     * Create response for operation 'uploadBinary'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|object|\Infobip\Model\MmsUploadBinaryResult|object|null
     */
    private function uploadBinaryResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\MmsUploadBinaryResult', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'uploadBinary'
     */
    private function uploadBinaryApiException(ApiException $apiException): ApiException
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
        if ($statusCode === 500) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                'object',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }
        if ($statusCode === 401) {
            $data = $this->objectSerializer->deserialize(
                $apiException->getResponseBody(),
                'object',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }
}
