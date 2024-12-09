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


class ViberMessageDeliveryReporting
{
    /**
     */
    public function __construct(
        protected ?string $url = null,
        protected ?bool $intermediateReport = null,
        protected ?bool $notify = null,
    ) {

    }


    public function getUrl(): string|null
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getIntermediateReport(): bool|null
    {
        return $this->intermediateReport;
    }

    public function setIntermediateReport(?bool $intermediateReport): self
    {
        $this->intermediateReport = $intermediateReport;
        return $this;
    }

    public function getNotify(): bool|null
    {
        return $this->notify;
    }

    public function setNotify(?bool $notify): self
    {
        $this->notify = $notify;
        return $this;
    }
}
