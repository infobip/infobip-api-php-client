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

class CallsBulkItem implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsBulkItem';

    public const OPENAPI_FORMATS = [
        'from' => null,
        'callRequests' => null,
        'recording' => null,
        'machineDetection' => null,
        'maxDuration' => 'int32',
        'connectTimeout' => 'int32',
        'callRate' => null,
        'validityPeriod' => 'int32',
        'retryOptions' => null,
        'schedulingOptions' => null,
        'customData' => null
    ];

    /**
     * @param \Infobip\Model\CallsBulkCallRequest[] $callRequests
     * @param array<string,string> $customData
     */
    public function __construct(
        #[Assert\NotBlank]

    protected string $from,
        #[Assert\NotBlank]

    protected array $callRequests,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallRecordingRequest $recording = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsMachineDetectionRequest $machineDetection = null,
        protected ?int $maxDuration = 28800,
        protected ?int $connectTimeout = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallRate $callRate = null,
        protected ?int $validityPeriod = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsRetryOptions $retryOptions = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsSchedulingOptions $schedulingOptions = null,
        protected ?array $customData = null,
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

    public function getFrom(): string
    {
        return $this->from;
    }

    public function setFrom(string $from): self
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return \Infobip\Model\CallsBulkCallRequest[]
     */
    public function getCallRequests(): array
    {
        return $this->callRequests;
    }

    /**
     * @param \Infobip\Model\CallsBulkCallRequest[] $callRequests Call request list.
     */
    public function setCallRequests(array $callRequests): self
    {
        $this->callRequests = $callRequests;
        return $this;
    }

    public function getRecording(): \Infobip\Model\CallRecordingRequest|null
    {
        return $this->recording;
    }

    public function setRecording(?\Infobip\Model\CallRecordingRequest $recording): self
    {
        $this->recording = $recording;
        return $this;
    }

    public function getMachineDetection(): \Infobip\Model\CallsMachineDetectionRequest|null
    {
        return $this->machineDetection;
    }

    public function setMachineDetection(?\Infobip\Model\CallsMachineDetectionRequest $machineDetection): self
    {
        $this->machineDetection = $machineDetection;
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

    public function getConnectTimeout(): int|null
    {
        return $this->connectTimeout;
    }

    public function setConnectTimeout(?int $connectTimeout): self
    {
        $this->connectTimeout = $connectTimeout;
        return $this;
    }

    public function getCallRate(): \Infobip\Model\CallRate|null
    {
        return $this->callRate;
    }

    public function setCallRate(?\Infobip\Model\CallRate $callRate): self
    {
        $this->callRate = $callRate;
        return $this;
    }

    public function getValidityPeriod(): int|null
    {
        return $this->validityPeriod;
    }

    public function setValidityPeriod(?int $validityPeriod): self
    {
        $this->validityPeriod = $validityPeriod;
        return $this;
    }

    public function getRetryOptions(): \Infobip\Model\CallsRetryOptions|null
    {
        return $this->retryOptions;
    }

    public function setRetryOptions(?\Infobip\Model\CallsRetryOptions $retryOptions): self
    {
        $this->retryOptions = $retryOptions;
        return $this;
    }

    public function getSchedulingOptions(): \Infobip\Model\CallsSchedulingOptions|null
    {
        return $this->schedulingOptions;
    }

    public function setSchedulingOptions(?\Infobip\Model\CallsSchedulingOptions $schedulingOptions): self
    {
        $this->schedulingOptions = $schedulingOptions;
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
     * @param array<string,string>|null $customData Client-defined, bulk-level custom data.
     */
    public function setCustomData(?array $customData): self
    {
        $this->customData = $customData;
        return $this;
    }
}
