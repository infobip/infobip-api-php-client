<?php

namespace Infobip\Test\Api\Viber;

use DateTime;
use GuzzleHttp\Psr7\Query;
use Infobip\Api\ViberApi;
use Infobip\Model\MessagePrice;
use Infobip\Model\MessageResponse;
use Infobip\Model\MessageResponseDetails;
use Infobip\Model\MessageStatus;
use Infobip\Model\Platform;
use Infobip\Model\ViberDefaultSmsFailover;
use Infobip\Model\ViberLog;
use Infobip\Model\ViberLogsResponse;
use Infobip\Model\ViberMessage;
use Infobip\Model\ViberMessageError;
use Infobip\Model\ViberMessageOptions;
use Infobip\Model\ViberOutboundTextContent;
use Infobip\Model\ViberRequest;
use Infobip\Model\ViberToDestination;
use Infobip\Model\ViberWebhookReport;
use Infobip\Model\ViberWebhookReportsResponse;
use Infobip\Test\Api\ApiTestBase;

class ViberApiTest extends ApiTestBase
{
    private const string SEND_VIBER_MESSAGES = "/viber/2/messages";
    private const string GET_OUTBOUND_VIBER_DELIVERY_REPORTS = "/viber/2/reports";
    private const string GET_OUTBOUND_VIBER_MESSAGE_LOGS = "/viber/2/logs";

    public function testSendViberMessages(): void
    {
        $givenRequest = <<<JSON
        {
          "messages": [
            {
              "sender": "441134960000",
              "destinations": [
                {
                  "to": "441134960001"
                }
              ],
              "content": {
                "text": "Some text",
                "type": "TEXT"
              },
              "options": {
                "smsFailover": {
                  "sender": "441134960000",
                  "text": "Some failover text"
                },
                "label": "TRANSACTIONAL",
                "applySessionRate": false,
                "toPrimaryDeviceOnly": false
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

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $request = new ViberRequest(
            messages: [
                new ViberMessage(
                    sender: '441134960000',
                    destinations: [
                        new ViberToDestination(to: '441134960001')
                    ],
                    content: new ViberOutboundTextContent(
                        text: 'Some text'
                    ),
                    options: new ViberMessageOptions(
                        smsFailover: new ViberDefaultSmsFailover(
                            sender: '441134960000',
                            text: 'Some failover text'
                        ),
                        label: 'TRANSACTIONAL',
                        applySessionRate: false,
                        toPrimaryDeviceOnly: false
                    )
                )
            ]
        );

        $viberApi = new ViberApi(config: $this->getConfiguration(), client: $client);

        $closures = [
            fn () => $viberApi->sendViberMessages($request),
            fn () => $viberApi->sendViberMessagesAsync($request),
        ];

        foreach ($closures as $index => $closure) {
            /** @var MessageResponse $response */
            $response = $this->getUnpackedModel($closure(), MessageResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeadersAndJsonBody(
                'POST',
                self::SEND_VIBER_MESSAGES,
                $givenRequest,
                $requestHistoryContainer[$index]
            );

            $expectedResponse = new MessageResponse(
                messages: [
                    new MessageResponseDetails(
                        messageId: "a28dd97c-1ffb-4fcf-99f1-0b557ed381da",
                        status: new MessageStatus(
                            groupId: 1,
                            groupName: "PENDING",
                            id: 26,
                            name: "PENDING_ACCEPTED",
                            description: "Message sent to next instance"
                        ),
                        destination: "441134960001"
                    )
                ],
                bulkId: "a28dd97c-2222-4fcf-99f1-0b557ed381da"
            );

            $this->assertEquals($expectedResponse, $response);
        }
    }

    public function testGetOutboundViberDeliveryReports(): void
    {

        $givenLimit = 1;
        $givenEntityId = "promotional-traffic-entity";
        $givenApplicationId = "marketing-automation-application";
        $givenCampaignReferenceId = "summersale";

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "bulkId": "1688025180464000013",
              "price": {
                "pricePerMessage": 0.15,
                "currency": "EUR"
              },
              "status": {
                "groupId": 3,
                "groupName": "DELIVERED",
                "id": 5,
                "name": "DELIVERED_TO_HANDSET",
                "description": "Message delivered to handset"
              },
              "error": {
                "groupId": 0,
                "groupName": "OK",
                "id": 0,
                "name": "NO_ERROR",
                "description": "No Error",
                "permanent": false
              },
              "messageId": "1688025180464000014",
              "to": "myDestination",
              "sender": "mySender",
              "sentAt": "2023-09-26T10:52:15.457+00:00",
              "doneAt": "2023-09-26T10:52:15.799+00:00",
              "messageCount": 1,
              "mccMnc": "22801",
              "campaignReferenceId": "summersale",
              "platform": {
                "entityId": "promotional-traffic-entity",
                "applicationId": "marketing-automation-application"
              }
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $viberApi = new ViberApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_OUTBOUND_VIBER_DELIVERY_REPORTS
            . "?"
            . Query::build([
                'limit' => $givenLimit,
                'entityId' => $givenEntityId,
                'applicationId' => $givenApplicationId,
                'campaignReferenceId' => $givenCampaignReferenceId
            ]);

        $expectedHttpMethod = 'GET';

        $closures = [
            fn () => $viberApi->getOutboundViberMessageDeliveryReports(
                limit: $givenLimit,
                entityId: $givenEntityId,
                applicationId: $givenApplicationId,
                campaignReferenceId: $givenCampaignReferenceId
            ),
            fn () => $viberApi->getOutboundViberMessageDeliveryReportsAsync(
                limit: $givenLimit,
                entityId: $givenEntityId,
                applicationId: $givenApplicationId,
                campaignReferenceId: $givenCampaignReferenceId
            )
        ];

        foreach ($closures as $index => $closure) {
            /** @var ViberWebhookReportsResponse $response */
            $response = $this->getUnpackedModel($closure(), ViberWebhookReportsResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeaders(
                $expectedHttpMethod,
                $expectedPath,
                $requestHistoryContainer[$index],
                ['Accept' => 'application/json']
            );

            $expectedResponse = new ViberWebhookReportsResponse(
                results: [
                    new ViberWebhookReport(
                        bulkId: "1688025180464000013",
                        price: new MessagePrice(
                            pricePerMessage: 0.15,
                            currency: "EUR"
                        ),
                        status: new MessageStatus(
                            groupId: 3,
                            groupName: "DELIVERED",
                            id: 5,
                            name: "DELIVERED_TO_HANDSET",
                            description: "Message delivered to handset"
                        ),
                        error: new ViberMessageError(
                            groupId: 0,
                            groupName: "OK",
                            id: 0,
                            name: "NO_ERROR",
                            description: "No Error",
                            permanent: false
                        ),
                        messageId: "1688025180464000014",
                        to: "myDestination",
                        sender: "mySender",
                        sentAt: new DateTime("2023-09-26T10:52:15.457+00:00"),
                        doneAt: new DateTime("2023-09-26T10:52:15.799+00:00"),
                        messageCount: 1,
                        mccMnc: "22801",
                        platform: new Platform(
                            entityId: "promotional-traffic-entity",
                            applicationId: "marketing-automation-application"
                        ),
                        campaignReferenceId: "summersale"
                    )
                ]
            );

            $this->assertEquals($expectedResponse, $response);
        }
    }

    public function testGetOutboundViberMessageLogs(): void
    {

        $givenBulkId = ["BULK-ID-123-xyz"];
        $givenMessageId = ["MSG-ID-123-xyz,MSG-ID-124-xyz"];
        $givenSentSinceString = "2020-02-22T17:42:05.390+01:00";
        $givenSentSinceDateTime = new DateTime($givenSentSinceString);
        $givenSentUntil = "2020-02-23T17:42:05.390+01:00";
        $givenSentUntilDateTime = new DateTime($givenSentUntil);
        $givenLimit = 2;
        $givenEntityId = "promotional-traffic-entity";
        $givenApplicationId = "marketing-automation-application";
        $givenCampaignReferenceId = ["summersale"];

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "sender": "mySender",
              "destination": "myDestination",
              "bulkId": "BULK-ID-123-xyz",
              "messageId": "MSG-ID-123-xyz",
              "sentAt": "2024-09-11T07:21:26.000+00:00",
              "doneAt": "2024-09-11T07:21:26.000+00:00",
              "price": {
                "pricePerMessage": 0.01,
                "currency": "EUR"
              },
              "status": {
                "groupId": 3,
                "groupName": "DELIVERED",
                "id": 5,
                "name": "DELIVERED_TO_HANDSET",
                "description": "Message delivered to handset"
              },
              "error": {
                "groupId": 0,
                "groupName": "OK",
                "id": 0,
                "name": "NO_ERROR",
                "description": "No Error",
                "permanent": false
              },
              "platform": {
                "entityId": "promotional-traffic-entity",
                "applicationId": "marketing-automation-application"
              },
              "content": {
                "type": "TEXT",
                "text": "Some text"
              },
              "campaignReferenceId": "summersale"
            }
          ]
        }
        JSON;


        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $viberApi = new ViberApi(config: $this->getConfiguration(), client: $client);

        $expectedPath = self::GET_OUTBOUND_VIBER_MESSAGE_LOGS
            . "?"
            . Query::build([
                'bulkId' => $givenBulkId,
                'messageId' => $givenMessageId,
                'sentSince' => $givenSentSinceString,
                'sentUntil' => $givenSentUntil,
                'limit' => $givenLimit,
                'entityId' => $givenEntityId,
                'applicationId' => $givenApplicationId,
                'campaignReferenceId' => $givenCampaignReferenceId
            ]);

        $expectedHttpMethod = 'GET';

        $closures = [
            fn () => $viberApi->getOutboundViberMessageLogs(
                bulkId: $givenBulkId,
                messageId: $givenMessageId,
                sentSince: $givenSentSinceDateTime,
                sentUntil: $givenSentUntilDateTime,
                limit: $givenLimit,
                entityId: $givenEntityId,
                applicationId: $givenApplicationId,
                campaignReferenceId: $givenCampaignReferenceId
            ),
            fn () => $viberApi->getOutboundViberMessageLogsAsync(
                bulkId: $givenBulkId,
                messageId: $givenMessageId,
                sentSince: $givenSentSinceDateTime,
                sentUntil: $givenSentUntilDateTime,
                limit: $givenLimit,
                entityId: $givenEntityId,
                applicationId: $givenApplicationId,
                campaignReferenceId: $givenCampaignReferenceId
            )
        ];

        foreach ($closures as $index => $closure) {
            /** @var ViberLogsResponse $response */
            $response = $this->getUnpackedModel($closure(), ViberLogsResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeaders(
                $expectedHttpMethod,
                $expectedPath,
                $requestHistoryContainer[$index],
                ['Accept' => 'application/json']
            );

            $expectedResponse = new ViberLogsResponse(
                results: [
                    new ViberLog(
                        sender: "mySender",
                        destination: "myDestination",
                        bulkId: "BULK-ID-123-xyz",
                        messageId: "MSG-ID-123-xyz",
                        sentAt: new DateTime("2024-09-11T07:21:26.000+00:00"),
                        doneAt: new DateTime("2024-09-11T07:21:26.000+00:00"),
                        price: new MessagePrice(
                            pricePerMessage: 0.01,
                            currency: "EUR"
                        ),
                        status: new MessageStatus(
                            groupId: 3,
                            groupName: "DELIVERED",
                            id: 5,
                            name: "DELIVERED_TO_HANDSET",
                            description: "Message delivered to handset"
                        ),
                        error: new ViberMessageError(
                            groupId: 0,
                            groupName: "OK",
                            id: 0,
                            name: "NO_ERROR",
                            description: "No Error",
                            permanent: false
                        ),
                        platform: new Platform(
                            entityId: "promotional-traffic-entity",
                            applicationId: "marketing-automation-application"
                        ),
                        content: new ViberOutboundTextContent(
                            text: "Some text"
                        ),
                        campaignReferenceId: "summersale"
                    )
                ]
            );

            $this->assertEquals($expectedResponse, $response);
        }
    }

}
