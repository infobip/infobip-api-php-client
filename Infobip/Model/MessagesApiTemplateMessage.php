<?php

declare(strict_types=1);

/**
 * Infobip Client API Libraries OpenAPI Specification
 *
 * OpenAPI specification containing public endpoints supported in client API libraries.
 *
 * Contact: support@infobip.com
 *
 * This class is auto generated from the Infobip OpenAPI specification through the OpenAPI Specification Client API libraries (Re)Generator (OSCAR), powered by the OpenAPI Generator (https://openapi-generator.tech).
 *
 * Do not edit manually. To learn how to raise an issue, see the CONTRIBUTING guide or contact us @ support@infobip.com.
 */

namespace Infobip\Model;

use Symfony\Component\Validator\Constraints as Assert;

class MessagesApiTemplateMessage implements MessagesApiRequestMessagesOneOf
{
    /**
     * @param \Infobip\Model\MessagesApiMessageDestination[] $destinations
     * @param \Infobip\Model\MessagesApiBaseFailover[] $failover
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $channel,
        #[Assert\NotBlank]
        protected string $sender,
        #[Assert\NotBlank]
        protected array $destinations,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\MessagesApiTemplate $template,
        #[Assert\Valid]
        protected ?\Infobip\Model\MessagesApiTemplateMessageContent $content = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\MessagesApiMessageOptions $options = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\MessagesApiWebhooks $webhooks = null,
        protected ?array $failover = null,
    ) {

    }


    public function getChannel(): mixed
    {
        return $this->channel;
    }

    public function setChannel($channel): self
    {
        $this->channel = $channel;
        return $this;
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return \Infobip\Model\MessagesApiMessageDestination[]
     */
    public function getDestinations(): array
    {
        return $this->destinations;
    }

    /**
     * @param \Infobip\Model\MessagesApiMessageDestination[] $destinations Array of destination objects for where messages are being sent. A valid destination is required.
     */
    public function setDestinations(array $destinations): self
    {
        $this->destinations = $destinations;
        return $this;
    }

    public function getTemplate(): \Infobip\Model\MessagesApiTemplate
    {
        return $this->template;
    }

    public function setTemplate(\Infobip\Model\MessagesApiTemplate $template): self
    {
        $this->template = $template;
        return $this;
    }

    public function getContent(): \Infobip\Model\MessagesApiTemplateMessageContent|null
    {
        return $this->content;
    }

    public function setContent(?\Infobip\Model\MessagesApiTemplateMessageContent $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getOptions(): \Infobip\Model\MessagesApiMessageOptions|null
    {
        return $this->options;
    }

    public function setOptions(?\Infobip\Model\MessagesApiMessageOptions $options): self
    {
        $this->options = $options;
        return $this;
    }

    public function getWebhooks(): \Infobip\Model\MessagesApiWebhooks|null
    {
        return $this->webhooks;
    }

    public function setWebhooks(?\Infobip\Model\MessagesApiWebhooks $webhooks): self
    {
        $this->webhooks = $webhooks;
        return $this;
    }

    /**
     * @return \Infobip\Model\MessagesApiBaseFailover[]|null
     */
    public function getFailover(): ?array
    {
        return $this->failover;
    }

    /**
     * @param \Infobip\Model\MessagesApiBaseFailover[]|null $failover Provides options for configuring a message failover. When message fails it will be sent over channels in order specified in an array. Make sure to provide correct sender and destinations specified as `Channels Destination` for each channel.
     */
    public function setFailover(?array $failover): self
    {
        $this->failover = $failover;
        return $this;
    }
}
