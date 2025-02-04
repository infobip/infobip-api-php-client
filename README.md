# Infobip API PHP Client

[![Packagist](https://badgen.net/packagist/v/infobip/infobip-api-php-client)](https://packagist.org/packages/infobip/infobip-api-php-client)
[![Snyk](https://snyk.io/test/github/infobip/infobip-api-php-client/badge.svg)](https://snyk.io/test/github/infobip/infobip-api-php-client)
[![MIT License](https://badgen.net/github/license/infobip/infobip-api-php-client)](https://opensource.org/licenses/MIT)

This is a PHP Client for Infobip API and you can use it as a dependency to add [Infobip APIs][apidocs] to your application.
To use this, you'll need an Infobip account. If not already having one, you can create a [free trial][freetrial] account [here][signup].

`infobip-api-php-client` is built on top of [OpenAPI Specification](https://spec.openapis.org/oas/latest.html), generated by [Infobip OSCAR](https://www.youtube.com/watch?v=XC8oVn_efTw) service powered by [OpenAPI Generator](https://openapi-generator.tech/).

<img src="https://udesigncss.com/wp-content/uploads/2020/01/Infobip-logo-transparent.png" height="124px" alt="Infobip" />

#### Table of contents:
* [Documentation](#documentation)
* [General Info](#general-info)
* [Installation](#installation)
* [Quickstart](#quickstart)
* [Ask for help](#ask-for-help)

## Documentation

Detailed documentation about Infobip API can be found [here][apidocs].
The current version of this library includes this subset of Infobip products:
* [SMS](https://www.infobip.com/docs/api/channels/sms)
* [2FA](https://www.infobip.com/docs/api/platform/2fa)
* [Messages API](https://www.infobip.com/docs/api/platform/messages-api)
* [MMS](https://www.infobip.com/docs/api/channels/mms)
* [Voice](https://www.infobip.com/docs/api/channels/voice)
* [WebRTC](https://www.infobip.com/docs/api/channels/webrtc)
* [Email](https://www.infobip.com/docs/api/channels/email)
* [WhatsApp](https://www.infobip.com/docs/api/channels/whatsapp)
* [Viber](https://www.infobip.com/docs/api/channels/viber)
* [Moments](https://www.infobip.com/docs/api/customer-engagement/moments)

## General Info
For `infobip-api-php-client` versioning we use [Semantic Versioning][semver] scheme.

Published under [MIT License][license].

The library requires PHP version >= 8.3.

## Installation

#### Using Composer
To start using the library add it as dependency in your `composer.json` file like shown below.
```json
"require": {
	"infobip/infobip-api-php-client": "6.2.1"
}
```
And simply run `composer install` to download dependencies.

#### Without Composer
If your setup prevents you from using `composer` you can manually download this package and all of its dependencies and reference them from your code. However, there are solutions that can automate this process.
One of them is `php-download` online tool. You can use it to find pre-composed [infobip client package](https://php-download.com/package/infobip/infobip-api-php-client), download it from there and use in your project without manually collecting the dependencies.

## Quickstart

#### Initialize the Configuration & HTTP client
The library supports the [API Key Header](https://www.infobip.com/docs/essentials/api-authentication#api-key-header) authentication method.
Once you have an [Infobip account](https://www.infobip.com/signup), you can manage your API keys through the Infobip [API key management](https://portal.infobip.com/settings/accounts/api-keys) page.

To see your base URL, log in to the [Infobip API Resource][apidocs] hub with your Infobip credentials or visit your [Infobip account](https://portal.infobip.com/homepage/).

```php
    use Infobip\Configuration;

    $configuration = new Configuration(
        host: 'your-base-url',
        apiKey: 'your-api-key'
    );
```

#### Send an SMS
See below, a simple example of sending a single SMS message to a single recipient.

```php
        use Infobip\ApiException;
        use Infobip\Model\SmsRequest;
        use Infobip\Model\SmsDestination;
        use Infobip\Model\SmsMessage;
        use Infobip\Api\SmsApi;
        use Infobip\Model\SmsTextContent;

        $sendSmsApi = new SmsApi(config: $configuration);

        $message = new SmsMessage(
            destinations: [
                new SmsDestination(
                    to: '41793026727'
                )
            ],
            content: new SmsTextContent(
                text: 'This is a dummy SMS message sent using infobip-api-php-client.'
            ),
            sender: 'InfoSMS'
        );

        $request = new SmsRequest(messages: [$message]);

        try {
            $smsResponse = $sendSmsApi->sendSmsMessages($request);
        } catch (ApiException $apiException) {
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

Additionally, you can retrieve a `bulkId` and a `messageId` from the `SmsResponse` object to use for troubleshooting or fetching a delivery report for a given message or a bulk.
Bulk ID will be received only when you send a message to more than one destination address or multiple messages in a single request.

```php
    $bulkId = $smsResponse->getBulkId();
    $messages = $smsResponse->getMessages();
    $messageId = (!empty($messages)) ? current($messages)->getMessageId() : null;
```

#### Receive SMS message delivery report
For each SMS that you send out, we can send you a message delivery report in real time.
All you need to do is specify your endpoint when sending SMS in the `webhooks.delivery.url` field of your request, or subscribe for reports by contacting our support team at support@infobip.com.
You can use data models from the library and the pre-configured `Infobip\ObjectSerializer` serializer.

Example of webhook implementation:

```php
        use Infobip\Model\SmsDeliveryResult;
        use Infobip\ObjectSerializer;

        $objectSerializer = new ObjectSerializer();

        $data = \file_get_contents('php://input');

        /**
        * @var SmsDeliveryResult $deliveryResult
        */
        $deliveryResult = $objectSerializer->deserialize($data, SmsDeliveryResult::class);

        foreach ($deliveryResult->getResults() ?? [] as $report) {
            echo $report->getMessageId() . " - " . $report->getStatus()->getName() . "\n";
        }
```
If you prefer to use your own serializer, please pay attention to the supported [date format](https://www.infobip.com/docs/essentials/integration-best-practices#date-formats).

#### Fetching delivery reports
If you are for any reason unable to receive real-time delivery reports on your endpoint, you can use `messageId` or `bulkId` to fetch them.
Each request will return a batch of delivery reports - only once. See [documentation](https://www.infobip.com/docs/api/channels/sms/sms-messaging/logs-and-status-reports/get-outbound-sms-message-delivery-reports) for more details.

```php
    $deliveryReports = $sendSmsApi
        ->getOutboundSmsMessageDeliveryReports(
            bulkId: 'some-bulk-id',
            messageId: 'some-message-id',
            limit: 10
        );

    foreach ($deliveryReports->getResults() ?? [] as $report) {
        echo $report->getMessageId() . " - " . $report->getStatus()->getName() . "\n";
    }
```

#### Unicode & SMS preview
Infobip API supports Unicode characters and automatically detects encoding. Unicode and non-standard GSM characters use additional space, avoid unpleasant surprises and check how different message configurations will affect your message text, number of characters and message parts.

```php
    use Infobip\Model\SmsPreviewRequest;

    $previewResponse = $sendSmsApi
        ->previewSmsMessage(
            new SmsPreviewRequest(
                text: 'Let\'s see how many characters will remain unused in this message.'
            )
        );

    foreach ($previewResponse->getPreviews() ?? [] as $preview) {
        echo sprintf(
            'Characters remaining: %s, text preview: %s',
            $preview->getCharactersRemaining(),
            $preview->getTextPreview()
        ) . PHP_EOL;
    }
```

#### Receive incoming SMS
If you want to receive SMS messages from your subscribers we can have them delivered to you in real time. When you buy and configure a number capable of receiving SMS, specify your endpoint, as explained in [documentation](https://www.infobip.com/docs/api#channels/sms/receive-inbound-sms-messages).
e.g. `https://{yourDomain}/incoming-sms`.
Example of webhook implementation:

```php
    use Infobip\ObjectSerializer;
    use Infobip\Model\SmsInboundMessageResult;

    $objectSerializer = new ObjectSerializer();

    $data = \file_get_contents('php://input');

    /**
     * @var SmsInboundMessageResult $messages
     */
    $messages = $objectSerializer->deserialize($data, SmsInboundMessageResult::class);

    foreach ($messages->getResults() ?? [] as $message) {
        echo $message-> getFrom() . " - " . $message-> getCleanText() . "\n";
    }
```

#### Two-Factor Authentication (2FA)
For 2FA quick start guide please check [these examples](two-factor-authentication.md).

#### Send email
For send email quick start guide please check [these examples](email.md).

#### WhatsApp
For WhatsApp quick start guide, view [these examples](whatsapp.md).

#### Messages API
For Messages API quick start guide, view [these examples](messages-api.md).

#### Moments
For Moments quick start guide, view [these examples](moments.md).

## Ask for help

Feel free to open issues on the repository for any issue or feature request. As per pull requests, for details check the `CONTRIBUTING` [file][contributing] related to it - in short, we will not merge any pull requests, this code is auto-generated.

This code is auto generated, and we are unable to merge any pull request from here, but we will review and implement changes directly within our pipeline, as described in the `CONTRIBUTING` [file][contributing].

For anything that requires our imminent attention, contact us @ [support@infobip.com](mailto:support@infobip.com).

[apidocs]: https://www.infobip.com/docs/api
[freetrial]: https://www.infobip.com/docs/essentials/free-trial
[signup]: https://www.infobip.com/signup
[semver]: https://semver.org
[license]: LICENSE
[contributing]: CONTRIBUTING.md
