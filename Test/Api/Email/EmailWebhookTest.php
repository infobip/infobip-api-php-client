<?php

// phpcs:ignorefile

declare(strict_types=1);

namespace Infobip\Test\Api\Email;

use Infobip\Model\EmailWebhookDLRReportResponse;
use Infobip\Model\EmailWebhookTrackResponse;
use Infobip\Test\Api\ApiTestBase;

class EmailWebhookTest extends ApiTestBase
{
    public function testTrackingReportSerialization(): void
    {
        // given
        $givenResponse = <<<JSON
        {
            "notificationType": "OPENED",
            "domain": "mydomain.com",
            "recipient": "john.doe@somedomain.com",
            "sendDateTime": 1599542877689,
            "messageId": "14b734recsf69n8zkao5",
            "bulkId": "ikzzmbhu6223bxkhmyrj",
            "recipientInfo": {
                "deviceType": "Phone",
                "os": "iOS 12",
                "deviceName": "Apple"
            },
            "geoLocation": {
                "city": "Los Angeles",
                "countryName": "United States"
            }
        }
JSON;

        // when
        $model = $this
            ->getObjectSerializer()
            ->deserialize($givenResponse, EmailWebhookTrackResponse::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        // then
        $this->assertEquals(
            \json_decode($givenResponse, true),
            \json_decode($actualResponse, true)
        );
    }

    public function testReportSerialization(): void
    {
        // given
        $givenResponse = <<<JSON
        {
            "results":
            [
                {
                    "bulkId": "aszzmbhu62l7bxkhmyrj",
                    "price": {
                        "pricePerMessage": 0,
                        "currency": "UNKNOWN"
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
                    "messageId": "hgtesn8bcmc71pujp92d",
                    "doneAt": "2020-09-08T05:27:59.256+00:00",
                    "smsCount": 1,
                    "sentAt": "2020-09-08T05:27:57.628+00:00",
                    "browserLink": "http://tracking.domain.com/render/content?id=9A31C6F61DBAE9664D74C7A5A5A01F92283F581D11EA80A28C12E83BC83D449BC4A9F32F1AE3C3E",
                    "callbackData": "something you want back",
                    "to": "john.doe@gmail.com"
                }
            ]
        }
JSON;

        // when
        $model = $this
            ->getObjectSerializer()
            ->deserialize($givenResponse, EmailWebhookDLRReportResponse::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        // then
        $this->assertEquals(
            \json_decode($givenResponse, true),
            \json_decode($actualResponse, true)
        );
    }
}
