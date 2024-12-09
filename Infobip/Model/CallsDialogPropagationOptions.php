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

class CallsDialogPropagationOptions
{
    /**
     */
    public function __construct(
        protected ?bool $childCallHangup = true,
        protected ?bool $childCallRinging = false,
        #[Assert\Valid]
        protected ?\Infobip\Model\RingbackGeneration $ringbackGeneration = null,
    ) {

    }


    public function getChildCallHangup(): bool|null
    {
        return $this->childCallHangup;
    }

    public function setChildCallHangup(?bool $childCallHangup): self
    {
        $this->childCallHangup = $childCallHangup;
        return $this;
    }

    public function getChildCallRinging(): bool|null
    {
        return $this->childCallRinging;
    }

    public function setChildCallRinging(?bool $childCallRinging): self
    {
        $this->childCallRinging = $childCallRinging;
        return $this;
    }

    public function getRingbackGeneration(): \Infobip\Model\RingbackGeneration|null
    {
        return $this->ringbackGeneration;
    }

    public function setRingbackGeneration(?\Infobip\Model\RingbackGeneration $ringbackGeneration): self
    {
        $this->ringbackGeneration = $ringbackGeneration;
        return $this;
    }
}
