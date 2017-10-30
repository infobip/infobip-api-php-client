<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\model\nc\query\NumberContextResponse;
use infobip\api\model\nc\query\NumberContextResponseDetails;

$responseBody = '{
   "results":[
      {
         "to":"41793026727",
         "mccMnc":"22801",
         "originalNetwork":{
            "networkPrefix":"79",
            "countryPrefix":"41"
         },
         "ported":false,
         "roaming":false,
         "status":{
            "groupId":2,
            "groupName":"UNDELIVERABLE",
            "id":9,
            "name":"UNDELIVERABLE_NOT_DELIVERED",
            "description":"Message sent not delivered"
         },
         "error":{
            "groupId":1,
            "groupName":"HANDSET_ERRORS",
            "id":27,
            "name":"EC_ABSENT_SUBSCRIBER",
            "description":"Absent Subscriber",
            "permanent":false
         }
      }
   ]
}';

$mapper = new JsonMapper();
$responseObject = $mapper->map(json_decode($responseBody), new NumberContextResponse());

/** @var NumberContextResponseDetails $numberContext */
$numberContext = $responseObject->getResults()[0];
echo "Phone number: " . $numberContext->getTo() . "\n";
echo "MccMnc: " . $numberContext->getMccMnc() . "\n";
echo "Original country prefix: " . $numberContext->getOriginalNetwork()->getCountryPrefix() . "\n";
echo "Original network prefix: " . $numberContext->getOriginalNetwork()->getNetworkPrefix() . "\n";
echo "Status: " . $numberContext->getStatus()->getName();