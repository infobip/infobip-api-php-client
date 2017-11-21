<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\Destination;
use infobip\api\model\sms\mt\send\Message;
use infobip\api\client\SendMultipleVoiceSms;
use infobip\api\model\sms\mt\send\voice\SMSMultiVoiceRequest;

// Initializing SendMultipleVoiceSms client with appropriate configuration
$client = new SendMultipleVoiceSms(new BasicAuthConfiguration(USERNAME, PASSWORD));
$message = new Message();
$message->setFrom(FROM);
$message->setTo([TO]);
$message->setText("This is an example of a scheduled message.");
$message->setAudioFileUrl("http://www.example.com/media.mp3");
$message->setLanguage('en');



$requestBody = new SMSMultiVoiceRequest();
$requestBody->setMessages([$message]);

// $requestBody->setTracking($tracking);

// Executing request
$response = $client->execute($requestBody);

$sentMessageInfo = $response->getMessages()[0];
echo "Message ID: " . $sentMessageInfo->getMessageId() . "\n";
echo "Receiver: " . $sentMessageInfo->getTo() . "\n";
echo "Message status: " . $sentMessageInfo->getStatus()->getName() . "\n";