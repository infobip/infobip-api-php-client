<?php

namespace Infobip\Test\Api\MessagesAPI;

use Infobip\Model\MessagesApiDeliveryReport;
use Infobip\Model\MessagesApiIncomingMessage;
use Infobip\Model\MessagesApiSeenReport;
use Infobip\Test\Api\ApiTestBase;

class MessagesApiWebhookSerializationTest extends ApiTestBase
{
    public function testReceiveIncomingMessages()
    {
        $givenResponse = <<<JSON
        {
          "results": [
            {
              "channel": "SMS",
              "sender": "48123234567",
              "destination": "48123098765",
              "content": [
                {
                  "text": "Text message 123",
                  "cleanText": "Text message",
                  "type": "TEXT"
                }
              ],
              "receivedAt": "2020-02-06T14:18:29.797+00:00",
              "messageId": "ABEGVUGWh3gEAgo-sLTvmQCS5kwjhsy",
              "platform": {
                "entityId": "my-entity-id",
                "applicationId": "my-application-id"
              },
              "event": "MO"
            }
          ]
        }
        JSON;

        $model = $this
            ->getObjectSerializer()
            ->deserialize($givenResponse, MessagesApiIncomingMessage::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        $this->assertEquals(
            \json_decode($givenResponse, true),
            \json_decode($actualResponse, true)
        );

    }

    public function testReceiveDeliveryReports()
    {
        $givenResponse = <<<JSON
        {
          "results": [
            {
              "event": "DELIVERY",
              "channel": "WHATSAPP",
              "sender": "senderNumber",
              "destination": "41793026727",
              "sentAt": "2024-02-06T14:18:29.797+0000",
              "doneAt": "2024-02-06T17:18:29.797+0000",
              "bulkId": "1688025180464000013",
              "messageId": "ABEGVUGWh3gEAgo-sLTvmQCS5kwjhsy",
              "messageCount": 1,
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
                "entityId": "my-entity-id",
                "applicationId": "my-application-id"
              },
              "campaignReferenceId": "campaignRef"
            }
          ]
        }
        JSON;

        $model = $this
            ->getObjectSerializer()
            ->deserialize($givenResponse, MessagesApiDeliveryReport::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        $this->assertEquals(
            \json_decode($givenResponse, true),
            \json_decode($actualResponse, true)
        );

    }

    public function testReceiveSeenReports()
    {
        $givenResponse = <<<JSON
        {
          "results": [
            {
              "event": "SEEN",
              "channel": "WHATSAPP",
              "sender": "senderNumber",
              "destination": "41793026727",
              "sentAt": "2024-02-06T14:18:29.797+00:00",
              "seenAt": "2024-02-06T14:28:29.797+00:00",
              "bulkId": "1688025180464000013",
              "messageId": "ABEGVUGWh3gEAgo-sLTvmQCS5kwjhsy",
              "callbackData": "reference-callback-data-from-outbound-message",
              "platform": {
                "entityId": "my-entity-id",
                "applicationId": "my-application-id"
              },
              "campaignReferenceId": "campaignRef"
            }
          ]
        }
        JSON;

        $model = $this
            ->getObjectSerializer()
            ->deserialize($givenResponse, MessagesApiSeenReport::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        $this->assertEquals(
            \json_decode($givenResponse, true),
            \json_decode($actualResponse, true)
        );

    }
}
