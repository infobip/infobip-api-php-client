<?php

namespace Infobip\Test\Api\Sms;

use Infobip\Model\SmsDeliveryResult;
use Infobip\Model\SmsInboundMessageResult;
use Infobip\Test\Api\ApiTestBase;

use function json_decode;

class SmsWebhookTest extends ApiTestBase
{
    public function testReceiveInboundSmsMessages(): void
    {
        $givenResponse = <<<JSON
        {
          "results": [
            {
              "messageId": "817790313235066447",
              "from": "385916242493",
              "to": "385921004026",
              "text": "QUIZ Correct answer is Paris",
              "cleanText": "Correct answer is Paris",
              "keyword": "QUIZ",
              "receivedAt": "2016-10-06T09:28:39.220+00:00",
              "smsCount": 1,
              "price": {
                "pricePerMessage": 0,
                "currency": "EUR"
              },
              "callbackData": "callbackData"
            }
          ],
          "messageCount": 1,
          "pendingMessageCount": 0
        }
        JSON;

        $model = $this
            ->getObjectSerializer()
            ->deserialize($givenResponse, SmsInboundMessageResult::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        $this->assertEquals(
            json_decode($givenResponse, true),
            json_decode($actualResponse, true)
        );

    }

    public function testReceiveOutboundSmsMessageReport(): void
    {
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
              "messageId": "12db39c3-7822-4e72-a3ec-c87442c0ffc5",
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

        $model = $this
            ->getObjectSerializer()
            ->deserialize($givenResponse, SmsDeliveryResult::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        $this->assertEquals(
            json_decode($givenResponse, true),
            json_decode($actualResponse, true)
        );

    }
}
