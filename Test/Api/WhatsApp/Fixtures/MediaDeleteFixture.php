<?php

// phpcs:ignorefile

declare(strict_types=1);

use Infobip\Model\WhatsAppCategory;
use Infobip\Model\WhatsAppHeaderApiData;
use Infobip\Model\WhatsAppStatus;

$requestVars = [
    'url' => 'https://www.infobip.com/infobip-logo.png',
];

$responseVars = [
    'id'     => '111',
    'businessAccountId' => 222,
    'name' => 'exampleName',
    'language' => $requestVars['language'],
    'status'    => WhatsAppStatus::APPROVED,
    'category' => WhatsAppCategory::ACCOUNT_UPDATE,
    'structure' => [
        'header' => [
            'format' => WhatsAppHeaderApiData::FORMAT_TEXT,
        ],
        'body' => 'some body text {{1}}',
        'footer' => 'some footer text',
        'type' => WhatsAppHeaderApiData::FORMAT_TEXT,
    ]
];

$givenResponse = \json_encode($responseVars, JSON_PRETTY_PRINT);

$expectedRequest = \json_encode($requestVars);

return [$requestVars, $responseVars, $givenResponse, $expectedRequest];
