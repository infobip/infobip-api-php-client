<?php

declare(strict_types=1);

namespace Infobip\Test\Api\Sms;

use DateTime;
use GuzzleHttp\Psr7\Query;
use Infobip\Api\SmsApi;
use Infobip\Model\MessagePrice;
use Infobip\Model\Platform;
use Infobip\Model\SmsDeliveryReport;
use Infobip\Model\SmsDeliveryResult;
use Infobip\Model\SmsLog;
use Infobip\Model\SmsLogsResponse;
use Infobip\Model\SmsMessageError;
use Infobip\Model\SmsMessageStatus;
use Infobip\Model\SmsTextContent;
use Infobip\Test\Api\ApiTestBase;

class SmsLogsAndStatusReportsApiTest extends ApiTestBase
{
    private const string GET_OUTBOUND_SMS_MESSAGE_DELIVERY_REPORTS = "/sms/3/reports";
    private const string GET_OUTBOUND_SMS_MESSAGE_LOGS = "/sms/3/logs";


    public function testGetOutboundSmsMessageDeliveryReports(): void
    {
        $givenBulkId = "BULK-ID-123-xyz";
        $givenMessageId = "MESSAGE-ID-123-xyz";
        $givenLimit = 2;
        $givenEntityId = "promotional-traffic-entity";
        $givenApplicationId = "marketing-automation-application";
        $givenCampaignReferenceId = "summersale";

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "bulkId": "BULK-ID-123-xyz",
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
              "messageId": "MESSAGE-ID-123-xyz",
              "to": "41793026727",
              "sender": "InfoSMS",
              "sentAt": "2019-11-09T16:00:00.000+01:00",
              "doneAt": "2019-11-09T16:00:00.000+01:00",
              "messageCount": 1,
              "platform": {
                "entityId": "promotional-traffic-entity",
                "applicationId": "marketing-automation-application"
              }
            },
            {
              "bulkId": "BULK-ID-123",
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
              "messageId": "MSG-1234",
              "to": "41793026834",
              "sender": "InfoSMS",
              "sentAt": "2019-11-09T17:00:00.000+01:00",
              "doneAt": "2019-11-09T17:00:00.000+01:00",
              "messageCount": 1,
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

        $expectedPath = self::GET_OUTBOUND_SMS_MESSAGE_DELIVERY_REPORTS
            . "?"
            . Query::build([
                'bulkId' => $givenBulkId,
                'messageId' => $givenMessageId,
                'limit' => $givenLimit,
                'entityId' => $givenEntityId,
                'applicationId' => $givenApplicationId,
                'campaignReferenceId' => $givenCampaignReferenceId
            ]);

        $expectedHttpMethod = 'GET';

        $smsApi = new SmsApi(config: $this->getConfiguration(), client: $client);

        $closures = [
            fn () => $smsApi->getOutboundSmsMessageDeliveryReports(
                bulkId: $givenBulkId,
                messageId: $givenMessageId,
                limit: $givenLimit,
                entityId: $givenEntityId,
                applicationId: $givenApplicationId,
                campaignReferenceId: $givenCampaignReferenceId
            ),
            fn () => $smsApi->getOutboundSmsMessageDeliveryReportsAsync(
                bulkId: $givenBulkId,
                messageId: $givenMessageId,
                limit: $givenLimit,
                entityId: $givenEntityId,
                applicationId: $givenApplicationId,
                campaignReferenceId: $givenCampaignReferenceId
            )
        ];

        foreach ($closures as $index => $closure) {
            /** @var SmsDeliveryResult $responseModel */
            $responseModel = $this->getUnpackedModel($closure(), SmsDeliveryResult::class);

            $this->assertCount(2, $responseModel->getResults());
            $expectedFirstSmsReport = new SmsDeliveryReport(
                bulkId: "BULK-ID-123-xyz",
                price: new MessagePrice(
                    pricePerMessage: 0.01,
                    currency: "EUR"
                ),
                status: new SmsMessageStatus(
                    groupId: 3,
                    groupName: "DELIVERED",
                    id: 5,
                    name: "DELIVERED_TO_HANDSET",
                    description: "Message delivered to handset"
                ),
                error: new SmsMessageError(
                    groupId: 0,
                    groupName: "OK",
                    id: 0,
                    name: "NO_ERROR",
                    description: "No Error",
                    permanent: false
                ),
                messageId: "MESSAGE-ID-123-xyz",
                to: "41793026727",
                sender: "InfoSMS",
                sentAt: new DateTime("2019-11-09T16:00:00.000+0100"),
                doneAt: new DateTime("2019-11-09T16:00:00.000+0100"),
                messageCount: 1,
                platform: new Platform(
                    entityId: "promotional-traffic-entity",
                    applicationId: "marketing-automation-application"
                )
            );
            $expectedSecondSmsReport = new SmsDeliveryReport(
                bulkId: "BULK-ID-123",
                price: new MessagePrice(
                    pricePerMessage: 0.01,
                    currency: "EUR"
                ),
                status: new SmsMessageStatus(
                    groupId: 3,
                    groupName: "DELIVERED",
                    id: 5,
                    name: "DELIVERED_TO_HANDSET",
                    description: "Message delivered to handset"
                ),
                error: new SmsMessageError(
                    groupId: 0,
                    groupName: "OK",
                    id: 0,
                    name: "NO_ERROR",
                    description: "No Error",
                    permanent: false
                ),
                messageId: "MSG-1234",
                to: "41793026834",
                sender: "InfoSMS",
                sentAt: new DateTime("2019-11-09T17:00:00.000+0100"),
                doneAt: new DateTime("2019-11-09T17:00:00.000+0100"),
                messageCount: 1,
                platform: new Platform(
                    entityId: "promotional-traffic-entity",
                    applicationId: "marketing-automation-application"
                )
            );

            $this->assertEquals($expectedFirstSmsReport, $responseModel->getResults()[0]);
            $this->assertEquals($expectedSecondSmsReport, $responseModel->getResults()[1]);

            $this->assertRequestWithHeaders(
                'GET',
                $expectedPath,
                $requestHistoryContainer[$index],
                ['Accept' => 'application/json']
            );
        }
    }

    public function testGetOutboundSmsMessageLogs(): void
    {
        $givenBulkId = ["BULK-ID-123-xyz"];
        $givenMessageId = ["MESSAGE-ID-123-xyz", "MESSAGE-ID-124-xyz"];
        $givenSentSinceString = "2020-02-22T17:42:05.390+01:00";
        $givenSentSinceDateTime = new DateTime($givenSentSinceString);
        $givenSentUntilString = "2020-02-23T17:42:05.390+01:00";
        $givenSentUntilDateTime = new DateTime($givenSentUntilString);
        $givenEntityId = "promotional-traffic-entity";
        $givenApplicationId = "marketing-automation-application";
        $givenCampaignReferenceId = ["summersale"];
        $givenLimit = 50;

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "sender": "InfoSMS",
              "destination": "41793026727",
              "bulkId": "BULK-ID-123-xyz",
              "messageId": "MESSAGE-ID-123-xyz",
              "sentAt": "2020-11-09T16:00:00.000+01:00",
              "doneAt": "2020-11-09T16:00:00.000+01:00",
              "messageCount": 1,
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
                "text": "This is a sample message"
              },
              "mccMnc": "22801",
              "campaignReferenceId": "summersale"
            },
            {
              "sender": "InfoSMS",
              "destination": "41793026834",
              "bulkId": "BULK-ID-123-xyz",
              "messageId": "MESSAGE-ID-124-xyz",
              "sentAt": "2020-11-09T17:00:00.000+01:00",
              "doneAt": "2020-11-09T17:00:00.000+01:00",
              "messageCount": 1,
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
                "text": "This is a sample message"
              },
              "mccMnc": "22801",
              "campaignReferenceId": "summersale"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $expectedPath = self::GET_OUTBOUND_SMS_MESSAGE_LOGS
            . "?"
            . Query::build([
                'bulkId' => $givenBulkId,
                'messageId' => $givenMessageId,
                'sentSince' => $givenSentSinceString,
                'sentUntil' => $givenSentUntilString,
                'limit' => $givenLimit,
                'entityId' => $givenEntityId,
                'applicationId' => $givenApplicationId,
                'campaignReferenceId' => $givenCampaignReferenceId
            ]);

        $smsApi = new SmsApi(config: $this->getConfiguration(), client: $client);

        $closures = [
            fn () => $smsApi->getOutboundSmsMessageLogs(
                bulkId: $givenBulkId,
                messageId: $givenMessageId,
                sentSince: $givenSentSinceDateTime,
                sentUntil: $givenSentUntilDateTime,
                entityId: $givenEntityId,
                applicationId: $givenApplicationId,
                campaignReferenceId: $givenCampaignReferenceId
            ),
            fn () => $smsApi->getOutboundSmsMessageLogsAsync(
                bulkId: $givenBulkId,
                messageId: $givenMessageId,
                sentSince: $givenSentSinceDateTime,
                sentUntil: $givenSentUntilDateTime,
                entityId: $givenEntityId,
                applicationId: $givenApplicationId,
                campaignReferenceId: $givenCampaignReferenceId
            )
        ];

        foreach ($closures as $index => $closure) {
            /** @var SmsLogsResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure(), SmsLogsResponse::class);

            $this->assertCount(2, $responseModel->getResults());
            $expectedFirstSmsReport = new SmsLog(
                sender: "InfoSMS",
                destination: "41793026727",
                bulkId: "BULK-ID-123-xyz",
                messageId: "MESSAGE-ID-123-xyz",
                sentAt: new DateTime("2020-11-09T16:00:00.000+0100"),
                doneAt: new DateTime("2020-11-09T16:00:00.000+0100"),
                messageCount: 1,
                price: new MessagePrice(
                    pricePerMessage: 0.01,
                    currency: "EUR"
                ),
                status: new SmsMessageStatus(
                    groupId: 3,
                    groupName: "DELIVERED",
                    id: 5,
                    name: "DELIVERED_TO_HANDSET",
                    description: "Message delivered to handset"
                ),
                error: new SmsMessageError(
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
                content: new SmsTextContent(
                    text: "This is a sample message"
                ),
                campaignReferenceId: "summersale",
                mccMnc: "22801"
            );
            $expectedSecondSmsReport = new SmsLog(
                sender: "InfoSMS",
                destination: "41793026834",
                bulkId: "BULK-ID-123-xyz",
                messageId: "MESSAGE-ID-124-xyz",
                sentAt: new DateTime("2020-11-09T17:00:00.000+0100"),
                doneAt: new DateTime("2020-11-09T17:00:00.000+0100"),
                messageCount: 1,
                price: new MessagePrice(
                    pricePerMessage: 0.01,
                    currency: "EUR"
                ),
                status: new SmsMessageStatus(
                    groupId: 3,
                    groupName: "DELIVERED",
                    id: 5,
                    name: "DELIVERED_TO_HANDSET",
                    description: "Message delivered to handset"
                ),
                error: new SmsMessageError(
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
                content: new SmsTextContent(
                    text: "This is a sample message"
                ),
                campaignReferenceId: "summersale",
                mccMnc: "22801"
            );

            $this->assertEquals($expectedFirstSmsReport, $responseModel->getResults()[0]);
            $this->assertEquals($expectedSecondSmsReport, $responseModel->getResults()[1]);

            $this->assertRequestWithHeaders(
                'GET',
                $expectedPath,
                $requestHistoryContainer[$index],
                ['Accept' => 'application/json']
            );
        }
    }

}
