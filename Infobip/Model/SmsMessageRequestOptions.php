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

class SmsMessageRequestOptions
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        protected ?\Infobip\Model\SmsRequestSchedulingSettings $schedule = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\UrlOptions $tracking = null,
        protected ?bool $includeSmsCountInResponse = false,
        #[Assert\Valid]
        protected ?\Infobip\Model\SmsTracking $conversionTracking = null,
    ) {

    }


    public function getSchedule(): \Infobip\Model\SmsRequestSchedulingSettings|null
    {
        return $this->schedule;
    }

    public function setSchedule(?\Infobip\Model\SmsRequestSchedulingSettings $schedule): self
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

    public function getIncludeSmsCountInResponse(): bool|null
    {
        return $this->includeSmsCountInResponse;
    }

    public function setIncludeSmsCountInResponse(?bool $includeSmsCountInResponse): self
    {
        $this->includeSmsCountInResponse = $includeSmsCountInResponse;
        return $this;
    }

    public function getConversionTracking(): \Infobip\Model\SmsTracking|null
    {
        return $this->conversionTracking;
    }

    public function setConversionTracking(?\Infobip\Model\SmsTracking $conversionTracking): self
    {
        $this->conversionTracking = $conversionTracking;
        return $this;
    }
}
