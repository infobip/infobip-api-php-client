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

class MmsAdvancedMessage implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'MmsAdvancedMessage';

    public const OPENAPI_FORMATS = [
        'callbackData' => null,
        'deliveryTimeWindow' => null,
        'destinations' => null,
        'from' => null,
        'intermediateReport' => null,
        'notifyContentType' => null,
        'notifyUrl' => null,
        'messageSegments' => null,
        'validityPeriod' => 'int64',
        'title' => null,
        'entityId' => null,
        'applicationId' => null
    ];

    /**
     * @param \Infobip\Model\MmsDestination[] $destinations
     * @param \Infobip\Model\MmsAdvancedMessageSegment[] $messageSegments
     */
    public function __construct(
        #[Assert\NotBlank]

    protected array $destinations,
        #[Assert\NotBlank]

    protected array $messageSegments,
        #[Assert\Length(max: 4000)]
    #[Assert\Length(min: 0)]

    protected ?string $callbackData = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\MmsDeliveryTimeWindow $deliveryTimeWindow = null,
        protected ?string $from = null,
        protected ?bool $intermediateReport = null,
        protected ?string $notifyContentType = null,
        protected ?string $notifyUrl = null,
        protected ?int $validityPeriod = null,
        #[Assert\Length(max: 66)]
    #[Assert\Length(min: 0)]

    protected ?string $title = null,
        #[Assert\Length(max: 50)]
    #[Assert\Length(min: 0)]

    protected ?string $entityId = null,
        #[Assert\Length(max: 50)]
    #[Assert\Length(min: 0)]

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

    public function getCallbackData(): string|null
    {
        return $this->callbackData;
    }

    public function setCallbackData(?string $callbackData): self
    {
        $this->callbackData = $callbackData;
        return $this;
    }

    public function getDeliveryTimeWindow(): \Infobip\Model\MmsDeliveryTimeWindow|null
    {
        return $this->deliveryTimeWindow;
    }

    public function setDeliveryTimeWindow(?\Infobip\Model\MmsDeliveryTimeWindow $deliveryTimeWindow): self
    {
        $this->deliveryTimeWindow = $deliveryTimeWindow;
        return $this;
    }

    /**
     * @return \Infobip\Model\MmsDestination[]
     */
    public function getDestinations(): array
    {
        return $this->destinations;
    }

    /**
     * @param \Infobip\Model\MmsDestination[] $destinations An array of destination objects for where messages are being sent. A valid destination is required.
     */
    public function setDestinations(array $destinations): self
    {
        $this->destinations = $destinations;
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

    public function getIntermediateReport(): bool|null
    {
        return $this->intermediateReport;
    }

    public function setIntermediateReport(?bool $intermediateReport): self
    {
        $this->intermediateReport = $intermediateReport;
        return $this;
    }

    public function getNotifyContentType(): string|null
    {
        return $this->notifyContentType;
    }

    public function setNotifyContentType(?string $notifyContentType): self
    {
        $this->notifyContentType = $notifyContentType;
        return $this;
    }

    public function getNotifyUrl(): string|null
    {
        return $this->notifyUrl;
    }

    public function setNotifyUrl(?string $notifyUrl): self
    {
        $this->notifyUrl = $notifyUrl;
        return $this;
    }

    /**
     * @return \Infobip\Model\MmsAdvancedMessageSegment[]
     */
    public function getMessageSegments(): array
    {
        return $this->messageSegments;
    }

    /**
     * @param \Infobip\Model\MmsAdvancedMessageSegment[] $messageSegments Content of the message being sent.
     */
    public function setMessageSegments(array $messageSegments): self
    {
        $this->messageSegments = $messageSegments;
        return $this;
    }

    public function getValidityPeriod(): int|null
    {
        return $this->validityPeriod;
    }

    public function setValidityPeriod(?int $validityPeriod): self
    {
        $this->validityPeriod = $validityPeriod;
        return $this;
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;
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
