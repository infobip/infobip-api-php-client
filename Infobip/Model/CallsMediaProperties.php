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

class CallsMediaProperties implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsMediaProperties';

    public const OPENAPI_FORMATS = [
        'audio' => null,
        'video' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsAudioMediaProperties $audio = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsVideoMediaProperties $video = null,
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

    public function getAudio(): \Infobip\Model\CallsAudioMediaProperties|null
    {
        return $this->audio;
    }

    public function setAudio(?\Infobip\Model\CallsAudioMediaProperties $audio): self
    {
        $this->audio = $audio;
        return $this;
    }

    public function getVideo(): \Infobip\Model\CallsVideoMediaProperties|null
    {
        return $this->video;
    }

    public function setVideo(?\Infobip\Model\CallsVideoMediaProperties $video): self
    {
        $this->video = $video;
        return $this;
    }
}
