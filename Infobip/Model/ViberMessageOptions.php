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

class ViberMessageOptions
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        protected ?\Infobip\Model\Platform $platform = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\ValidityPeriod $validityPeriod = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\DeliveryTimeWindow $deliveryTimeWindow = null,
        #[Assert\Length(max: 255)]
        #[Assert\Length(min: 0)]
        protected ?string $campaignReferenceId = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\ViberDefaultSmsFailover $smsFailover = null,
        #[Assert\Length(max: 100)]
        #[Assert\Length(min: 1)]
        protected ?string $trackingData = null,
        protected ?string $label = null,
        protected ?bool $applySessionRate = null,
        protected ?bool $toPrimaryDeviceOnly = null,
    ) {

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

    public function getValidityPeriod(): \Infobip\Model\ValidityPeriod|null
    {
        return $this->validityPeriod;
    }

    public function setValidityPeriod(?\Infobip\Model\ValidityPeriod $validityPeriod): self
    {
        $this->validityPeriod = $validityPeriod;
        return $this;
    }

    public function getDeliveryTimeWindow(): \Infobip\Model\DeliveryTimeWindow|null
    {
        return $this->deliveryTimeWindow;
    }

    public function setDeliveryTimeWindow(?\Infobip\Model\DeliveryTimeWindow $deliveryTimeWindow): self
    {
        $this->deliveryTimeWindow = $deliveryTimeWindow;
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

    public function getSmsFailover(): \Infobip\Model\ViberDefaultSmsFailover|null
    {
        return $this->smsFailover;
    }

    public function setSmsFailover(?\Infobip\Model\ViberDefaultSmsFailover $smsFailover): self
    {
        $this->smsFailover = $smsFailover;
        return $this;
    }

    public function getTrackingData(): string|null
    {
        return $this->trackingData;
    }

    public function setTrackingData(?string $trackingData): self
    {
        $this->trackingData = $trackingData;
        return $this;
    }

    public function getLabel(): mixed
    {
        return $this->label;
    }

    public function setLabel($label): self
    {
        $this->label = $label;
        return $this;
    }

    public function getApplySessionRate(): bool|null
    {
        return $this->applySessionRate;
    }

    public function setApplySessionRate(?bool $applySessionRate): self
    {
        $this->applySessionRate = $applySessionRate;
        return $this;
    }

    public function getToPrimaryDeviceOnly(): bool|null
    {
        return $this->toPrimaryDeviceOnly;
    }

    public function setToPrimaryDeviceOnly(?bool $toPrimaryDeviceOnly): self
    {
        $this->toPrimaryDeviceOnly = $toPrimaryDeviceOnly;
        return $this;
    }
}
