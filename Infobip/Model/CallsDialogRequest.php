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

class CallsDialogRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsDialogRequest';

    public const OPENAPI_FORMATS = [
        'parentCallId' => null,
        'childCallRequest' => null,
        'recording' => null,
        'maxDuration' => 'int32',
        'propagationOptions' => null
    ];

    /**
     */
    public function __construct(
        protected ?string $parentCallId = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsDialogCallRequest $childCallRequest = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsDialogRecordingRequest $recording = null,
        protected ?int $maxDuration = 28800,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsDialogPropagationOptions $propagationOptions = null,
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

    public function getParentCallId(): string|null
    {
        return $this->parentCallId;
    }

    public function setParentCallId(?string $parentCallId): self
    {
        $this->parentCallId = $parentCallId;
        return $this;
    }

    public function getChildCallRequest(): \Infobip\Model\CallsDialogCallRequest|null
    {
        return $this->childCallRequest;
    }

    public function setChildCallRequest(?\Infobip\Model\CallsDialogCallRequest $childCallRequest): self
    {
        $this->childCallRequest = $childCallRequest;
        return $this;
    }

    public function getRecording(): \Infobip\Model\CallsDialogRecordingRequest|null
    {
        return $this->recording;
    }

    public function setRecording(?\Infobip\Model\CallsDialogRecordingRequest $recording): self
    {
        $this->recording = $recording;
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

    public function getPropagationOptions(): \Infobip\Model\CallsDialogPropagationOptions|null
    {
        return $this->propagationOptions;
    }

    public function setPropagationOptions(?\Infobip\Model\CallsDialogPropagationOptions $propagationOptions): self
    {
        $this->propagationOptions = $propagationOptions;
        return $this;
    }
}
