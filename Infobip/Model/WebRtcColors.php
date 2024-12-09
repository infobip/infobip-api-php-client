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


class WebRtcColors
{
    /**
     */
    public function __construct(
        protected ?string $primary = '148997',
        protected ?string $primaryText = '242424',
        protected ?string $background = 'F9F9F9',
    ) {

    }


    public function getPrimary(): string|null
    {
        return $this->primary;
    }

    public function setPrimary(?string $primary): self
    {
        $this->primary = $primary;
        return $this;
    }

    public function getPrimaryText(): string|null
    {
        return $this->primaryText;
    }

    public function setPrimaryText(?string $primaryText): self
    {
        $this->primaryText = $primaryText;
        return $this;
    }

    public function getBackground(): string|null
    {
        return $this->background;
    }

    public function setBackground(?string $background): self
    {
        $this->background = $background;
        return $this;
    }
}
