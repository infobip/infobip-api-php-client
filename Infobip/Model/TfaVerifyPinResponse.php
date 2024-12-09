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


class TfaVerifyPinResponse
{
    /**
     */
    public function __construct(
        protected ?int $attemptsRemaining = null,
        protected ?string $msisdn = null,
        protected ?string $pinError = null,
        protected ?string $pinId = null,
        protected ?bool $verified = null,
    ) {

    }


    public function getAttemptsRemaining(): int|null
    {
        return $this->attemptsRemaining;
    }

    public function setAttemptsRemaining(?int $attemptsRemaining): self
    {
        $this->attemptsRemaining = $attemptsRemaining;
        return $this;
    }

    public function getMsisdn(): string|null
    {
        return $this->msisdn;
    }

    public function setMsisdn(?string $msisdn): self
    {
        $this->msisdn = $msisdn;
        return $this;
    }

    public function getPinError(): string|null
    {
        return $this->pinError;
    }

    public function setPinError(?string $pinError): self
    {
        $this->pinError = $pinError;
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

    public function getVerified(): bool|null
    {
        return $this->verified;
    }

    public function setVerified(?bool $verified): self
    {
        $this->verified = $verified;
        return $this;
    }
}
