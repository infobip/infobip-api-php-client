<?php

// phpcs:ignorefile

/**
 * MmsApi
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
     * @param null|int $limit Maximum number of delivery reports that will be returned. (optional)
     * @param null|string $applicationId [Application](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#application) identifier used for filtering. (optional)
     * @param null|string $entityId [Entity](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#entity) identifier used for filtering. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\MmsInboundReportResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
     */
    public function getInboundMmsMessages(?int $limit = null, ?string $applicationId = null, ?string $entityId = null)
    {
        $request = $this->getInboundMmsMessagesRequest($limit, $applicationId, $entityId);

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
     * @param null|int $limit Maximum number of delivery reports that will be returned. (optional)
     * @param null|string $applicationId [Application](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#application) identifier used for filtering. (optional)
     * @param null|string $entityId [Entity](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#entity) identifier used for filtering. (optional)
     *
     * @throws InvalidArgumentException
     */
    public function getInboundMmsMessagesAsync(?int $limit = null, ?string $applicationId = null, ?string $entityId = null): PromiseInterface
    {
        $request = $this->getInboundMmsMessagesRequest($limit, $applicationId, $entityId);

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
     * @param null|int $limit Maximum number of delivery reports that will be returned. (optional)
     * @param null|string $applicationId [Application](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#application) identifier used for filtering. (optional)
     * @param null|string $entityId [Entity](https://www.infobip.com/docs/cpaas-x/application-and-entity-management#entity) identifier used for filtering. (optional)
     *
     * @throws InvalidArgumentException
     */
    private function getInboundMmsMessagesRequest(?int $limit = null, ?string $applicationId = null, ?string $entityId = null): Request
    {
        $allData = [
             'limit' => $limit,
             'applicationId' => $applicationId,
             'entityId' => $entityId,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'limit' => [
                    ],
                    'applicationId' => [
                    ],
                    'entityId' => [
                    ],
                ]
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
     * Create response for operation 'getInboundMmsMessages'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\MmsInboundReportResponse|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
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
     * Operation getOutboundMmsMessageDeliveryReports
     *
     * Get MMS delivery reports
     *
     * @param null|string $bulkId The ID that uniquely identifies the request. Bulk ID will be received only when you send a message to more than one destination address. (optional)
     * @param null|string $messageId The ID that uniquely identifies the message sent. (optional)
     * @param int $limit Maximum number of delivery reports to be returned. If not set, the latest 50 records are returned. Maximum limit value is 1000 and you can only access reports for the last 48h (optional, default to 50)
     * @param null|string $entityId Entity id used to send the message. For more details, see our [documentation](https://www.infobip.com/docs/cpaas-x/application-and-entity-management). (optional)
     * @param null|string $applicationId Application id used to send the message. For more details, see our [documentation](https://www.infobip.com/docs/cpaas-x/application-and-entity-management). (optional)
     * @param null|string $campaignReferenceId ID of a campaign that was sent in the message. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\MmsReportResponse|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError
     */
    public function getOutboundMmsMessageDeliveryReports(?string $bulkId = null, ?string $messageId = null, int $limit = 50, ?string $entityId = null, ?string $applicationId = null, ?string $campaignReferenceId = null)
    {
        $request = $this->getOutboundMmsMessageDeliveryReportsRequest($bulkId, $messageId, $limit, $entityId, $applicationId, $campaignReferenceId);

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
     * Get MMS delivery reports
     *
     * @param null|string $bulkId The ID that uniquely identifies the request. Bulk ID will be received only when you send a message to more than one destination address. (optional)
     * @param null|string $messageId The ID that uniquely identifies the message sent. (optional)
     * @param int $limit Maximum number of delivery reports to be returned. If not set, the latest 50 records are returned. Maximum limit value is 1000 and you can only access reports for the last 48h (optional, default to 50)
     * @param null|string $entityId Entity id used to send the message. For more details, see our [documentation](https://www.infobip.com/docs/cpaas-x/application-and-entity-management). (optional)
     * @param null|string $applicationId Application id used to send the message. For more details, see our [documentation](https://www.infobip.com/docs/cpaas-x/application-and-entity-management). (optional)
     * @param null|string $campaignReferenceId ID of a campaign that was sent in the message. (optional)
     *
     * @throws InvalidArgumentException
     */
    public function getOutboundMmsMessageDeliveryReportsAsync(?string $bulkId = null, ?string $messageId = null, int $limit = 50, ?string $entityId = null, ?string $applicationId = null, ?string $campaignReferenceId = null): PromiseInterface
    {
        $request = $this->getOutboundMmsMessageDeliveryReportsRequest($bulkId, $messageId, $limit, $entityId, $applicationId, $campaignReferenceId);

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
     * @param null|string $bulkId The ID that uniquely identifies the request. Bulk ID will be received only when you send a message to more than one destination address. (optional)
     * @param null|string $messageId The ID that uniquely identifies the message sent. (optional)
     * @param int $limit Maximum number of delivery reports to be returned. If not set, the latest 50 records are returned. Maximum limit value is 1000 and you can only access reports for the last 48h (optional, default to 50)
     * @param null|string $entityId Entity id used to send the message. For more details, see our [documentation](https://www.infobip.com/docs/cpaas-x/application-and-entity-management). (optional)
     * @param null|string $applicationId Application id used to send the message. For more details, see our [documentation](https://www.infobip.com/docs/cpaas-x/application-and-entity-management). (optional)
     * @param null|string $campaignReferenceId ID of a campaign that was sent in the message. (optional)
     *
     * @throws InvalidArgumentException
     */
    private function getOutboundMmsMessageDeliveryReportsRequest(?string $bulkId = null, ?string $messageId = null, int $limit = 50, ?string $entityId = null, ?string $applicationId = null, ?string $campaignReferenceId = null): Request
    {
        $allData = [
             'bulkId' => $bulkId,
             'messageId' => $messageId,
             'limit' => $limit,
             'entityId' => $entityId,
             'applicationId' => $applicationId,
             'campaignReferenceId' => $campaignReferenceId,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'bulkId' => [
                    ],
                    'messageId' => [
                    ],
                    'limit' => [
                        new Assert\LessThanOrEqual(1000),
                    ],
                    'entityId' => [
                    ],
                    'applicationId' => [
                    ],
                    'campaignReferenceId' => [
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/mms/2/reports';
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

        // query params
        if ($entityId !== null) {
            $queryParams['entityId'] = $entityId;
        }

        // query params
        if ($applicationId !== null) {
            $queryParams['applicationId'] = $applicationId;
        }

        // query params
        if ($campaignReferenceId !== null) {
            $queryParams['campaignReferenceId'] = $campaignReferenceId;
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
     * Create response for operation 'getOutboundMmsMessageDeliveryReports'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\MmsReportResponse|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|null
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
     * Operation getOutboundMmsMessageLogs
     *
     * Get MMS message logs
     *
     * @param null|string $mcc Filter logs by mobile country code. (optional)
     * @param null|string $mnc Filter logs by mobile network code. (optional)
     * @param null|string $sender The sender ID which can be alphanumeric or numeric. (optional)
     * @param null|string $destination Message destination address. (optional)
     * @param null|string[] $bulkId Unique ID assigned to the request if messaging multiple recipients or sending multiple messages via a single API request. May contain multiple comma-separated values. Maximum length 2048 characters. (optional)
     * @param null|string[] $messageId Unique message ID for which a log is requested. May contain multiple comma-separated values. Maximum length 2048 characters. (optional)
     * @param null|\Infobip\Model\MessageGeneralStatus $generalStatus generalStatus (optional)
     * @param null|\DateTime $sentSince The logs will only include messages sent after this date. Use it together with sentUntil to return a time range or if you want to fetch more than 1000 logs allowed per call. Has the following format: yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ. (optional)
     * @param null|\DateTime $sentUntil The logs will only include messages sent before this date. Use it together with sentSince to return a time range or if you want to fetch more than 1000 logs allowed per call. Has the following format: yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ. (optional)
     * @param int $limit Maximum number of messages to include in logs. If not set, the latest 50 records are returned. Maximum limit value is 1000 and you can only access logs for the last 48h. If you want to fetch more than 1000 logs allowed per call, use sentBefore and sentUntil to retrieve them in pages. (optional, default to 50)
     * @param null|string $entityId Entity id used to send the message. For more details, see our [documentation](https://www.infobip.com/docs/cpaas-x/application-and-entity-management). (optional)
     * @param null|string $applicationId Application id used to send the message. For more details, see our [documentation](https://www.infobip.com/docs/cpaas-x/application-and-entity-management). (optional)
     * @param null|string[] $campaignReferenceId ID of a campaign that was sent in the message. May contain multiple comma-separated values. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\MmsLogsResponse|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError
     */
    public function getOutboundMmsMessageLogs(?string $mcc = null, ?string $mnc = null, ?string $sender = null, ?string $destination = null, ?array $bulkId = null, ?array $messageId = null, ?\Infobip\Model\MessageGeneralStatus $generalStatus = null, ?\DateTime $sentSince = null, ?\DateTime $sentUntil = null, int $limit = 50, ?string $entityId = null, ?string $applicationId = null, ?array $campaignReferenceId = null)
    {
        $request = $this->getOutboundMmsMessageLogsRequest($mcc, $mnc, $sender, $destination, $bulkId, $messageId, $generalStatus, $sentSince, $sentUntil, $limit, $entityId, $applicationId, $campaignReferenceId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getOutboundMmsMessageLogsResponse($response, $request->getUri());
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
            throw $this->getOutboundMmsMessageLogsApiException($exception);
        }
    }

    /**
     * Operation getOutboundMmsMessageLogsAsync
     *
     * Get MMS message logs
     *
     * @param null|string $mcc Filter logs by mobile country code. (optional)
     * @param null|string $mnc Filter logs by mobile network code. (optional)
     * @param null|string $sender The sender ID which can be alphanumeric or numeric. (optional)
     * @param null|string $destination Message destination address. (optional)
     * @param null|string[] $bulkId Unique ID assigned to the request if messaging multiple recipients or sending multiple messages via a single API request. May contain multiple comma-separated values. Maximum length 2048 characters. (optional)
     * @param null|string[] $messageId Unique message ID for which a log is requested. May contain multiple comma-separated values. Maximum length 2048 characters. (optional)
     * @param null|\Infobip\Model\MessageGeneralStatus $generalStatus (optional)
     * @param null|\DateTime $sentSince The logs will only include messages sent after this date. Use it together with sentUntil to return a time range or if you want to fetch more than 1000 logs allowed per call. Has the following format: yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ. (optional)
     * @param null|\DateTime $sentUntil The logs will only include messages sent before this date. Use it together with sentSince to return a time range or if you want to fetch more than 1000 logs allowed per call. Has the following format: yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ. (optional)
     * @param int $limit Maximum number of messages to include in logs. If not set, the latest 50 records are returned. Maximum limit value is 1000 and you can only access logs for the last 48h. If you want to fetch more than 1000 logs allowed per call, use sentBefore and sentUntil to retrieve them in pages. (optional, default to 50)
     * @param null|string $entityId Entity id used to send the message. For more details, see our [documentation](https://www.infobip.com/docs/cpaas-x/application-and-entity-management). (optional)
     * @param null|string $applicationId Application id used to send the message. For more details, see our [documentation](https://www.infobip.com/docs/cpaas-x/application-and-entity-management). (optional)
     * @param null|string[] $campaignReferenceId ID of a campaign that was sent in the message. May contain multiple comma-separated values. (optional)
     *
     * @throws InvalidArgumentException
     */
    public function getOutboundMmsMessageLogsAsync(?string $mcc = null, ?string $mnc = null, ?string $sender = null, ?string $destination = null, ?array $bulkId = null, ?array $messageId = null, ?\Infobip\Model\MessageGeneralStatus $generalStatus = null, ?\DateTime $sentSince = null, ?\DateTime $sentUntil = null, int $limit = 50, ?string $entityId = null, ?string $applicationId = null, ?array $campaignReferenceId = null): PromiseInterface
    {
        $request = $this->getOutboundMmsMessageLogsRequest($mcc, $mnc, $sender, $destination, $bulkId, $messageId, $generalStatus, $sentSince, $sentUntil, $limit, $entityId, $applicationId, $campaignReferenceId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getOutboundMmsMessageLogsResponse($response, $request->getUri());
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

                    throw $this->getOutboundMmsMessageLogsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getOutboundMmsMessageLogs'
     *
     * @param null|string $mcc Filter logs by mobile country code. (optional)
     * @param null|string $mnc Filter logs by mobile network code. (optional)
     * @param null|string $sender The sender ID which can be alphanumeric or numeric. (optional)
     * @param null|string $destination Message destination address. (optional)
     * @param null|string[] $bulkId Unique ID assigned to the request if messaging multiple recipients or sending multiple messages via a single API request. May contain multiple comma-separated values. Maximum length 2048 characters. (optional)
     * @param null|string[] $messageId Unique message ID for which a log is requested. May contain multiple comma-separated values. Maximum length 2048 characters. (optional)
     * @param null|\Infobip\Model\MessageGeneralStatus $generalStatus (optional)
     * @param null|\DateTime $sentSince The logs will only include messages sent after this date. Use it together with sentUntil to return a time range or if you want to fetch more than 1000 logs allowed per call. Has the following format: yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ. (optional)
     * @param null|\DateTime $sentUntil The logs will only include messages sent before this date. Use it together with sentSince to return a time range or if you want to fetch more than 1000 logs allowed per call. Has the following format: yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ. (optional)
     * @param int $limit Maximum number of messages to include in logs. If not set, the latest 50 records are returned. Maximum limit value is 1000 and you can only access logs for the last 48h. If you want to fetch more than 1000 logs allowed per call, use sentBefore and sentUntil to retrieve them in pages. (optional, default to 50)
     * @param null|string $entityId Entity id used to send the message. For more details, see our [documentation](https://www.infobip.com/docs/cpaas-x/application-and-entity-management). (optional)
     * @param null|string $applicationId Application id used to send the message. For more details, see our [documentation](https://www.infobip.com/docs/cpaas-x/application-and-entity-management). (optional)
     * @param null|string[] $campaignReferenceId ID of a campaign that was sent in the message. May contain multiple comma-separated values. (optional)
     *
     * @throws InvalidArgumentException
     */
    private function getOutboundMmsMessageLogsRequest(?string $mcc = null, ?string $mnc = null, ?string $sender = null, ?string $destination = null, ?array $bulkId = null, ?array $messageId = null, ?\Infobip\Model\MessageGeneralStatus $generalStatus = null, ?\DateTime $sentSince = null, ?\DateTime $sentUntil = null, int $limit = 50, ?string $entityId = null, ?string $applicationId = null, ?array $campaignReferenceId = null): Request
    {
        $allData = [
             'mcc' => $mcc,
             'mnc' => $mnc,
             'sender' => $sender,
             'destination' => $destination,
             'bulkId' => $bulkId,
             'messageId' => $messageId,
             'generalStatus' => $generalStatus,
             'sentSince' => $sentSince,
             'sentUntil' => $sentUntil,
             'limit' => $limit,
             'entityId' => $entityId,
             'applicationId' => $applicationId,
             'campaignReferenceId' => $campaignReferenceId,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'mcc' => [
                    ],
                    'mnc' => [
                    ],
                    'sender' => [
                    ],
                    'destination' => [
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
                        new Assert\LessThanOrEqual(1000),
                    ],
                    'entityId' => [
                    ],
                    'applicationId' => [
                    ],
                    'campaignReferenceId' => [
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/mms/2/logs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($mcc !== null) {
            $queryParams['mcc'] = $mcc;
        }

        // query params
        if ($mnc !== null) {
            $queryParams['mnc'] = $mnc;
        }

        // query params
        if ($sender !== null) {
            $queryParams['sender'] = $sender;
        }

        // query params
        if ($destination !== null) {
            $queryParams['destination'] = $destination;
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
        if ($entityId !== null) {
            $queryParams['entityId'] = $entityId;
        }

        // query params
        if ($applicationId !== null) {
            $queryParams['applicationId'] = $applicationId;
        }

        // query params
        if ($campaignReferenceId !== null) {
            $queryParams['campaignReferenceId'] = $campaignReferenceId;
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
     * Create response for operation 'getOutboundMmsMessageLogs'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\MmsLogsResponse|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|null
     */
    private function getOutboundMmsMessageLogsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\MmsLogsResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getOutboundMmsMessageLogs'
     */
    private function getOutboundMmsMessageLogsApiException(ApiException $apiException): ApiException
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
     * Operation sendMmsMessages
     *
     * Send MMS messages
     *
     * @param \Infobip\Model\MmsRequest $mmsRequest mmsRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\MessageResponse|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError
     */
    public function sendMmsMessages(\Infobip\Model\MmsRequest $mmsRequest)
    {
        $request = $this->sendMmsMessagesRequest($mmsRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendMmsMessagesResponse($response, $request->getUri());
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
            throw $this->sendMmsMessagesApiException($exception);
        }
    }

    /**
     * Operation sendMmsMessagesAsync
     *
     * Send MMS messages
     *
     * @param \Infobip\Model\MmsRequest $mmsRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendMmsMessagesAsync(\Infobip\Model\MmsRequest $mmsRequest): PromiseInterface
    {
        $request = $this->sendMmsMessagesRequest($mmsRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendMmsMessagesResponse($response, $request->getUri());
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

                    throw $this->sendMmsMessagesApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendMmsMessages'
     *
     * @param \Infobip\Model\MmsRequest $mmsRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendMmsMessagesRequest(\Infobip\Model\MmsRequest $mmsRequest): Request
    {
        $allData = [
             'mmsRequest' => $mmsRequest,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'mmsRequest' => [
                        new Assert\NotNull(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/mms/2/messages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($mmsRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($mmsRequest)
                : $mmsRequest;
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
     * Create response for operation 'sendMmsMessages'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\MessageResponse|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|null
     */
    private function sendMmsMessagesResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\MessageResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'sendMmsMessages'
     */
    private function sendMmsMessagesApiException(ApiException $apiException): ApiException
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
     * @return \Infobip\Model\MmsUploadBinaryResult|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException
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

        $validationConstraints = new Assert\Collection(
            fields : [
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
                ]
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
     * @return \Infobip\Model\MmsUploadBinaryResult|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|\Infobip\Model\ApiException|null
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
