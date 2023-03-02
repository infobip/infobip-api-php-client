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

class MmsAdvancedMessageSegment implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'MmsAdvancedMessageSegment';

    public const OPENAPI_FORMATS = [
        'contentId' => null,
        'text' => null,
        'contentType' => null,
        'contentUrl' => null,
        'contentBase64' => null,
        'smil' => null,
        'uploadedContentId' => null
    ];

    /**
     */
    public function __construct(
        protected ?string $contentId = null,
        protected ?string $text = null,
        protected ?string $contentType = null,
        protected ?string $contentUrl = null,
        protected ?string $contentBase64 = null,
        protected ?string $smil = null,
        protected ?string $uploadedContentId = null,
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

    public function getContentId(): string|null
    {
        return $this->contentId;
    }

    public function setContentId(?string $contentId): self
    {
        $this->contentId = $contentId;
        return $this;
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

    public function getContentType(): string|null
    {
        return $this->contentType;
    }

    public function setContentType(?string $contentType): self
    {
        $this->contentType = $contentType;
        return $this;
    }

    public function getContentUrl(): string|null
    {
        return $this->contentUrl;
    }

    public function setContentUrl(?string $contentUrl): self
    {
        $this->contentUrl = $contentUrl;
        return $this;
    }

    public function getContentBase64(): string|null
    {
        return $this->contentBase64;
    }

    public function setContentBase64(?string $contentBase64): self
    {
        $this->contentBase64 = $contentBase64;
        return $this;
    }

    public function getSmil(): string|null
    {
        return $this->smil;
    }

    public function setSmil(?string $smil): self
    {
        $this->smil = $smil;
        return $this;
    }

    public function getUploadedContentId(): string|null
    {
        return $this->uploadedContentId;
    }

    public function setUploadedContentId(?string $uploadedContentId): self
    {
        $this->uploadedContentId = $uploadedContentId;
        return $this;
    }
}
