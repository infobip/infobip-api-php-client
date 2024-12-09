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

class WebRtcCallLinkRequest
{
    /**
     * @param array<string,string> $customData
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WebRtcDestination $destination,
        #[Assert\Regex('/^[\\p{L}\\p{N}\\-_+=\/.]{3,64}$/')]
        protected ?string $identity = null,
        protected ?string $displayName = null,
        protected ?bool $showIdentity = true,
        protected ?array $customData = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcValidityWindow $validityWindow = null,
        protected ?string $callLinkConfigId = null,
    ) {

    }


    public function getIdentity(): string|null
    {
        return $this->identity;
    }

    public function setIdentity(?string $identity): self
    {
        $this->identity = $identity;
        return $this;
    }

    public function getDisplayName(): string|null
    {
        return $this->displayName;
    }

    public function setDisplayName(?string $displayName): self
    {
        $this->displayName = $displayName;
        return $this;
    }

    public function getShowIdentity(): bool|null
    {
        return $this->showIdentity;
    }

    public function setShowIdentity(?bool $showIdentity): self
    {
        $this->showIdentity = $showIdentity;
        return $this;
    }

    public function getDestination(): \Infobip\Model\WebRtcDestination
    {
        return $this->destination;
    }

    public function setDestination(\Infobip\Model\WebRtcDestination $destination): self
    {
        $this->destination = $destination;
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
     * @param array<string,string>|null $customData Custom attributes sent in a call once it has started.
     */
    public function setCustomData(?array $customData): self
    {
        $this->customData = $customData;
        return $this;
    }

    public function getValidityWindow(): \Infobip\Model\WebRtcValidityWindow|null
    {
        return $this->validityWindow;
    }

    public function setValidityWindow(?\Infobip\Model\WebRtcValidityWindow $validityWindow): self
    {
        $this->validityWindow = $validityWindow;
        return $this;
    }

    public function getCallLinkConfigId(): string|null
    {
        return $this->callLinkConfigId;
    }

    public function setCallLinkConfigId(?string $callLinkConfigId): self
    {
        $this->callLinkConfigId = $callLinkConfigId;
        return $this;
    }
}
