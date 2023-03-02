## Two-Factor Authentication (2FA)
Initialize 2FA API client:
```php
    use Infobip\Api\TfaApi;
    use Infobip\Configuration;

    $configuration = new Configuration(
        host: 'your-base-url',
        apiKey: 'your-api-key'
    );
    
    $tfaApi = new TfaApi(config: $configuration);
```
Before sending one-time PIN codes you need to set up application and message template.

#### Application setup
The application represents your service. It’s good practice to have separate applications for separate services.
```php
    $tfaApplication = $tfaApi->createTfaApplication(
        new TfaApplicationRequest(name: '2FA application')
    );

    $appId = $tfaApplication->getApplicationId();
```

#### Message template setup
Message template is the message body with the PIN placeholder that is sent to end users.
```php
    $tfaMessageTemplate = $tfaApi
        ->createTfaMessageTemplate(
            $appId,
            new TfaCreateMessageRequest(
                messageText: 'Your pin is {{pin}}',
                pinType: TfaPinType::NUMERIC,
                pinLength: 4
            )
        );
    
    $messageId = $tfaMessageTemplate->getMessageId();
```

#### Send 2FA code via SMS
After setting up the application and message template, you can start generating and sending PIN codes via SMS to the provided destination address.
```php
   $sendCodeResponse = $tfaApi
        ->sendTfaPinCodeOverSms(
            new TfaStartAuthenticationRequest(
                applicationId: $appId,
                messageId: $messageId,
                from: 'InfoSMS',
                to: '41793026727'
            )
        );

    $isSuccessful = $sendCodeResponse->getSmsStatus() == "MESSAGE_SENT";
    $pinId = $sendCodeResponse->getPinId();
```

#### Verify phone number
Verify a phone number to confirm successful 2FA authentication.
```php
    $verifyResponse = $tfaApi->verifyTfaPhoneNumber($pinId, new TfaVerifyPinRequest(pin: '1598'));
    $verified = $verifyResponse->getVerified();
```
