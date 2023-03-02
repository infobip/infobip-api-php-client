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

class CallsActionCallRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsActionCallRequest';

    public const OPENAPI_FORMATS = [
        'endpoint' => null,
        'from' => null,
        'fromDisplayName' => null,
        'connectTimeout' => 'int32',
        'recording' => null,
        'machineDetection' => null,
        'maxDuration' => 'int32',
        'customData' => null
    ];

    /**
     * @param array<string,string> $customData
     */
    public function __construct(
        #[Assert\Valid]
    #[Assert\NotBlank]

    protected \Infobip\Model\CallEndpoint $endpoint,
        #[Assert\NotBlank]

    protected string $from,
        protected ?string $fromDisplayName = null,
        protected ?int $connectTimeout = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallRecordingRequest $recording = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsMachineDetectionRequest $machineDetection = null,
        protected ?int $maxDuration = 28800,
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

    public function getEndpoint(): \Infobip\Model\CallEndpoint
    {
        return $this->endpoint;
    }

    public function setEndpoint(\Infobip\Model\CallEndpoint $endpoint): self
    {
        $this->endpoint = $endpoint;
        return $this;
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

    public function getFromDisplayName(): string|null
    {
        return $this->fromDisplayName;
    }

    public function setFromDisplayName(?string $fromDisplayName): self
    {
        $this->fromDisplayName = $fromDisplayName;
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
}
