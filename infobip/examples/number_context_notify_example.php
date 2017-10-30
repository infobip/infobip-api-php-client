<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\client\NumberContextNotify;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\nc\notify\NumberContextRequest;

// Initializing NumberContextNotify client with appropriate configuration
$client = new NumberContextNotify(new BasicAuthConfiguration(USERNAME, PASSWORD));

// Creating request body
$requestBody = new NumberContextRequest();
$requestBody->setTo([TO]);
$requestBody->setNotifyUrl(NOTIFY_URL);

// Executing request
$response = $client->execute($requestBody);

$sentRequestInfo = $response->getResults()[0];
echo "Message ID: " . $sentRequestInfo->getMessageId() . "\n";
echo "Phone number: " . $sentRequestInfo->getTo() . "\n";
echo "Message status: " . $sentRequestInfo->getStatus()->getName();