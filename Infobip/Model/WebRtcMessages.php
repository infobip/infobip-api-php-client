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


class WebRtcMessages
{
    /**
     */
    public function __construct(
        protected ?string $welcomeText = 'Welcome to Call Link.',
        protected ?string $inactiveText = 'This link is not active.',
        protected ?string $expirationText = 'Link is expired.',
    ) {

    }


    public function getWelcomeText(): string|null
    {
        return $this->welcomeText;
    }

    public function setWelcomeText(?string $welcomeText): self
    {
        $this->welcomeText = $welcomeText;
        return $this;
    }

    public function getInactiveText(): string|null
    {
        return $this->inactiveText;
    }

    public function setInactiveText(?string $inactiveText): self
    {
        $this->inactiveText = $inactiveText;
        return $this;
    }

    public function getExpirationText(): string|null
    {
        return $this->expirationText;
    }

    public function setExpirationText(?string $expirationText): self
    {
        $this->expirationText = $expirationText;
        return $this;
    }
}
