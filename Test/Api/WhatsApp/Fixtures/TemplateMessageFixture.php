<?php

// phpcs:ignorefile

declare(strict_types=1);

use Infobip\Model\WhatsAppDocumentHeaderApiData;
use Infobip\Model\WhatsAppImageHeaderApiData;
use Infobip\Model\WhatsAppLocationHeaderApiData;
use Infobip\Model\WhatsAppQuickReplyButtonApiData;
use Infobip\Model\WhatsAppTextHeaderApiData;
use Infobip\Model\WhatsAppUrlButtonApiData;
use Infobip\Model\WhatsAppVideoHeaderApiData;

$requestVars = [
    'messages' => [
        // text header
        [
            'from' => '447860099299',
            'to' => '385958000000',
            'content' => [
                'templateName' => 'some template name',
                'templateData' => [
                    'body' => [
                        'placeholders' => [
                            'placeholder1', 'placeholder2'
                        ],
                    ],
                    'header' => [
                        'type' => WhatsAppTextHeaderApiData::FORMAT,
                        'placeholder' => 'placeholder value',
                    ],
                    'buttons' => [
                        [
                            'type' => WhatsAppQuickReplyButtonApiData::TYPE,
                            'parameter' => 'some parameter',
                        ],
                        [
                            'type' => WhatsAppUrlButtonApiData::TYPE,
                            'parameter' => 'https://www.google.com',
                        ],
                    ],
                ],
                'language' => 'en',
            ],
            'callbackData' => 'some callback data',
            'notifyUrl' => 'https://www.example.com/whatsapp',
            'smsFailover' => [
                'from' => '447860099299',
                'text' => 'Some text',
            ]
        ],
        // document header
        [
            'from' => '447860099299',
            'to' => '385958000000',
            'content' => [
                'templateName' => 'some template name',
                'templateData' => [
                    'body' => [
                        'placeholders' => [
                            'placeholder1', 'placeholder2'
                        ],
                    ],
                    'header' => [
                        'type' => WhatsAppDocumentHeaderApiData::FORMAT,
                        'mediaUrl' => 'https://www.americanexpress.com/content/dam/amex/us/staticassets/pdf/GCO/Test_PDF.pdf',
                        'filename' => 'Test_PDF.pdf',
                    ],
                    'buttons' => [
                        [
                            'type' => WhatsAppQuickReplyButtonApiData::TYPE,
                            'parameter' => 'some parameter',
                        ],
                        [
                            'type' => WhatsAppUrlButtonApiData::TYPE,
                            'parameter' => 'https://www.google.com',
                        ],
                    ],
                ],
                'language' => 'en',
            ],
            'callbackData' => 'some callback data',
            'notifyUrl' => 'https://www.example.com/whatsapp',
            'smsFailover' => [
                'from' => '447860099299',
                'text' => 'Some text',
            ]
        ],
        // image header
        [
            'from' => '447860099299',
            'to' => '385958000000',
            'content' => [
                'templateName' => 'some template name',
                'templateData' => [
                    'body' => [
                        'placeholders' => [
                            'placeholder1', 'placeholder2'
                        ],
                    ],
                    'header' => [
                        'type' => WhatsAppImageHeaderApiData::FORMAT,
                        'mediaUrl' => 'https://www.americanexpress.com/content/dam/amex/us/staticassets/pdf/GCO/Test_PDF.pdf',
                    ],
                    'buttons' => [
                        [
                            'type' => WhatsAppQuickReplyButtonApiData::TYPE,
                            'parameter' => 'some parameter',
                        ],
                        [
                            'type' => WhatsAppUrlButtonApiData::TYPE,
                            'parameter' => 'https://www.google.com',
                        ],
                    ],
                ],
                'language' => 'en',
            ],
            'callbackData' => 'some callback data',
            'notifyUrl' => 'https://www.example.com/whatsapp',
            'smsFailover' => [
                'from' => '447860099299',
                'text' => 'Some text',
            ]
        ],
        // video header
        [
            'from' => '447860099299',
            'to' => '385958000000',
            'content' => [
                'templateName' => 'some template name',
                'templateData' => [
                    'body' => [
                        'placeholders' => [
                            'placeholder1', 'placeholder2'
                        ],
                    ],
                    'header' => [
                        'type' => WhatsAppVideoHeaderApiData::FORMAT,
                        'mediaUrl' => 'https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_480_1_5MG.mp4',
                    ],
                    'buttons' => [
                        [
                            'type' => WhatsAppQuickReplyButtonApiData::TYPE,
                            'parameter' => 'some parameter',
                        ],
                        [
                            'type' => WhatsAppUrlButtonApiData::TYPE,
                            'parameter' => 'https://www.google.com',
                        ],
                    ],
                ],
                'language' => 'en',
            ],
            'callbackData' => 'some callback data',
            'notifyUrl' => 'https://www.example.com/whatsapp',
            'smsFailover' => [
                'from' => '447860099299',
                'text' => 'Some text',
            ]
        ],
        // location header
        [
            'from' => '447860099299',
            'to' => '385958000000',
            'content' => [
                'templateName' => 'some template name',
                'templateData' => [
                    'body' => [
                        'placeholders' => [
                            'placeholder1', 'placeholder2'
                        ],
                    ],
                    'header' => [
                        'type' => WhatsAppLocationHeaderApiData::FORMAT,
                        'latitude' => 44.9526862,
                        'longitude' => 13.8545217
                    ],
                    'buttons' => [
                        [
                            'type' => WhatsAppQuickReplyButtonApiData::TYPE,
                            'parameter' => 'some parameter',
                        ],
                        [
                            'type' => WhatsAppUrlButtonApiData::TYPE,
                            'parameter' => 'https://www.google.com',
                        ],
                    ],
                ],
                'language' => 'en',
            ],
            'callbackData' => 'some callback data',
            'notifyUrl' => 'https://www.example.com/whatsapp',
            'smsFailover' => [
                'from' => '447860099299',
                'text' => 'Some text',
            ]
        ]
    ]
];

$responseVars = [
    'messageId'     => '2250be2d4219-3af1-78856-aabe-1362af1edfd2',
    'statusName'    => 'PENDING_ENROUTE',
    'messageCount'  => 1,
];

$responses = [];

foreach ($requestVars['messages'] as $messageItem) {
    $responses[] = [
        'to' => $messageItem['to'],
        'messageCount' => $responseVars['messageCount'],
        'messageId' => $responseVars['messageId'],
        'status' => [
            'groupId' => 1,
            'groupName' => 'PENDING',
            'id' => 7,
            'name' => $responseVars['statusName'],
            'description' => 'Message sent to next instance',
        ]
    ];
}

$givenResponse = \json_encode(
    [
        'messages' => $responses,
        'bulkId' => '2034072219640523073',
    ],
    JSON_PRETTY_PRINT
);

$expectedRequest = \json_encode($requestVars);

return [$requestVars, $responseVars, $givenResponse, $expectedRequest];
