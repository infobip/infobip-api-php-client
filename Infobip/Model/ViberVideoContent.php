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

class ViberVideoContent implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'ViberVideoContent';

    public const OPENAPI_FORMATS = [
        'text' => null,
        'mediaUrl' => null,
        'thumbnailUrl' => null,
        'mediaDuration' => 'int32',
        'buttonTitle' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
    #[Assert\Length(max: 1000)]
    #[Assert\Length(min: 0)]

    protected string $mediaUrl,
        #[Assert\NotBlank]

    protected string $thumbnailUrl,
        #[Assert\NotBlank]
    #[Assert\LessThan(600)]
    #[Assert\GreaterThan(1)]

    protected int $mediaDuration,
        #[Assert\Length(max: 1000)]
    #[Assert\Length(min: 1)]

    protected ?string $text = null,
        #[Assert\Length(max: 30)]
    #[Assert\Length(min: 1)]

    protected ?string $buttonTitle = null,
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

    public function getText(): string|null
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getMediaUrl(): string
    {
        return $this->mediaUrl;
    }

    public function setMediaUrl(string $mediaUrl): self
    {
        $this->mediaUrl = $mediaUrl;
        return $this;
    }

    public function getThumbnailUrl(): string
    {
        return $this->thumbnailUrl;
    }

    public function setThumbnailUrl(string $thumbnailUrl): self
    {
        $this->thumbnailUrl = $thumbnailUrl;
        return $this;
    }

    public function getMediaDuration(): int
    {
        return $this->mediaDuration;
    }

    public function setMediaDuration(int $mediaDuration): self
    {
        $this->mediaDuration = $mediaDuration;
        return $this;
    }

    public function getButtonTitle(): string|null
    {
        return $this->buttonTitle;
    }

    public function setButtonTitle(?string $buttonTitle): self
    {
        $this->buttonTitle = $buttonTitle;
        return $this;
    }
}
