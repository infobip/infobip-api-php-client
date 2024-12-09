<?php

namespace Infobip\Test\Api\Voice;

use Infobip\Api\ClickToCallApi;
use Infobip\Model\CallsClickToCallMessageBody;
use Infobip\Model\CallsVoiceResponse;
use Infobip\Test\Api\ApiTestBase;

class ClickToCallApiTest extends ApiTestBase
{
    private const string SEND_CLICK_TO_CALL_MESSAGE = "/voice/ctc/1/send";

    public function testSendClickToCallMessage(): void
    {
        $givenRequest = <<<JSON
        {
          "bulkId": "BULK-ID-123-xyz",
          "messages": [
            {
              "from": "41793026700",
              "fromB": "41793026701",
              "destinationA": "41793026727",
              "destinationB": "41793026731",
              "messageId": "MESSAGE-ID-123-xyz",
              "text": "Test Voice message.",
              "language": "en",
              "voice": {
                "name": "Joanna",
                "gender": "female"
              },
              "anonymization": false,
              "notifyUrl": "https://www.example.com/voice/clicktocall",
              "notifyContentType": "application/json",
              "maxDuration": 60,
              "warningTime": 5,
              "retry": {
                "minPeriod": 1,
                "maxPeriod": 5,
                "maxCount": 5
              },
              "machineDetection": "hangup",
              "deliveryTimeWindow": {
                "from": {
                  "hour": 6,
                  "minute": 0
                },
                "to": {
                  "hour": 15,
                  "minute": 30
                },
                "days": [
                  "MONDAY",
                  "TUESDAY",
                  "WEDNESDAY",
                  "THURSDAY",
                  "FRIDAY",
                  "SATURDAY",
                  "SUNDAY"
                ]
              }
            }
          ]
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "bulkId": "4fda521a-c680-470d-b134-83d468f7ac80",
          "messages": [
            {
              "to": "41793026727",
              "status": {
                "groupId": 1,
                "groupName": "PENDING",
                "id": 26,
                "name": "PENDING_ACCEPTED",
                "description": "Message accepted, pending for delivery."
              },
              "messageId": "2250be2d4219-3af1-78856-aabe-1362af1edfd2"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient(
            $responses,
            $requestHistoryContainer
        );

        $api = new ClickToCallApi($this->getConfiguration(), client: $client);

        $expectedPath = self::SEND_CLICK_TO_CALL_MESSAGE;

        $expectedHttpMethod = "POST";

        $request = $this->getObjectSerializer()->deserialize($givenRequest, CallsClickToCallMessageBody::class);

        $closures = [
            fn () => $api->sendClickToCallMessage($request),
            fn () => $api->sendClickToCallMessageAsync($request),
        ];

        $this->assertClosureResponses(
            $closures,
            CallsVoiceResponse::class,
            $givenResponse,
            $expectedPath,
            $expectedHttpMethod,
            $requestHistoryContainer
        );
    }
}
