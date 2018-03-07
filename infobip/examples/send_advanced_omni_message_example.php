<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\client\SendAdvancedOmniMessage;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\omni\Destination;
use infobip\api\model\omni\send\Language;
use infobip\api\model\omni\send\OmniAdvancedRequest;
use infobip\api\model\omni\send\SmsData;
use infobip\api\model\omni\send\ViberData;
use infobip\api\model\omni\To;


$client = new SendAdvancedOmniMessage(new BasicAuthConfiguration(USERNAME, PASSWORD));

$to = new To();
$to->setPhoneNumber(TO);
$destination = new Destination();
$destination->setTo($to);
$destinations = [$destination];

$smsData = new SmsData();
$smsData->setText("Artık Ulusal Dil Tanımlayıcısı ile Türkçe karakterli smslerinizi rahatlıkla iletebilirsiniz.");
$language = new Language();
$language->setLanguageCode("TR");
$smsData->setLanguage($language);
$smsData->setTransliteration("TURKISH");

$viberData = new ViberData();
$viberData->setText("Luke, I am your father!");

$request = new OmniAdvancedRequest();
$request->setDestinations($destinations);
$request->setScenarioKey("6EDEA8BF17983A97C42BCA702F0A673D"); // Your-scenario-key
$request->setSms($smsData);
$request->setViber($viberData);

$response = $client->execute($request);
echo "Bulk ID: " . $response->getBulkId() . "\n";
foreach ($response->getMessages() as &$message) {
    echo "Message ID: " . $message->getMessageId() . "\n";
    echo "Status: " . $message->getStatus()->getName() . "\n";
}


