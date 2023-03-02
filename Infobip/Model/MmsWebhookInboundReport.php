<?php

// phpcs:ignorefile

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
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

class MmsWebhookInboundReport implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'MmsWebhookInboundReport';

    public const OPENAPI_FORMATS = [
        'entityId' => null,
        'applicationId' => null,
        'from' => null,
        'to' => null,
        'receivedAt' => 'date-time',
        'messageId' => null,
        'pairedMessageId' => null,
        'callbackData' => null,
        'userAgent' => null,
        'message' => null,
        'price' => null
    ];

    /**
     * @param \Infobip\Model\MmsWebhookInboundMessageSegment[] $message
     */
    public function __construct(
        protected ?string $entityId = null,
        protected ?string $applicationId = null,
        protected ?string $from = null,
        protected ?string $to = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]

    protected ?\DateTime $receivedAt = null,
        protected ?string $messageId = null,
        protected ?string $pairedMessageId = null,
        protected ?string $callbackData = null,
        protected ?string $userAgent = null,
        protected ?array $message = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\MessagePrice $price = null,
    ) {
    }

    #[Ignore]
    public function getModelName(): string
    {
        return self::OPENAPI_MODEL_NAME;
    }

    #[Ignore]
    public static function getDiscriminator(): ?string
    {
        return self::DISCRIMINATOR;
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

    public function getUserAgent(): string|null
    {
        return $this->userAgent;
    }

    public function setUserAgent(?string $userAgent): self
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     * @return \Infobip\Model\MmsWebhookInboundMessageSegment[]|null
     */
    public function getMessage(): ?array
    {
        return $this->message;
    }

    /**
     * @param \Infobip\Model\MmsWebhookInboundMessageSegment[]|null $message All parts of the received message.
     */
    public function setMessage(?array $message): self
    {
        $this->message = $message;
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
}
