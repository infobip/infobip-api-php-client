<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\client\GetSentSmsLogs;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\sms\mt\logs\GetSentSmsLogsExecuteContext;

// Initializing GetSentSmsLogs client with appropriate configuration
$client = new GetSentSmsLogs(new BasicAuthConfiguration(USERNAME, PASSWORD));

// Creating execution context
$context = new GetSentSmsLogsExecuteContext();

// Executing request
$response = $client->execute($context);

foreach ($response->getResults() as $result) {
    echo "Message ID: " . $result->getMessageId() . "\n";
    echo "Sent at: " . $result->getSentAt()->format('Y-m-d H:i:s P') . "\n";
    echo "Sender: " . $result->getFrom() . "\n";
    echo "Receiver: " . $result->getTo() . "\n";
    echo "Message text: " . $result->getText() . "\n";
    echo "Status: " . $result->getStatus()->getName() . "\n";
    echo "Price: " . $result->getPrice()->getPricePerMessage() . " " . $result->getPrice()->getCurrency() . "\n\n";
}