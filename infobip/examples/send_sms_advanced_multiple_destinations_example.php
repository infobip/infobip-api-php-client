<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\client\SendMultipleTextualSmsAdvanced;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\Destination;
use infobip\api\model\sms\mt\send\Message;
use infobip\api\model\sms\mt\send\textual\SMSAdvancedTextualRequest;

// Initializing SendMultipleTextualSmsAdvanced client with appropriate configuration
$client = new SendMultipleTextualSmsAdvanced(new BasicAuthConfiguration(USERNAME, PASSWORD));

// Array of phone numbers:
$phoneNumbers = ['', ''];

// A destination object is created for each phone number:
$destinations = array();
foreach ($phoneNumbers as $phoneNumber) {
    $destination = new Destination();
    $destination->setTo($phoneNumber);

    $destinations[] = $destination;
}

// Message that uses $destinations array
$message = new Message();
$message->setFrom(FROM);
$message->setDestinations($destinations);
$message->setText("This text will be sent to all phone numbers.");

$requestBody = new SMSAdvancedTextualRequest();
$requestBody->setMessages([$message]);

// Executing response
$response = $client->execute($requestBody);

foreach ($response->getMessages() as $index => $sentMessageInfo) {
    echo "Message Info: #" . $index . "\n";
    echo "Message ID: " . $sentMessageInfo->getMessageId() . "\n";
    echo "Receiver: " . $sentMessageInfo->getTo() . "\n";
    echo "Message status: " . $sentMessageInfo->getStatus()->getName() . "\n\n";
}