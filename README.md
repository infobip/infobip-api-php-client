# Infobip API PHP Client

[![Packegist](https://badgen.net/packagist/v/infobip/infobip-api-php-client)](https://packagist.org/packages/infobip/infobip-api-php-client)
[![MIT License](https://badgen.net/github/license/infobip/infobip-api-php-client)](https://opensource.org/licenses/MIT)

This is a PHP Client for Infobip API and you can use it as a dependency to add [Infobip APIs][apidocs] to your application.
To use this, you'll need an Infobip account. If not already having one, you can create a [free trial][freetrial] account [here][signup].

Built on top of [OpenAPI Specification](https://swagger.io/specification/), powered by [OpenAPI Generator](https://openapi-generator.tech/).

<img src="https://udesigncss.com/wp-content/uploads/2020/01/Infobip-logo-transparent.png" height="124px" alt="Infobip" />

#### Table of contents:
* [Documentation](#documentation)
* [General Info](#general-info)
* [Installation](#installation)
* [Quickstart](#quickstart)
* [Ask for help](#ask-for-help)

## Documentation

Infobip API Documentation can be found [here][apidocs].

## General Info
For `infobip-api-php-client` versioning we use [Semantic Versioning][semver] scheme.

Published under [MIT License][license].

## PHP versions
All versions above 7.2

## Installation

#### Using Composer
To start using the library add it as dependecy in your `composer.json` file like shown below.
```json
"require": {
	"infobip/infobip-api-php-client": "3.2.0"
}
```
And simply run `composer install` to download dependencies.

#### Without Composer
If your setup prevents you from using `composer` you can manually download this package and all of its dependencies and reference them from your code. However, there are solutions that can automate this process.
One of them is `php-download` online tool. You can use it to find pre-composed [infobip client package](https://php-download.com/package/infobip/infobip-api-php-client), download it from there and use in your project without manually collecting the dependencies.

## Quickstart

#### Initialize the Configuration & HTTP client

We support multiple authentication methods, e.g. you can use [API Key Header](https://www.infobip.com/docs/essentials/api-authentication#api-key-header), in this case, `API_KEY_PREFIX` will be "App".

The `API_KEY` can be created via the [web interface](https://portal.infobip.com/settings/accounts/api-keys).

To see your `URL_BASE_PATH`, log in to the [Infobip API documentation][apidocs] hub with your Infobip credentials.

```php
    $configuration = (new Configuration())
        ->setHost(URL_BASE_PATH)
        ->setApiKeyPrefix('Authorization', API_KEY_PREFIX)
        ->setApiKey('Authorization', API_KEY);

    $client = new GuzzleHttp\Client();
```

#### Send an SMS
Simple example for sending an SMS message.

```php
    $sendSmsApi = new SendSMSApi($client, $configuration);
    $destination = (new SmsDestination())->setTo('41793026727');
    $message = (new SmsTextualMessage())
        ->setFrom('InfoSMS')
        ->setText('This is a dummy SMS message sent using infobip-api-php-client')
        ->setDestinations([$destination]);
    $request = (new SmsAdvancedTextualRequest())
        ->setMessages([$message]);
```
```php
    try {
        $smsResponse = $sendSmsApi->sendSmsMessage($request);
    } catch (Throwable $apiException) {
        // HANDLE THE EXCEPTION
    }
```

Fields provided within `ApiException` object are `code` referring to the HTTP Code response, as well as the `responseHeaders` and `responseBody`.
Also, you can get the deserialized response body using `getResponseObject` method.

```php
    $apiException->getCode();
    $apiException->getResponseHeaders();
    $apiException->getResponseBody();
    $apiException->getResponseObject();
```

Additionally, you can pull out the `bulkId` and `messageId`(s) from `SmsResponse` object and use them to fetch a delivery report for given message or bulk.
Bulk ID will be received only when you send a message to more than one destination address or multiple messages in a single request.

```php
    $bulkId = $smsResponse->getBulkId();
    $messageId = $smsResponse->getMessages()[0]->getMessageId();
```

#### Receive SMS message delivery report
For each SMS that you send out, we can send you a message delivery report in real time. All you need to do is specify your endpoint, e.g. `https://{yourDomain}/delivery-reports`, when sending SMS in `notifyUrl` field of `SmsTextualMessage`, or subscribe for reports by contacting our support team.

You can use data models from the library and the pre-configured `\Infobip\ObjectSerializer` serializer.

Example of webhook implementation:

```php
    use \Infobip\ObjectSerializer;

    $data = file_get_contents("php://input");
    $type = '\Infobip\Model\SmsDeliveryResult';
    $deliveryReports = ObjectSerializer::deserialize($data, $type);

    foreach ($deliveryReports->getResults() as $report) {
        echo $report->getMessageId() . " - " . $report->getStatus()->getName() . "\n";
    }
```
If you prefer to use your own serializer, please pay attention to the supported [date format](https://www.infobip.com/docs/essentials/integration-best-practices#date-formats).

#### Fetching delivery reports
If you are for any reason unable to receive real time delivery reports on your endpoint, you can use `messageId` or `bulkId` to fetch them.
Each request will return a batch of delivery reports - only once.

```php
    $numberOfReportsLimit = 10;
    $deliveryReports = $sendSmsApi->getOutboundSmsMessageDeliveryReports($bulkId, $messageId, $numberOfReportsLimit);
    foreach ($deliveryReports->getResults() as $report) {
        echo $report->getMessageId() . " - " . $report->getStatus()->getName() . "\n";
    }
```

#### Unicode & SMS preview
Infobip API supports Unicode characters and automatically detects encoding. Unicode and non-standard GSM characters use additional space, avoid unpleasant surprises and check how different message configurations will affect your message text, number of characters and message parts.

```php
    $previewResponse = $sendSmsApi->previewSmsMessage((new SmsPreviewRequest())
        ->setText("Let's see how many characters will remain unused in this message."));
    echo $previewResponse;
```

#### Receive incoming SMS
If you want to receive SMS messages from your subscribers we can have them delivered to you in real time. When you buy and configure a number capable of receiving SMS, specify your endpoint as explained [here](https://www.infobip.com/docs/api#channels/sms/receive-inbound-sms-messages),
e.g. `https://{yourDomain}/incoming-sms`.
Example of webhook implementation:

```php
    use \Infobip\ObjectSerializer;

    $data = file_get_contents("php://input");
    $type = '\Infobip\Model\SmsInboundMessageResult';
    $messages = ObjectSerializer::deserialize($data, $type);

    foreach ($messages->getResults() as $message) {
        echo $message-> getFrom() . " - " . $message-> getCleanText() . "\n";
    }
```

#### Two-Factor Authentication (2FA)
For 2FA quick start guide please check [these examples](two-factor-authentication.md).

#### Send email
For send email quick start guide please check [these examples](email.md).

#### WhatsApp
For WhatsApp quick start guide, view [these examples](whatsapp.md).

## Ask for help

Feel free to open issues on the repository for any issue or feature request. As per pull requests, for details check the `CONTRIBUTING` [file][contributing] related to it - in short, we will not merge any pull requests, this code is auto-generated.

If it is, however, something that requires our imminent attention feel free to contact us @ [support@infobip.com](mailto:support@infobip.com).

[apidocs]: https://www.infobip.com/docs/api
[freetrial]: https://www.infobip.com/docs/freetrial
[signup]: https://www.infobip.com/signup
[semver]: https://semver.org
[license]: LICENSE
[contributing]: CONTRIBUTING.md
