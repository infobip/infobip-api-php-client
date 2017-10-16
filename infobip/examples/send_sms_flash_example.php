<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\client\SendMultipleTextualSmsAdvanced;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\Destination;
use infobip\api\model\sms\mt\send\Message;
use infobip\api\model\sms\mt\send\textual\SMSAdvancedTextualRequest;

// Initializing SendMultipleTextualSmsAdvanced client with appropriate configuration
$client = new SendMultipleTextualSmsAdvanced(new BasicAuthConfiguration(USERNAME, PASSWORD));

// Creating request body
$destination = new Destination();
$destination->setTo(TO);

$message = new Message();
$message->setFrom(FROM);
$message->setDestinations([$destination]);
$message->setText("This is an example flash message.");
$message->setFlash(true);

$requestBody = new SMSAdvancedTextualRequest();
$requestBody->setMessages([$message]);

// Executing request
$response = $client->execute($requestBody);

$sentMessageInfo = $response->getMessages()[0];
echo "Message ID: " . $sentMessageInfo->getMessageId() . "\n";
echo "Receiver: " . $sentMessageInfo->getTo() . "\n";
echo "Message status: " . $sentMessageInfo->getStatus()->getName() . "\n";