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

class TfaStartEmailAuthenticationResponse
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        protected ?\Infobip\Model\TfaEmailStatus $emailStatus = null,
        protected ?string $pinId = null,
        protected ?string $to = null,
    ) {

    }


    public function getEmailStatus(): \Infobip\Model\TfaEmailStatus|null
    {
        return $this->emailStatus;
    }

    public function setEmailStatus(?\Infobip\Model\TfaEmailStatus $emailStatus): self
    {
        $this->emailStatus = $emailStatus;
        return $this;
    }

    public function getPinId(): string|null
    {
        return $this->pinId;
    }

    public function setPinId(?string $pinId): self
    {
        $this->pinId = $pinId;
        return $this;
    }

    public function getTo(): string|null
    {
        return $this->to;
    }

    public function setTo(?string $to): self
    {
        $this->to = $to;
        return $this;
    }
}
