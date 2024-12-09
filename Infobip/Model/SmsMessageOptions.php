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

class SmsMessageOptions
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
        protected ?\Infobip\Model\SmsRegionalOptions $regional = null,
        protected ?bool $flash = null,
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

    public function getRegional(): \Infobip\Model\SmsRegionalOptions|null
    {
        return $this->regional;
    }

    public function setRegional(?\Infobip\Model\SmsRegionalOptions $regional): self
    {
        $this->regional = $regional;
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
}
