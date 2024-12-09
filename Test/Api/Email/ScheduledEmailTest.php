<?php

declare(strict_types=1);

namespace Infobip\Test\Api\Email;

use DateTime;
use Infobip\Api\EmailApi as ScheduledEmailApi;
use Infobip\Model\EmailBulkInfo;
use Infobip\Model\EmailBulkRescheduleRequest;
use Infobip\Model\EmailBulkRescheduleResponse;
use Infobip\Model\EmailBulkScheduleResponse;
use Infobip\Model\EmailBulkStatus;
use Infobip\Model\EmailBulkStatusResponse;
use Infobip\Model\EmailBulkUpdateStatusRequest;
use Infobip\Model\EmailBulkUpdateStatusResponse;
use Infobip\Test\Api\ApiTestBase;

class ScheduledEmailTest extends ApiTestBase
{
    private const string GET_EMAIL_BULKS = "/email/1/bulks";
    private const string RESCHEDULE_EMAILS = "/email/1/bulks";
    private const string SCHEDULED_EMAIL_STATUS = "/email/1/bulks/status";

    public function testGetScheduledEmails(): void
    {
        $givenExternalBulkId = 'BULK-1234';
        $givenBulkId = '1234567890123';
        $givenSendAt = '2021-10-22T17:42:05.390+0100';

        $givenBulkData = [
            [
                $givenBulkId,
                $givenSendAt,
            ]
        ];

        $givenResponse = <<<JSON
        {
            "externalBulkId": "$givenExternalBulkId",
            "bulks": [
                {
                    "bulkId": "$givenBulkId",
                    "sendAt": "$givenSendAt"
                }
            ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $scheduledEmailApi = new ScheduledEmailApi(config: $this->getConfiguration(), client: $client);

        $closures = [
            fn () => $scheduledEmailApi->getScheduledEmails($givenBulkId),
            fn () => $scheduledEmailApi->getScheduledEmailsAsync($givenBulkId),
        ];

        foreach ($closures as $index => $closure) {
            $url = sprintf('%s?bulkId=%s', self::GET_EMAIL_BULKS, $givenBulkId);

            $response = $this->getUnpackedModel($closure());

            $this->assertGetScheduledEmails(
                $response,
                $givenExternalBulkId,
                $givenBulkData,
                $requestHistoryContainer
            );

            $this->assertRequestWithHeaders(
                'GET',
                $url,
                $requestHistoryContainer[$index],
                [
                    'Accept' => 'application/json'
                ]
            );
        }
    }

    public function testRescheduleEmails(): void
    {
        $givenBulkId = '1234567890123';
        $givenSendAt = '2021-10-25T15:00:00.000+01:00';

        $givenBulkData = [
            $givenBulkId,
            $givenSendAt,
        ];

        $expectedRequest = <<<JSON
        {
            "sendAt": "$givenSendAt"
        }
        JSON;

        $givenResponse = <<<JSON
        {
            "bulkId": "$givenBulkId",
            "sendAt": "$givenSendAt"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $scheduledEmailApi = new ScheduledEmailApi(config: $this->getConfiguration(), client: $client);

        $closures = [
            fn () => $scheduledEmailApi->rescheduleEmails(
                $givenBulkId,
                new EmailBulkRescheduleRequest(
                    sendAt: new DateTime($givenSendAt)
                )
            ),
            fn () => $scheduledEmailApi->rescheduleEmailsAsync(
                $givenBulkId,
                new EmailBulkRescheduleRequest(
                    sendAt: new DateTime($givenSendAt)
                )
            ),
        ];

        foreach ($closures as $index => $closure) {
            $response = $this->getUnpackedModel($closure());

            $this->assertRescheduledEmails($response, $givenBulkData);

            $url = sprintf('%s?bulkId=%s', self::RESCHEDULE_EMAILS, $givenBulkId);

            $this->assertRequestWithHeadersAndJsonBody(
                'PUT',
                $url,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    public function testGetScheduledEmailStatuses(): void
    {
        $methodParams = [
            'givenExternalBulkId' => 'BULK-1234',
            'givenBulkId' => '1234567890123',
            'givenBulkId2' => '9876543210123',
            'givenStatus' => EmailBulkStatus::FINISHED,
            'givenStatus2' => EmailBulkStatus::PENDING,
            'givenCount' => 2
        ];

        $givenResponse = <<<JSON
        {
            "externalBulkId": "{$methodParams['givenExternalBulkId']}",
            "bulks": [
            {
                "bulkId": "{$methodParams['givenBulkId']}",
                "status": "{$methodParams['givenStatus']}"
            },
            {
                "bulkId": "{$methodParams['givenBulkId2']}",
                "status": "{$methodParams['givenStatus2']}"
            }
            ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $scheduledEmailApi = new ScheduledEmailApi(config: $this->getConfiguration(), client: $client);

        $closures = [
            fn () => $scheduledEmailApi->getScheduledEmailStatuses($methodParams['givenBulkId']),
            fn () => $scheduledEmailApi->getScheduledEmailStatusesAsync($methodParams['givenBulkId']),
        ];

        foreach ($closures as $index => $closure) {
            $responseModel = $this->getUnpackedModel($closure());

            $url = sprintf('%s?bulkId=%s', self::SCHEDULED_EMAIL_STATUS, $methodParams['givenBulkId']);

            $this->assertGetScheduledEmailStatus($responseModel, $methodParams);

            $this->assertRequestWithHeaders(
                'GET',
                $url,
                $requestHistoryContainer[$index],
                [
                    'Accept' => 'application/json'
                ]
            );
        }
    }

    public function testUpdateScheduledEmailStatuses(): void
    {
        $methodParams = [
            'givenBulkId' => '1234567890123',
            'givenStatus' => EmailBulkStatus::PAUSED,
            'givenCount' => 1
        ];

        $expectedRequest = <<<JSON
        {
            "status": "{$methodParams['givenStatus']}"
        }
        JSON;

        $givenResponse = <<<JSON
        {
            "bulkId": "{$methodParams['givenBulkId']}",
            "status": "{$methodParams['givenStatus']}"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $scheduledEmailApi = new ScheduledEmailApi(config: $this->getConfiguration(), client: $client);

        $request = new EmailBulkUpdateStatusRequest(status: EmailBulkStatus::PAUSED);

        $closures = [
            fn () => $scheduledEmailApi->updateScheduledEmailStatuses(
                $methodParams['givenBulkId'],
                $request
            ),
            fn () => $scheduledEmailApi->updateScheduledEmailStatusesAsync(
                $methodParams['givenBulkId'],
                $request
            ),
        ];

        foreach ($closures as $index => $closure) {
            $url = sprintf('%s?bulkId=%s', self::SCHEDULED_EMAIL_STATUS, $methodParams['givenBulkId']);

            $responseModel = $this->getUnpackedModel($closure());

            $this->assertUpdateEmailStatus($responseModel, $methodParams);

            $this->assertRequestWithHeadersAndJsonBody(
                'PUT',
                $url,
                $expectedRequest,
                $requestHistoryContainer[$index]
            );
        }
    }

    private function assertGetScheduledEmails(
        EmailBulkScheduleResponse $responseModel,
        string                    $givenExternalBulkId,
        array                     $givenBulkData,
        array                     $requestHistoryContainer
    ): void {
        $this->assertCount(count($givenBulkData), $responseModel->getBulks());

        $this->assertEquals($givenExternalBulkId, $responseModel->getExternalBulkId());

        foreach ($responseModel->getBulks() as $index => $bulk) {
            list($givenBulkId, $givenSendAt) = $givenBulkData[$index];

            $this->assertInstanceOf(EmailBulkInfo::class, $bulk);

            $this->assertEquals($givenBulkId, $bulk->getBulkId());

            $this->assertEquals(new DateTime($givenSendAt), $bulk->getSendAt());

            $url = sprintf('%s?bulkId=%s', self::GET_EMAIL_BULKS, $givenBulkId);

            $this->assertRequestWithHeaders(
                'GET',
                $url,
                $requestHistoryContainer[$index],
                [
                    'Accept' => 'application/json'
                ]
            );
        }
    }


    private function assertRescheduledEmails(
        EmailBulkRescheduleResponse $responseModel,
        array                       $givenBulkData
    ): void {
        list($givenBulkId, $givenSendAt) = $givenBulkData;

        $this->assertEquals($givenBulkId, $responseModel->getBulkId());

        $this->assertEquals(new DateTime($givenSendAt), $responseModel->getSendAt());
    }


    private function assertGetScheduledEmailStatus(EmailBulkStatusResponse $responseModel, array $requestParams): void
    {
        $this->assertEquals($requestParams['givenCount'], count($responseModel->getBulks()));

        $bulks = $responseModel->getBulks();
        $bulkFirst = $bulks[0];
        $bulkSecond = $bulks[1];

        $this->assertEquals($requestParams['givenExternalBulkId'], $responseModel->getExternalBulkId());
        $this->assertEquals($requestParams['givenBulkId'], $bulkFirst->getBulkId());
        $this->assertEquals($requestParams['givenBulkId2'], $bulkSecond->getBulkId());
        $this->assertEquals($requestParams['givenStatus'], $bulkFirst->getStatus());
        $this->assertEquals($requestParams['givenStatus2'], $bulkSecond->getStatus());
    }

    private function assertUpdateEmailStatus(EmailBulkUpdateStatusResponse $response, array $requestParams): void
    {
        $this->assertEquals($requestParams['givenBulkId'], $response->getBulkId());
        $this->assertEquals($requestParams['givenStatus'], $response->getStatus());
    }
}
