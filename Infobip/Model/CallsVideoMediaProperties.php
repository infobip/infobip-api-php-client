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


class CallsVideoMediaProperties
{
    /**
     */
    public function __construct(
        protected ?bool $camera = null,
        protected ?bool $screenShare = null,
    ) {

    }


    public function getCamera(): bool|null
    {
        return $this->camera;
    }

    public function setCamera(?bool $camera): self
    {
        $this->camera = $camera;
        return $this;
    }

    public function getScreenShare(): bool|null
    {
        return $this->screenShare;
    }

    public function setScreenShare(?bool $screenShare): self
    {
        $this->screenShare = $screenShare;
        return $this;
    }
}
