<?php

// phpcs:ignorefile

/**
 * SmsApi
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

final class SmsApi
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
     * Operation getInboundSmsMessages
     *
     * Get inbound SMS messages
     *
     * @param null|int $limit Maximum number of messages to be returned in a response. If not set, the latest 50 records are returned. Maximum limit value is &#x60;1000&#x60; and you can only access messages for the last 48h. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\SmsInboundMessageResult
     */
    public function getInboundSmsMessages(?int $limit = null)
    {
        $request = $this->getInboundSmsMessagesRequest($limit);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getInboundSmsMessagesResponse($response, $request->getUri());
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
            throw $this->getInboundSmsMessagesApiException($exception);
        }
    }

    /**
     * Operation getInboundSmsMessagesAsync
     *
     * Get inbound SMS messages
     *
     * @param null|int $limit Maximum number of messages to be returned in a response. If not set, the latest 50 records are returned. Maximum limit value is &#x60;1000&#x60; and you can only access messages for the last 48h. (optional)
     *
     * @throws InvalidArgumentException
     */
    public function getInboundSmsMessagesAsync(?int $limit = null): PromiseInterface
    {
        $request = $this->getInboundSmsMessagesRequest($limit);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getInboundSmsMessagesResponse($response, $request->getUri());
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

                    throw $this->getInboundSmsMessagesApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getInboundSmsMessages'
     *
     * @param null|int $limit Maximum number of messages to be returned in a response. If not set, the latest 50 records are returned. Maximum limit value is &#x60;1000&#x60; and you can only access messages for the last 48h. (optional)
     *
     * @throws InvalidArgumentException
     */
    private function getInboundSmsMessagesRequest(?int $limit = null): Request
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

        $resourcePath = '/sms/1/inbox/reports';
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
     * Create response for operation 'getInboundSmsMessages'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\SmsInboundMessageResult|null
     */
    private function getInboundSmsMessagesResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\SmsInboundMessageResult', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getInboundSmsMessages'
     */
    private function getInboundSmsMessagesApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\SmsInboundMessageResult',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation getOutboundSmsMessageDeliveryReports
     *
     * Get outbound SMS message delivery reports
     *
     * @param null|string $bulkId Unique ID assigned to the request if messaging multiple recipients or sending multiple messages via a single API request. (optional)
     * @param null|string $messageId Unique message ID for which a report is requested. (optional)
     * @param int $limit Maximum number of delivery reports to be returned. If not set, the latest 50 records are returned. Maximum limit value is &#x60;1000&#x60; and you can only access reports for the last 48h. (optional, default to 50)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\SmsDeliveryResult|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getOutboundSmsMessageDeliveryReports(?string $bulkId = null, ?string $messageId = null, int $limit = 50)
    {
        $request = $this->getOutboundSmsMessageDeliveryReportsRequest($bulkId, $messageId, $limit);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getOutboundSmsMessageDeliveryReportsResponse($response, $request->getUri());
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
            throw $this->getOutboundSmsMessageDeliveryReportsApiException($exception);
        }
    }

    /**
     * Operation getOutboundSmsMessageDeliveryReportsAsync
     *
     * Get outbound SMS message delivery reports
     *
     * @param null|string $bulkId Unique ID assigned to the request if messaging multiple recipients or sending multiple messages via a single API request. (optional)
     * @param null|string $messageId Unique message ID for which a report is requested. (optional)
     * @param int $limit Maximum number of delivery reports to be returned. If not set, the latest 50 records are returned. Maximum limit value is &#x60;1000&#x60; and you can only access reports for the last 48h. (optional, default to 50)
     *
     * @throws InvalidArgumentException
     */
    public function getOutboundSmsMessageDeliveryReportsAsync(?string $bulkId = null, ?string $messageId = null, int $limit = 50): PromiseInterface
    {
        $request = $this->getOutboundSmsMessageDeliveryReportsRequest($bulkId, $messageId, $limit);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getOutboundSmsMessageDeliveryReportsResponse($response, $request->getUri());
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

                    throw $this->getOutboundSmsMessageDeliveryReportsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getOutboundSmsMessageDeliveryReports'
     *
     * @param null|string $bulkId Unique ID assigned to the request if messaging multiple recipients or sending multiple messages via a single API request. (optional)
     * @param null|string $messageId Unique message ID for which a report is requested. (optional)
     * @param int $limit Maximum number of delivery reports to be returned. If not set, the latest 50 records are returned. Maximum limit value is &#x60;1000&#x60; and you can only access reports for the last 48h. (optional, default to 50)
     *
     * @throws InvalidArgumentException
     */
    private function getOutboundSmsMessageDeliveryReportsRequest(?string $bulkId = null, ?string $messageId = null, int $limit = 50): Request
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
                        new Assert\LessThan(1000),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/sms/1/reports';
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
     * Create response for operation 'getOutboundSmsMessageDeliveryReports'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\SmsDeliveryResult|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getOutboundSmsMessageDeliveryReportsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\SmsDeliveryResult', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getOutboundSmsMessageDeliveryReports'
     */
    private function getOutboundSmsMessageDeliveryReportsApiException(ApiException $apiException): ApiException
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
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation getOutboundSmsMessageLogs
     *
     * Get outbound SMS message logs
     *
     * @param null|string $from The sender ID which can be alphanumeric or numeric. (optional)
     * @param null|string $to Message destination address. (optional)
     * @param null|string[] $bulkId Unique ID assigned to the request if messaging multiple recipients or sending multiple messages via a single API request. (optional)
     * @param null|string[] $messageId Unique message ID for which a log is requested. (optional)
     * @param null|string $generalStatus Sent [message status](https://www.infobip.com/docs/essentials/response-status-and-error-codes#api-status-codes). Possible values: &#x60;ACCEPTED&#x60;, &#x60;PENDING&#x60;, &#x60;UNDELIVERABLE&#x60;, &#x60;DELIVERED&#x60;, &#x60;REJECTED&#x60;, &#x60;EXPIRED&#x60;. (optional)
     * @param null|\DateTime $sentSince The logs will only include messages sent after this date. Use it together with &#x60;sentUntil&#x60; to return a time range or if you want to fetch more than 1000 logs allowed per call. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ&#x60;. (optional)
     * @param null|\DateTime $sentUntil The logs will only include messages sent before this date. Use it together with &#x60;sentBefore&#x60; to return a time range or if you want to fetch more than 1000 logs allowed per call. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ&#x60;. (optional)
     * @param null|int $limit Maximum number of messages to include in logs. If not set, the latest 50 records are returned. Maximum limit value is &#x60;1000&#x60; and you can only access logs for the last 48h. If you want to fetch more than 1000 logs allowed per call, use &#x60;sentBefore&#x60; and &#x60;sentUntil&#x60; to retrieve them in pages. (optional)
     * @param null|string $mcc Mobile Country Code. (optional)
     * @param null|string $mnc Mobile Network Code. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\SmsLogsResponse
     */
    public function getOutboundSmsMessageLogs(?string $from = null, ?string $to = null, ?array $bulkId = null, ?array $messageId = null, ?string $generalStatus = null, ?\DateTime $sentSince = null, ?\DateTime $sentUntil = null, ?int $limit = null, ?string $mcc = null, ?string $mnc = null)
    {
        $request = $this->getOutboundSmsMessageLogsRequest($from, $to, $bulkId, $messageId, $generalStatus, $sentSince, $sentUntil, $limit, $mcc, $mnc);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getOutboundSmsMessageLogsResponse($response, $request->getUri());
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
            throw $this->getOutboundSmsMessageLogsApiException($exception);
        }
    }

    /**
     * Operation getOutboundSmsMessageLogsAsync
     *
     * Get outbound SMS message logs
     *
     * @param null|string $from The sender ID which can be alphanumeric or numeric. (optional)
     * @param null|string $to Message destination address. (optional)
     * @param null|string[] $bulkId Unique ID assigned to the request if messaging multiple recipients or sending multiple messages via a single API request. (optional)
     * @param null|string[] $messageId Unique message ID for which a log is requested. (optional)
     * @param null|string $generalStatus Sent [message status](https://www.infobip.com/docs/essentials/response-status-and-error-codes#api-status-codes). Possible values: &#x60;ACCEPTED&#x60;, &#x60;PENDING&#x60;, &#x60;UNDELIVERABLE&#x60;, &#x60;DELIVERED&#x60;, &#x60;REJECTED&#x60;, &#x60;EXPIRED&#x60;. (optional)
     * @param null|\DateTime $sentSince The logs will only include messages sent after this date. Use it together with &#x60;sentUntil&#x60; to return a time range or if you want to fetch more than 1000 logs allowed per call. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ&#x60;. (optional)
     * @param null|\DateTime $sentUntil The logs will only include messages sent before this date. Use it together with &#x60;sentBefore&#x60; to return a time range or if you want to fetch more than 1000 logs allowed per call. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ&#x60;. (optional)
     * @param null|int $limit Maximum number of messages to include in logs. If not set, the latest 50 records are returned. Maximum limit value is &#x60;1000&#x60; and you can only access logs for the last 48h. If you want to fetch more than 1000 logs allowed per call, use &#x60;sentBefore&#x60; and &#x60;sentUntil&#x60; to retrieve them in pages. (optional)
     * @param null|string $mcc Mobile Country Code. (optional)
     * @param null|string $mnc Mobile Network Code. (optional)
     *
     * @throws InvalidArgumentException
     */
    public function getOutboundSmsMessageLogsAsync(?string $from = null, ?string $to = null, ?array $bulkId = null, ?array $messageId = null, ?string $generalStatus = null, ?\DateTime $sentSince = null, ?\DateTime $sentUntil = null, ?int $limit = null, ?string $mcc = null, ?string $mnc = null): PromiseInterface
    {
        $request = $this->getOutboundSmsMessageLogsRequest($from, $to, $bulkId, $messageId, $generalStatus, $sentSince, $sentUntil, $limit, $mcc, $mnc);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getOutboundSmsMessageLogsResponse($response, $request->getUri());
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

                    throw $this->getOutboundSmsMessageLogsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getOutboundSmsMessageLogs'
     *
     * @param null|string $from The sender ID which can be alphanumeric or numeric. (optional)
     * @param null|string $to Message destination address. (optional)
     * @param null|string[] $bulkId Unique ID assigned to the request if messaging multiple recipients or sending multiple messages via a single API request. (optional)
     * @param null|string[] $messageId Unique message ID for which a log is requested. (optional)
     * @param null|string $generalStatus Sent [message status](https://www.infobip.com/docs/essentials/response-status-and-error-codes#api-status-codes). Possible values: &#x60;ACCEPTED&#x60;, &#x60;PENDING&#x60;, &#x60;UNDELIVERABLE&#x60;, &#x60;DELIVERED&#x60;, &#x60;REJECTED&#x60;, &#x60;EXPIRED&#x60;. (optional)
     * @param null|\DateTime $sentSince The logs will only include messages sent after this date. Use it together with &#x60;sentUntil&#x60; to return a time range or if you want to fetch more than 1000 logs allowed per call. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ&#x60;. (optional)
     * @param null|\DateTime $sentUntil The logs will only include messages sent before this date. Use it together with &#x60;sentBefore&#x60; to return a time range or if you want to fetch more than 1000 logs allowed per call. Has the following format: &#x60;yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ&#x60;. (optional)
     * @param null|int $limit Maximum number of messages to include in logs. If not set, the latest 50 records are returned. Maximum limit value is &#x60;1000&#x60; and you can only access logs for the last 48h. If you want to fetch more than 1000 logs allowed per call, use &#x60;sentBefore&#x60; and &#x60;sentUntil&#x60; to retrieve them in pages. (optional)
     * @param null|string $mcc Mobile Country Code. (optional)
     * @param null|string $mnc Mobile Network Code. (optional)
     *
     * @throws InvalidArgumentException
     */
    private function getOutboundSmsMessageLogsRequest(?string $from = null, ?string $to = null, ?array $bulkId = null, ?array $messageId = null, ?string $generalStatus = null, ?\DateTime $sentSince = null, ?\DateTime $sentUntil = null, ?int $limit = null, ?string $mcc = null, ?string $mnc = null): Request
    {
        $allData = [
             'from' => $from,
             'to' => $to,
             'bulkId' => $bulkId,
             'messageId' => $messageId,
             'generalStatus' => $generalStatus,
             'sentSince' => $sentSince,
             'sentUntil' => $sentUntil,
             'limit' => $limit,
             'mcc' => $mcc,
             'mnc' => $mnc,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'from' => [
                    ],
                    'to' => [
                    ],
                    'bulkId' => [
                    ],
                    'messageId' => [
                    ],
                    'generalStatus' => [
                    ],
                    'sentSince' => [
                    ],
                    'sentUntil' => [
                    ],
                    'limit' => [
                    ],
                    'mcc' => [
                    ],
                    'mnc' => [
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/sms/1/logs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

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
        if ($messageId !== null) {
            $queryParams['messageId'] = $messageId;
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
        if ($mcc !== null) {
            $queryParams['mcc'] = $mcc;
        }

        // query params
        if ($mnc !== null) {
            $queryParams['mnc'] = $mnc;
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
     * Create response for operation 'getOutboundSmsMessageLogs'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\SmsLogsResponse|null
     */
    private function getOutboundSmsMessageLogsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\SmsLogsResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getOutboundSmsMessageLogs'
     */
    private function getOutboundSmsMessageLogsApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\SmsLogsResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation getScheduledSmsMessages
     *
     * Get scheduled SMS messages
     *
     * @param string $bulkId  (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\SmsBulkResponse
     */
    public function getScheduledSmsMessages(string $bulkId)
    {
        $request = $this->getScheduledSmsMessagesRequest($bulkId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getScheduledSmsMessagesResponse($response, $request->getUri());
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
            throw $this->getScheduledSmsMessagesApiException($exception);
        }
    }

    /**
     * Operation getScheduledSmsMessagesAsync
     *
     * Get scheduled SMS messages
     *
     * @param string $bulkId  (required)
     *
     * @throws InvalidArgumentException
     */
    public function getScheduledSmsMessagesAsync(string $bulkId): PromiseInterface
    {
        $request = $this->getScheduledSmsMessagesRequest($bulkId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getScheduledSmsMessagesResponse($response, $request->getUri());
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

                    throw $this->getScheduledSmsMessagesApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getScheduledSmsMessages'
     *
     * @param string $bulkId  (required)
     *
     * @throws InvalidArgumentException
     */
    private function getScheduledSmsMessagesRequest(string $bulkId): Request
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

        $resourcePath = '/sms/1/bulks';
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
     * Create response for operation 'getScheduledSmsMessages'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\SmsBulkResponse|null
     */
    private function getScheduledSmsMessagesResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\SmsBulkResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getScheduledSmsMessages'
     */
    private function getScheduledSmsMessagesApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\SmsBulkResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation getScheduledSmsMessagesStatus
     *
     * Get scheduled SMS messages status
     *
     * @param string $bulkId bulkId (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\SmsBulkStatusResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getScheduledSmsMessagesStatus(string $bulkId)
    {
        $request = $this->getScheduledSmsMessagesStatusRequest($bulkId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getScheduledSmsMessagesStatusResponse($response, $request->getUri());
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
            throw $this->getScheduledSmsMessagesStatusApiException($exception);
        }
    }

    /**
     * Operation getScheduledSmsMessagesStatusAsync
     *
     * Get scheduled SMS messages status
     *
     * @param string $bulkId (required)
     *
     * @throws InvalidArgumentException
     */
    public function getScheduledSmsMessagesStatusAsync(string $bulkId): PromiseInterface
    {
        $request = $this->getScheduledSmsMessagesStatusRequest($bulkId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getScheduledSmsMessagesStatusResponse($response, $request->getUri());
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

                    throw $this->getScheduledSmsMessagesStatusApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getScheduledSmsMessagesStatus'
     *
     * @param string $bulkId (required)
     *
     * @throws InvalidArgumentException
     */
    private function getScheduledSmsMessagesStatusRequest(string $bulkId): Request
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

        $resourcePath = '/sms/1/bulks/status';
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
     * Create response for operation 'getScheduledSmsMessagesStatus'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\SmsBulkStatusResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function getScheduledSmsMessagesStatusResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\SmsBulkStatusResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getScheduledSmsMessagesStatus'
     */
    private function getScheduledSmsMessagesStatusApiException(ApiException $apiException): ApiException
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
        if ($statusCode === 404) {
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
     * Operation previewSmsMessage
     *
     * Preview SMS message
     *
     * @param \Infobip\Model\SmsPreviewRequest $smsPreviewRequest smsPreviewRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\SmsPreviewResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function previewSmsMessage(\Infobip\Model\SmsPreviewRequest $smsPreviewRequest)
    {
        $request = $this->previewSmsMessageRequest($smsPreviewRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->previewSmsMessageResponse($response, $request->getUri());
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
            throw $this->previewSmsMessageApiException($exception);
        }
    }

    /**
     * Operation previewSmsMessageAsync
     *
     * Preview SMS message
     *
     * @param \Infobip\Model\SmsPreviewRequest $smsPreviewRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function previewSmsMessageAsync(\Infobip\Model\SmsPreviewRequest $smsPreviewRequest): PromiseInterface
    {
        $request = $this->previewSmsMessageRequest($smsPreviewRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->previewSmsMessageResponse($response, $request->getUri());
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

                    throw $this->previewSmsMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'previewSmsMessage'
     *
     * @param \Infobip\Model\SmsPreviewRequest $smsPreviewRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function previewSmsMessageRequest(\Infobip\Model\SmsPreviewRequest $smsPreviewRequest): Request
    {
        $allData = [
             'smsPreviewRequest' => $smsPreviewRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'smsPreviewRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/sms/1/preview';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($smsPreviewRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($smsPreviewRequest)
                : $smsPreviewRequest;
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
     * Create response for operation 'previewSmsMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\SmsPreviewResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function previewSmsMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\SmsPreviewResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'previewSmsMessage'
     */
    private function previewSmsMessageApiException(ApiException $apiException): ApiException
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
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation rescheduleSmsMessages
     *
     * Reschedule SMS messages
     *
     * @param string $bulkId  (required)
     * @param \Infobip\Model\SmsBulkRequest $smsBulkRequest smsBulkRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\SmsBulkResponse
     */
    public function rescheduleSmsMessages(string $bulkId, \Infobip\Model\SmsBulkRequest $smsBulkRequest)
    {
        $request = $this->rescheduleSmsMessagesRequest($bulkId, $smsBulkRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->rescheduleSmsMessagesResponse($response, $request->getUri());
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
            throw $this->rescheduleSmsMessagesApiException($exception);
        }
    }

    /**
     * Operation rescheduleSmsMessagesAsync
     *
     * Reschedule SMS messages
     *
     * @param string $bulkId  (required)
     * @param \Infobip\Model\SmsBulkRequest $smsBulkRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function rescheduleSmsMessagesAsync(string $bulkId, \Infobip\Model\SmsBulkRequest $smsBulkRequest): PromiseInterface
    {
        $request = $this->rescheduleSmsMessagesRequest($bulkId, $smsBulkRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->rescheduleSmsMessagesResponse($response, $request->getUri());
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

                    throw $this->rescheduleSmsMessagesApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'rescheduleSmsMessages'
     *
     * @param string $bulkId  (required)
     * @param \Infobip\Model\SmsBulkRequest $smsBulkRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function rescheduleSmsMessagesRequest(string $bulkId, \Infobip\Model\SmsBulkRequest $smsBulkRequest): Request
    {
        $allData = [
             'bulkId' => $bulkId,
             'smsBulkRequest' => $smsBulkRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'bulkId' => [
                        new Assert\NotBlank(),
                    ],
                    'smsBulkRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/sms/1/bulks';
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
        if (isset($smsBulkRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($smsBulkRequest)
                : $smsBulkRequest;
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
     * Create response for operation 'rescheduleSmsMessages'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\SmsBulkResponse|null
     */
    private function rescheduleSmsMessagesResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\SmsBulkResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'rescheduleSmsMessages'
     */
    private function rescheduleSmsMessagesApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\SmsBulkResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }

    /**
     * Operation sendBinarySmsMessage
     *
     * Send binary SMS message
     *
     * @param \Infobip\Model\SmsAdvancedBinaryRequest $smsAdvancedBinaryRequest smsAdvancedBinaryRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\SmsResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendBinarySmsMessage(\Infobip\Model\SmsAdvancedBinaryRequest $smsAdvancedBinaryRequest)
    {
        $request = $this->sendBinarySmsMessageRequest($smsAdvancedBinaryRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendBinarySmsMessageResponse($response, $request->getUri());
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
            throw $this->sendBinarySmsMessageApiException($exception);
        }
    }

    /**
     * Operation sendBinarySmsMessageAsync
     *
     * Send binary SMS message
     *
     * @param \Infobip\Model\SmsAdvancedBinaryRequest $smsAdvancedBinaryRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendBinarySmsMessageAsync(\Infobip\Model\SmsAdvancedBinaryRequest $smsAdvancedBinaryRequest): PromiseInterface
    {
        $request = $this->sendBinarySmsMessageRequest($smsAdvancedBinaryRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendBinarySmsMessageResponse($response, $request->getUri());
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

                    throw $this->sendBinarySmsMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendBinarySmsMessage'
     *
     * @param \Infobip\Model\SmsAdvancedBinaryRequest $smsAdvancedBinaryRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendBinarySmsMessageRequest(\Infobip\Model\SmsAdvancedBinaryRequest $smsAdvancedBinaryRequest): Request
    {
        $allData = [
             'smsAdvancedBinaryRequest' => $smsAdvancedBinaryRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'smsAdvancedBinaryRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/sms/2/binary/advanced';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($smsAdvancedBinaryRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($smsAdvancedBinaryRequest)
                : $smsAdvancedBinaryRequest;
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
     * Create response for operation 'sendBinarySmsMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\SmsResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendBinarySmsMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\SmsResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendBinarySmsMessage'
     */
    private function sendBinarySmsMessageApiException(ApiException $apiException): ApiException
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
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation sendSmsMessage
     *
     * Send SMS message
     *
     * @param \Infobip\Model\SmsAdvancedTextualRequest $smsAdvancedTextualRequest smsAdvancedTextualRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\SmsResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function sendSmsMessage(\Infobip\Model\SmsAdvancedTextualRequest $smsAdvancedTextualRequest)
    {
        $request = $this->sendSmsMessageRequest($smsAdvancedTextualRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendSmsMessageResponse($response, $request->getUri());
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
            throw $this->sendSmsMessageApiException($exception);
        }
    }

    /**
     * Operation sendSmsMessageAsync
     *
     * Send SMS message
     *
     * @param \Infobip\Model\SmsAdvancedTextualRequest $smsAdvancedTextualRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendSmsMessageAsync(\Infobip\Model\SmsAdvancedTextualRequest $smsAdvancedTextualRequest): PromiseInterface
    {
        $request = $this->sendSmsMessageRequest($smsAdvancedTextualRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendSmsMessageResponse($response, $request->getUri());
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

                    throw $this->sendSmsMessageApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendSmsMessage'
     *
     * @param \Infobip\Model\SmsAdvancedTextualRequest $smsAdvancedTextualRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendSmsMessageRequest(\Infobip\Model\SmsAdvancedTextualRequest $smsAdvancedTextualRequest): Request
    {
        $allData = [
             'smsAdvancedTextualRequest' => $smsAdvancedTextualRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'smsAdvancedTextualRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/sms/2/text/advanced';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($smsAdvancedTextualRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($smsAdvancedTextualRequest)
                : $smsAdvancedTextualRequest;
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
     * Create response for operation 'sendSmsMessage'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\SmsResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
     */
    private function sendSmsMessageResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\SmsResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendSmsMessage'
     */
    private function sendSmsMessageApiException(ApiException $apiException): ApiException
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
                '\Infobip\Model\ApiException',
                $apiException->getResponseHeaders()
            );

            $apiException->setResponseObject($data);

            return $apiException;
        }

        return $apiException;
    }

    /**
     * Operation updateScheduledSmsMessagesStatus
     *
     * Update scheduled SMS messages status
     *
     * @param string $bulkId  (required)
     * @param \Infobip\Model\SmsUpdateStatusRequest $smsUpdateStatusRequest smsUpdateStatusRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\SmsBulkStatusResponse
     */
    public function updateScheduledSmsMessagesStatus(string $bulkId, \Infobip\Model\SmsUpdateStatusRequest $smsUpdateStatusRequest)
    {
        $request = $this->updateScheduledSmsMessagesStatusRequest($bulkId, $smsUpdateStatusRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->updateScheduledSmsMessagesStatusResponse($response, $request->getUri());
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
            throw $this->updateScheduledSmsMessagesStatusApiException($exception);
        }
    }

    /**
     * Operation updateScheduledSmsMessagesStatusAsync
     *
     * Update scheduled SMS messages status
     *
     * @param string $bulkId  (required)
     * @param \Infobip\Model\SmsUpdateStatusRequest $smsUpdateStatusRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function updateScheduledSmsMessagesStatusAsync(string $bulkId, \Infobip\Model\SmsUpdateStatusRequest $smsUpdateStatusRequest): PromiseInterface
    {
        $request = $this->updateScheduledSmsMessagesStatusRequest($bulkId, $smsUpdateStatusRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->updateScheduledSmsMessagesStatusResponse($response, $request->getUri());
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

                    throw $this->updateScheduledSmsMessagesStatusApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'updateScheduledSmsMessagesStatus'
     *
     * @param string $bulkId  (required)
     * @param \Infobip\Model\SmsUpdateStatusRequest $smsUpdateStatusRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function updateScheduledSmsMessagesStatusRequest(string $bulkId, \Infobip\Model\SmsUpdateStatusRequest $smsUpdateStatusRequest): Request
    {
        $allData = [
             'bulkId' => $bulkId,
             'smsUpdateStatusRequest' => $smsUpdateStatusRequest,
        ];

        $validationConstraints = [];

        $this
            ->addParamConstraints(
                [
                    'bulkId' => [
                        new Assert\NotBlank(),
                    ],
                    'smsUpdateStatusRequest' => [
                        new Assert\NotNull(),
                    ],
                ],
                $validationConstraints
            );

        $this->validateParams($allData, $validationConstraints);

        $resourcePath = '/sms/1/bulks/status';
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
        if (isset($smsUpdateStatusRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($smsUpdateStatusRequest)
                : $smsUpdateStatusRequest;
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
     * Create response for operation 'updateScheduledSmsMessagesStatus'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\SmsBulkStatusResponse|null
     */
    private function updateScheduledSmsMessagesStatusResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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

        $responseResult = $this->deserialize($responseBody, '\Infobip\Model\SmsBulkStatusResponse', $responseHeaders);
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'updateScheduledSmsMessagesStatus'
     */
    private function updateScheduledSmsMessagesStatusApiException(ApiException $apiException): ApiException
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
            '\Infobip\Model\SmsBulkStatusResponse',
            $apiException->getResponseHeaders()
        );

        $apiException->setResponseObject($data);

        return $apiException;
    }
}
