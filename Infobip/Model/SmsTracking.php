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


class SmsTracking
{
    /**
     */
    public function __construct(
        protected ?bool $useConversionTracking = null,
        protected ?string $conversionTrackingName = null,
    ) {

    }


    public function getUseConversionTracking(): bool|null
    {
        return $this->useConversionTracking;
    }

    public function setUseConversionTracking(?bool $useConversionTracking): self
    {
        $this->useConversionTracking = $useConversionTracking;
        return $this;
    }

    public function getConversionTrackingName(): string|null
    {
        return $this->conversionTrackingName;
    }

    public function setConversionTrackingName(?string $conversionTrackingName): self
    {
        $this->conversionTrackingName = $conversionTrackingName;
        return $this;
    }
}
