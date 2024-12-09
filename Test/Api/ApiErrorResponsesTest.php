<?php

declare(strict_types=1);

namespace Infobip\Test\Api;

use GuzzleHttp\Promise\Utils;
use GuzzleHttp\Psr7\Response;
use Infobip\Api\SmsApi;
use Infobip\ApiException;
use Infobip\Model\ApiError;
use Infobip\Model\SmsRequest;

class ApiErrorResponsesTest extends ApiTestBase
{
    private const string SEND_SMS_ENDPOINT = "/sms/3/messages";

    /**
     * @dataProvider errorResponsesSource
     */
    public function testErrorResponses(int $httpResponseCode, string $errorCode, string $errorDescription, string $errorAction): void
    {
        $givenResponseHeaders = [
            'Content-Type' => [
                'application/json;charset=UTF-8'
            ],
            'server' => [
                'API'
            ],
            'x-request-id' => [
                '1608758729810312842'
            ]
        ];

        $givenRequest = <<<JSON
        {
          "messages": [
            {
              "sender": "InfoSMS",
              "destinations": [
                {
                  "to": "41793026727"
                }
              ],
              "content": {
                "text": "This is a sample message"
              }
            }
          ]
        }
        JSON;


        $givenResponse = <<<JSON
        {
          "errorCode": "$errorCode",
          "description": "$errorDescription",
          "action": "$errorAction",
          "violations": [ ],
          "resources": [
            {
              "name": "API endpoint documentation",
              "url": "https://www.infobip.com/docs/api/send-sms-messages"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];

        $client = $this->mockClient(
            [
                new Response($httpResponseCode, $givenResponseHeaders, $givenResponse),
                new Response($httpResponseCode, $givenResponseHeaders, $givenResponse),
            ],
            $requestHistoryContainer
        );

        $sendSmsApi = new SmsApi(config: $this->getConfiguration(), client: $client);


        $request = $this->getObjectSerializer()->deserialize($givenRequest, SmsRequest::class);


        # Test sync method call
        try {
            $sendSmsApi->sendSmsMessages($request);
            $this->fail("ApiException should have been thrown!");
        } catch (ApiException $exception) {
            $this->assertErrorResponse(
                $exception,
                $httpResponseCode,
                $givenResponse,
                $givenResponseHeaders,
            );
        }

        $this->assertRequestWithHeadersAndJsonBody(
            'POST',
            self::SEND_SMS_ENDPOINT,
            $givenRequest,
            $requestHistoryContainer[0]
        );

        # Test async method call
        try {
            $promise = $sendSmsApi->sendSmsMessagesAsync($request);
            Utils::unwrap([$promise]);
            $this->fail("ApiException should have been thrown!");
        } catch (ApiException $exception) {
            $this->assertErrorResponse(
                $exception,
                $httpResponseCode,
                $givenResponse,
                $givenResponseHeaders,
            );
        }

        $this->assertRequestWithHeadersAndJsonBody(
            'POST',
            self::SEND_SMS_ENDPOINT,
            $givenRequest,
            $requestHistoryContainer[1]
        );
    }

    public static function errorResponsesSource(): array
    {
        return [
            [400, "E400", 'Request cannot be processed.', 'Check the syntax, violations and adjust the request.'],
            [500, "E500", 'Something went wrong.', 'Something went wrong. Please contact support.'],
        ];
    }

    private function assertErrorResponse(
        ApiException $resultingError,
        int      $expectedResponseCode,
        string   $expectedResponseBody,
        array    $expectedResponseHeaders,
    ): void {
        $this->assertSame($expectedResponseCode, $resultingError->getCode());
        $this->assertSame($expectedResponseBody, $resultingError->getResponseBody());
        $this->assertEquals($expectedResponseHeaders, $resultingError->getResponseHeaders());
        $this->assertInstanceOf(ApiError::class, $resultingError->getResponseObject());

    }
}
