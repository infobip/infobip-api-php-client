<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\model\sms\mo\reports\MOReport;
use infobip\api\model\sms\mo\reports\MOReportResponse;

$responseBody = '{
   "results":[
      {
         "messageId":"ff4804ef-6ab6-4abd-984d-ab3b1387e823",
         "from":"38598111",
         "to":"41793026727",
         "text":"KEY Test message",
         "cleanText":"Test message",
         "keyword":"KEY",
         "receivedAt":"2015-02-15T11:43:20.254+0100",
         "smsCount":1
      }
   ]
}';

$mapper = new JsonMapper();
$responseObject = $mapper->map(json_decode($responseBody), new MOReportResponse());

/** @var MOReport $result */
$result = $responseObject->getResults()[0];
echo "Message ID: " . $result->getMessageId() . "\n";
echo "Received at: " . $result->getReceivedAt()->format('Y-m-d H:i:s P') . "\n";
echo "Sender: " . $result->getFrom() . "\n";
echo "Receiver: " . $result->getTo() . "\n";
echo "Message text: " . $result->getText() . "\n";
echo "Keyword: " . $result->getKeyword() . "\n";
echo "Clean text: " . $result->getCleanText() . "\n";
echo "Sms count: " . $result->getSmsCount();
