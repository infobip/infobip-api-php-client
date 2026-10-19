<?php

declare(strict_types=1);

use Infobip\Model\WhatsAppAddressType;
use Infobip\Model\WhatsAppEmailType;
use Infobip\Model\WhatsAppPhoneType;
use Infobip\Model\WhatsAppUrlType;

$requestVars = [
    'from' => '44xxxxxxxx65',
    'to' => '44xxxxxxxx44',
    'content' => [
        'contacts' => [
            [
                'addresses' => [
                    [
                        'street' => 'Some street',
                        'city' => 'Zagreb',
                        'zip' => '10000',
                        'country' => 'Croatia',
                        'countryCode' => 'HR',
                        'type' => WhatsAppAddressType::WORK,
                    ],
                    [
                        'street' => 'Some other street',
                        'city' => 'Zagreb',
                        'zip' => '10000',
                        'country' => 'Croatia',
                        'countryCode' => 'HR',
                        'type' => WhatsAppAddressType::HOME,
                    ]
                ],
                'birthday' => '2010-01-01',
                'emails' => [
                    [
                        'email' => 'John.Smith@example.com',
                        'type' => WhatsAppEmailType::WORK,
                    ],
                    [
                        'email' => 'John.Smith.priv@example.com',
                        'type' => WhatsAppEmailType::HOME,
                    ]
                ],
                'name' => [
                    'firstName' => 'John',
                    'lastName' => 'Smith',
                    'middleName' => 'B',
                    'namePrefix' => 'Mr.',
                    'formattedName' => 'Mr. John Smith',
                ],
                'org' => [
                    'company' => 'Company',
                    'department' => 'Department',
                    'title' => 'Director',
                ],
                'phones' => [
                    [
                        'phone' => '+44xxxxxxxx57',
                        'type' => WhatsAppPhoneType::WORK,
                        'waId' => '44xxxxxxxx57',
                    ],
                    [
                        'phone' => '+44xxxxxxxx56',
                        'type' => WhatsAppPhoneType::HOME,
                        'waId' => '44xxxxxxxx56',
                    ],
                    [
                        'phone' => '+44xxxxxxxx55',
                        'type' => WhatsAppPhoneType::CELL,
                        'waId' => '44xxxxxxxx55',
                    ],
                    [
                        'phone' => '+44xxxxxxxx54',
                        'type' => WhatsAppPhoneType::MAIN,
                        'waId' => '44xxxxxxxx54',
                    ]
                ],
                'urls' => [
                    [
                        'url' => 'http://example.com/John.Smith',
                        'type' => WhatsAppUrlType::WORK,
                    ],
                    [
                        'url' => 'http://example.com/John.Smith.priv',
                        'type' => WhatsAppUrlType::HOME,
                    ]
                ]
            ]
        ]
    ],
    'callbackData' => 'some callback data',
    'notifyUrl' => 'https://www.example.com/whatsapp',
];

$responseVars = [
    'messageId'     => '2250be2d4219-3af1-78856-aabe-1362af1edfd2',
    'statusName'    => 'PENDING_ENROUTE',
    'messageCount'  => 1
];

$givenResponse = <<<JSON
        {
            "to": "{$requestVars['to']}",
            "messageCount": {$responseVars['messageCount']},
            "messageId": "{$responseVars['messageId']}",
            "status": {
                "groupId": 1,
                "groupName": "PENDING",
                "id": 7,
                "name": "{$responseVars['statusName']}"
            }
        }
        JSON;

$expectedRequest = \json_encode($requestVars);

return [$requestVars, $responseVars, $givenResponse, $expectedRequest];
