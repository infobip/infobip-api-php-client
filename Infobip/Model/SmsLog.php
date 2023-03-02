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

class SmsLog implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'SmsLog';

    public const OPENAPI_FORMATS = [
        'bulkId' => null,
        'doneAt' => 'date-time',
        'error' => null,
        'from' => null,
        'mccMnc' => null,
        'messageId' => null,
        'price' => null,
        'sentAt' => 'date-time',
        'smsCount' => 'int32',
        'status' => null,
        'text' => null,
        'to' => null
    ];

    /**
     */
    public function __construct(
        protected ?string $bulkId = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]

    protected ?\DateTime $doneAt = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\SmsError $error = null,
        protected ?string $from = null,
        protected ?string $mccMnc = null,
        protected ?string $messageId = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\SmsPrice $price = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]

    protected ?\DateTime $sentAt = null,
        protected ?int $smsCount = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\SmsStatus $status = null,
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

    public function getBulkId(): string|null
    {
        return $this->bulkId;
    }

    public function setBulkId(?string $bulkId): self
    {
        $this->bulkId = $bulkId;
        return $this;
    }

    public function getDoneAt(): \DateTime|null
    {
        return $this->doneAt;
    }

    public function setDoneAt(?\DateTime $doneAt): self
    {
        $this->doneAt = $doneAt;
        return $this;
    }

    public function getError(): \Infobip\Model\SmsError|null
    {
        return $this->error;
    }

    public function setError(?\Infobip\Model\SmsError $error): self
    {
        $this->error = $error;
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

    public function getMccMnc(): string|null
    {
        return $this->mccMnc;
    }

    public function setMccMnc(?string $mccMnc): self
    {
        $this->mccMnc = $mccMnc;
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

    public function getSentAt(): \DateTime|null
    {
        return $this->sentAt;
    }

    public function setSentAt(?\DateTime $sentAt): self
    {
        $this->sentAt = $sentAt;
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

    public function getStatus(): \Infobip\Model\SmsStatus|null
    {
        return $this->status;
    }

    public function setStatus(?\Infobip\Model\SmsStatus $status): self
    {
        $this->status = $status;
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
