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
     * @param array<string,mixed> $mappedValues
     */
    public function __construct(
        #[Assert\LessThanOrEqual(255)]
        protected ?int $maxInputLength = null,
        #[Assert\LessThanOrEqual(30)]
        protected ?int $timeout = null,
        protected ?string $sendToReports = null,
        protected ?array $mappedValues = null,
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

    /**
     * @return array<string,mixed>|null
     */
    public function getMappedValues()
    {
        return $this->mappedValues;
    }

    /**
     * @param array<string,mixed>|null $mappedValues Map of expected collected DTMF values with some real meaning. (Example: if you have multilingual IVR, and option for users to press 1 to enter "English" menu, you can define {"1":"English"}, so the reporting and analysis will be easier). When this option is defined additional variable is present in the scenario. If you set your collect action variable name to myVar, then you will get additional variable myVar_Meaning containing the mapped value for a collected DTMF.
     */
    public function setMappedValues(?array $mappedValues): self
    {
        $this->mappedValues = $mappedValues;
        return $this;
    }
}
