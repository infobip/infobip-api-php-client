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


class NumberMaskingCallbackRequest
{
    /**
     */
    public function __construct(
        protected ?string $from = null,
        protected ?string $to = null,
        protected ?string $correlationId = null,
        protected ?string $nmCorrelationId = null,
        protected ?bool $dtmfCaptured = null,
    ) {

    }


    public function getFrom(): string|null
    {
        return $this->from;
    }

    public function setFrom(?string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getTo(): string|null
    {
        return $this->to;
    }

    public function setTo(?string $to): self
    {
        $this->to = $to;
        return $this;
    }

    public function getCorrelationId(): string|null
    {
        return $this->correlationId;
    }

    public function setCorrelationId(?string $correlationId): self
    {
        $this->correlationId = $correlationId;
        return $this;
    }

    public function getNmCorrelationId(): string|null
    {
        return $this->nmCorrelationId;
    }

    public function setNmCorrelationId(?string $nmCorrelationId): self
    {
        $this->nmCorrelationId = $nmCorrelationId;
        return $this;
    }

    public function getDtmfCaptured(): bool|null
    {
        return $this->dtmfCaptured;
    }

    public function setDtmfCaptured(?bool $dtmfCaptured): self
    {
        $this->dtmfCaptured = $dtmfCaptured;
        return $this;
    }
}
