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

class DeliveryTime
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\LessThanOrEqual(23)]
        #[Assert\GreaterThanOrEqual(0)]
        protected int $hour,
        #[Assert\NotBlank]
        #[Assert\LessThanOrEqual(59)]
        #[Assert\GreaterThanOrEqual(0)]
        protected int $minute,
    ) {

    }


    public function getHour(): int
    {
        return $this->hour;
    }

    public function setHour(int $hour): self
    {
        $this->hour = $hour;
        return $this;
    }

    public function getMinute(): int
    {
        return $this->minute;
    }

    public function setMinute(int $minute): self
    {
        $this->minute = $minute;
        return $this;
    }
}
