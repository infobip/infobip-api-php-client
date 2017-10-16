<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\model\sms\mt\reports\SMSReport;
use infobip\api\model\sms\mt\reports\SMSReportResponse;

$responseBody = '{
  "results": [
    {
      "bulkId": "BULK-ID-123-xyz",
      "messageId": "c9823180-94d4-4ea0-9bf3-ec907e7534a6",
      "to": "41793026731",
      "sentAt": "2015-06-04T13:01:52.933",
      "doneAt": "2015-06-04T13:02:00.134+0000",
      "smsCount": 1,
      "price": {
        "pricePerMessage": 0.0001000000,
        "currency": "EUR"
      },
      "status": {
        "groupId": 3,
        "groupName": "DELIVERED",
        "id": 5,
        "name": "DELIVERED_TO_HANDSET",
        "description": "Message delivered to handset"
      },
      "error": {
        "groupId": 0,
        "groupName": "OK",
        "id": 0,
        "name": "NO_ERROR",
        "description": "No Error",
        "permanent": false
      }
    }
  ]
}';

$mapper = new JsonMapper();
$responseObject = $mapper->map(json_decode($responseBody), new SMSReportResponse());

/** @var SMSReport $result */
foreach ($responseObject->getResults() as $result) {
    echo "Message ID: " . $result->getMessageId() . "\n";
    echo "Sent at: " . $result->getSentAt()->format('Y-m-d H:i:s P') . "\n";
    echo "Done at: " . $result->getDoneAt()->format('Y-m-d H:i:s P') . "\n";
    echo "Receiver: " . $result->getTo() . "\n";
    echo "Status: " . $result->getStatus()->getName() . "\n";
    echo "Price: " . $result->getPrice()->getPricePerMessage() . " " . $result->getPrice()->getCurrency() . "\n\n";
}