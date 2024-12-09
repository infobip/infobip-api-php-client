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

class ViberInboundMessageViberInboundContent
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $sender,
        #[Assert\NotBlank]
        protected string $to,
        #[Assert\NotBlank]
        protected string $integrationType,
        #[Assert\NotBlank]
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected \DateTime $receivedAt,
        #[Assert\NotBlank]
        protected string $messageId,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\ViberInboundContent $message,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\MessagePrice $price,
        #[Assert\Length(max: 255)]
        #[Assert\Length(min: 0)]
        protected ?string $entityId = null,
        #[Assert\Length(max: 255)]
        #[Assert\Length(min: 0)]
        protected ?string $applicationId = null,
        protected ?string $keyword = null,
        protected ?string $pairedMessageId = null,
        protected ?string $callbackData = null,
    ) {

    }


    public function getEntityId(): string|null
    {
        return $this->entityId;
    }

    public function setEntityId(?string $entityId): self
    {
        $this->entityId = $entityId;
        return $this;
    }

    public function getApplicationId(): string|null
    {
        return $this->applicationId;
    }

    public function setApplicationId(?string $applicationId): self
    {
        $this->applicationId = $applicationId;
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

    public function getTo(): string
    {
        return $this->to;
    }

    public function setTo(string $to): self
    {
        $this->to = $to;
        return $this;
    }

    public function getIntegrationType(): string
    {
        return $this->integrationType;
    }

    public function setIntegrationType(string $integrationType): self
    {
        $this->integrationType = $integrationType;
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

    public function getKeyword(): string|null
    {
        return $this->keyword;
    }

    public function setKeyword(?string $keyword): self
    {
        $this->keyword = $keyword;
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

    public function getMessage(): \Infobip\Model\ViberInboundContent
    {
        return $this->message;
    }

    public function setMessage(\Infobip\Model\ViberInboundContent $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getPrice(): \Infobip\Model\MessagePrice
    {
        return $this->price;
    }

    public function setPrice(\Infobip\Model\MessagePrice $price): self
    {
        $this->price = $price;
        return $this;
    }
}
