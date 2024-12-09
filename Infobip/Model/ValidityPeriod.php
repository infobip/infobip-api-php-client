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

class ValidityPeriod
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected int $amount,
        protected ?string $timeUnit = null,
    ) {

    }


    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function getTimeUnit(): mixed
    {
        return $this->timeUnit;
    }

    public function setTimeUnit($timeUnit): self
    {
        $this->timeUnit = $timeUnit;
        return $this;
    }
}
