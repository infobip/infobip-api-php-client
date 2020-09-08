<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\client\SendMultipleTextualSmsAdvanced;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\Destination;
use infobip\api\model\sms\mt\send\RegionalOptions;
use infobip\api\model\sms\mt\send\IndiaDltOptions;
use infobip\api\model\sms\mt\send\Message;
use infobip\api\model\sms\mt\send\textual\SMSAdvancedTextualRequest;

// Initializing SendMultipleTextualSmsAdvanced client with appropriate configuration
$client = new SendMultipleTextualSmsAdvanced(new BasicAuthConfiguration(USERNAME, PASSWORD));

// Creating destination
$destination = new Destination();
$destination->setTo(TO);

// Creating India DLT
$indiaDlt = new IndiaDltOptions();
$indiaDlt->setContentTemplateId("content template id");
$indiaDlt->setPrincipalEntityId("principal entity id");

$regional = new RegionalOptions();
$regional->setIndiaDlt($indiaDlt);

// Creating message
$message = new Message();
$message->setFrom(FROM);
$message->setDestinations([$destination]);
$message->setText("This is an example of a message sent with India DLT parameters.");
$message->setRegional($regional);

// Creating request body
$requestBody = new SMSAdvancedTextualRequest();
$requestBody->setMessages(array($message));

// Executing request
$response = $client->execute($requestBody);

//var_dump($response);

// Echoing response
$sentMessageInfo = $response->getMessages()[0];
echo "Message ID: " . $sentMessageInfo->getMessageId() . "\n";
echo "Receiver: " . $sentMessageInfo->getTo() . "\n";
echo "Message status: " . $sentMessageInfo->getStatus()->getName() . "\n";