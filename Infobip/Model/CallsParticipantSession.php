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

class CallsParticipantSession
{
    /**
     */
    public function __construct(
        #[Assert\Length(max: 128)]
        protected ?string $callId = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $joinTime = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $leaveTime = null,
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
}
