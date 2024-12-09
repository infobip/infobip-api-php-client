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

class DeliveryTimeWindow
{
    /**
     * @param \Infobip\Model\DeliveryDay[] $days
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $days,
        #[Assert\Valid]
        protected ?\Infobip\Model\DeliveryTime $from = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\DeliveryTime $to = null,
    ) {

    }


    /**
     * @return \Infobip\Model\DeliveryDay[]
     */
    public function getDays(): array
    {
        return $this->days;
    }

    /**
     * @param \Infobip\Model\DeliveryDay[] $days Days of the week which are included in the delivery time window. At least one day must be provided. Separate multiple days with a comma.
     */
    public function setDays(array $days): self
    {
        $this->days = $days;
        return $this;
    }

    public function getFrom(): \Infobip\Model\DeliveryTime|null
    {
        return $this->from;
    }

    public function setFrom(?\Infobip\Model\DeliveryTime $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getTo(): \Infobip\Model\DeliveryTime|null
    {
        return $this->to;
    }

    public function setTo(?\Infobip\Model\DeliveryTime $to): self
    {
        $this->to = $to;
        return $this;
    }
}
