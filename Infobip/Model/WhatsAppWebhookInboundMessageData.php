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

class WhatsAppWebhookInboundMessageData
{
    /**
     */
    public function __construct(
        protected ?string $from = null,
        protected ?string $to = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $receivedAt = null,
        protected ?string $messageId = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\MessagePrice $price = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppWebhookInboundMessage $message = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppWebhookContactName $contact = null,
    ) {

    }


    public function getFrom(): string|null
    {
        return $this->from;
    }

    public function setFrom(?string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getTo(): string|null
    {
        return $this->to;
    }

    public function setTo(?string $to): self
    {
        $this->to = $to;
        return $this;
    }

    public function getReceivedAt(): \DateTime|null
    {
        return $this->receivedAt;
    }

    public function setReceivedAt(?\DateTime $receivedAt): self
    {
        $this->receivedAt = $receivedAt;
        return $this;
    }

    public function getMessageId(): string|null
    {
        return $this->messageId;
    }

    public function setMessageId(?string $messageId): self
    {
        $this->messageId = $messageId;
        return $this;
    }

    public function getPrice(): \Infobip\Model\MessagePrice|null
    {
        return $this->price;
    }

    public function setPrice(?\Infobip\Model\MessagePrice $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getMessage(): \Infobip\Model\WhatsAppWebhookInboundMessage|null
    {
        return $this->message;
    }

    public function setMessage(?\Infobip\Model\WhatsAppWebhookInboundMessage $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getContact(): \Infobip\Model\WhatsAppWebhookContactName|null
    {
        return $this->contact;
    }

    public function setContact(?\Infobip\Model\WhatsAppWebhookContactName $contact): self
    {
        $this->contact = $contact;
        return $this;
    }
}
