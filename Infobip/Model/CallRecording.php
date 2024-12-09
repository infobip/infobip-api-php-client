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

class CallRecording
{
    /**
     * @param \Infobip\Model\CallsRecordingFile[] $files
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\CallEndpoint $endpoint,
        #[Assert\Length(max: 128)]
        protected ?string $callId = null,
        protected ?string $direction = null,
        protected ?array $files = null,
        protected ?string $status = null,
        protected ?string $reason = null,
        protected ?string $callsConfigurationId = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\Platform $platform = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $startTime = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $endTime = null,
    ) {

    }


    public function getCallId(): string|null
    {
        return $this->callId;
    }

    public function setCallId(?string $callId): self
    {
        $this->callId = $callId;
        return $this;
    }

    public function getEndpoint(): \Infobip\Model\CallEndpoint
    {
        return $this->endpoint;
    }

    public function setEndpoint(\Infobip\Model\CallEndpoint $endpoint): self
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    public function getDirection(): mixed
    {
        return $this->direction;
    }

    public function setDirection($direction): self
    {
        $this->direction = $direction;
        return $this;
    }

    /**
     * @return \Infobip\Model\CallsRecordingFile[]|null
     */
    public function getFiles(): ?array
    {
        return $this->files;
    }

    /**
     * @param \Infobip\Model\CallsRecordingFile[]|null $files Call recording files.
     */
    public function setFiles(?array $files): self
    {
        $this->files = $files;
        return $this;
    }

    public function getStatus(): mixed
    {
        return $this->status;
    }

    public function setStatus($status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getReason(): string|null
    {
        return $this->reason;
    }

    public function setReason(?string $reason): self
    {
        $this->reason = $reason;
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

    public function getStartTime(): \DateTime|null
    {
        return $this->startTime;
    }

    public function setStartTime(?\DateTime $startTime): self
    {
        $this->startTime = $startTime;
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
}
