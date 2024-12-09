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

class CallsVoiceData
{
    /**
     */
    public function __construct(
        protected ?string $feature = null,
        protected ?string $startTime = null,
        protected ?string $answerTime = null,
        protected ?string $endTime = null,
        protected ?int $duration = null,
        protected ?int $chargedDuration = null,
        protected ?float $fileDuration = null,
        protected ?string $dtmfCodes = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsIvrData $ivr = null,
    ) {

    }


    public function getFeature(): string|null
    {
        return $this->feature;
    }

    public function setFeature(?string $feature): self
    {
        $this->feature = $feature;
        return $this;
    }

    public function getStartTime(): string|null
    {
        return $this->startTime;
    }

    public function setStartTime(?string $startTime): self
    {
        $this->startTime = $startTime;
        return $this;
    }

    public function getAnswerTime(): string|null
    {
        return $this->answerTime;
    }

    public function setAnswerTime(?string $answerTime): self
    {
        $this->answerTime = $answerTime;
        return $this;
    }

    public function getEndTime(): string|null
    {
        return $this->endTime;
    }

    public function setEndTime(?string $endTime): self
    {
        $this->endTime = $endTime;
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

    public function getChargedDuration(): int|null
    {
        return $this->chargedDuration;
    }

    public function setChargedDuration(?int $chargedDuration): self
    {
        $this->chargedDuration = $chargedDuration;
        return $this;
    }

    public function getFileDuration(): float|null
    {
        return $this->fileDuration;
    }

    public function setFileDuration(?float $fileDuration): self
    {
        $this->fileDuration = $fileDuration;
        return $this;
    }

    public function getDtmfCodes(): string|null
    {
        return $this->dtmfCodes;
    }

    public function setDtmfCodes(?string $dtmfCodes): self
    {
        $this->dtmfCodes = $dtmfCodes;
        return $this;
    }

    public function getIvr(): \Infobip\Model\CallsIvrData|null
    {
        return $this->ivr;
    }

    public function setIvr(?\Infobip\Model\CallsIvrData $ivr): self
    {
        $this->ivr = $ivr;
        return $this;
    }
}
