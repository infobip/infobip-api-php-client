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

class MessagesApiMessageOptions
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        protected ?\Infobip\Model\Platform $platform = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\ValidityPeriod $validityPeriod = null,
        protected ?bool $adaptationMode = true,
        #[Assert\Valid]
        protected ?\Infobip\Model\MessagesApiRegionalOptions $regional = null,
        protected ?string $campaignReferenceId = null,
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

    public function getAdaptationMode(): bool|null
    {
        return $this->adaptationMode;
    }

    public function setAdaptationMode(?bool $adaptationMode): self
    {
        $this->adaptationMode = $adaptationMode;
        return $this;
    }

    public function getRegional(): \Infobip\Model\MessagesApiRegionalOptions|null
    {
        return $this->regional;
    }

    public function setRegional(?\Infobip\Model\MessagesApiRegionalOptions $regional): self
    {
        $this->regional = $regional;
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
}
