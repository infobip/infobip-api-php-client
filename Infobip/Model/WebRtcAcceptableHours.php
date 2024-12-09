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

class WebRtcAcceptableHours
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        protected ?\Infobip\Model\DeliveryTime $start = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\DeliveryTime $end = null,
    ) {

    }


    public function getStart(): \Infobip\Model\DeliveryTime|null
    {
        return $this->start;
    }

    public function setStart(?\Infobip\Model\DeliveryTime $start): self
    {
        $this->start = $start;
        return $this;
    }

    public function getEnd(): \Infobip\Model\DeliveryTime|null
    {
        return $this->end;
    }

    public function setEnd(?\Infobip\Model\DeliveryTime $end): self
    {
        $this->end = $end;
        return $this;
    }
}
