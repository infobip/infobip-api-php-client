<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\client\NumberContextQuery;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\nc\query\NumberContextRequest;

// Initializing NumberContextQuery client with appropriate configuration
$client = new NumberContextQuery(new BasicAuthConfiguration(USERNAME, PASSWORD));

// Creating request body
$requestBody = new NumberContextRequest();
$requestBody->setTo([TO]);

// Executing request
$response = $client->execute($requestBody);

$numberContext = $response->getResults()[0];
echo "Phone number: " . $numberContext->getTo() . "\n";
echo "MccMnc: " . $numberContext->getMccMnc() . "\n";
echo "Original country prefix: " . $numberContext->getOriginalNetwork()->getCountryPrefix() . "\n";
echo "Original network prefix: " . $numberContext->getOriginalNetwork()->getNetworkPrefix() . "\n";
echo "Serving MSC: " . $numberContext->getServingMSC();