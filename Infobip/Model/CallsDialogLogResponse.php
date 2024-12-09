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
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class CallsDialogLogResponse
{
    /**
     */
    public function __construct(
        #[Assert\Length(max: 128)]
        protected ?string $dialogId = null,
        protected ?string $callsConfigurationId = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\Platform $platform = null,
        protected ?string $state = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $startTime = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $establishTime = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $endTime = null,
        #[Assert\Length(max: 128)]
        protected ?string $parentCallId = null,
        #[Assert\Length(max: 128)]
        protected ?string $childCallId = null,
        protected ?int $duration = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsDialogRecordingLog $recording = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsErrorCodeInfo $errorCode = null,
    ) {

    }


    public function getDialogId(): string|null
    {
        return $this->dialogId;
    }

    public function setDialogId(?string $dialogId): self
    {
        $this->dialogId = $dialogId;
        return $this;
    }

    public function getCallsConfigurationId(): string|null
    {
        return $this->callsConfigurationId;
    }

    public function setCallsConfigurationId(?string $callsConfigurationId): self
    {
        $this->callsConfigurationId = $callsConfigurationId;
        return $this;
    }

    public function getPlatform(): \Infobip\Model\Platform|null
    {
        return $this->platform;
    }

    public function setPlatform(?\Infobip\Model\Platform $platform): self
    {
        $this->platform = $platform;
        return $this;
    }

    public function getState(): mixed
    {
        return $this->state;
    }

    public function setState($state): self
    {
        $this->state = $state;
        return $this;
    }

    public function getStartTime(): \DateTime|null
    {
        return $this->startTime;
    }

    public function setStartTime(?\DateTime $startTime): self
    {
        $this->startTime = $startTime;
        return $this;
    }

    public function getEstablishTime(): \DateTime|null
    {
        return $this->establishTime;
    }

    public function setEstablishTime(?\DateTime $establishTime): self
    {
        $this->establishTime = $establishTime;
        return $this;
    }

    public function getEndTime(): \DateTime|null
    {
        return $this->endTime;
    }

    public function setEndTime(?\DateTime $endTime): self
    {
        $this->endTime = $endTime;
        return $this;
    }

    public function getParentCallId(): string|null
    {
        return $this->parentCallId;
    }

    public function setParentCallId(?string $parentCallId): self
    {
        $this->parentCallId = $parentCallId;
        return $this;
    }

    public function getChildCallId(): string|null
    {
        return $this->childCallId;
    }

    public function setChildCallId(?string $childCallId): self
    {
        $this->childCallId = $childCallId;
        return $this;
    }

    public function getDuration(): int|null
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;
        return $this;
    }

    public function getRecording(): \Infobip\Model\CallsDialogRecordingLog|null
    {
        return $this->recording;
    }

    public function setRecording(?\Infobip\Model\CallsDialogRecordingLog $recording): self
    {
        $this->recording = $recording;
        return $this;
    }

    public function getErrorCode(): \Infobip\Model\CallsErrorCodeInfo|null
    {
        return $this->errorCode;
    }

    public function setErrorCode(?\Infobip\Model\CallsErrorCodeInfo $errorCode): self
    {
        $this->errorCode = $errorCode;
        return $this;
    }
}
