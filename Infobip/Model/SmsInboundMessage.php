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

class SmsInboundMessage implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'SmsInboundMessage';

    public const OPENAPI_FORMATS = [
        'callbackData' => null,
        'cleanText' => null,
        'from' => null,
        'keyword' => null,
        'messageId' => null,
        'price' => null,
        'receivedAt' => 'date-time',
        'smsCount' => 'int32',
        'text' => null,
        'to' => null
    ];

    /**
     */
    public function __construct(
        protected ?string $callbackData = null,
        protected ?string $cleanText = null,
        protected ?string $from = null,
        protected ?string $keyword = null,
        protected ?string $messageId = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\SmsPrice $price = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]

    protected ?\DateTime $receivedAt = null,
        protected ?int $smsCount = null,
        protected ?string $text = null,
        protected ?string $to = null,
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

    public function getCallbackData(): string|null
    {
        return $this->callbackData;
    }

    public function setCallbackData(?string $callbackData): self
    {
        $this->callbackData = $callbackData;
        return $this;
    }

    public function getCleanText(): string|null
    {
        return $this->cleanText;
    }

    public function setCleanText(?string $cleanText): self
    {
        $this->cleanText = $cleanText;
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

    public function getKeyword(): string|null
    {
        return $this->keyword;
    }

    public function setKeyword(?string $keyword): self
    {
        $this->keyword = $keyword;
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

    public function getPrice(): \Infobip\Model\SmsPrice|null
    {
        return $this->price;
    }

    public function setPrice(?\Infobip\Model\SmsPrice $price): self
    {
        $this->price = $price;
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

    public function getSmsCount(): int|null
    {
        return $this->smsCount;
    }

    public function setSmsCount(?int $smsCount): self
    {
        $this->smsCount = $smsCount;
        return $this;
    }

    public function getText(): string|null
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;
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
}
