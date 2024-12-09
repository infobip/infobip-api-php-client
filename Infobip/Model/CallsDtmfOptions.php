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

class CallsDtmfOptions
{
    /**
     */
    public function __construct(
        #[Assert\LessThanOrEqual(255)]
        protected ?int $maxInputLength = null,
        protected ?object $mappedValues = null,
    ) {

    }


    public function getMaxInputLength(): int|null
    {
        return $this->maxInputLength;
    }

    public function setMaxInputLength(?int $maxInputLength): self
    {
        $this->maxInputLength = $maxInputLength;
        return $this;
    }

    public function getMappedValues(): object|null
    {
        return $this->mappedValues;
    }

    public function setMappedValues(?object $mappedValues): self
    {
        $this->mappedValues = $mappedValues;
        return $this;
    }
}
