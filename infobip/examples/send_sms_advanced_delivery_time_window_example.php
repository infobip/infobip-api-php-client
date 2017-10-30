<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\client\SendMultipleTextualSmsAdvanced;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\Destination;
use infobip\api\model\sms\mt\send\DeliveryDay;
use infobip\api\model\sms\mt\send\DeliveryTime;
use infobip\api\model\sms\mt\send\DeliveryTimeWindow;
use infobip\api\model\sms\mt\send\Message;
use infobip\api\model\sms\mt\send\textual\SMSAdvancedTextualRequest;

// Initializing SendMultipleTextualSmsAdvanced client with appropriate configuration
$client = new SendMultipleTextualSmsAdvanced(new BasicAuthConfiguration(USERNAME, PASSWORD));

// Creating destination
$destination = new Destination();
$destination->setTo(TO);

// Creating delivery time window
$days = array(
    DeliveryDay::MONDAY,
    DeliveryDay::THURSDAY,
    DeliveryDay::WEDNESDAY,
    DeliveryDay::THURSDAY,
    DeliveryDay::FRIDAY,
    DeliveryDay::SATURDAY,
    DeliveryDay::SUNDAY
);

$from = new DeliveryTime();
$from->setHour(6);
$from->setMinute(0);

$to = new DeliveryTime();
$to->setHour(20);
$to->setMinute(15);

$deliveryTimeWindow = new DeliveryTimeWindow();
$deliveryTimeWindow->setDays($days);
$deliveryTimeWindow->setFrom($from);
$deliveryTimeWindow->setTo($to);

// Creating message
$message = new Message();
$message->setFrom(FROM);
$message->setDestinations([$destination]);
$message->setText("This is an example of a message sent within a delivery time window.");
$message->setDeliveryTimeWindow($deliveryTimeWindow);

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