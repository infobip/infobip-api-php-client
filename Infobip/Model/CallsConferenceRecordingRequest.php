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

class CallsConferenceRecordingRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsConferenceRecordingRequest';

    public const OPENAPI_FORMATS = [
        'recordingType' => null,
        'conferenceComposition' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
    #[Assert\Choice(['AUDIO','AUDIO_AND_VIDEO',])]

    protected string $recordingType,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsConferenceComposition $conferenceComposition = null,
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

    public function getConferenceComposition(): \Infobip\Model\CallsConferenceComposition|null
    {
        return $this->conferenceComposition;
    }

    public function setConferenceComposition(?\Infobip\Model\CallsConferenceComposition $conferenceComposition): self
    {
        $this->conferenceComposition = $conferenceComposition;
        return $this;
    }
}
