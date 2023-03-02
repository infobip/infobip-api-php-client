<?php

// phpcs:ignorefile

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
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

class CallsConferenceRecording implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsConferenceRecording';

    public const OPENAPI_FORMATS = [
        'conferenceId' => null,
        'conferenceName' => null,
        'applicationId' => null,
        'composedFiles' => null,
        'callRecordings' => null,
        'startTime' => 'date-time',
        'endTime' => 'date-time'
    ];

    /**
     * @param \Infobip\Model\CallsRecordingFile[] $composedFiles
     * @param \Infobip\Model\CallRecording[] $callRecordings
     */
    public function __construct(
        protected ?string $conferenceId = null,
        protected ?string $conferenceName = null,
        protected ?string $applicationId = null,
        protected ?array $composedFiles = null,
        protected ?array $callRecordings = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]

    protected ?\DateTime $startTime = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]

    protected ?\DateTime $endTime = null,
    ) {
    }

    #[Ignore]
    public function getModelName(): string
    {
        return self::OPENAPI_MODEL_NAME;
    }

    #[Ignore]
    public static function getDiscriminator(): ?string
    {
        return self::DISCRIMINATOR;
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

    public function getConferenceName(): string|null
    {
        return $this->conferenceName;
    }

    public function setConferenceName(?string $conferenceName): self
    {
        $this->conferenceName = $conferenceName;
        return $this;
    }

    public function getApplicationId(): string|null
    {
        return $this->applicationId;
    }

    public function setApplicationId(?string $applicationId): self
    {
        $this->applicationId = $applicationId;
        return $this;
    }

    /**
     * @return \Infobip\Model\CallsRecordingFile[]|null
     */
    public function getComposedFiles(): ?array
    {
        return $this->composedFiles;
    }

    /**
     * @param \Infobip\Model\CallsRecordingFile[]|null $composedFiles File(s) with a recording of all conference participants.
     */
    public function setComposedFiles(?array $composedFiles): self
    {
        $this->composedFiles = $composedFiles;
        return $this;
    }

    /**
     * @return \Infobip\Model\CallRecording[]|null
     */
    public function getCallRecordings(): ?array
    {
        return $this->callRecordings;
    }

    /**
     * @param \Infobip\Model\CallRecording[]|null $callRecordings File(s) with a recording of one conference participant.
     */
    public function setCallRecordings(?array $callRecordings): self
    {
        $this->callRecordings = $callRecordings;
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
