<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\client\PreviewSms;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\sms\mt\send\preview\Preview;
use infobip\api\model\sms\mt\send\preview\PreviewRequest;

// Initializing PreviewSms client with appropriate configuration
$client = new PreviewSms(new BasicAuthConfiguration(USERNAME, PASSWORD));

// Creating request body
$previewRequest = new PreviewRequest();
$previewRequest->setText("Artık Ulusal Dil Tanımlayıcısı ile Türkçe karakterli smslerinizi rahatlıkla iletebilirsiniz.");
$previewRequest->setLanguageCode("TR");
$previewRequest->setTransliteration("TURKISH");

// Executing request
$previewResponse = $client->execute($previewRequest);

/** @var Preview $noConfigurationPreview */
$noConfigurationPreview = $previewResponse->getPreviews()[0];

/** @var Preview $noConfigurationPreview */
$configurationPreview = $previewResponse->getPreviews()[1];

echo "Original text: " . $previewResponse->getOriginalText() . "\n";
echo "\n";
echo "No configuration preview:\n";
echo "------------------------------------------------\n";
echo "Text preview: " . $noConfigurationPreview->getTextPreview() . "\n";
echo "Message count: " . $noConfigurationPreview->getMessageCount() . "\n";
echo "Characters remaining: " . $noConfigurationPreview->getCharactersRemaining() . "\n";
echo "Configuration: " . json_encode($noConfigurationPreview->getConfiguration()) . "\n";
echo "\n";
echo "Configuration preview:\n";
echo "------------------------------------------------\n";
echo "Text preview: " . $configurationPreview->getTextPreview() . "\n";
echo "Message count: " . $configurationPreview->getMessageCount() . "\n";
echo "Characters remaining: " . $configurationPreview->getCharactersRemaining() . "\n";
echo "Configuration: " . json_encode($configurationPreview->getConfiguration()) . "\n";