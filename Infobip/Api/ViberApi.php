<?php

// phpcs:ignorefile

/**
 * ViberApi
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

final class ViberApi
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
     * Operation getOutboundViberMessageDeliveryReports
     *
     * Get Viber delivery reports
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
     * @return \Infobip\Model\ViberWebhookReportsResponse|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError
     */
    public function getOutboundViberMessageDeliveryReports(?string $bulkId = null, ?string $messageId = null, int $limit = 50, ?string $entityId = null, ?string $applicationId = null, ?string $campaignReferenceId = null)
    {
        $request = $this->getOutboundViberMessageDeliveryReportsRequest($bulkId, $messageId, $limit, $entityId, $applicationId, $campaignReferenceId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getOutboundViberMessageDeliveryReportsResponse($response, $request->getUri());
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
            throw $this->getOutboundViberMessageDeliveryReportsApiException($exception);
        }
    }

    /**
     * Operation getOutboundViberMessageDeliveryReportsAsync
     *
     * Get Viber delivery reports
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
    public function getOutboundViberMessageDeliveryReportsAsync(?string $bulkId = null, ?string $messageId = null, int $limit = 50, ?string $entityId = null, ?string $applicationId = null, ?string $campaignReferenceId = null): PromiseInterface
    {
        $request = $this->getOutboundViberMessageDeliveryReportsRequest($bulkId, $messageId, $limit, $entityId, $applicationId, $campaignReferenceId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getOutboundViberMessageDeliveryReportsResponse($response, $request->getUri());
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

                    throw $this->getOutboundViberMessageDeliveryReportsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getOutboundViberMessageDeliveryReports'
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
    private function getOutboundViberMessageDeliveryReportsRequest(?string $bulkId = null, ?string $messageId = null, int $limit = 50, ?string $entityId = null, ?string $applicationId = null, ?string $campaignReferenceId = null): Request
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
        $resourcePath = '/viber/2/reports';
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
     * Create response for operation 'getOutboundViberMessageDeliveryReports'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ViberWebhookReportsResponse|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|null
     */
    private function getOutboundViberMessageDeliveryReportsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\ViberWebhookReportsResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getOutboundViberMessageDeliveryReports'
     */
    private function getOutboundViberMessageDeliveryReportsApiException(ApiException $apiException): ApiException
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
     * Operation getOutboundViberMessageLogs
     *
     * Get Viber message logs
     *
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
     * @return \Infobip\Model\ViberLogsResponse|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError
     */
    public function getOutboundViberMessageLogs(?string $sender = null, ?string $destination = null, ?array $bulkId = null, ?array $messageId = null, ?\Infobip\Model\MessageGeneralStatus $generalStatus = null, ?\DateTime $sentSince = null, ?\DateTime $sentUntil = null, int $limit = 50, ?string $entityId = null, ?string $applicationId = null, ?array $campaignReferenceId = null)
    {
        $request = $this->getOutboundViberMessageLogsRequest($sender, $destination, $bulkId, $messageId, $generalStatus, $sentSince, $sentUntil, $limit, $entityId, $applicationId, $campaignReferenceId);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->getOutboundViberMessageLogsResponse($response, $request->getUri());
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
            throw $this->getOutboundViberMessageLogsApiException($exception);
        }
    }

    /**
     * Operation getOutboundViberMessageLogsAsync
     *
     * Get Viber message logs
     *
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
    public function getOutboundViberMessageLogsAsync(?string $sender = null, ?string $destination = null, ?array $bulkId = null, ?array $messageId = null, ?\Infobip\Model\MessageGeneralStatus $generalStatus = null, ?\DateTime $sentSince = null, ?\DateTime $sentUntil = null, int $limit = 50, ?string $entityId = null, ?string $applicationId = null, ?array $campaignReferenceId = null): PromiseInterface
    {
        $request = $this->getOutboundViberMessageLogsRequest($sender, $destination, $bulkId, $messageId, $generalStatus, $sentSince, $sentUntil, $limit, $entityId, $applicationId, $campaignReferenceId);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->getOutboundViberMessageLogsResponse($response, $request->getUri());
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

                    throw $this->getOutboundViberMessageLogsApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'getOutboundViberMessageLogs'
     *
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
    private function getOutboundViberMessageLogsRequest(?string $sender = null, ?string $destination = null, ?array $bulkId = null, ?array $messageId = null, ?\Infobip\Model\MessageGeneralStatus $generalStatus = null, ?\DateTime $sentSince = null, ?\DateTime $sentUntil = null, int $limit = 50, ?string $entityId = null, ?string $applicationId = null, ?array $campaignReferenceId = null): Request
    {
        $allData = [
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
        $resourcePath = '/viber/2/logs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

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
     * Create response for operation 'getOutboundViberMessageLogs'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\ViberLogsResponse|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|null
     */
    private function getOutboundViberMessageLogsResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
            $responseResult = $this->deserialize($responseBody, '\Infobip\Model\ViberLogsResponse', $responseHeaders);
        }
        return $responseResult;
    }

    /**
     * Adapt given ApiException for operation 'getOutboundViberMessageLogs'
     */
    private function getOutboundViberMessageLogsApiException(ApiException $apiException): ApiException
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
     * Operation sendViberMessages
     *
     * Send Viber messages
     *
     * @param \Infobip\Model\ViberRequest $viberRequest viberRequest (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \Infobip\Model\MessageResponse|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError
     */
    public function sendViberMessages(\Infobip\Model\ViberRequest $viberRequest)
    {
        $request = $this->sendViberMessagesRequest($viberRequest);

        try {
            try {
                $response = $this->client->send($request);
                $this->deprecationChecker->check($request, $response);
                return $this->sendViberMessagesResponse($response, $request->getUri());
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
            throw $this->sendViberMessagesApiException($exception);
        }
    }

    /**
     * Operation sendViberMessagesAsync
     *
     * Send Viber messages
     *
     * @param \Infobip\Model\ViberRequest $viberRequest (required)
     *
     * @throws InvalidArgumentException
     */
    public function sendViberMessagesAsync(\Infobip\Model\ViberRequest $viberRequest): PromiseInterface
    {
        $request = $this->sendViberMessagesRequest($viberRequest);

        return $this
            ->client
            ->sendAsync($request)
            ->then(
                function ($response) use ($request) {
                    $this->deprecationChecker->check($request, $response);
                    return $this->sendViberMessagesResponse($response, $request->getUri());
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

                    throw $this->sendViberMessagesApiException($exception);
                }
            );
    }

    /**
     * Create request for operation 'sendViberMessages'
     *
     * @param \Infobip\Model\ViberRequest $viberRequest (required)
     *
     * @throws InvalidArgumentException
     */
    private function sendViberMessagesRequest(\Infobip\Model\ViberRequest $viberRequest): Request
    {
        $allData = [
             'viberRequest' => $viberRequest,
        ];

        $validationConstraints = new Assert\Collection(
            fields : [
                    'viberRequest' => [
                        new Assert\NotNull(),
                    ],
                ]
        );

        $this->validateParams($allData, $validationConstraints);
        $resourcePath = '/viber/2/messages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        // for model (json/xml)
        if (isset($viberRequest)) {
            $httpBody = ($headers['Content-Type'] === 'application/json')
                ? $this->objectSerializer->serialize($viberRequest)
                : $viberRequest;
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
     * Create response for operation 'sendViberMessages'
     * @throws ApiException on non-2xx response
     * @return \Infobip\Model\MessageResponse|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|\Infobip\Model\ApiError|null
     */
    private function sendViberMessagesResponse(ResponseInterface $response, UriInterface $requestUri): mixed
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
     * Adapt given ApiException for operation 'sendViberMessages'
     */
    private function sendViberMessagesApiException(ApiException $apiException): ApiException
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

}
