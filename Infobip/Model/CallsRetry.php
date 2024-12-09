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

class CallsRetry
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected int $maxCount,
        #[Assert\NotBlank]
        protected int $maxPeriod,
        #[Assert\NotBlank]
        protected int $minPeriod,
    ) {

    }


    public function getMaxCount(): int
    {
        return $this->maxCount;
    }

    public function setMaxCount(int $maxCount): self
    {
        $this->maxCount = $maxCount;
        return $this;
    }

    public function getMaxPeriod(): int
    {
        return $this->maxPeriod;
    }

    public function setMaxPeriod(int $maxPeriod): self
    {
        $this->maxPeriod = $maxPeriod;
        return $this;
    }

    public function getMinPeriod(): int
    {
        return $this->minPeriod;
    }

    public function setMinPeriod(int $minPeriod): self
    {
        $this->minPeriod = $minPeriod;
        return $this;
    }
}
