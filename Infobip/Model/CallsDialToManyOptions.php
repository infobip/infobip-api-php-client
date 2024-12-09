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

class CallsDialToManyOptions
{
    /**
     */
    public function __construct(
        protected ?bool $parallel = null,
        protected ?string $senderId = null,
        #[Assert\GreaterThanOrEqual(1)]
        protected ?int $maxCallDuration = null,
        protected ?int $ringTimeout = null,
    ) {

    }


    public function getParallel(): bool|null
    {
        return $this->parallel;
    }

    public function setParallel(?bool $parallel): self
    {
        $this->parallel = $parallel;
        return $this;
    }

    public function getSenderId(): string|null
    {
        return $this->senderId;
    }

    public function setSenderId(?string $senderId): self
    {
        $this->senderId = $senderId;
        return $this;
    }

    public function getMaxCallDuration(): int|null
    {
        return $this->maxCallDuration;
    }

    public function setMaxCallDuration(?int $maxCallDuration): self
    {
        $this->maxCallDuration = $maxCallDuration;
        return $this;
    }

    public function getRingTimeout(): int|null
    {
        return $this->ringTimeout;
    }

    public function setRingTimeout(?int $ringTimeout): self
    {
        $this->ringTimeout = $ringTimeout;
        return $this;
    }
}
