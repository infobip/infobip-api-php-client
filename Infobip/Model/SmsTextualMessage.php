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

class SmsTextualMessage implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'SmsTextualMessage';

    public const OPENAPI_FORMATS = [
        'callbackData' => null,
        'deliveryTimeWindow' => null,
        'destinations' => null,
        'flash' => null,
        'from' => null,
        'intermediateReport' => null,
        'language' => null,
        'notifyContentType' => null,
        'notifyUrl' => null,
        'regional' => null,
        'sendAt' => 'date-time',
        'text' => null,
        'transliteration' => null,
        'validityPeriod' => 'int64',
        'entityId' => null,
        'applicationId' => null
    ];

    /**
     * @param \Infobip\Model\SmsDestination[] $destinations
     */
    public function __construct(
        #[Assert\NotBlank]

    protected array $destinations,
        #[Assert\Length(max: 4000)]
    #[Assert\Length(min: 0)]

    protected ?string $callbackData = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\SmsDeliveryTimeWindow $deliveryTimeWindow = null,
        protected ?bool $flash = false,
        protected ?string $from = null,
        protected ?bool $intermediateReport = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\SmsLanguage $language = null,
        protected ?string $notifyContentType = null,
        protected ?string $notifyUrl = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\SmsRegionalOptions $regional = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]

    protected ?\DateTime $sendAt = null,
        protected ?string $text = null,
        protected ?string $transliteration = null,
        protected ?int $validityPeriod = null,
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

    public function getDeliveryTimeWindow(): \Infobip\Model\SmsDeliveryTimeWindow|null
    {
        return $this->deliveryTimeWindow;
    }

    public function setDeliveryTimeWindow(?\Infobip\Model\SmsDeliveryTimeWindow $deliveryTimeWindow): self
    {
        $this->deliveryTimeWindow = $deliveryTimeWindow;
        return $this;
    }

    /**
     * @return \Infobip\Model\SmsDestination[]
     */
    public function getDestinations(): array
    {
        return $this->destinations;
    }

    /**
     * @param \Infobip\Model\SmsDestination[] $destinations An array of destination objects for where messages are being sent. A valid destination is required.
     */
    public function setDestinations(array $destinations): self
    {
        $this->destinations = $destinations;
        return $this;
    }

    public function getFlash(): bool|null
    {
        return $this->flash;
    }

    public function setFlash(?bool $flash): self
    {
        $this->flash = $flash;
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

    public function getLanguage(): \Infobip\Model\SmsLanguage|null
    {
        return $this->language;
    }

    public function setLanguage(?\Infobip\Model\SmsLanguage $language): self
    {
        $this->language = $language;
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

    public function getRegional(): \Infobip\Model\SmsRegionalOptions|null
    {
        return $this->regional;
    }

    public function setRegional(?\Infobip\Model\SmsRegionalOptions $regional): self
    {
        $this->regional = $regional;
        return $this;
    }

    public function getSendAt(): \DateTime|null
    {
        return $this->sendAt;
    }

    public function setSendAt(?\DateTime $sendAt): self
    {
        $this->sendAt = $sendAt;
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

    public function getTransliteration(): string|null
    {
        return $this->transliteration;
    }

    public function setTransliteration(?string $transliteration): self
    {
        $this->transliteration = $transliteration;
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
