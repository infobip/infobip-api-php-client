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

class WebRtcTokenRequestModel
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Regex('/^[\\p{L}\\p{N}\\-_+=\/.]{3,64}$/')]
        protected string $identity,
        protected ?string $displayName = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcCapabilities $capabilities = null,
        protected ?int $timeToLive = null,
    ) {

    }


    public function getIdentity(): string
    {
        return $this->identity;
    }

    public function setIdentity(string $identity): self
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

    public function getCapabilities(): \Infobip\Model\WebRtcCapabilities|null
    {
        return $this->capabilities;
    }

    public function setCapabilities(?\Infobip\Model\WebRtcCapabilities $capabilities): self
    {
        $this->capabilities = $capabilities;
        return $this;
    }

    public function getTimeToLive(): int|null
    {
        return $this->timeToLive;
    }

    public function setTimeToLive(?int $timeToLive): self
    {
        $this->timeToLive = $timeToLive;
        return $this;
    }
}
