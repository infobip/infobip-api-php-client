<?php

declare(strict_types=1);

namespace Infobip\Test\Api\Sms;

use DateTime;
use GuzzleHttp\Promise\Utils;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsInboundMessageResult;
use Infobip\Test\Api\ApiTestBase;

class SmsInboundApiTest extends ApiTestBase
{
    private const string GET_INBOUND_SMS_MESSAGES = "/sms/1/inbox/reports";

    public function testGetInboundSmsMessages(): void
    {
        $givenMessageId = "817790313235066447";
        $givenFrom = "385916242493";
        $givenTo = "385921004026";
        $givenText = "QUIZ Correct answer is Paris";
        $givenCleanText = "Correct answer is Paris";
        $givenKeyword = "QUIZ";
        $givenReceivedAtString = "2021-08-25T16:10:00.000+05:00";
        $givenSmsCount = 1;
        $givenPricePerMessage = 0;
        $givenCurrency = "EUR";
        $givenCallbackData = "callbackData";
        $givenMessageCount = 1;
        $givenPendingMessageCount = 0;

        $givenResponse = <<<JSON
        {
            "results": [{
                "messageId": "$givenMessageId",
                "from": "$givenFrom",
                "to": "$givenTo",
                "text": "$givenText",
                "cleanText": "$givenCleanText",
                "keyword": "$givenKeyword",
                "receivedAt": "$givenReceivedAtString",
                "smsCount": $givenSmsCount,
                "price": {
                    "pricePerMessage": $givenPricePerMessage,
                    "currency": "$givenCurrency"
                },
                "callbackData": "$givenCallbackData"
            }],
            "messageCount": $givenMessageCount,
            "pendingMessageCount": $givenPendingMessageCount
        }
        JSON;

        $givenLimit = 2;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $smsApi = new SmsApi(config: $this->getConfiguration(), client: $client);

        # Test sync method call
        $smsInboundMessageResult = $smsApi->getInboundSmsMessages($givenLimit);
        $this->assertReceiveSmsResponse($smsInboundMessageResult);

        $this->assertRequestWithHeaders(
            'GET',
            self::GET_INBOUND_SMS_MESSAGES . "?limit=" . $givenLimit,
            $requestHistoryContainer[0],
            [
                'Accept' => 'application/json'
            ]
        );

        # Test async method call
        $promise = $smsApi->getInboundSmsMessagesAsync($givenLimit);
        $smsInboundMessageResultAsync = Utils::unwrap([$promise])[0];
        $this->assertReceiveSmsResponse($smsInboundMessageResultAsync);

        $this->assertRequestWithHeaders(
            'GET',
            self::GET_INBOUND_SMS_MESSAGES . "?limit=" . $givenLimit,
            $requestHistoryContainer[1],
            [
                'Accept' => 'application/json'
            ]
        );
    }

    private function assertReceiveSmsResponse(SmsInboundMessageResult $smsInboundMessageResult): void
    {
        $givenMessageId = "817790313235066447";
        $givenFrom = "385916242493";
        $givenTo = "385921004026";
        $givenText = "QUIZ Correct answer is Paris";
        $givenCleanText = "Correct answer is Paris";
        $givenKeyword = "QUIZ";
        $givenReceivedAtString = "2021-08-25T16:10:00+05:00";
        $givenSmsCount = 1;
        $givenPricePerMessage = 0;
        $givenCurrency = "EUR";
        $givenCallbackData = "callbackData";
        $givenMessageCount = 1;
        $givenPendingMessageCount = 0;

        $this->assertNotNull($smsInboundMessageResult);
        $this->assertEquals($givenMessageCount, $smsInboundMessageResult->getMessageCount());
        $this->assertEquals($givenPendingMessageCount, $smsInboundMessageResult->getPendingMessageCount());
        $this->assertNotNull($smsInboundMessageResult->getResults());
        $this->assertCount(1, $smsInboundMessageResult->getResults());

        $results = $smsInboundMessageResult->getResults();

        $this->assertEquals($givenMessageId, $results[0]->getMessageId());
        $this->assertEquals($givenFrom, $results[0]->getFrom());
        $this->assertEquals($givenTo, $results[0]->getTo());
        $this->assertEquals($givenText, $results[0]->getText());
        $this->assertEquals($givenCleanText, $results[0]->getCleanText());
        $this->assertEquals($givenKeyword, $results[0]->getKeyword());
        $this->assertEquals($givenKeyword, $results[0]->getKeyword());
        $this->assertEquals($givenKeyword, $results[0]->getKeyword());
        $this->assertEquals(new DateTime($givenReceivedAtString), $results[0]->getReceivedAt());
        $this->assertEquals($givenSmsCount, $results[0]->getSmsCount());
        $this->assertEquals($givenCallbackData, $results[0]->getCallbackData());

        $price = $results[0]->getPrice();
        $this->assertEquals($givenCurrency, $price->getCurrency());
        $this->assertEquals($givenPricePerMessage, $price->getPricePerMessage());
    }
}
