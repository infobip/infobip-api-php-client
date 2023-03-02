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

class CallRecording implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallRecording';

    public const OPENAPI_FORMATS = [
        'callId' => null,
        'endpoint' => null,
        'direction' => null,
        'files' => null,
        'status' => null,
        'reason' => null,
        'applicationId' => null,
        'startTime' => 'date-time',
        'endTime' => 'date-time'
    ];

    /**
     * @param \Infobip\Model\CallsRecordingFile[] $files
     */
    public function __construct(
        #[Assert\Valid]
    #[Assert\NotBlank]

    protected \Infobip\Model\CallEndpoint $endpoint,
        protected ?string $callId = null,
        #[Assert\Choice(['INBOUND','OUTBOUND',])]

    protected ?string $direction = null,
        protected ?array $files = null,
        #[Assert\Choice(['SUCCESSFUL','PARTIALLY_FAILED','FAILED',])]

    protected ?string $status = null,
        protected ?string $reason = null,
        protected ?string $applicationId = null,
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

    public function getApplicationId(): string|null
    {
        return $this->applicationId;
    }

    public function setApplicationId(?string $applicationId): self
    {
        $this->applicationId = $applicationId;
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
