<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\client\LogEndTag;
use infobip\api\client\SendMultipleTextualSmsAdvanced;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\Destination;
use infobip\api\model\sms\mt\send\Message;
use infobip\api\model\sms\mt\send\textual\SMSAdvancedTextualRequest;
use infobip\api\model\sms\mt\send\Tracking;

// Initializing SendSingleTextualSms client with appropriate configuration
$configuration = new BasicAuthConfiguration(USERNAME, PASSWORD);
$client = new SendMultipleTextualSmsAdvanced($configuration);

// Creating request body
$requestBody = new SMSAdvancedTextualRequest();
$message = new Message();
$destination = new Destination();
$destination->setTo(TO);
$message->setDestinations(array($destination));
$message->setText("This is an example message.");
$tracking = new Tracking();
$tracking->setTrack("SMS");
$requestBody->setMessages(array($message));
$requestBody->setTracking($tracking);

$endLogClient = new LogEndTag($configuration);

// Executing request
try {
    $response = $client->execute($requestBody);
    $sentMessageInfo = $response->getMessages()[0];
    echo "Message ID: " . $sentMessageInfo->getMessageId() . "\n";
    echo "Receiver: " . $sentMessageInfo->getTo() . "\n";
    echo "Message status: " . $sentMessageInfo->getStatus()->getName() . "\n";
    $endTagResponse = $endLogClient->execute($sentMessageInfo->getMessageId());
    echo "Process Key: " . $endTagResponse->getProcessKey() . "\n";
} catch (Exception $exception) {
    echo "HTTP status code: " . $exception->getCode() . "\n";
    echo "Error message: " . $exception->getMessage() . "\n";
}