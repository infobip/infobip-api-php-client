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

class WebRtcCallLinkConfig
{
    /**
     */
    public function __construct(
        protected ?string $id = null,
        protected ?string $name = null,
        protected ?bool $isDefault = false,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcInitialOptions $initialOptions = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcCallOptions $callOptions = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcTheme $theme = null,
        protected ?string $subdomainId = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcWebhook $webhook = null,
    ) {

    }


    public function getId(): string|null
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getIsDefault(): bool|null
    {
        return $this->isDefault;
    }

    public function setIsDefault(?bool $isDefault): self
    {
        $this->isDefault = $isDefault;
        return $this;
    }

    public function getInitialOptions(): \Infobip\Model\WebRtcInitialOptions|null
    {
        return $this->initialOptions;
    }

    public function setInitialOptions(?\Infobip\Model\WebRtcInitialOptions $initialOptions): self
    {
        $this->initialOptions = $initialOptions;
        return $this;
    }

    public function getCallOptions(): \Infobip\Model\WebRtcCallOptions|null
    {
        return $this->callOptions;
    }

    public function setCallOptions(?\Infobip\Model\WebRtcCallOptions $callOptions): self
    {
        $this->callOptions = $callOptions;
        return $this;
    }

    public function getTheme(): \Infobip\Model\WebRtcTheme|null
    {
        return $this->theme;
    }

    public function setTheme(?\Infobip\Model\WebRtcTheme $theme): self
    {
        $this->theme = $theme;
        return $this;
    }

    public function getSubdomainId(): string|null
    {
        return $this->subdomainId;
    }

    public function setSubdomainId(?string $subdomainId): self
    {
        $this->subdomainId = $subdomainId;
        return $this;
    }

    public function getWebhook(): \Infobip\Model\WebRtcWebhook|null
    {
        return $this->webhook;
    }

    public function setWebhook(?\Infobip\Model\WebRtcWebhook $webhook): self
    {
        $this->webhook = $webhook;
        return $this;
    }
}
