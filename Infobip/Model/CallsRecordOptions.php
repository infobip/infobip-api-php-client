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


class CallsRecordOptions
{
    /**
     */
    public function __construct(
        protected ?string $escapeDigits = null,
        protected ?bool $beep = null,
        protected ?int $maxSilence = null,
        protected ?string $identifier = null,
    ) {

    }


    public function getEscapeDigits(): string|null
    {
        return $this->escapeDigits;
    }

    public function setEscapeDigits(?string $escapeDigits): self
    {
        $this->escapeDigits = $escapeDigits;
        return $this;
    }

    public function getBeep(): bool|null
    {
        return $this->beep;
    }

    public function setBeep(?bool $beep): self
    {
        $this->beep = $beep;
        return $this;
    }

    public function getMaxSilence(): int|null
    {
        return $this->maxSilence;
    }

    public function setMaxSilence(?int $maxSilence): self
    {
        $this->maxSilence = $maxSilence;
        return $this;
    }

    public function getIdentifier(): string|null
    {
        return $this->identifier;
    }

    public function setIdentifier(?string $identifier): self
    {
        $this->identifier = $identifier;
        return $this;
    }
}
