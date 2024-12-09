<?php

declare(strict_types=1);

namespace Infobip\Test\Api\Mms;

use Infobip\Model\MmsInboundWebhookRequest;
use Infobip\Test\Api\ApiTestBase;

class MmsWebhookTest extends ApiTestBase
{
    public function testInboundMessageSerialization(): void
    {
        // given
        $givenResponse = <<<JSON
        {
            "results":
            [
                {
                    "from": "385916242493",
                    "to": "385921004026",
                    "receivedAt": "2016-10-06T09:28:39.220+00:00",
                    "messageId": "817790313235066447",
                    "pairedMessageId": "some-mesage-id",
                    "callbackData": "some-callback-data",
                    "userAgent": "iPhone_12_Pro_Max_A2342",
                    "message": [
                        {
                            "contentType": "image/jpeg",
                            "url": "https://examplelink.com/123456"
                        },
                        {
                            "contentType": "text/plain",
                            "value": "This is message text"
                        }
                    ],
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
            ->deserialize($givenResponse, MmsInboundWebhookRequest::class);

        $actualResponse = $this->getObjectSerializer()->serialize($model);

        // then
        $this->assertEquals(
            \json_decode($givenResponse, true),
            \json_decode($actualResponse, true)
        );
    }
}
