<?php

declare(strict_types=1);

namespace Infobip\Test\Api\Email;

use DateTime;
use Infobip\Api\EmailApi as SendEmailApi;
use Infobip\Model\EmailLog;
use Infobip\Model\EmailLogsResponse;
use Infobip\Model\EmailReport;
use Infobip\Model\EmailReportsResult;
use Infobip\Model\EmailResponseDetails;
use Infobip\Model\EmailSendResponse;
use Infobip\Model\MessageError;
use Infobip\Model\MessagePrice;
use Infobip\Model\MessageStatus;
use Infobip\Test\Api\ApiTestBase;

use function PHPUnit\Framework\assertCount;

class SendEmailTest extends ApiTestBase
{
    private const string EMAIL_SEND_ENDPOINT = "/email/3/send";
    private const string GET_DELIVERY_REPORTS_ENDPOINT = "/email/1/reports";
    private const string GET_EMAIL_LOGS_ENDPOINT = "/email/1/logs";

    public function testSendEmail(): void
    {
        $givenResponse = <<<JSON
        {
            "messages": [
                {
                    "to": "joan.doe0@example.com",
                    "messageId": "someMessageId",
                    "status": {
                        "groupId": 1,
                        "groupName": "PENDING",
                        "id": 7,
                        "name": "PENDING_ACCEPTED",
                        "description": "Message accepted, pending for delivery."
                    }
                }
            ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $sendEmailApi = new SendEmailApi(config: $this->getConfiguration(), client: $client);

        $closures = [
            fn () => $sendEmailApi->sendEmail(
                to: ['joan.doe0@example.com'],
                from: 'anna.doe@example.com',
                subject: 'Email test message',
                text: 'This is sample Email message'
            ),
            fn () => $sendEmailApi->sendEmailAsync(
                to: ['joan.doe0@example.com'],
                from: 'anna.doe@example.com',
                subject: 'Email test message',
                text: 'This is sample Email message'
            ),
        ];

        foreach ($closures as $index => $closure) {
            /** @var EmailSendResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure());

            $this->assertCount(1, $responseModel->getMessages());
            $expectedMessageResponse = new EmailResponseDetails(
                to: 'joan.doe0@example.com',
                messageId: 'someMessageId',
                status: new MessageStatus(
                    groupId: 1,
                    groupName: 'PENDING',
                    id: 7,
                    name: 'PENDING_ACCEPTED',
                    description: 'Message accepted, pending for delivery.'
                )
            );

            $this->assertEquals($expectedMessageResponse, $responseModel->getMessages()[0]);

            $expectedBodyParts = [
                'to' => 'joan.doe0@example.com',
                'from' => 'anna.doe@example.com',
                'subject' => 'Email test message',
                'text' => 'This is sample Email message'
            ];

            $this->assertMultipartFormRequestWithHeadersAndParts(
                'POST',
                self::EMAIL_SEND_ENDPOINT,
                $expectedBodyParts,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testSendEmailToMultipleDestinations(): void
    {
        $givenResponse = <<<JSON
        {
            "messages": [
                {
                    "to": "joan.doe0@example.com",
                    "messageId": "someMessageId",
                    "status": {
                        "groupId": 1,
                        "groupName": "PENDING",
                        "id": 7,
                        "name": "PENDING_ACCEPTED",
                        "description": "Message accepted, pending for delivery."
                    }
                },
                {
                    "to": "john.doe0@example.com",
                    "messageId": "anotherMessageId",
                    "status": {
                        "groupId": 1,
                        "groupName": "PENDING",
                        "id": 7,
                        "name": "PENDING_ACCEPTED",
                        "description": "Message accepted, pending for delivery."
                    }
                }
            ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $sendEmailApi = new SendEmailApi(config: $this->getConfiguration(), client: $client);

        $closures = [
            fn () => $sendEmailApi->sendEmail(
                to: ['joan.doe0@example.com', 'john.doe@example.com'],
                from: 'anna.doe@example.com',
                subject: 'Email test message',
                text: 'This is sample Email message'
            ),
            fn () => $sendEmailApi->sendEmailAsync(
                to: ['joan.doe0@example.com', 'john.doe@example.com'],
                from: 'anna.doe@example.com',
                subject: 'Email test message',
                text: 'This is sample Email message'
            ),
        ];

        foreach ($closures as $index => $closure) {
            /** @var EmailSendResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure());

            $this->assertCount(2, $responseModel->getMessages());
            $expectedMessageResponse = new EmailResponseDetails(
                to: 'joan.doe0@example.com',
                messageId: 'someMessageId',
                status: new MessageStatus(
                    groupId: 1,
                    groupName: 'PENDING',
                    id: 7,
                    name: 'PENDING_ACCEPTED',
                    description: 'Message accepted, pending for delivery.'
                )
            );
            $expectedAnotherMessageResponse = new EmailResponseDetails(
                to: 'john.doe0@example.com',
                messageId: 'anotherMessageId',
                status: new MessageStatus(
                    groupId: 1,
                    groupName: 'PENDING',
                    id: 7,
                    name: 'PENDING_ACCEPTED',
                    description: 'Message accepted, pending for delivery.'
                )
            );

            $this->assertEquals($expectedMessageResponse, $responseModel->getMessages()[0]);
            $this->assertEquals($expectedAnotherMessageResponse, $responseModel->getMessages()[1]);

            $expectedBodyParts = [
                'to' => ['joan.doe0@example.com', 'john.doe@example.com'],
                'from' => 'anna.doe@example.com',
                'subject' => 'Email test message',
                'text' => 'This is sample Email message'
            ];

            $this->assertMultipartFormRequestWithHeadersAndParts(
                'POST',
                self::EMAIL_SEND_ENDPOINT,
                $expectedBodyParts,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testGetEmailDeliveryReports(): void
    {
        $givenResponse = <<<JSON
        {
            "results": [
                {
                    "applicationId": "my-application-id",
                    "entityId": "my-entity-id",
                    "bulkId": "BULK-1234",
                    "messageId": "MSG-1234",
                    "to": "john.smith@example.com",
                    "sentAt": "2021-09-22T17:42:05.390+0100",
                    "doneAt": "2021-09-22T17:42:06.190+0100",
                    "messageCount": 1,
                    "price": {
                        "pricePerMessage": 0.5,
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
                    }
                }
            ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $sendEmailApi = new SendEmailApi(config: $this->getConfiguration(), client: $client);

        $closures = [
            fn () => $sendEmailApi->getEmailDeliveryReports(
                bulkId: 'BULK-1234',
                messageId: 'MSG-1234',
                campaignReferenceId: 'my-campaign-id',
                limit: 1000
            ),
            fn () => $sendEmailApi->getEmailDeliveryReportsAsync(
                bulkId: 'BULK-1234',
                messageId: 'MSG-1234',
                campaignReferenceId: 'my-campaign-id',
                limit: 1000
            ),
        ];

        foreach ($closures as $index => $closure) {
            /** @var EmailReportsResult $responseModel */
            $responseModel = $this->getUnpackedModel($closure());

            $url = sprintf(
                '%s?bulkId=BULK-1234&messageId=MSG-1234&campaignReferenceId=my-campaign-id&limit=1000',
                self::GET_DELIVERY_REPORTS_ENDPOINT,
            );

            $this->assertCount(1, $responseModel->getResults());
            $expectedEmailReport = new EmailReport(
                applicationId: 'my-application-id',
                entityId: 'my-entity-id',
                bulkId: 'BULK-1234',
                messageId: 'MSG-1234',
                to: 'john.smith@example.com',
                sentAt: new DateTime('2021-09-22T17:42:05.390+0100'),
                doneAt: new DateTime('2021-09-22T17:42:06.190+0100'),
                messageCount: 1,
                price: new MessagePrice(
                    pricePerMessage: 0.5,
                    currency: 'EUR'
                ),
                status: new MessageStatus(
                    groupId: 3,
                    groupName: 'DELIVERED',
                    id: 5,
                    name: 'DELIVERED_TO_HANDSET',
                    description: 'Message delivered to handset'
                ),
                error: new MessageError(
                    groupId: 0,
                    groupName: 'OK',
                    id: 0,
                    name: 'NO_ERROR',
                    description: 'No Error',
                    permanent: false
                )
            );

            $this->assertEquals($expectedEmailReport, $responseModel->getResults()[0]);

            $this->assertRequestWithHeaders(
                'GET',
                $url,
                $requestHistoryContainer[$index],
                ['Accept' => 'application/json']
            );
        }
    }

    public function testGetEmailLogs(): void
    {
        $givenResponse = <<<JSON
        {
            "results": [
            {
                "applicationId": "my-application-id",
                "entityId": "my-entity-id",
                "bulkId": "BULK-1234",
                "messageId": "MSG-1234",
                "to": "john.smith@example.com",
                "from": "Jane Doe <jane.doe@example.com",
                "text": "Mail body text",
                "sentAt": "2021-09-22T17:42:05.390+0100",
                "doneAt": "2021-09-22T17:42:06.190+0100",
                "messageCount": 1,
                "price": {
                    "pricePerMessage": 0.1,
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
                }
            }]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $sendEmailApi = new SendEmailApi(config: $this->getConfiguration(), client: $client);

        $closures = [
            fn () => $sendEmailApi->getEmailLogs(
                bulkId: 'BULK-1234',
                limit: 1
            ),
            fn () => $sendEmailApi->getEmailLogsAsync(
                bulkId: 'BULK-1234',
                limit: 1
            ),
        ];

        foreach ($closures as $index => $closure) {
            /** @var EmailLogsResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure());

            $url = sprintf(
                '%s?bulkId=BULK-1234&limit=1',
                self::GET_EMAIL_LOGS_ENDPOINT,
            );

            assertCount(1, $responseModel->getResults());
            $expectedEmailLog = new EmailLog(
                applicationId: "my-application-id",
                entityId: "my-entity-id",
                bulkId: "BULK-1234",
                messageId: "MSG-1234",
                to: "john.smith@example.com",
                from: "Jane Doe <jane.doe@example.com",
                text: "Mail body text",
                sentAt: new DateTime("2021-09-22T17:42:05.390+0100"),
                doneAt: new DateTime("2021-09-22T17:42:06.190+0100"),
                messageCount: 1,
                price: new MessagePrice(
                    pricePerMessage: 0.1,
                    currency: "EUR"
                ),
                status: new MessageStatus(
                    groupId: 3,
                    groupName: "DELIVERED",
                    id: 5,
                    name: "DELIVERED_TO_HANDSET",
                    description: "Message delivered to handset"
                ),
                error: new MessageError(
                    groupId: 0,
                    groupName: "OK",
                    id: 0,
                    name: "NO_ERROR",
                    description: "No Error",
                    permanent: false
                )
            );

            $this->assertEquals($expectedEmailLog, $responseModel->getResults()[0]);

            $this->assertRequestWithHeaders(
                'GET',
                $url,
                $requestHistoryContainer[$index],
                ['Accept' => 'application/json']
            );
        }
    }
}
