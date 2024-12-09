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

class CallRoutingSearchCriteria
{
    /**
     */
    public function __construct(
        protected ?string $to = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallRoutingCriteria $value = null,
    ) {

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

    public function getValue(): \Infobip\Model\CallRoutingCriteria|null
    {
        return $this->value;
    }

    public function setValue(?\Infobip\Model\CallRoutingCriteria $value): self
    {
        $this->value = $value;
        return $this;
    }
}
