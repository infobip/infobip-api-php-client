<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\model\Destination;
use infobip\api\model\sms\mt\send\Message;
use infobip\api\client\SendFullyFeaturedSmsAdvanced;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\sms\mt\send\voice\SMSAdvancedVoiceRequest;

// Initializing SendMultipleTextualSmsAdvanced client with appropriate configuration
$client = new SendFullyFeaturedSmsAdvanced(new BasicAuthConfiguration(USERNAME, PASSWORD));

// Creating request body
$destination = new Destination();
$destination->setTo(TO);

$message = new Message();
$message->setFrom(FROM);
$message->setDestinations([$destination]);
$message->setText("This is an example message.");
$message->setNotifyUrl(NOTIFY_URL);

$requestBody = new SMSAdvancedVoiceRequest();
$requestBody->setMessages([$message]);

// Executing request
$response = $client->execute($requestBody);

$sentMessageInfo = $response->getMessages()[0];
echo "Message ID: " . $sentMessageInfo->getMessageId() . "\n";
echo "Receiver: " . $sentMessageInfo->getTo() . "\n";
echo "Message status: " . $sentMessageInfo->getStatus()->getName() . "\n";