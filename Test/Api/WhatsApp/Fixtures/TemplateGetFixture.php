<?php

// phpcs:ignorefile

declare(strict_types=1);

use Infobip\Model\WhatsAppCategory;
use Infobip\Model\WhatsAppStatus;
use Infobip\Model\WhatsAppTextHeaderApiData;

$responseVars = [
    'templates' => [
        [
            'id'     => '111',
            'businessAccountId' => 222,
            'name' => 'exampleName',
            'language' => 'en',
            'status'    => WhatsAppStatus::APPROVED,
            'category' => WhatsAppCategory::MARKETING,
            'structure' => [
                'header' => [
                    'text' => 'some body text {{1}}',
                    'format' => WhatsAppTextHeaderApiData::FORMAT,
                ],
                'body' => ['text' => 'some body text {{1}}'],
                'footer' => ['text' => 'some footer text'],
                'type' => WhatsAppTextHeaderApiData::FORMAT
            ]
        ]
    ]
];

$givenResponse = \json_encode($responseVars, JSON_PRETTY_PRINT);

return [$responseVars, $givenResponse];
