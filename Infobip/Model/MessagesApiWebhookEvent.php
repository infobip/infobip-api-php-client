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
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class MessagesApiWebhookEvent extends MessagesApiInboundEvent
{
    public const EVENT = 'MO';

    /**
     * @param \Infobip\Model\MessagesApiWebhookEventContent[] $content
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $channel,
        #[Assert\NotBlank]
        protected string $sender,
        #[Assert\NotBlank]
        protected string $destination,
        #[Assert\NotBlank]
        protected array $content,
        #[Assert\NotBlank]
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected \DateTime $receivedAt,
        #[Assert\NotBlank]
        protected string $messageId,
        protected ?string $pairedMessageId = null,
        protected ?string $callbackData = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\Platform $platform = null,
        protected ?string $campaignReferenceId = null,
    ) {
        $modelDiscriminatorValue = self::EVENT;

        parent::__construct(
            event: $modelDiscriminatorValue,
        );
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

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @return \Infobip\Model\MessagesApiWebhookEventContent[]
     */
    public function getContent(): array
    {
        return $this->content;
    }

    /**
     * @param \Infobip\Model\MessagesApiWebhookEventContent[] $content Content of the message.
     */
    public function setContent(array $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getReceivedAt(): \DateTime
    {
        return $this->receivedAt;
    }

    public function setReceivedAt(\DateTime $receivedAt): self
    {
        $this->receivedAt = $receivedAt;
        return $this;
    }

    public function getMessageId(): string
    {
        return $this->messageId;
    }

    public function setMessageId(string $messageId): self
    {
        $this->messageId = $messageId;
        return $this;
    }

    public function getPairedMessageId(): string|null
    {
        return $this->pairedMessageId;
    }

    public function setPairedMessageId(?string $pairedMessageId): self
    {
        $this->pairedMessageId = $pairedMessageId;
        return $this;
    }

    public function getCallbackData(): string|null
    {
        return $this->callbackData;
    }

    public function setCallbackData(?string $callbackData): self
    {
        $this->callbackData = $callbackData;
        return $this;
    }

    public function getPlatform(): \Infobip\Model\Platform|null
    {
        return $this->platform;
    }

    public function setPlatform(?\Infobip\Model\Platform $platform): self
    {
        $this->platform = $platform;
        return $this;
    }

    public function getCampaignReferenceId(): string|null
    {
        return $this->campaignReferenceId;
    }

    public function setCampaignReferenceId(?string $campaignReferenceId): self
    {
        $this->campaignReferenceId = $campaignReferenceId;
        return $this;
    }
}
