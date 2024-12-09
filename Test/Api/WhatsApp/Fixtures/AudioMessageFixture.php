<?php

declare(strict_types=1);

$requestVars = [
    'from' => '447860099299',
    'to' => '385958000000',
    'content' => [
        'mediaUrl' => 'https://file-examples-com.github.io/uploads/2017/11/file_example_MP3_700KB.mp3',
    ],
    'callbackData' => 'some callback data',
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
