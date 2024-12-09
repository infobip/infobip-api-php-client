<?php

declare(strict_types=1);

namespace Infobip\Test\Api\WhatsApp;

use Infobip\Model\WhatsAppTemplateUpdatePushEvent;
use Infobip\Model\WhatsAppWebhookDeliveryResult;
use Infobip\Model\WhatsAppWebhookInboundMessageResult;
use Infobip\Model\WhatsAppWebhookPaymentNotificationResponse;
use Infobip\Model\WhatsAppWebhookSeenResult;
use Infobip\Model\WhatsAppWebhookSystemEventResponse;
use Infobip\Test\Api\ApiTestBase;

class WhatsappWebhookTest extends ApiTestBase
{
    public function testReceiveWhatsappInboundMessages(): void
    {
        // given
        $givenResponse = <<<JSON
        {
            "results":
            [
                {
                    "from": "385919998888",
                    "to": "41793026731",
                    "receivedAt": "2019-07-19T11:23:26.998+00:00",
                    "messageId": "ABEGOFl3VCQoAhBalbc6rTQT6mgS29EmGZ7a",
                    "message": {
                        "type": "TEXT",
                        "text": "Support hello"
                    },
                    "contact": {
                        "name": "Frank"
                    },
                    "price": {
                        "pricePerMessage": 0,
                        "currency": "EUR"
                    }
                }
            ],
            "messageCount": 1,
            "pendingMessageCount": 0
        }
        JSON;

        // when
        $model = $this
            ->getObjectSerializer()
            ->deserialize($givenResponse, WhatsAppWebhookInboundMessageResult::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        // then
        $this->assertEquals(
            \json_decode($givenResponse, true),
            \json_decode($actualResponse, true)
        );
    }

    public function testReceiveWhatsappPaymentNotification(): void
    {
        $givenResponse = <<<JSON
        {
          "from": "41793026731",
          "content": {
            "from": "447860064555",
            "type": "payment",
            "referenceId": "72123248136",
            "paymentId": "fd3e847h2",
            "paymentStatus": "CAPTURED",
            "currency": "INR",
            "totalAmountValue": 21000,
            "totalAmountOffset": 100,
            "callbackData": [
              "customData1"
            ],
            "transactions": [
              {
                "id": "27194245144",
                "type": "UPI",
                "status": "SUCCESS",
                "createdTimestamp": "2023-01-01T01:00:00.000+00:00",
                "updatedTimestamp": "2023-01-01T01:00:00.000+00:00"
              }
            ]
          },
          "createdAt": "2023-01-01T01:00:00.000+00:00"
        }
        JSON;

        $model = $this
            ->getObjectSerializer()
            ->deserialize($givenResponse, WhatsAppWebhookPaymentNotificationResponse::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        $this->assertEquals(
            \json_decode($givenResponse, true),
            \json_decode($actualResponse, true)
        );

    }

    public function testReceiveWhatsappDeliveryReports(): void
    {
        $givenResponse = <<<JSON
        {
          "results": [
            {
              "bulkId": "",
              "price": {
                "pricePerMessage": 0.21,
                "currency": "BRL"
              },
              "status": {
                "id": 5,
                "groupId": 3,
                "groupName": "DELIVERED",
                "name": "DELIVERED_TO_HANDSET",
                "description": "Message delivered to handset"
              },
              "error": {
                "id": 0,
                "name": "NO_ERROR",
                "description": "No Error",
                "groupId": 0,
                "groupName": "OK",
                "permanent": false
              },
              "messageId": "fb469d73-d362-463f-b30f-1e959b53badc",
              "doneAt": "2019-04-09T16:01:56.494-03:00",
              "messageCount": 1,
              "sentAt": "2019-04-09T16:00:58.647-03:00",
              "to": "41793026731"
            }
          ]
        }
        JSON;

        $model = $this
            ->getObjectSerializer()
            ->deserialize($givenResponse, WhatsAppWebhookDeliveryResult::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        $this->assertEquals(
            \json_decode($givenResponse, true),
            \json_decode($actualResponse, true)
        );

    }

    public function testReceiveWhatsappSeenReports(): void
    {
        $givenResponse = <<<JSON
        {
          "results": [
            {
              "messageId": "1215f543ab19-345f-adbd-12ad31451ed25f35",
              "from": "385919998888",
              "to": "41793026731",
              "sentAt": "2018-12-12T11:21:57.793+00:00",
              "seenAt": "2018-12-12T11:21:58.251+00:00",
              "applicationId": "example-application-id",
              "entityId": "example-entity-id"
            }
          ]
        }
        JSON;

        $model = $this
            ->getObjectSerializer()
            ->deserialize($givenResponse, WhatsAppWebhookSeenResult::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        $this->assertEquals(
            \json_decode($givenResponse, true),
            \json_decode($actualResponse, true)
        );

    }

    public function testReceiveWhatsappIdentityChangeNotification(): void
    {
        $givenResponse = <<<JSON
        {
          "from": "41793026731",
          "content": {
            "description": "Security code changed.",
            "hash": "eU2Fdi4EMUw=",
            "type": "user_identity_changed",
            "userNumber": "385919998888"
          },
          "createdAt": "2022-01-18T23:23:09.206+00:00"
        }
        JSON;

        $model = $this
            ->getObjectSerializer()
            ->deserialize($givenResponse, WhatsAppWebhookSystemEventResponse::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        $this->assertEquals(
            \json_decode($givenResponse, true),
            \json_decode($actualResponse, true)
        );

    }

    public function testReceiveWhatsappMessageTemplateUpdateEvents(): void
    {
        $givenResponse = <<<JSON
        {
          "messageTemplateId": 111,
          "messageTemplateName": "template_name",
          "messageTemplateLanguage": "en",
          "timestamp": "2019-11-09T16:00:00.000+00:00",
          "change": {
            "type": "TEMPLATE_STATUS_UPDATE",
            "newStatus": "APPROVED",
            "reason": "NONE"
          },
          "entityId": 123456,
          "applicationId": 1234567
        }
        JSON;

        $model = $this
            ->getObjectSerializer()
            ->deserialize($givenResponse, WhatsAppTemplateUpdatePushEvent::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        $this->assertEquals(
            \json_decode($givenResponse, true),
            \json_decode($actualResponse, true)
        );

    }


}
