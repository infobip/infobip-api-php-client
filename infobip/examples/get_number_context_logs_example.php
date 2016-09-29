<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\client\GetNumberContextLogs;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\nc\logs\GetNumberContextLogsExecuteContext;

// Initializing GetNumberContextLogs client with appropriate configuration
$client = new GetNumberContextLogs(new BasicAuthConfiguration(USERNAME, PASSWORD));
// Creating execution context
$context = new GetNumberContextLogsExecuteContext();
// Executing request
$response = $client->execute($context);

for ($i = 0; $i < count($response->getResults()); ++$i) {
    $result = $response->getResults()[$i];
    echo "Message ID: " . $result->getMessageId() . "\n";
    echo "Receiver: " . $result->getTo() . "\n";
    echo "MccMnc: " . $result->getMccMnc() . "\n";
}