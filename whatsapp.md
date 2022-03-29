## WhatsApp API quickstart
This quick guide aims to help you get started with Infobip WhatsApp API. After reading it, you should know how to send various types of messages through the WhatsApp channel, and receive delivery reports.

### Set up a PHP HTTP client

The first step is to create a `Configuration` instance with your API credentials.
```php
    use GuzzleHttp\Client;
    use Infobip\Api\SendWhatsAppApi;
    use Infobip\Configuration;
    
    $client = new Client();

    $configuration = (new Configuration())
        ->setHost('Your API host which can be found in Infobip Portal')
        ->setApiKeyPrefix('Authorization', 'App')
        ->setApiKey('Authorization', 'Your API key which can be found in Infobip Portal');
```
Now, you can create an instance of `SendWhatsAppApi` that allows you to send WhatsApp messages.

```php
    $whatsAppApi = new SendWhatsAppApi($client, $configuration);
```

### Activate your test sender
Before sending WhatsApp messages, you need to activate your sender and connect to our test domain.

Just add **447860099299** Infobip sender to your WhatsApp contacts and send a message containing your Infobip account username. 

Alternatively, visit our [docs page][whatsapp-docs-page] to scan a QR code that activates your test sender for you.

You are now ready to send your first message !

**IMPORTANT**: Keep in mind that for testing purposes you can only send messages to registered numbers.

### Send your first message

The easiest way to start with WhatsApp is to send template messages, because for other types of messages the recipient must initiate a conversation.
Template messages are predefined, structured-type messages approved by WhatsApp for a particular sender.
It is the easiest way to get started.

Infobip test sender has a lot of predefined templates that you can fetch by using this [endpoint][get-templates-url].

The example below shows how to use a template named `welcome_multiple_languages` with only one placeholder. 
First, create an instance of `WhatsAppMessage` and provide the required data like recipient number as `to` parameter. We'll use `en` as the language parameter, but you can change it to a few others that are predefined in the template. 
```php
    $message = (new WhatsAppMessage())
        ->setFrom('447860099299')
        ->setTo('<PUT YOUR NUMBER>')
        ->setContent(
            (new WhatsAppTemplateContent())
                ->setLanguage('en')
                ->setTemplateName('welcome_multiple_languages')
                ->setTemplateData(
                    (new WhatsAppTemplateDataContent())
                        ->setBody(
                            (new WhatsAppTemplateBodyContent())
                                ->setPlaceholders(['<PUT YOUR NAME>'])
                        )
                )
        );
```
Next step is to create a `WhatsAppBulkMessage` instance that serves as a container for multiple messages, like the one we created above.
```php
    $bulkMessage = (new WhatsAppBulkMessage())->setMessages([$message]);
```

Use the instance of `SendWhatsAppApi` which we created at the beginning to send a message.
```php
    $messageInfo = $whatsAppApi->sendWhatsAppTemplateMessage($bulkMessage);
```

You can now inspect the results and print status descriptions.
```php
    foreach ($messageInfo->getMessages() as $messageInfoItem) {
        echo $messageInfoItem->getStatus()->getDescription() . PHP_EOL;
    }
```

### Send another template message

For sending another message we'll choose a more complex template example called `registration_success`.
This time, we'll start by creating an instance of `WhatsAppTemplateContent`.

```php
    $templateContent = (new WhatsAppTemplateContent())
        ->setLanguage('en')
        ->setTemplateName('registration_success')
        ->setTemplateData(
            (new WhatsAppTemplateDataContent())
                ->setHeader(
                    (new WhatsAppTemplateImageHeaderContent())
                        ->setMediaUrl('https://api.infobip.com/ott/1/media/infobipLogo')
                )
                ->setBody(
                    (new WhatsAppTemplateBodyContent())
                        ->setPlaceholders(
                            [
                                '<PUT YOUR NAME>',
                                'WhatsApp message',
                                'delivered',
                                'exploring Infobip API',
                            ]
                        )
                )
                ->setButtons(
                    [
                        (new WhatsAppTemplateQuickReplyButtonContent())
                            ->setParameter('Yes'),
                        (new WhatsAppTemplateQuickReplyButtonContent())
                            ->setParameter('No'),
                        (new WhatsAppTemplateQuickReplyButtonContent())
                            ->setParameter('Later'),
                    ]
                )
            );
```
Once the object is created, we can create an instance of `WhatsAppBulkMessage` and use the object as its `content` field.
The rest is the same as in the previous example. We are again using the `$whatsAppApi` instance to send the message.
```php
    $bulkMessage = (new WhatsAppBulkMessage())
        ->setMessages(
            [
                (new WhatsAppMessage())
                    ->setFrom('447860099299')
                    ->setTo('<PUT YOUR NUMBER>')
                    ->setContent($templateContent)
            ]
        );

    $whatsAppApi = new SendWhatsAppApi($client, $configuration);
    
    $messageInfo = $whatsAppApi->sendWhatsAppTemplateMessage($bulkMessage);

    foreach ($messageInfo->getMessages() as $messageInfoItem) {
        echo $messageInfoItem->getStatus()->getDescription() . PHP_EOL;
    }
```

### Respond to user-initiated messages
You are not restricted to sending only template messages.
You may respond to user messages with any type of message within 24 hours of receving the message.
And so, to send a freestyle message, you have to initiate a WhatsApp conversation from your registered number.

```php
    $textMessage = (new WhatsAppTextMessage())
            ->setFrom('447860099299')
            ->setTo('<PUT YOUR NUMBER>')
            ->setContent(
                (new WhatsAppTextContent())
                    ->setText('This is my first WhatsApp message sent using Infobip API client library')
            );

    $whatsAppApi = new SendWhatsAppApi($client, $configuration);
    
    $messageInfo = $whatsAppApi->sendWhatsAppTextMessage($textMessage);

    echo $messageInfo->getStatus()->getDescription() . PHP_EOL;
```
Before you start sending messages, you may want to reactivate your sender by sending STOP to make sure your Infobip account username kickstarts it again.

### How to receive messages
To receive WhatsApp messages, you have to set up a webhook.

A webhook is basically just an endpoint implemented on your side where you'll receive a request each time a new message arrives.
This endpoint will be called by the Infobip API whenever we receive an incoming message for your registered sender.

You can find more details about the structure of the message you can expect on your endpoint on our [docs page][receive-webhook-url].

**Symfony example:**

```php
namespace App\Controller\Webhook;

use Infobip\ObjectSerializer;
use Infobip\Model\WhatsAppInboundMessageResult;
use Infobip\Model\WhatsAppInboundTextMessage;
use Infobip\Model\WhatsAppInboundImageMessage;
use Infobip\Model\WhatsAppInboundDocumentMessage;
use Infobip\Model\WhatsAppInboundLocationMessage;
use Infobip\Model\WhatsAppInboundContactMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class WhatsAppController extends AbstractController
{
    #[Route('/whatsapp', name: 'webhook_whatsapp', methods: ['POST'])]
    public function receiveAction(Request $request)
    {
        /**
         * @var WhatsAppInboundMessageResult $messageData
         */
        $messageDataResult = ObjectSerializer::deserialize(
            $request->getContent(),
            WhatsAppInboundMessageResult::class
        );

        foreach ($messageDataResult as $messageData) {
            foreach ($messageData->getResults() as $result) {
                $message = $result->getMessage();

                if ($message instanceof WhatsAppInboundTextMessage) {
                    $text = $message->getText();
                } elseif ($message instanceof WhatsAppInboundImageMessage) {
                    $text = $message->getCaption();
                } elseif ($message instanceof WhatsAppInboundDocumentMessage) {
                    $text = $message->getCaption();
                } elseif ($message instanceof WhatsAppInboundLocationMessage) {
                    $text = $message->getAddress();
                } elseif ($message instanceof WhatsAppInboundContactMessage) {
                    $names = array_map(
                        function ($contact) {
                            $nameModel = $contact->getName();
                            return $nameModel->getFirstName() . ' ' . $nameModel->getLastName();
                        },
                        $message->getContacts()
                    );

                    $text = implode(', ', $names);
                } else {
                    $text = "Unknown message type";
                }

                echo sprintf(
                    'From: %s - %s',
                    $result->getFrom(),
                    $text
                );
            }
        }
    }
}
```
[get-templates-url]: https://www.infobip.com/docs/api#channels/whatsapp/get-whatsapp-templates
[receive-webhook-url]: https://www.infobip.com/docs/api#channels/whatsapp/receive-whatsapp-inbound-messages
[whatsapp-docs-page]: https://www.infobip.com/docs/api#channels/whatsapp
