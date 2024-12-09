<?php

declare(strict_types=1);

namespace Infobip\Test\Api\Sms;

use DateTime;
use GuzzleHttp\Promise\Utils;
use Infobip\Api\SmsApi;
use Infobip\Model\DeliveryDay;
use Infobip\Model\DeliveryTime;
use Infobip\Model\DeliveryTimeWindow;
use Infobip\Model\SmsBinaryContent;
use Infobip\Model\SmsBulkRequest;
use Infobip\Model\SmsBulkResponse;
use Infobip\Model\SmsBulkStatus;
use Infobip\Model\SmsBulkStatusResponse;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsLanguage;
use Infobip\Model\SmsMessage;
use Infobip\Model\SmsMessageDeliveryReporting;
use Infobip\Model\SmsMessageOptions;
use Infobip\Model\SmsMessageRequestOptions;
use Infobip\Model\SmsMessageResponseDetails;
use Infobip\Model\SmsMessageStatus;
use Infobip\Model\SmsPreviewRequest;
use Infobip\Model\SmsPreviewResponse;
use Infobip\Model\SmsRequest;
use Infobip\Model\SmsRequestSchedulingSettings;
use Infobip\Model\SmsResponse;
use Infobip\Model\SmsResponseDetails;
use Infobip\Model\SmsTextContent;
use Infobip\Model\SmsTracking;
use Infobip\Model\SmsUpdateStatusRequest;
use Infobip\Model\SmsWebhooks;
use Infobip\Model\UrlOptions;
use Infobip\Model\ValidityPeriod;
use Infobip\Test\Api\ApiTestBase;

class SmsOutboundApiTest extends ApiTestBase
{
    private const string SEND_SMS_MESSAGES = "/sms/3/messages";
    private const string PREVIEW_SMS_MESSAGE = "/sms/1/preview";
    private const string SCHEDULED_SMS_MESSAGES = "/sms/1/bulks";
    private const string SCHEDULED_SMS_MESSAGES_STATUS = "/sms/1/bulks/status";


    public function testSendSmsMessages(): void
    {
        $givenRequest = <<<JSON
        {
          "messages": [
            {
              "sender": "InfoSMS",
              "destinations": [
                {
                  "to": "41793026727",
                  "messageId": "MESSAGE-ID-123-xyz"
                },
                {
                  "to": "41793026834"
                }
              ],
              "content": {
                "text": "Artık Ulusal Dil Tanımlayıcısı ile Türkçe karakterli smslerinizi rahatlıkla iletebilirsiniz.",
                "transliteration": "TURKISH",
                "language": {
                  "languageCode": "TR",
                  "lockingShift": false,
                  "singleShift": false
                }
              },
              "options": {
                "validityPeriod": {
                  "amount": 720,
                  "timeUnit": "HOURS"
                },
                "campaignReferenceId": "summersale"
              },
              "webhooks": {
                "delivery": {
                  "url": "https://www.example.com/sms/advanced",
                  "intermediateReport": true
                },
                "contentType": "application/json",
                "callbackData": "DLR callback data"
              }
            },
            {
              "sender": "41793026700",
              "destinations": [
                {
                  "to": "41793026700"
                }
              ],
              "content": {
                "text": "A long time ago, in a galaxy far, far away... It is a period of civil war. Rebel spaceships, striking from a hidden base, have won their first victory against the evil Galactic Empire."
              },
              "options": {
                "deliveryTimeWindow": {
                  "days": [
                    "MONDAY",
                    "TUESDAY",
                    "WEDNESDAY",
                    "THURSDAY",
                    "FRIDAY",
                    "SATURDAY",
                    "SUNDAY"
                  ],
                  "from": {
                    "hour": 6,
                    "minute": 0
                  },
                  "to": {
                    "hour": 15,
                    "minute": 30
                  }
                }
              }
            }
          ],
          "options": {
            "schedule": {
              "bulkId": "BULK-ID-123-xyz",
              "sendAt": "2021-08-24T15:00:00.000+00:00"
            },
            "tracking": {
              "shortenUrl": true,
              "trackClicks": true,
              "trackingUrl": "https://example.com/click-report",
              "removeProtocol": true,
              "customDomain": "example.com"
            },
            "includeSmsCountInResponse": true,
            "conversionTracking": {
              "useConversionTracking": true,
              "conversionTrackingName": "MY_CAMPAIGN"
            }
          }
        }
        JSON;

        $givenResponse = <<< JSON
        {
          "bulkId": "BULK-ID-123-xyz",
          "messages": [
            {
              "messageId": "MESSAGE-ID-123-xyz",
              "status": {
                "groupId": 1,
                "groupName": "PENDING",
                "id": 26,
                "name": "PENDING_ACCEPTED",
                "description": "Message sent to next instance"
              },
              "destination": "41793026727",
              "details": {
                "messageCount": 1
              }
            },
            {
              "messageId": "3350be2d4219-3af1-23343-bbbb-1362af1edfd3",
              "status": {
                "groupId": 1,
                "groupName": "PENDING",
                "id": 26,
                "name": "PENDING_ACCEPTED",
                "description": "Message sent to next instance"
              },
              "destination": "41435675123",
              "details": {
                "messageCount": 1
              }
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $smsApi = new SmsApi(config: $this->getConfiguration(), client: $client);

        $request = new SmsRequest(
            messages: [
                new SmsMessage(
                    destinations: [
                        new SmsDestination(
                            to: "41793026727",
                            messageId: "MESSAGE-ID-123-xyz"
                        ),
                        new SmsDestination(
                            to: "41793026834"
                        )
                    ],
                    content: new SmsTextContent(
                        text: "Artık Ulusal Dil Tanımlayıcısı ile Türkçe karakterli smslerinizi rahatlıkla iletebilirsiniz.",
                        transliteration: "TURKISH",
                        language: new SmsLanguage(
                            languageCode: "TR"
                        )
                    ),
                    sender: "InfoSMS",
                    options: new SmsMessageOptions(
                        validityPeriod: new ValidityPeriod(
                            amount: 720,
                            timeUnit: "HOURS"
                        ),
                        campaignReferenceId: "summersale"
                    ),
                    webhooks: new SmsWebhooks(
                        delivery: new SmsMessageDeliveryReporting(
                            url: "https://www.example.com/sms/advanced",
                            intermediateReport: true
                        ),
                        contentType: "application/json",
                        callbackData: "DLR callback data"
                    )
                ),
                new SmsMessage(
                    destinations: [
                        new SmsDestination(
                            to: "41793026700"
                        )
                    ],
                    content: new SmsTextContent(
                        text: "A long time ago, in a galaxy far, far away... It is a period of civil war. Rebel spaceships, striking from a hidden base, have won their first victory against the evil Galactic Empire."
                    ),
                    sender: "41793026700",
                    options: new SmsMessageOptions(
                        deliveryTimeWindow: new DeliveryTimeWindow(
                            days: [
                                DeliveryDay::MONDAY,
                                DeliveryDay::TUESDAY,
                                DeliveryDay::WEDNESDAY,
                                DeliveryDay::THURSDAY,
                                DeliveryDay::FRIDAY,
                                DeliveryDay::SATURDAY,
                                DeliveryDay::SUNDAY
                            ],
                            from: new DeliveryTime(
                                hour: 6,
                                minute: 0
                            ),
                            to: new DeliveryTime(
                                hour: 15,
                                minute: 30
                            )
                        )
                    )
                )
            ],
            options: new SmsMessageRequestOptions(
                schedule: new SmsRequestSchedulingSettings(
                    bulkId: "BULK-ID-123-xyz",
                    sendAt: new DateTime("2021-08-24T15:00:00.000+00:00")
                ),
                tracking: new UrlOptions(
                    shortenUrl: true,
                    trackClicks: true,
                    trackingUrl: "https://example.com/click-report",
                    removeProtocol: true,
                    customDomain: "example.com"
                ),
                includeSmsCountInResponse: true,
                conversionTracking: new SmsTracking(
                    useConversionTracking: true,
                    conversionTrackingName: "MY_CAMPAIGN"
                )
            )
        );

        $expectedPath = self::SEND_SMS_MESSAGES;

        $expectedHttpMethod = 'POST';

        $closures = [
            fn () => $smsApi->sendSmsMessages($request),
            fn () => $smsApi->sendSmsMessagesAsync($request)
        ];

        foreach ($closures as $index => $closure) {
            /** @var SmsResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure(), SmsResponse::class);

            $this->assertRequestWithHeadersAndJsonBody(
                $expectedHttpMethod,
                $expectedPath,
                $givenRequest,
                $requestHistoryContainer[$index]
            );

            $this->assertCount(2, $responseModel->getMessages());
            $this->assertEquals("BULK-ID-123-xyz", $responseModel->getBulkId());

            $expectedFirstSmsResponse = new SmsResponseDetails(
                messageId: "MESSAGE-ID-123-xyz",
                status: new SmsMessageStatus(
                    groupId: 1,
                    groupName: "PENDING",
                    id: 26,
                    name: "PENDING_ACCEPTED",
                    description: "Message sent to next instance"
                ),
                destination: "41793026727",
                details: new SmsMessageResponseDetails(
                    messageCount: 1
                )
            );

            $expectedSecondSmsResponse = new SmsResponseDetails(
                messageId: "3350be2d4219-3af1-23343-bbbb-1362af1edfd3",
                status: new SmsMessageStatus(
                    groupId: 1,
                    groupName: "PENDING",
                    id: 26,
                    name: "PENDING_ACCEPTED",
                    description: "Message sent to next instance"
                ),
                destination: "41435675123",
                details: new SmsMessageResponseDetails(
                    messageCount: 1
                )
            );

            $this->assertEquals($expectedFirstSmsResponse, $responseModel->getMessages()[0]);
            $this->assertEquals($expectedSecondSmsResponse, $responseModel->getMessages()[1]);
        }
    }

    public function testSendBinarySmsMessage()
    {
        $givenRequest = <<<JSON
        {
          "messages": [
            {
              "sender": "InfoSMS",
              "destinations": [
                {
                  "to": "41793026727",
                  "messageId": "MESSAGE-ID-123-xyz"
                }
              ],
              "content": {
                "hex": "54 65 73 74 20 6d 65 73 73 61 67 65 2e",
                "dataCoding": 0,
                "esmClass": 0
              }
            } 
          ]
        }
        JSON;

        $givenResponse = <<< JSON
        {
          "messages": [
            {
              "messageId": "MESSAGE-ID-123-xyz",
              "status": {
                "groupId": 1,
                "groupName": "PENDING",
                "id": 26,
                "name": "PENDING_ACCEPTED",
                "description": "Message sent to next instance"
              },
              "destination": "41793026727"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $smsApi = new SmsApi(config: $this->getConfiguration(), client: $client);

        $request = new SmsRequest(
            messages: [
                new SmsMessage(
                    destinations: [
                        new SmsDestination(
                            to: "41793026727",
                            messageId: "MESSAGE-ID-123-xyz"
                        )
                    ],
                    content: new SmsBinaryContent(
                        hex: "54 65 73 74 20 6d 65 73 73 61 67 65 2e",
                        dataCoding: 0,
                        esmClass: 0
                    ),
                    sender: "InfoSMS"
                )
            ]
        );

        $expectedPath = self::SEND_SMS_MESSAGES;

        $expectedHttpMethod = 'POST';

        $closures = [
            fn () => $smsApi->sendSmsMessages($request),
            fn () => $smsApi->sendSmsMessagesAsync($request)
        ];

        foreach ($closures as $index => $closure) {
            /** @var SmsResponse $responseModel */
            $responseModel = $this->getUnpackedModel($closure(), SmsResponse::class);

            $this->assertRequestWithHeadersAndJsonBody(
                $expectedHttpMethod,
                $expectedPath,
                $givenRequest,
                $requestHistoryContainer[$index]
            );

            $this->assertCount(1, $responseModel->getMessages());

            $expected = new SmsResponseDetails(
                messageId: "MESSAGE-ID-123-xyz",
                status: new SmsMessageStatus(
                    groupId: 1,
                    groupName: "PENDING",
                    id: 26,
                    name: "PENDING_ACCEPTED",
                    description: "Message sent to next instance"
                ),
                destination: "41793026727"
            );

            $this->assertEquals($expected, $responseModel->getMessages()[0]);
        }

    }

    public function testPreviewSmsMessage(): void
    {
        $givenOriginalText = "Let's see how many characters will remain unused in this message.";
        $givenTextPreview = "Let's see how many characters will remain unused in this message.";
        $givenMessageCount = 1;
        $givenCharactersRemaining = 95;

        $givenResponse = <<<JSON
        {
          "originalText": "$givenOriginalText",
          "previews": [{
            "textPreview": "$givenTextPreview",
            "messageCount": $givenMessageCount,
            "charactersRemaining": $givenCharactersRemaining,
            "configuration": {
            }
          }]
        }
        JSON;

        $expectedPreviewText = "Let's see how many characters will remain unused in this message.";

        $expectedRequest = <<<JSON
        {
            "text": "$expectedPreviewText"
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $sendSmsApi = new SmsApi(config: $this->getConfiguration(), client: $client);

        $request = new SmsPreviewRequest(text: $expectedPreviewText);

        # Test sync method call
        $smsPreviewResponse = $sendSmsApi->previewSmsMessage($request);

        $this->assertRequestWithHeadersAndJsonBody(
            'POST',
            self::PREVIEW_SMS_MESSAGE,
            $expectedRequest,
            $requestHistoryContainer[0]
        );

        $this->assertPreviewSmsResponse($smsPreviewResponse);

        # Test async method call
        $promise = $sendSmsApi->previewSmsMessageAsync($request);
        $smsPreviewResponseAsync = Utils::unwrap([$promise])[0];
        $this->assertPreviewSmsResponse($smsPreviewResponseAsync);

        $this->assertRequestWithHeadersAndJsonBody(
            'POST',
            self::PREVIEW_SMS_MESSAGE,
            $expectedRequest,
            $requestHistoryContainer[1]
        );
    }

    public function testGetScheduledSmsMessages(): void
    {
        $givenBulkId = "BULK-ID-123-xyz";
        $givenSendAtMessage = "2021-02-22T17:42:05.390+01:00";

        $givenResponse = <<<JSON
        {
            "bulkId": "$givenBulkId",
            "sendAt": "$givenSendAtMessage"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $smsApi = new SmsApi(config: $this->getConfiguration(), client: $client);

        # Test sync method call
        $smsBulkResponse = $smsApi->getScheduledSmsMessages($givenBulkId);
        $this->assertSmsBulkResponse($smsBulkResponse);

        $this->assertRequestWithHeaders(
            'GET',
            self::SCHEDULED_SMS_MESSAGES . "?bulkId=" . $givenBulkId,
            $requestHistoryContainer[0],
            [
                'Accept' => 'application/json'
            ]
        );

        # Test async method call
        $promise = $smsApi->getScheduledSmsMessagesAsync($givenBulkId);
        $smsBulkResponseAsync = Utils::unwrap([$promise])[0];
        $this->assertSmsBulkResponse($smsBulkResponseAsync);

        $this->assertRequestWithHeaders(
            'GET',
            self::SCHEDULED_SMS_MESSAGES . "?bulkId=" . $givenBulkId,
            $requestHistoryContainer[1],
            [
                'Accept' => 'application/json'
            ]
        );
    }

    public function testRescheduleSmsMessages(): void
    {
        $givenBulkId = "BULK-ID-123-xyz";
        $givenSendAtMessage = "2021-02-22T17:42:05.390+01:00";

        $givenResponse = <<<JSON
        {
            "bulkId": "$givenBulkId",
            "sendAt": "$givenSendAtMessage"
        }
        JSON;

        $expectedRequest = <<<JSON
        {
            "sendAt": "$givenSendAtMessage"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $smsBulkRequest = new SmsBulkRequest(sendAt: new DateTime($givenSendAtMessage));

        $smsApi = new SmsApi(config: $this->getConfiguration(), client: $client);

        # Test sync method call
        $smsBulkResponse = $smsApi->rescheduleSmsMessages($givenBulkId, $smsBulkRequest);
        $this->assertSmsBulkResponse($smsBulkResponse);

        $this->assertRequestWithHeadersAndJsonBody(
            'PUT',
            self::SCHEDULED_SMS_MESSAGES . "?bulkId=" . $givenBulkId,
            $expectedRequest,
            $requestHistoryContainer[0]
        );

        # Test async method call
        $promise = $smsApi->rescheduleSmsMessagesAsync($givenBulkId, $smsBulkRequest);
        $smsBulkResponseAsync = Utils::unwrap([$promise])[0];
        $this->assertSmsBulkResponse($smsBulkResponseAsync);

        $this->assertRequestWithHeadersAndJsonBody(
            'PUT',
            self::SCHEDULED_SMS_MESSAGES . "?bulkId=" . $givenBulkId,
            $expectedRequest,
            $requestHistoryContainer[1]
        );
    }

    public function testGetScheduledSmsMessagesStatus(): void
    {
        $givenBulkId = "BULK-ID-123-xyz";
        $givenStatus = "PAUSED";

        $givenResponse = <<<JSON
        {
            "results": [
                {
                    "bulkId": "$givenBulkId",
                    "status": "$givenStatus",
                    "sentAt": "2021-02-22T17:42:05.390+01:00"
                }
            ]
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $smsApi = new SmsApi(config: $this->getConfiguration(), client: $client);

        # Test sync method call
        $smsBulkStatusResponse = $smsApi->getScheduledSmsMessagesStatus($givenBulkId);
        $this->assertSmsBulkStatusResponse($smsBulkStatusResponse);

        $this->assertRequestWithHeaders(
            'GET',
            self::SCHEDULED_SMS_MESSAGES_STATUS . "?bulkId=" . $givenBulkId,
            $requestHistoryContainer[0],
            [
                'Accept' => 'application/json'
            ]
        );

        # Test async method call
        $promise = $smsApi->getScheduledSmsMessagesStatusAsync($givenBulkId);
        $smsBulkStatusResponseAsync = Utils::unwrap([$promise])[0];
        $this->assertSmsBulkStatusResponse($smsBulkStatusResponseAsync);

        $this->assertRequestWithHeaders(
            'GET',
            self::SCHEDULED_SMS_MESSAGES_STATUS . "?bulkId=" . $givenBulkId,
            $requestHistoryContainer[1],
            [
                'Accept' => 'application/json'
            ]
        );
    }

    public function testUpdateScheduledSmsMessagesStatus(): void
    {
        $givenBulkId = "BULK-ID-123-xyz";
        $givenStatus = SmsBulkStatus::PAUSED;

        $givenResponse = <<<JSON
        {
            "bulkId": "$givenBulkId",
            "status": "$givenStatus"
        }
        JSON;

        $expectedRequest = <<<JSON
        {
            "status": "$givenStatus"
        }
        JSON;

        $requestHistoryContainer = [];

        $responses = $this->makeResponses(2, $givenResponse, 200);

        $client = $this->mockClient($responses, $requestHistoryContainer);

        $smsUpdateStatusRequest = new SmsUpdateStatusRequest(status: SmsBulkStatus::PAUSED);

        $smsApi = new SmsApi(config: $this->getConfiguration(), client: $client);

        # Test sync method call
        $smsBulkStatusResponse = $smsApi
            ->updateScheduledSmsMessagesStatus(
                $givenBulkId,
                $smsUpdateStatusRequest
            );

        $this->assertSmsBulkStatusResponse($smsBulkStatusResponse);

        $this->assertRequestWithHeadersAndJsonBody(
            'PUT',
            self::SCHEDULED_SMS_MESSAGES_STATUS . "?bulkId=" . $givenBulkId,
            $expectedRequest,
            $requestHistoryContainer[0]
        );

        # Test async method call
        $promise = $smsApi->updateScheduledSmsMessagesStatusAsync($givenBulkId, $smsUpdateStatusRequest);
        $smsBulkStatusResponseAsync = Utils::unwrap([$promise])[0];
        $this->assertSmsBulkStatusResponse($smsBulkStatusResponseAsync);

        $this->assertRequestWithHeadersAndJsonBody(
            'PUT',
            self::SCHEDULED_SMS_MESSAGES_STATUS . "?bulkId=" . $givenBulkId,
            $expectedRequest,
            $requestHistoryContainer[1]
        );
    }

    private function assertPreviewSmsResponse(SmsPreviewResponse $smsPreviewResponse): void
    {
        $givenOriginalText = "Let's see how many characters will remain unused in this message.";
        $givenTextPreview = "Let's see how many characters will remain unused in this message.";
        $givenMessageCount = 1;
        $givenCharactersRemaining = 95;

        $this->assertNotNull($smsPreviewResponse);

        $smsPreviews = $smsPreviewResponse->getPreviews();
        $this->assertNotNull($smsPreviews);
        $this->assertCount(1, $smsPreviews);
        $this->assertEquals($givenTextPreview, $smsPreviews[0]->getTextPreview());
        $this->assertEquals($givenMessageCount, $smsPreviews[0]->getMessageCount());
        $this->assertEquals($givenCharactersRemaining, $smsPreviews[0]->getCharactersRemaining());
        $this->assertNotNull($smsPreviews[0]->getConfiguration());
        $this->assertNull($smsPreviews[0]->getConfiguration()->getLanguage());

        $this->assertEquals($givenOriginalText, $smsPreviewResponse->getOriginalText());
    }

    private function assertSmsBulkResponse(SmsBulkResponse $smsBulkResponse): void
    {
        $givenBulkId = "BULK-ID-123-xyz";
        $givenSendAtMessage = "2021-02-22T17:42:05.390+01:00";

        $this->assertNotNull($smsBulkResponse);
        $this->assertEquals($givenBulkId, $smsBulkResponse->getBulkId());
        $this->assertEquals(new DateTime($givenSendAtMessage), $smsBulkResponse->getSendAt());
    }

    private function assertSmsBulkStatusResponse(SmsBulkStatusResponse $smsBulkStatusResponse): void
    {
        $givenBulkId = "BULK-ID-123-xyz";
        $givenStatus = "PAUSED";

        foreach ($smsBulkStatusResponse as $response) {
            $this->assertNotNull($smsBulkStatusResponse);
            $this->assertEquals($givenBulkId, $response->getBulkId());
            $this->assertEquals($givenStatus, $response->getStatus());
        }
    }

}
