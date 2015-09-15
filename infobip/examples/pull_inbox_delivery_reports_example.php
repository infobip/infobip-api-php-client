<?php
/**
 * Created by PhpStorm.
 * User: nmenkovic
 * Date: 9/9/15
 * Time: 5:13 PM
 */
require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\client\GetReceivedMessages;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\sms\mo\reports\GetReceivedMessagesExecuteContext;

// Initializing GetReceivedMessages client with appropriate configuration
$client = new GetReceivedMessages(new BasicAuthConfiguration(USERNAME, PASSWORD));
// Creating execution context
$context = new GetReceivedMessagesExecuteContext();
// Executing request
$response = $client->execute($context);

for ($i = 0; $i < count($response->getResults()); ++$i) {
    $result = $response->getResults()[$i];
    echo "Message ID: " . $result->getMessageId() . "\n";
    echo "Received at: " . $result->getReceivedAt()->format('Y-m-d H:i:s P') . "\n";
    echo "Sender: " . $result->getFrom() . "\n";
    echo "Receiver: " . $result->getTo() . "\n";
    echo "Message text: " . $result->getText() . "\n";
    echo "Keyword: " . $result->getKeyword() . "\n";
    echo "Clean text: " . $result->getCleanText() . "\n";
    echo "Sms count: " . $result->getSmsCount() . "\n\n";
}