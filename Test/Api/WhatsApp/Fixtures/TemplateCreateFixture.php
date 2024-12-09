<?php

// phpcs:ignorefile

declare(strict_types=1);

use Infobip\Model\WhatsAppCategory;
use Infobip\Model\WhatsAppLanguage;
use Infobip\Model\WhatsAppPhoneNumberButtonApiData;
use Infobip\Model\WhatsAppQuickReplyButtonApiData;
use Infobip\Model\WhatsAppStatus;
use Infobip\Model\WhatsAppTextHeaderApiData;
use Infobip\Model\WhatsAppUrlButtonApiData;

$requestVars = [
    'allowCategoryChange' => false,
    'name' => 'template_name',
    'language' => WhatsAppLanguage::EN,
    'category' => WhatsAppCategory::MARKETING,
    'structure' => [
        'header' => [
            'format' => WhatsAppTextHeaderApiData::FORMAT,
            'text' => 'header {{1}} content'
        ],
        'body' => ['text' => 'some body text {{1}}'],
        'footer' => ['text' => 'some footer text'],
        'buttons' => [
            [
                'type' => WhatsAppPhoneNumberButtonApiData::TYPE,
                'text' => 'some text',
                'phoneNumber' => '385958000000',
            ],
            [
                'type' => WhatsAppUrlButtonApiData::TYPE,
                'text' => 'some text',
                'url' => 'https://www.google.com',
            ],
            [
                'type' => WhatsAppQuickReplyButtonApiData::TYPE,
                'text' => 'some text',
            ]
        ],
        'type' => 'MEDIA'
    ]
];

$responseVars = [
    'id'     => '111',
    'businessAccountId' => 222,
    'name' => 'exampleName',
    'allowCategoryChange' => false,
    'language' => $requestVars['language'],
    'status'    => WhatsAppStatus::APPROVED,
    'category' => WhatsAppCategory::MARKETING,
    'structure' => [
        'header' => [
            'format' => WhatsAppTextHeaderApiData::FORMAT,
            'text' => 'header {{1}} content',
        ],
        'body' => ['text' => 'some body text {{1}}'],
        'footer' => ['text' => 'some footer text'],
        'type' => 'MEDIA'
    ]
];

$givenResponse = \json_encode($responseVars, JSON_PRETTY_PRINT);

$expectedRequest = \json_encode($requestVars);

return [$requestVars, $responseVars, $givenResponse, $expectedRequest];
