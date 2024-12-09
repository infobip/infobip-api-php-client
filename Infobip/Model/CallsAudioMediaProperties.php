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


class CallsAudioMediaProperties
{
    /**
     */
    public function __construct(
        protected ?bool $muted = null,
        protected ?bool $userMuted = null,
        protected ?bool $deaf = null,
    ) {

    }


    public function getMuted(): bool|null
    {
        return $this->muted;
    }

    public function setMuted(?bool $muted): self
    {
        $this->muted = $muted;
        return $this;
    }

    public function getUserMuted(): bool|null
    {
        return $this->userMuted;
    }

    public function setUserMuted(?bool $userMuted): self
    {
        $this->userMuted = $userMuted;
        return $this;
    }

    public function getDeaf(): bool|null
    {
        return $this->deaf;
    }

    public function setDeaf(?bool $deaf): self
    {
        $this->deaf = $deaf;
        return $this;
    }
}
