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

class CallsCollectOptions
{
    /**
     */
    public function __construct(
        #[Assert\LessThanOrEqual(255)]
        protected ?int $maxInputLength = null,
        #[Assert\LessThanOrEqual(30)]
        protected ?int $timeout = null,
        protected ?string $sendToReports = null,
        protected ?object $mappedValues = null,
    ) {

    }


    public function getMaxInputLength(): int|null
    {
        return $this->maxInputLength;
    }

    public function setMaxInputLength(?int $maxInputLength): self
    {
        $this->maxInputLength = $maxInputLength;
        return $this;
    }

    public function getTimeout(): int|null
    {
        return $this->timeout;
    }

    public function setTimeout(?int $timeout): self
    {
        $this->timeout = $timeout;
        return $this;
    }

    public function getSendToReports(): mixed
    {
        return $this->sendToReports;
    }

    public function setSendToReports($sendToReports): self
    {
        $this->sendToReports = $sendToReports;
        return $this;
    }

    public function getMappedValues(): object|null
    {
        return $this->mappedValues;
    }

    public function setMappedValues(?object $mappedValues): self
    {
        $this->mappedValues = $mappedValues;
        return $this;
    }
}
