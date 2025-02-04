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

use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints as Assert;

class WebRtcParticipant
{
    /**
     */
    public function __construct(
        protected ?string $callId = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcEndpoint $endpoint = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $joinTime = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $leaveTime = null,
        protected ?int $ringDuration = null,
        protected ?int $duration = null,
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

    public function getEndpoint(): \Infobip\Model\WebRtcEndpoint|null
    {
        return $this->endpoint;
    }

    public function setEndpoint(?\Infobip\Model\WebRtcEndpoint $endpoint): self
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    public function getJoinTime(): \DateTime|null
    {
        return $this->joinTime;
    }

    public function setJoinTime(?\DateTime $joinTime): self
    {
        $this->joinTime = $joinTime;
        return $this;
    }

    public function getLeaveTime(): \DateTime|null
    {
        return $this->leaveTime;
    }

    public function setLeaveTime(?\DateTime $leaveTime): self
    {
        $this->leaveTime = $leaveTime;
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

    public function getDuration(): int|null
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;
        return $this;
    }
}
