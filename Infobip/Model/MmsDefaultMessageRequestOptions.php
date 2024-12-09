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

class MmsDefaultMessageRequestOptions
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        protected ?\Infobip\Model\MmsRequestSchedulingSettings $schedule = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\UrlOptions $tracking = null,
    ) {

    }


    public function getSchedule(): \Infobip\Model\MmsRequestSchedulingSettings|null
    {
        return $this->schedule;
    }

    public function setSchedule(?\Infobip\Model\MmsRequestSchedulingSettings $schedule): self
    {
        $this->schedule = $schedule;
        return $this;
    }

    public function getTracking(): \Infobip\Model\UrlOptions|null
    {
        return $this->tracking;
    }

    public function setTracking(?\Infobip\Model\UrlOptions $tracking): self
    {
        $this->tracking = $tracking;
        return $this;
    }
}
