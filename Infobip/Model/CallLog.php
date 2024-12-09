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

class CallLog
{
    /**
     * @param string[] $callsConfigurationIds
     * @param string[] $conferenceIds
     * @param array<string,string> $customData
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\CallEndpoint $endpoint,
        #[Assert\Length(max: 128)]
        protected ?string $callId = null,
        protected ?string $from = null,
        protected ?string $to = null,
        protected ?string $direction = null,
        protected ?string $state = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $startTime = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $answerTime = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $endTime = null,
        #[Assert\Length(max: 128)]
        protected ?string $parentCallId = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsMachineDetectionProperties $machineDetection = null,
        protected ?int $ringDuration = null,
        protected ?array $callsConfigurationIds = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\Platform $platform = null,
        protected ?array $conferenceIds = null,
        protected ?int $duration = null,
        protected ?bool $hasCameraVideo = null,
        protected ?bool $hasScreenshareVideo = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsErrorCodeInfo $errorCode = null,
        protected ?array $customData = null,
        #[Assert\Length(max: 128)]
        protected ?string $dialogId = null,
        protected ?string $sender = null,
        protected ?string $hangupSource = null,
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

    public function getFrom(): string|null
    {
        return $this->from;
    }

    public function setFrom(?string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getTo(): string|null
    {
        return $this->to;
    }

    public function setTo(?string $to): self
    {
        $this->to = $to;
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

    public function getAnswerTime(): \DateTime|null
    {
        return $this->answerTime;
    }

    public function setAnswerTime(?\DateTime $answerTime): self
    {
        $this->answerTime = $answerTime;
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

    public function getMachineDetection(): \Infobip\Model\CallsMachineDetectionProperties|null
    {
        return $this->machineDetection;
    }

    public function setMachineDetection(?\Infobip\Model\CallsMachineDetectionProperties $machineDetection): self
    {
        $this->machineDetection = $machineDetection;
        return $this;
    }

    public function getRingDuration(): int|null
    {
        return $this->ringDuration;
    }

    public function setRingDuration(?int $ringDuration): self
    {
        $this->ringDuration = $ringDuration;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getCallsConfigurationIds(): ?array
    {
        return $this->callsConfigurationIds;
    }

    /**
     * @param string[]|null $callsConfigurationIds IDs of the calls configurations used during the call.
     */
    public function setCallsConfigurationIds(?array $callsConfigurationIds): self
    {
        $this->callsConfigurationIds = $callsConfigurationIds;
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

    /**
     * @return string[]|null
     */
    public function getConferenceIds(): ?array
    {
        return $this->conferenceIds;
    }

    /**
     * @param string[]|null $conferenceIds IDs of the conferences where the call was a participant.
     */
    public function setConferenceIds(?array $conferenceIds): self
    {
        $this->conferenceIds = $conferenceIds;
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

    public function getHasCameraVideo(): bool|null
    {
        return $this->hasCameraVideo;
    }

    public function setHasCameraVideo(?bool $hasCameraVideo): self
    {
        $this->hasCameraVideo = $hasCameraVideo;
        return $this;
    }

    public function getHasScreenshareVideo(): bool|null
    {
        return $this->hasScreenshareVideo;
    }

    public function setHasScreenshareVideo(?bool $hasScreenshareVideo): self
    {
        $this->hasScreenshareVideo = $hasScreenshareVideo;
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

    public function getDialogId(): string|null
    {
        return $this->dialogId;
    }

    public function setDialogId(?string $dialogId): self
    {
        $this->dialogId = $dialogId;
        return $this;
    }

    public function getSender(): string|null
    {
        return $this->sender;
    }

    public function setSender(?string $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    public function getHangupSource(): mixed
    {
        return $this->hangupSource;
    }

    public function setHangupSource($hangupSource): self
    {
        $this->hangupSource = $hangupSource;
        return $this;
    }
}
