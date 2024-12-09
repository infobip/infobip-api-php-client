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


class TfaStartAuthenticationResponse
{
    /**
     */
    public function __construct(
        protected ?string $callStatus = null,
        protected ?string $ncStatus = null,
        protected ?string $pinId = null,
        protected ?string $smsStatus = null,
        protected ?string $to = null,
    ) {

    }


    public function getCallStatus(): string|null
    {
        return $this->callStatus;
    }

    public function setCallStatus(?string $callStatus): self
    {
        $this->callStatus = $callStatus;
        return $this;
    }

    public function getNcStatus(): string|null
    {
        return $this->ncStatus;
    }

    public function setNcStatus(?string $ncStatus): self
    {
        $this->ncStatus = $ncStatus;
        return $this;
    }

    public function getPinId(): string|null
    {
        return $this->pinId;
    }

    public function setPinId(?string $pinId): self
    {
        $this->pinId = $pinId;
        return $this;
    }

    public function getSmsStatus(): string|null
    {
        return $this->smsStatus;
    }

    public function setSmsStatus(?string $smsStatus): self
    {
        $this->smsStatus = $smsStatus;
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
}
