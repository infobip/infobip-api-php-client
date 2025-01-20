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

class MessagesApiMessageCardOptions
{
    /**
     */
    public function __construct(
        protected ?string $orientation = null,
        protected ?string $alignment = null,
        protected ?string $height = null,
    ) {

    }


    public function getOrientation(): mixed
    {
        return $this->orientation;
    }

    public function setOrientation($orientation): self
    {
        $this->orientation = $orientation;
        return $this;
    }

    public function getAlignment(): mixed
    {
        return $this->alignment;
    }

    public function setAlignment($alignment): self
    {
        $this->alignment = $alignment;
        return $this;
    }

    public function getHeight(): mixed
    {
        return $this->height;
    }

    public function setHeight($height): self
    {
        $this->height = $height;
        return $this;
    }
}
