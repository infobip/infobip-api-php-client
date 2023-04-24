## Email quickstart

### Prepare configuration

First step is to initialize `Configuration` instance with your API credentials.
```php
    use Infobip\Api\EmailApi;
    use Infobip\Configuration;
    use SplFileObject;
    
    $configuration = new Configuration(
        host: 'your-base-url',
        apiKey: 'your-api-key'
    );
```

Now we can initialize Email API client.
```php
    $sendEmailApi = new EmailApi(config: $configuration);
```

#### Send email
We're now ready for sending our first email. Note that response contains `BulkId` property which may be useful for checking the status sent emails.
Fields `from`, `to` and `subject` are required, also the message must contain at least one of these: `text`, `html` or `templateId`.

IMPORTANT NOTE:
Keep in mind following restrictions while using trial account
- you can only send messages to verified email addresses
- you can only use your emails address with Infobip test domain in following form `YourUserName@selfserviceib.com`

```php
    $response = $sendEmailApi->sendEmail(
        to: [
            'john.smith@example.com',
            'alice.smith@example.com',
            '{"to": "alice.grey@example.com", "placeholders": {"Name":"Alice Grey"}}'
        ],
        from: 'joan.doe@example.com',
        subject: 'Email test message',
        text: 'This is sample email message',
        attachment: [
            new SplFileObject('/tmp/testfile.pdf'),
        ]
    );

    echo sprintf('Bulk ID: %s', $response->getBulkId()) . PHP_EOL;
```

You can also send delayed emails very easily. All you need to define is the desired date of the email delivery as `sendAt` parameter of the `sendEmail` method.

#### Delivery reports
For each message that you send out, we can send you a delivery report in real-time.
All you need to do is specify your endpoint when sending email in `notifyUrl` field.

Additionally, you can use `messageId` or `bulkId` to fetch reports.

```php
    $deliveryReports = $sendEmailApi
        ->getEmailDeliveryReports(bulkId: 'some-bulk-id', messageId: 'some-message-id', limit: 10);

    foreach ($deliveryReports->getResults() as $report) {
        echo $report->getMessageId() . " - " . $report->getStatus()->getName() . PHP_EOL;
    }
```
