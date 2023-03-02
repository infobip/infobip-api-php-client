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

class MmsReport implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'MmsReport';

    public const OPENAPI_FORMATS = [
        'bulkId' => null,
        'messageId' => null,
        'to' => null,
        'from' => null,
        'sentAt' => null,
        'doneAt' => null,
        'mmsCount' => 'int32',
        'mccMnc' => null,
        'callbackData' => null,
        'price' => null,
        'status' => null,
        'error' => null,
        'entityId' => null,
        'applicationId' => null
    ];

    /**
     */
    public function __construct(
        protected ?string $bulkId = null,
        protected ?string $messageId = null,
        protected ?string $to = null,
        protected ?string $from = null,
        protected ?string $sentAt = null,
        protected ?string $doneAt = null,
        protected ?int $mmsCount = null,
        protected ?string $mccMnc = null,
        protected ?string $callbackData = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\MmsPrice $price = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\MmsStatus $status = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\MmsError $error = null,
        protected ?string $entityId = null,
        protected ?string $applicationId = null,
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

    public function getSentAt(): string|null
    {
        return $this->sentAt;
    }

    public function setSentAt(?string $sentAt): self
    {
        $this->sentAt = $sentAt;
        return $this;
    }

    public function getDoneAt(): string|null
    {
        return $this->doneAt;
    }

    public function setDoneAt(?string $doneAt): self
    {
        $this->doneAt = $doneAt;
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

    public function getMccMnc(): string|null
    {
        return $this->mccMnc;
    }

    public function setMccMnc(?string $mccMnc): self
    {
        $this->mccMnc = $mccMnc;
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

    public function getStatus(): \Infobip\Model\MmsStatus|null
    {
        return $this->status;
    }

    public function setStatus(?\Infobip\Model\MmsStatus $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getError(): \Infobip\Model\MmsError|null
    {
        return $this->error;
    }

    public function setError(?\Infobip\Model\MmsError $error): self
    {
        $this->error = $error;
        return $this;
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
}
