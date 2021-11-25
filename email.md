## Email quickstart

### Prepare configuration

First step is to initialize `Configuration` object to handle API authentication. In this case value for `ApiKeyPrefix` in example below will be `App`.
```php
    $configuration = (new Configuration())
        ->setHost(URL_BASE_PATH)
        ->setApiKeyPrefix('Authorization', API_KEY_PREFIX)
        ->setApiKey('Authorization', API_KEY);

    $client = new GuzzleHttp\Client();
```

Now we can initialize Email API client.
```csharp
    $sendEmailApi = new SendEmailApi($client, $configuration);
```

#### Send email
We're now ready for sending our first email. Note that response contains `BulkId` property which may be useful for checking the status sent emails.
Fields `from`, `to` and `subject` are required, also the message must contain at least one of these: `text`, `html` or `templateId`.

IMPORTANT NOTE:
Keep in mind following restrictions while using trial account
- you can only send messages to verified email addresses
- you can only use your emails address with Infobip test domain in following form `YourUserName@selfserviceib.com`

```php
    $sendParams = [
        'from'          => 'joan.doe0@example.com',
        'to'            => 'joan.doe0@example.com',
        'subject'       => 'Email test message',
        'text'          => 'This is sample email message',
        'attachment'    => '/tmp/testfile.pdf' // example how to attach a file
    ];

    $response = $sendEmailApi->sendEmail($sendParams);

    $response->getResults()[0]->getBulkId();
```

You can also send delayed emails very easily. All you need to define is the desired date of the email delivery as `sendAt` parameter of the `sendEmail` method.

#### Delivery reports
For each message that you send out, we can send you a delivery report in real-time.
All you need to do is specify your endpoint when sending email in `notifyUrl` field.

Additionally, you can use `messageId` or `bulkId` to fetch reports.

```php
    $numberOfReportsLimit = 10;
    $response = $sendEmailApi->getEmailDeliveryReports($bulkId, $messageId, $numberOfReportsLimit);
    foreach ($deliveryReports->getResults() as $report) {
        echo $report->getMessageId() . " - " . $report->getStatus()->getName() . "\n";
    }  
```
