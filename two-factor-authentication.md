## Two-Factor Authentication (2FA)
Initialize 2FA API client:
```php
    $configuration = (new Configuration())
            ->setHost(URL_BASE_PATH)
            ->setApiKeyPrefix('Authorization', API_KEY_PREFIX)
            ->setApiKey('Authorization', API_KEY);
    $client = new GuzzleHttp\Client();
    
    $tfaApi = new TfaApi($client, $configuration);
```
Before sending one-time PIN codes you need to set up application and message template.

#### Application setup
The application represents your service. It’s good practice to have separate applications for separate services.
```php
    $tfaApplication = $tfaApi->createTfaApplication(
            (new TfaApplicationRequest())->setName("2FA application"));

    $appId = $tfaApplication->getApplicationId();
```

#### Message template setup
Message template is the message body with the PIN placeholder that is sent to end users.
```php
    $tfaMessageTemplate = $tfaApi->createTfaMessageTemplate($appId,
            (new TfaCreateMessageRequest())
                ->setMessageText("Your pin is {{pin}}")
                ->setPinType(TfaPinType::NUMERIC)
                ->setPinLength(4));
    
    $messageId = $tfaMessageTemplate->getMessageId();
```

#### Send 2FA code via SMS
After setting up the application and message template, you can start generating and sending PIN codes via SMS to the provided destination address.
```php
   $sendCodeResponse = $tfaApi->sendTfaPinCodeOverSms(true,
            (new TfaStartAuthenticationRequest())
                ->setApplicationId($appId)
                ->setMessageId($messageId)
                ->setFrom("InfoSMS")
                ->setTo("41793026727"));

    $isSuccessful = $sendCodeResponse->getSmsStatus() == "MESSAGE_SENT";
    $pinId = $sendCodeResponse->getPinId();
```

#### Verify phone number
Verify a phone number to confirm successful 2FA authentication.
```php
    $verifyResponse = $tfaApi->verifyTfaPhoneNumber($pinId, (new TfaVerifyPinRequest())->setPin("1598"));
    $verified = $verifyResponse->getVerified();
```
