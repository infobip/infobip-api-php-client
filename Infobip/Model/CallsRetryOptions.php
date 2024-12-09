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


class CallsRetryOptions
{
    /**
     */
    public function __construct(
        protected ?int $minWaitPeriod = null,
        protected ?int $maxWaitPeriod = null,
        protected ?int $maxAttempts = null,
    ) {

    }


    public function getMinWaitPeriod(): int|null
    {
        return $this->minWaitPeriod;
    }

    public function setMinWaitPeriod(?int $minWaitPeriod): self
    {
        $this->minWaitPeriod = $minWaitPeriod;
        return $this;
    }

    public function getMaxWaitPeriod(): int|null
    {
        return $this->maxWaitPeriod;
    }

    public function setMaxWaitPeriod(?int $maxWaitPeriod): self
    {
        $this->maxWaitPeriod = $maxWaitPeriod;
        return $this;
    }

    public function getMaxAttempts(): int|null
    {
        return $this->maxAttempts;
    }

    public function setMaxAttempts(?int $maxAttempts): self
    {
        $this->maxAttempts = $maxAttempts;
        return $this;
    }
}
