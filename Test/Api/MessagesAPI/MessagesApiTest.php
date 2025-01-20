<?php

namespace Infobip\Test\Api\MessagesAPI;

use Infobip\Api\MessagesApi;
use Infobip\Model\MessageResponse;
use Infobip\Model\MessageResponseDetails;
use Infobip\Model\MessagesApiEventRequest;
use Infobip\Model\MessagesApiMessage;
use Infobip\Model\MessagesApiMessageAddCalendarEventButton;
use Infobip\Model\MessagesApiMessageCardOptions;
use Infobip\Model\MessagesApiMessageCarouselBody;
use Infobip\Model\MessagesApiMessageCarouselCard;
use Infobip\Model\MessagesApiMessageCarouselCardBody;
use Infobip\Model\MessagesApiMessageContent;
use Infobip\Model\MessagesApiMessageOpenUrlButton;
use Infobip\Model\MessagesApiMessageReplyButton;
use Infobip\Model\MessagesApiMessageTextBody;
use Infobip\Model\MessagesApiOutboundMessageChannel;
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

        $this->assertPostRequest(
            $closures,
            self::SEND_MESSAGES_API_MESSAGE,
            $givenRequest,
            $expectedMessageResponse,
            $requestHistoryContainer
        );
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

        $this->assertPostRequest(
            $closures,
            self::SEND_MESSAGES_API_EVENTS,
            $givenRequest,
            $expectedMessageResponse,
            $requestHistoryContainer
        );
    }

    public function testSendRCSMessageWithAddToCalendarButton(): void
    {
        $givenRequest = <<<JSON
        {
          "messages": [
            {
              "channel": "RCS",
              "sender": "mySender",
              "destinations": [
                {
                  "to": "myDestination"
                }
              ],
              "content": {
                "body": {
                  "text": "This is an example text message with a request location button.",
                  "type": "TEXT"
                },
                "buttons": [
                  {
                    "text": "Some example text",
                    "postbackData": "Example of postback data",
                    "type": "ADD_CALENDAR_EVENT",
                    "startTime": "2025-01-10T12:00:00.000+00:00",
                    "endTime": "2025-01-11T12:00:00.000+00:00",
                    "title": "Some example title",
                    "description": "Some example description"
                  }
                ]
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
                    channel: MessagesApiOutboundMessageChannel::RCS,
                    sender: 'mySender',
                    destinations: [
                        new MessagesApiToDestination(to: 'myDestination')
                    ],
                    content: new MessagesApiMessageContent(
                        body: new MessagesApiMessageTextBody(
                            text: 'This is an example text message with a request location button.',
                        ),
                        buttons: [
                            new MessagesApiMessageAddCalendarEventButton(
                                text: 'Some example text',
                                postbackData: 'Example of postback data',
                                startTime: new \DateTime('2025-01-10T12:00:00Z+00:00'),
                                endTime: new \DateTime('2025-01-11T12:00:00Z+00:00'),
                                title: 'Some example title',
                                description: 'Some example description'
                            )
                        ]
                    )
                )
            ]
        );

        $closures = [
            fn () => $messagesApi->sendMessagesApiMessage($request),
            fn () => $messagesApi->sendMessagesApiMessageAsync($request)
        ];

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

        $this->assertPostRequest(
            $closures,
            self::SEND_MESSAGES_API_MESSAGE,
            $givenRequest,
            $expectedMessageResponse,
            $requestHistoryContainer
        );
    }

    public function testSendRCSCarouselMessageWithCardOptions(): void
    {
        $givenRequest = <<<JSON
        {
          "messages": [
            {
              "channel": "RCS",
              "sender": "mySender",
              "destinations": [
                {
                  "to": "myDestination"
                }
              ],
              "content": {
                "body": {
                  "cards": [
                    {
                      "body": {
                        "title": "Clothes store",
                        "text": "New clothes collections",
                        "url": "https://www.example.com/chlothes",
                        "isVideo": false,
                        "cardOptions": {
                          "orientation": "HORIZONTAL",
                          "alignment": "LEFT",
                          "height": "TALL"
                        }
                      },
                      "buttons": [
                        {
                          "text": "Open store",
                          "url": "https://www.example.com/chlothes",
                          "type": "OPEN_URL"
                        },
                        {
                          "text": "No thanks",
                          "postbackData": "Refused.",
                          "type": "REPLY"
                        }
                      ]
                    }
                  ],
                  "type": "CAROUSEL"
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
                    channel: MessagesApiOutboundMessageChannel::RCS,
                    sender: 'mySender',
                    destinations: [
                        new MessagesApiToDestination(to: 'myDestination')
                    ],
                    content: new MessagesApiMessageContent(
                        body: new MessagesApiMessageCarouselBody(
                            cards: [
                                new MessagesApiMessageCarouselCard(
                                    body: new MessagesApiMessageCarouselCardBody(
                                        text: 'New clothes collections',
                                        url: 'https://www.example.com/chlothes',
                                        title: 'Clothes store',
                                        isVideo: false,
                                        cardOptions: new MessagesApiMessageCardOptions(
                                            orientation: 'HORIZONTAL',
                                            alignment: 'LEFT',
                                            height: 'TALL'
                                        )
                                    ),
                                    buttons: [
                                        new MessagesApiMessageOpenUrlButton(
                                            text: 'Open store',
                                            url: 'https://www.example.com/chlothes'
                                        ),
                                        new MessagesApiMessageReplyButton(
                                            text: 'No thanks',
                                            postbackData: 'Refused.'
                                        )
                                    ]
                                )
                            ]
                        )
                    )
                )
            ]
        );

        $closures = [
            fn () => $messagesApi->sendMessagesApiMessage($request),
            fn () => $messagesApi->sendMessagesApiMessageAsync($request)
        ];

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

        $this->assertPostRequest(
            $closures,
            self::SEND_MESSAGES_API_MESSAGE,
            $givenRequest,
            $expectedMessageResponse,
            $requestHistoryContainer
        );
    }
}
