<?php

// phpcs:ignorefile

declare(strict_types=1);

namespace Infobip\Test\Api\Mms;

use DateTime;
use GuzzleHttp\Psr7\Query;
use Infobip\Api\MmsApi as SendMmsApi;
use Infobip\Model\MessagePrice;
use Infobip\Model\MessageResponse;
use Infobip\Model\MessageStatus;
use Infobip\Model\MmsInboundReportResponse;
use Infobip\Model\MmsLog;
use Infobip\Model\MmsLogsResponse;
use Infobip\Model\MmsOutboundContent;
use Infobip\Model\MmsOutboundTextSegment;
use Infobip\Model\MmsReportResponse;
use Infobip\Model\MmsRequest;
use Infobip\Model\MmsUploadBinaryResult;
use Infobip\Test\Api\ApiTestBase;

class SendMmsApiTest extends ApiTestBase
{
    private const string SEND_MMS_MESSAGES = "/mms/2/messages";
    private const string GET_OUTBOUND_MMS_MESSAGE_DELIVERY_REPORTS = "/mms/2/reports";
    private const string GET_OUTBOUND_MMS_MESSAGE_LOGS = "/mms/2/logs";
    private const string UPLOAD_BINARY = "/mms/1/content";
    private const string GET_INBOUND_MMS_MESSAGES = "/mms/1/inbox/reports";

    public function testSendMmsMessages(): void
    {
        $givenRequest = <<<JSON
        {
          "messages": [
            {
              "sender": "441134960000",
              "destinations": [
                {
                  "group": [
                    {
                      "to": "441134960001"
                    },
                    {
                      "to": "441134960002"
                    }
                  ]
                },
                {
                    "to": "441134960003"
                },
                {
                "group": [
                    {
                      "to": "441134960004"
                    },
                    {
                      "to": "441134960005"
                    }
                  ]
                }
              ],
              "content": {
                "title": "Some title",
                "messageSegments": [
                  {
                    "text": "Some text",
                    "type": "TEXT"
                  }
                ]
              }
            }
          ]
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "bulkId": "a28dd97c-2222-4fcf-99f1-0b557ed381da",
          "messages": [
            {
              "messageId": "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
              "status": {
                "groupId": 1,
                "groupName": "PENDING",
                "id": 26,
                "name": "PENDING_ACCEPTED",
                "description": "Message sent to next instance"
              },
              "destination": "441134960001"
            }
          ]
        }
        JSON;

        $request = $this->getObjectSerializer()->deserialize($givenRequest, MmsRequest::class);

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new SendMmsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::SEND_MMS_MESSAGES;

        $expectedHttpMethod = "POST";

        $closures = [
            fn () => $api->sendMmsMessages($request),
            fn () => $api->sendMmsMessagesAsync($request),
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: MessageResponse::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );

    }

    public function testGetOutboundMmsMessageDeliveryReports(): void
    {
        $givenBulkId = "MESSAGE-ID-123-xyz";
        $givenMessageId = "MESSAGE-ID-123-xyz";
        $givenLimit = 2;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "bulkId": "MESSAGE-ID-123-xyz",
              "price": {
                "pricePerMessage": 1,
                "currency": "EUR"
              },
              "status": {
                "groupId": 3,
                "groupName": "DELIVERED",
                "id": 5,
                "name": "DELIVERED_TO_HANDSET",
                "description": "Message delivered to handset"
              },
              "messageId": "MESSAGE-ID-123-xyz",
              "sender": "441134960000",
              "sentAt": "2024-09-09T06:23:37.808+00:00",
              "doneAt": "2024-09-09T06:23:37.808+00:00",
              "messageCount": 3
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new SendMmsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_OUTBOUND_MMS_MESSAGE_DELIVERY_REPORTS
            . "?"
            . Query::build(["bulkId" => $givenBulkId, "messageId" => $givenMessageId, "limit" => $givenLimit]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getOutboundMmsMessageDeliveryReports(
                bulkId: $givenBulkId,
                messageId: $givenMessageId,
                limit: $givenLimit
            ),
            fn () => $api->getOutboundMmsMessageDeliveryReportsAsync(
                bulkId: $givenBulkId,
                messageId: $givenMessageId,
                limit: $givenLimit
            ),
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: MmsReportResponse::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );
    }

    public function testGetOutboundMmsMessageLogs(): void
    {
        $givenBulkIds = ["BULK-ID-123-xyz"];
        $givenMessageIds = ["MESSAGE-ID-123-xyz,MESSAGE-ID-124-xyz"];
        $givenSentSinceString = "2020-02-22T17:42:05.390+01:00";
        $givenSentSinceDateTime = new DateTime($givenSentSinceString);
        $givenSentUntilString = "2020-02-23T17:42:05.390+01:00";
        $givenSentUntilDateTime = new DateTime($givenSentUntilString);
        $givenLimit = 2;
        $givenEntityId = "promotional-traffic-entity";
        $givenApplicationId = "marketing-automation-application";
        $givenCampaignReferenceIds = ["summersale"];


        $givenResponse = <<<JSON
        {
          "results": [
            {
              "title": "Message title",
              "mccMnc": "22801",
              "sender": "441134960000",
              "destination": "441134960001",
              "bulkId": "3746923784",
              "messageId": "43u2ih-6453jbh-897kfs90u2nj",
              "sentAt" : "2024-09-09T06:23:39.099+00:00",
              "doneAt" : "2024-09-09T06:23:39.099+00:00",
              "messageCount": 3,
              "price": {
                "pricePerMessage": 1,
                "currency": "EUR"
              },
              "status": {
                "groupId": 3,
                "groupName": "DELIVERED",
                "id": 5,
                "name": "DELIVERED_TO_HANDSET",
                "description": "Message delivered to handset"
              },
              "content": {
                "title": "Some title",
                "messageSegments": [
                  {
                    "text": "Some text",
                    "type": "TEXT"
                  }
                ]
              }
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new SendMmsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_OUTBOUND_MMS_MESSAGE_LOGS
            . "?"
            . Query::build([
                "bulkId" => $givenBulkIds,
                "messageId" => $givenMessageIds,
                "sentSince" => $givenSentSinceString,
                "sentUntil" => $givenSentUntilString,
                "limit" => $givenLimit,
                "entityId" => $givenEntityId,
                "applicationId" => $givenApplicationId,
                "campaignReferenceId" => $givenCampaignReferenceIds
            ]);

        $closures = [
            fn () => $api->getOutboundMmsMessageLogs(
                bulkId: $givenBulkIds,
                messageId: $givenMessageIds,
                sentSince: $givenSentSinceDateTime,
                sentUntil: $givenSentUntilDateTime,
                limit: $givenLimit,
                entityId: $givenEntityId,
                applicationId: $givenApplicationId,
                campaignReferenceId: $givenCampaignReferenceIds
            ),
            fn () => $api->getOutboundMmsMessageLogsAsync(
                bulkId: $givenBulkIds,
                messageId: $givenMessageIds,
                sentSince: $givenSentSinceDateTime,
                sentUntil: $givenSentUntilDateTime,
                limit: $givenLimit,
                entityId: $givenEntityId,
                applicationId: $givenApplicationId,
                campaignReferenceId: $givenCampaignReferenceIds
            ),
        ];

        foreach ($closures as $index => $closure) {
            $response = $this->getUnpackedModel($closure(), MmsLogsResponse::class);

            $this->assertRequestWithHeaders(
                'GET',
                $expectedPath,
                $requestHistoryContainer[$index],
                [
                    'Accept' => 'application/json',
                ]
            );

            $this->assertEquals(
                new MmsLogsResponse(
                    results: [
                        new MmsLog(
                            title: "Message title",
                            mccMnc: "22801",
                            sender: "441134960000",
                            destination: "441134960001",
                            bulkId: "3746923784",
                            messageId: "43u2ih-6453jbh-897kfs90u2nj",
                            sentAt: new DateTime("2024-09-09T06:23:39.099+00:00"),
                            doneAt: new DateTime("2024-09-09T06:23:39.099+00:00"),
                            messageCount: 3,
                            price: new MessagePrice(
                                pricePerMessage: 1,
                                currency: "EUR"
                            ),
                            status: new MessageStatus(
                                groupId: 3,
                                groupName: "DELIVERED",
                                id: 5,
                                name: "DELIVERED_TO_HANDSET",
                                description: "Message delivered to handset"
                            ),
                            content: new MmsOutboundContent(
                                messageSegments: [
                                    new MmsOutboundTextSegment(
                                        text: "Some text"
                                    )
                                ],
                                title: "Some title"
                            )
                        )
                    ]
                ),
                $response
            );
        }

    }

    public function testUploadBinaryMmsMessageContent(): void
    {
        // given
        $xContentId = "contentId";
        $xMediaType = "mediaType";
        $xValidityPeriodMinutes = 60;
        $givenOctetStreamBody = new \SplFileObject(__DIR__ . "/../../../README.md");

        $givenResponse = <<<JSON
        {
          "uploadedContentId": "uniqueContentId"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new SendMmsApi(config: $this->getConfiguration(), client: $client);

        $closures = [
            fn () => $api->uploadBinary(
                xContentId: $xContentId,
                xMediaType: $xMediaType,
                body: $givenOctetStreamBody,
                xValidityPeriodMinutes: $xValidityPeriodMinutes
            ),
            fn () => $api->uploadBinaryAsync(
                xContentId: $xContentId,
                xMediaType: $xMediaType,
                body: $givenOctetStreamBody,
                xValidityPeriodMinutes: $xValidityPeriodMinutes
            ),
        ];

        foreach ($closures as $index => $closure) {
            $response = $this->getUnpackedModel($closure(), MmsUploadBinaryResult::class);

            $this->assertRequestWithHeaders(
                'POST',
                self::UPLOAD_BINARY,
                $requestHistoryContainer[$index],
                [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/octet-stream',
                ]
            );

            $this->assertEquals(
                new MmsUploadBinaryResult(uploadedContentId: "uniqueContentId"),
                $response
            );
        }
    }

    public function testGetInboundMmsMessages(): void
    {
        $givenEntityId = "EntityExample";
        $givenApplicationId = "ApplicationExample";
        $givenLimit = 2;


        $givenResponse = <<<JSON
        {
            "results": [
                {
                "messageId": "817790313235066447",
                "to": "25256",
                "from": "41793026727",
                "message": "{\"mms_parts\":[{\"origin\":\"text\",\"contentType\":\"text/plain; charset=utf-8\",\"contentId\":\"content0\",\"value\":\"Sample text\"}],\"userAgent\":\"motogstylus5g\",\"priority\":null,\"subject\":null}",
                "receivedAt": "2016-10-06T09:28:39.220+0000",
                "mmsCount": 1,
                "callbackData": "Some custom data",
                "price": {
                "pricePerMessage": 0,
                "currency": "EUR"
                }
              }
            ]
         }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $api = new SendMmsApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_INBOUND_MMS_MESSAGES
            . "?"
            . Query::build([
                "limit" => $givenLimit,
                "applicationId" => $givenApplicationId,
                "entityId" => $givenEntityId
            ]);

        $expectedHttpMethod = "GET";

        $closures = [
            fn () => $api->getInboundMmsMessages(
                limit: $givenLimit,
                applicationId: $givenApplicationId,
                entityId: $givenEntityId
            ),
            fn () => $api->getInboundMmsMessagesAsync(
                limit: $givenLimit,
                applicationId: $givenApplicationId,
                entityId: $givenEntityId
            ),
        ];

        $this->assertClosureResponses(
            closures: $closures,
            expectedInstance: MmsInboundReportResponse::class,
            expectedResponse: $givenResponse,
            expectedPath: $expectedPath,
            expectedHttpMethod: $expectedHttpMethod,
            requestHistoryContainer: $requestHistoryContainer
        );

    }
}
