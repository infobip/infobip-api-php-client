## Messages API Quickstart

Initialize Messages API client:

```php
    use Infobip\Api\MessagesApi;
    use Infobip\Configuration;

    $configuration = new Configuration(
        host: 'your-base-url',
        apiKey: 'your-api-key'
    );

    $messagesApi = new MessagesApi(config: $configuration);
```

### Channel setup

The Messages API allows you to send messages across different channels. Here’s an example to set up and send an SMS message.

#### Sending a Message

To send a message, define the message content and recipient information.

```php
    use Infobip\Model\MessagesApiMessage;
    use Infobip\Model\MessagesApiRequest;
    use Infobip\Model\MessagesApiToDestination;
    use Infobip\Model\MessagesApiOutboundMessageChannel;
    use Infobip\Model\MessagesApiMessageContent;
    use Infobip\Model\MessagesApiMessageTextBody;

    $messagesApi = new MessagesApi(config: $configuration);

    $request = new MessagesApiRequest(
        messages: [
            new MessagesApiMessage(
                channel: MessagesApiOutboundMessageChannel::SMS(),
                sender: "InfoSMS",
                destinations: [new MessagesApiToDestination("385995379169")],
                content: new MessagesApiMessageContent(
                    body: new MessagesApiMessageTextBody("Sent using Infobip's PHP client library!")
                )
            )
        ]
    );

    try {
        $messageInfo = $messagesApi->sendMessagesApiMessage($request);
        print_r($messageInfo);
    } catch (Exception $e) {
        // Handle the exception
        echo 'Error: ', $e->getMessage(), "\n";
    }
```

### Receiving Messages

To receive messages, you can set up a webhook endpoint that the Messages API will call when a new message arrives.

```php
    use Symfony\Component\HttpFoundation\Request;

    #[Route('/incoming-messages', name: 'webhook_messages_api_incoming_messages', methods: ['POST'])]
    public function receiveMessages(Request $request)
    {
        /**
         * @var MessagesApiIncomingMessage $messageData
         */
        $messageDataResult = $this->objectSerializer->deserialize(
            $request->getContent(),
            MessagesApiIncomingMessage::class
        );

        foreach ($messageDataResult as $messageData) {
            foreach ($messageData->getResults() as $result) {
                switch ($result->getEvent()) {
                    case "MO":
                        // Handle MO event
                        break;
                    case "TYPING_STARTED":
                        // Handle TYPING_STARTED event
                        break;
                    case "TYPING_STOPPED":
                        // Handle TYPING_STOPPED event
                        break;
                }
            }
        }
    }
```

### Receiving Delivery Reports

For each message you send, you can receive a delivery report in real-time by setting up another webhook.

```php
    use Symfony\Component\HttpFoundation\Request;

    #[Route('/delivery-reports', name: 'webhook_messages_api_delivery_reports', methods: ['POST'])]
    function receiveDeliveryReports(Request $request) {
        $reports = $this->objectSerializer->deserialize(
            $request->getContent(),
            MessagesApiDeliveryReport::class
        );
        // Handle delivery reports
    }
```

### Additional Features - Adaptation Mode

Enhance your Messages API requests by using the `adaptationMode` parameter. It allows you to send messages even if they are unsupported by the channel.

When you set adaptationMode to `true,` Messages API automatically adjusts the message to remove any unsupported elements, ensuring successful delivery.

For instance, if you'd like to include an image in your WhatsApp and SMS messages, set adaptationMode to 'true'. Messages API will handle the delivery for WhatsApp as a message containing an image, while for SMS will provide a link to the image.

On the other hand, if you set adaptationMode to 'false' and try to send a message with an unsupported element to a channel, an error will occur. Make sure to choose the right setting based on your specific channel and content requirements.
