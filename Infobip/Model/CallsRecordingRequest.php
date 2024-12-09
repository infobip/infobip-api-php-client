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

class CallsRecordingRequest
{
    /**
     * @param array<string,string> $customData
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $recordingType,
        protected ?int $maxSilence = null,
        protected ?bool $beep = false,
        protected ?int $maxDuration = null,
        protected ?array $customData = null,
        protected ?string $filePrefix = null,
    ) {

    }


    public function getRecordingType(): mixed
    {
        return $this->recordingType;
    }

    public function setRecordingType($recordingType): self
    {
        $this->recordingType = $recordingType;
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

    public function getBeep(): bool|null
    {
        return $this->beep;
    }

    public function setBeep(?bool $beep): self
    {
        $this->beep = $beep;
        return $this;
    }

    public function getMaxDuration(): int|null
    {
        return $this->maxDuration;
    }

    public function setMaxDuration(?int $maxDuration): self
    {
        $this->maxDuration = $maxDuration;
        return $this;
    }

    /**
     * @return array<string,string>|null
     */
    public function getCustomData()
    {
        return $this->customData;
    }

    /**
     * @param array<string,string>|null $customData Custom data.
     */
    public function setCustomData(?array $customData): self
    {
        $this->customData = $customData;
        return $this;
    }

    public function getFilePrefix(): string|null
    {
        return $this->filePrefix;
    }

    public function setFilePrefix(?string $filePrefix): self
    {
        $this->filePrefix = $filePrefix;
        return $this;
    }
}
