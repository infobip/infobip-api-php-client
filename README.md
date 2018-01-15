# Infobip API PHP client

## Prerequisites

- You have installed a [PHP interpreter](http://php.net/manual/en/install.php) (minimal required version is 5.5).
- You have installed [Composer](https://getcomposer.org/download).

## Installation

For using Infobip API PHP client in your project, you have to add the following to your `composer.json` file:

	"require": {
		"infobip/infobip-api-php-client": "dev-master"
	}

and run `composer install` command inside the project's root folder.

If your setup prevents you from using `composer` you can manually download this package and all of its dependencies and refference them from your code. However, there are solutions that can automate this process. One of them is `php-download` online tool. You can use it to find pre-composed [infobip client package](https://php-download.com/package/infobip/infobip-api-php-client), download it from there and use in your project without manually collecting the dependencies.

## Running examples

Before you start any of the examples, you have to populate specific data (sender address, receiver address, etc.) to `infobip/examples/examples.php` file.

Then, you should uncomment the example you want to test and run the PHP script with your **username** and **password** (in plain text) as arguments like the following:

	php infobip/examples/examples.php YOUR_USERNAME YOUR_PASSWORD

### Basic messaging example

The first thing that needs to be done is to include `autoload.php` and to initialize the messaging client:

	require_once '<PATH-TO-VENDOR-FOLDER>/autoload.php';

    $client = new infobip\api\client\SendSingleTextualSms(new infobip\api\configuration\BasicAuthConfiguration(USERNAME, PASSWORD));

You are basically logging in to Infobip, so an exception will be thrown if the username and/or password are incorrect. 

The next step is to prepare the message:

	$requestBody = new infobip\api\model\sms\mt\send\textual\SMSTextualRequest();
	$requestBody->setFrom(FROM);
	$requestBody->setTo(TO);
	$requestBody->setText("This is an example message.");

Now you are ready to send the message:

	$response = $client->execute($requestBody);

### Messaging with notification push example

For sending SMS and expecting delivery report to be pushed to some notify URL, you have to initialize the messaging client:

	$client = new infobip\api\client\SendMultipleTextualSmsAdvanced(new infobip\api\configuration\BasicAuthConfiguration(USERNAME, PASSWORD));

And prepare the advanced message:

	$destination = new infobip\api\model\Destination();
	$destination->setTo(TO);

	$message = new infobip\api\model\sms\mt\send\Message();
	$message->setFrom(FROM);
	$message->setDestinations([$destination]);
	$message->setText("This is an example message.");
	$message->setNotifyUrl(NOTIFY_URL);

	$requestBody = new infobip\api\model\sms\mt\send\textual\SMSAdvancedTextualRequest();
	$requestBody->setMessages([$message]);

When the delivery notification is pushed to your server as a HTTP POST request, you could process body of the message with the following code:

	$mapper = new JsonMapper();
	$responseObject = $mapper->map(json_decode($responseBody), new infobip\api\model\sms\mt\reports\SMSReportResponse());

	for ($i = 0; $i < count($responseObject->getResults()); ++$i) {
		$result = $responseObject->getResults()[$i];
		echo "Message ID: " . $result->getMessageId() . "\n";
		echo "Sent at: " . $result->getSentAt()->format('y-M-d H:m:s T') . "\n";
		echo "Receiver: " . $result->getTo() . "\n";
		echo "Status: " . $result->getStatus()->getName() . "\n";
		echo "Price: " . $result->getPrice()->getPricePerMessage() . " " . $result->getPrice()->getCurrency() . "\n\n";
	}

### Sending message with special characters example

If you want to send message with special characters, this is how you initialize the client and prepare your message:

	$client = new infobip\api\client\SendMultipleTextualSmsAdvanced(new infobip\api\configuration\BasicAuthConfiguration(USERNAME, PASSWORD));

	$destination = new infobip\api\model\Destination();
	$destination->setTo(TO);

	$language = new infobip\api\model\sms\mt\send\Language();
	//specific language code (TR stands for Turkish)
	$language->setLanguageCode("TR");
	//use single shift table for specific language ('false' or 'true')
	$language->setSingleShift(true);
	//use locking shift table for specific language ('false' or 'true')
	$language->setLockingShift(false);

	$message = new infobip\api\model\sms\mt\send\Message();
	$message->setFrom(FROM);
	$message->setDestinations([$destination]);
	$message->setText("Artık Ulusal Dil Tanımlayıcısı ile Türkçe karakterli smslerinizi rahatlıkla iletebilirsiniz.");
	$message->setLanguage($language);

	$requestBody = new infobip\api\model\sms\mt\send\textual\SMSAdvancedTextualRequest();
	$requestBody->setMessages([$message]);

Currently supported languages (with their language codes) are: `Spanish - "ES"`, `Portuguese - "PT"`, `Turkish - "TR"`.

### Number Context example

Initialize the number context query client:

    $client = new infobip\api\client\NumberContextQuery(new infobip\api\configuration\BasicAuthConfiguration(USERNAME, PASSWORD));

Create request body:

	$requestBody = new infobip\api\model\nc\query\NumberContextRequest();
	$requestBody->setTo(TO);

Retrieve the number context:

	$response = $client->execute($requestBody);

	$numberContext = $response->getResults()[0];
	echo "Phone number: " . $numberContext->getTo() . "\n";
	echo "MccMnc: " . $numberContext->getMccMnc() . "\n";
	echo "Original country prefix: " . $numberContext->getOriginalNetwork()->getCountryPrefix() . "\n";
	echo "Original network prefix: " . $numberContext->getOriginalNetwork()->getNetworkPrefix() . "\n";
	echo "Serving MSC: " . $numberContext->getServingMSC();

### Number Context with notification push example

Similar to the previous example, but this time you must set the notification URL where the result will be pushed:

	$client = new infobip\api\client\NumberContextNotify(new infobip\api\configuration\BasicAuthConfiguration(USERNAME, PASSWORD));

	$requestBody = new infobip\api\model\nc\notify\NumberContextRequest();
	$requestBody->setTo(TO);
	$requestBody->setNotifyUrl(NOTIFY_URL);

	$response = $client->execute($requestBody);

When the number context notification is pushed to your server as a HTTP POST request, you could process the body of the message with the following code: 

	$mapper = new JsonMapper();
	$responseObject = $mapper->map(json_decode($responseBody), new infobip\api\model\nc\query\NumberContextResponse());

	$numberContext = $responseObject->getResults()[0];
	echo "Phone number: " . $numberContext->getTo() . "\n";
	echo "MccMnc: " . $numberContext->getMccMnc() . "\n";
	echo "Original country prefix: " . $numberContext->getOriginalNetwork()->getCountryPrefix() . "\n";
	echo "Original network prefix: " . $numberContext->getOriginalNetwork()->getNetworkPrefix() . "\n";
	echo "Status: " . $numberContext->getStatus()->getName();

### Retrieve inbound messages example

The client that has to be initialized is:

	$client = new infobip\api\client\GetReceivedMessages(new infobip\api\configuration\BasicAuthConfiguration(USERNAME, PASSWORD));

Then you have to create execution context:

	$context = new infobip\api\model\sms\mo\reports\GetReceivedMessagesExecuteContext;

If you want to filter inbound messages, you can do it by setting the value to any of execute context class fields.

The response type will be `\infobip\api\model\sms\mo\reports\MOReportResponse`:

    $response = $client->execute($context);

	for ($i = 0; $i < count($response->getResults()); ++$i) {
		$result = $response->getResults()[$i];
		echo "Message ID: " . $result->getMessageId() . "\n";
		echo "Received at: " . $result->getReceivedAt()->format('y-M-d H:m:s T') . "\n";
		echo "Sender: " . $result->getFrom() . "\n";
		echo "Receiver: " . $result->getTo() . "\n";
		echo "Message text: " . $result->getText() . "\n\n";
	}

### Inbound message push example

The subscription to receive inbound messages can be set up on [Infobip](https://www.infobip.com) platform.
When the inbound message notification is pushed to your server as a HTTP POST request, you could process body of the message with the following code:

	$mapper = new JsonMapper();
	$responseObject = $mapper->map(json_decode($responseBody), new infobip\api\model\sms\mo\reports\MOReportResponse());

	$result = $responseObject->getResults()[0];
	echo "Message ID: " . $result->getMessageId() . "\n";
	echo "Received at: " . $result->getReceivedAt()->format('y-M-d H:m:s T') . "\n";
	echo "Sender: " . $result->getFrom() . "\n";
	echo "Receiver: " . $result->getTo() . "\n";
	echo "Message text: " . $result->getText() . "\n";
	echo "Keyword: " . $result->getKeyword() . "\n";
	echo "Clean text: " . $result->getCleanText() . "\n";
	echo "Sms count: " . $result->getSmsCount() . "\n";

## License

This library is licensed under the [Apache License, Version 2.0](http://www.apache.org/licenses/LICENSE-2.0)
