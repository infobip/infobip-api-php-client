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

class CallsRecordingRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsRecordingRequest';

    public const OPENAPI_FORMATS = [
        'recordingType' => null,
        'maxSilence' => 'int32',
        'beep' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
    #[Assert\Choice(['AUDIO','AUDIO_AND_VIDEO',])]

    protected string $recordingType,
        protected ?int $maxSilence = null,
        protected ?bool $beep = false,
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

    public function getRecordingType(): mixed
    {
        return $this->recordingType;
    }

    public function setRecordingType($recordingType): self
    {
        $this->recordingType = $recordingType;
        return $this;
    }

    public function getMaxSilence(): int|null
    {
        return $this->maxSilence;
    }

    public function setMaxSilence(?int $maxSilence): self
    {
        $this->maxSilence = $maxSilence;
        return $this;
    }

    public function getBeep(): bool|null
    {
        return $this->beep;
    }

    public function setBeep(?bool $beep): self
    {
        $this->beep = $beep;
        return $this;
    }
}
