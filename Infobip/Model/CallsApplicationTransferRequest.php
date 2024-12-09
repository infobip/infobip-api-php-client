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

class CallsApplicationTransferRequest
{
    /**
     * @param array<string,string> $customData
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $destinationCallsConfigurationId,
        #[Assert\Valid]
        protected ?\Infobip\Model\Platform $platform = null,
        protected ?int $timeout = 30,
        protected ?array $customData = null,
    ) {

    }


    public function getDestinationCallsConfigurationId(): string
    {
        return $this->destinationCallsConfigurationId;
    }

    public function setDestinationCallsConfigurationId(string $destinationCallsConfigurationId): self
    {
        $this->destinationCallsConfigurationId = $destinationCallsConfigurationId;
        return $this;
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

    public function getTimeout(): int|null
    {
        return $this->timeout;
    }

    public function setTimeout(?int $timeout): self
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * @return array<string,string>|null
     */
    public function getCustomData()
    {
        return $this->customData;
    }

    /**
     * @param array<string,string>|null $customData Optional parameter to update a call's custom data.
     */
    public function setCustomData(?array $customData): self
    {
        $this->customData = $customData;
        return $this;
    }
}
