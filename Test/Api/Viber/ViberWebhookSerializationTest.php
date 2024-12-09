<?php

declare(strict_types=1);

namespace Infobip\Test\Api\Viber;

use Infobip\Model\ViberInboundFileContent;
use Infobip\Model\ViberInboundMessageViberInboundContent;
use Infobip\Model\ViberInboundTextContent;
use Infobip\Model\ViberSeenReports;
use Infobip\Model\ViberWebhookReportsResponse;
use Infobip\Test\Api\ApiTestBase;

class ViberWebhookSerializationTest extends ApiTestBase
{
    public function testReceiveViberInboundMessagesText(): void
    {

        // given
        $givenResponse = <<<JSON
        {
            "sender": "385912345678",
            "to": "givenClient",
            "integrationType": "VIBER",
            "receivedAt": "2020-04-01T11:02:43.594+00:00",
            "messageId": "1234567890123456789",
            "pairedMessageId": "message-id",
            "callbackData": "callback-data",
            "message": {
                "text": "givenText",
                "trackingData": "givenTrackingData",
                "type": "TEXT"
            },
            "price": {
                "pricePerMessage": 0.15,
                "currency": "EUR"
            }
        }
        JSON;

        // when
        $model = $this
            ->getObjectSerializer()
            ->deserialize($givenResponse, ViberInboundMessageViberInboundContent::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        // then
        $this->assertInstanceOf(ViberInboundTextContent::class, $model->getMessage());

        $this->assertEquals(
            \json_decode($givenResponse, true),
            \json_decode($actualResponse, true)
        );
    }

    public function testReceiveViberInboundMessagesFile(): void
    {

        // given
        $givenResponse = <<<JSON
        {
            "sender": "385912345678",
            "to": "givenClient",
            "integrationType": "VIBER",
            "receivedAt": "2020-04-01T11:02:43.594+00:00",
            "messageId": "1234567890123456789",
            "pairedMessageId": "message-id",
            "callbackData": "callback-data",
            "message": {
                "url": "https://example.com/somefile",
                "fileName": "somefile",
                "trackingData": "givenTrackingData",
                "type": "FILE"
            },
            "price": {
                "pricePerMessage": 0.15,
                "currency": "EUR"
            }
        }
JSON;

        // when
        $model = $this
            ->getObjectSerializer()
            ->deserialize($givenResponse, ViberInboundMessageViberInboundContent::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        // then
        $this->assertInstanceOf(ViberInboundFileContent::class, $model->getMessage());

        $this->assertEquals(
            \json_decode($givenResponse, true),
            \json_decode($actualResponse, true)
        );
    }

    public function testReceiveViberDeliveryReports(): void
    {

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "bulkId": "a28dd97c-2222-4fcf-99f1-0b557ed381da",
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
              "messageId": "2250be2d4219-3af1-78856-aabe-1362af1edfd2",
              "to": "441134960001",
              "sender": "441134960000",
              "sentAt": "2023-02-01T23:00:00.000+00:00",
              "doneAt": "2023-02-03T00:01:01.000+00:00",
              "messageCount": 1,
              "mccMnc": "22801",
              "callbackData": "Callback data",
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
            ->deserialize($givenResponse, ViberWebhookReportsResponse::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        $this->assertEquals(
            \json_decode($givenResponse, true),
            \json_decode($actualResponse, true)
        );

    }

    public function testReceiveViberSeenReports(): void
    {

        $givenResponse = <<<JSON
        {
          "results": [
            {
              "messageId": "1215f543ab19-345f-adbd-12ad31451ed25f35",
              "from": "385919998888",
              "to": "41793026731",
              "sentAt": "2023-04-05T11:21:57.793+00:00",
              "seenAt": "2023-04-05T11:22:10.251+00:00",
              "applicationId": "example-application-id",
              "entityId": "example-entity-id",
              "campaignReferenceId": "campaignRefId"
            }
          ]
        }
        JSON;

        $model = $this
            ->getObjectSerializer()
            ->deserialize($givenResponse, ViberSeenReports::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        $this->assertEquals(
            \json_decode($givenResponse, true),
            \json_decode($actualResponse, true)
        );

    }

}
