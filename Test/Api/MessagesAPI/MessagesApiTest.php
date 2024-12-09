<?php

namespace Infobip\Test\Api\MessagesAPI;

use Infobip\Api\MessagesApi;
use Infobip\Model\MessageResponse;
use Infobip\Model\MessageResponseDetails;
use Infobip\Model\MessagesApiEventRequest;
use Infobip\Model\MessagesApiMessage;
use Infobip\Model\MessagesApiMessageContent;
use Infobip\Model\MessagesApiMessageTextBody;
use Infobip\Model\MessagesApiOutboundTypingStartedEvent;
use Infobip\Model\MessagesApiRequest;
use Infobip\Model\MessagesApiToDestination;
use Infobip\Model\MessageStatus;
use Infobip\Test\Api\ApiTestBase;

class MessagesApiTest extends ApiTestBase
{
    private const string SEND_MESSAGES_API_MESSAGE = "/messages-api/1/messages";
    private const string SEND_MESSAGES_API_EVENTS = "/messages-api/1/events";


    public function testSendMessagesApiMessage(): void
    {
        $givenRequest = <<<JSON
        {
          "messages": [
            {
              "channel": "SMS",
              "sender": "447491163443",
              "destinations": [
                {
                  "to": "myDestination"
                }
              ],
              "content": {
                "body": {
                  "text": "May the Force be with you.",
                  "type": "TEXT"
                }
              }
            }
          ]
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "messages": [
            {
              "messageId": "1688025180464000014",
              "status": {
                "groupId": 1,
                "groupName": "PENDING",
                "id": 26,
                "name": "MESSAGE_ACCEPTED",
                "description": "Message sent to next instance"
              },
              "destination": "myDestination"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $messagesApi = new MessagesApi(config: $this->getConfiguration(), client: $client);

        $request = new MessagesApiRequest(
            messages: [
                new MessagesApiMessage(
                    channel: 'SMS',
                    sender: '447491163443',
                    destinations: [
                        new MessagesApiToDestination(to: 'myDestination')
                    ],
                    content: new MessagesApiMessageContent(
                        body: new MessagesApiMessageTextBody(
                            text: 'May the Force be with you.',
                        )
                    )
                )
            ]
        );

        $closures = [
            fn () => $messagesApi->sendMessagesApiMessage($request),
            fn () => $messagesApi->sendMessagesApiMessageAsync($request)
        ];

        foreach ($closures as $index => $closure) {
            /** @var MessageResponse $response */
            $response = $this->getUnpackedModel($closure(), MessageResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeadersAndJsonBody(
                'POST',
                self::SEND_MESSAGES_API_MESSAGE,
                $givenRequest,
                $requestHistoryContainer[$index]
            );

            $this->assertInstanceOf(MessageResponse::class, $response);
            $expectedMessageResponse = new MessageResponse(
                messages: [
                    new MessageResponseDetails(
                        messageId: '1688025180464000014',
                        status: new MessageStatus(
                            groupId: 1,
                            groupName: 'PENDING',
                            id: 26,
                            name: 'MESSAGE_ACCEPTED',
                            description: 'Message sent to next instance'
                        ),
                        destination: 'myDestination'
                    )
                ]
            );

            $this->assertEquals($expectedMessageResponse, $response);
        }
    }

    public function testSendMessagesApiEvents(): void
    {
        $givenRequest = <<<JSON
        {
          "events": [
            {
              "channel": "APPLE_MB",
              "sender": "senderNumber",
              "destinations": [
                {
                  "to": "myDestination"
                }
              ],
              "event": "TYPING_STARTED"
            }
          ]
        }
        JSON;

        $givenResponse = <<<JSON
        {
          "messages": [
            {
              "messageId": "1688025180464000014",
              "status": {
                "groupId": 1,
                "groupName": "PENDING",
                "id": 26,
                "name": "MESSAGE_ACCEPTED",
                "description": "Message sent to next instance"
              },
              "destination": "myDestination"
            }
          ]
        }
        JSON;

        $requestHistoryContainer = [];
        $responses = $this->makeResponses(2, $givenResponse, 200);
        $client = $this->mockClient($responses, $requestHistoryContainer);

        $messagesApi = new MessagesApi(config: $this->getConfiguration(), client: $client);

        $request = new MessagesApiEventRequest(
            events: [
                new MessagesApiOutboundTypingStartedEvent(
                    channel: 'APPLE_MB',
                    sender: 'senderNumber',
                    destinations: [
                        new MessagesApiToDestination(to: 'myDestination')
                    ]
                )
            ]
        );

        $closures = [
            fn () => $messagesApi->sendMessagesApiEvents($request),
            fn () => $messagesApi->sendMessagesApiEventsAsync($request)
        ];

        foreach ($closures as $index => $closure) {
            /** @var MessageResponse $response */
            $response = $this->getUnpackedModel($closure(), MessageResponse::class, $requestHistoryContainer);

            $this->assertRequestWithHeadersAndJsonBody(
                'POST',
                self::SEND_MESSAGES_API_EVENTS,
                $givenRequest,
                $requestHistoryContainer[$index]
            );

            $this->assertInstanceOf(MessageResponse::class, $response);
            $expectedMessageResponse = new MessageResponse(
                messages: [
                    new MessageResponseDetails(
                        messageId: '1688025180464000014',
                        status: new MessageStatus(
                            groupId: 1,
                            groupName: 'PENDING',
                            id: 26,
                            name: 'MESSAGE_ACCEPTED',
                            description: 'Message sent to next instance'
                        ),
                        destination: 'myDestination'
                    )
                ]
            );

            $this->assertEquals($expectedMessageResponse, $response);
        }
    }
}
