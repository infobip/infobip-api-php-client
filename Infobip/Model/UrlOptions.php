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


class UrlOptions
{
    /**
     */
    public function __construct(
        protected ?bool $shortenUrl = true,
        protected ?bool $trackClicks = true,
        protected ?string $trackingUrl = null,
        protected ?bool $removeProtocol = false,
        protected ?string $customDomain = null,
    ) {

    }


    public function getShortenUrl(): bool|null
    {
        return $this->shortenUrl;
    }

    public function setShortenUrl(?bool $shortenUrl): self
    {
        $this->shortenUrl = $shortenUrl;
        return $this;
    }

    public function getTrackClicks(): bool|null
    {
        return $this->trackClicks;
    }

    public function setTrackClicks(?bool $trackClicks): self
    {
        $this->trackClicks = $trackClicks;
        return $this;
    }

    public function getTrackingUrl(): string|null
    {
        return $this->trackingUrl;
    }

    public function setTrackingUrl(?string $trackingUrl): self
    {
        $this->trackingUrl = $trackingUrl;
        return $this;
    }

    public function getRemoveProtocol(): bool|null
    {
        return $this->removeProtocol;
    }

    public function setRemoveProtocol(?bool $removeProtocol): self
    {
        $this->removeProtocol = $removeProtocol;
        return $this;
    }

    public function getCustomDomain(): string|null
    {
        return $this->customDomain;
    }

    public function setCustomDomain(?string $customDomain): self
    {
        $this->customDomain = $customDomain;
        return $this;
    }
}
