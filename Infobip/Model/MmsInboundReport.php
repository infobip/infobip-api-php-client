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

class MmsInboundReport implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'MmsInboundReport';

    public const OPENAPI_FORMATS = [
        'messageId' => null,
        'to' => null,
        'from' => null,
        'message' => null,
        'receivedAt' => null,
        'mmsCount' => 'int32',
        'callbackData' => null,
        'price' => null
    ];

    /**
     */
    public function __construct(
        protected ?string $messageId = null,
        protected ?string $to = null,
        protected ?string $from = null,
        protected ?string $message = null,
        protected ?string $receivedAt = null,
        protected ?int $mmsCount = null,
        protected ?string $callbackData = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\MmsPrice $price = null,
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

    public function getMessageId(): string|null
    {
        return $this->messageId;
    }

    public function setMessageId(?string $messageId): self
    {
        $this->messageId = $messageId;
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

    public function getFrom(): string|null
    {
        return $this->from;
    }

    public function setFrom(?string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getMessage(): string|null
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getReceivedAt(): string|null
    {
        return $this->receivedAt;
    }

    public function setReceivedAt(?string $receivedAt): self
    {
        $this->receivedAt = $receivedAt;
        return $this;
    }

    public function getMmsCount(): int|null
    {
        return $this->mmsCount;
    }

    public function setMmsCount(?int $mmsCount): self
    {
        $this->mmsCount = $mmsCount;
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

    public function getPrice(): \Infobip\Model\MmsPrice|null
    {
        return $this->price;
    }

    public function setPrice(?\Infobip\Model\MmsPrice $price): self
    {
        $this->price = $price;
        return $this;
    }
}
