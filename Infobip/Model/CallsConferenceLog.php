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

class CallsConferenceLog
{
    /**
     * @param \Infobip\Model\CallsParticipantSession[] $sessions
     */
    public function __construct(
        #[Assert\Length(max: 128)]
        protected ?string $conferenceId = null,
        protected ?string $name = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\Platform $platform = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $startTime = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $endTime = null,
        protected ?int $duration = null,
        protected ?array $sessions = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsConferenceRecordingLog $recording = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsErrorCodeInfo $errorCode = null,
    ) {

    }


    public function getConferenceId(): string|null
    {
        return $this->conferenceId;
    }

    public function setConferenceId(?string $conferenceId): self
    {
        $this->conferenceId = $conferenceId;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
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

    public function getDuration(): int|null
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return \Infobip\Model\CallsParticipantSession[]|null
     */
    public function getSessions(): ?array
    {
        return $this->sessions;
    }

    /**
     * @param \Infobip\Model\CallsParticipantSession[]|null $sessions List of participant sessions.
     */
    public function setSessions(?array $sessions): self
    {
        $this->sessions = $sessions;
        return $this;
    }

    public function getRecording(): \Infobip\Model\CallsConferenceRecordingLog|null
    {
        return $this->recording;
    }

    public function setRecording(?\Infobip\Model\CallsConferenceRecordingLog $recording): self
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
