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

class WhatsAppTemplateImageHeaderContent extends WhatsAppTemplateHeaderContent
{
    public const DISCRIMINATOR = 'type';
    public const OPENAPI_MODEL_NAME = 'WhatsAppTemplateImageHeaderContent';

    public const TYPE = 'IMAGE';

    public const OPENAPI_FORMATS = [
        'mediaUrl' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
    #[Assert\Length(max: 2048)]
    #[Assert\Length(min: 1)]

    protected string $mediaUrl,
    ) {
        $modelDiscriminatorValue = 'IMAGE';

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
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

    public function getMediaUrl(): string
    {
        return $this->mediaUrl;
    }

    public function setMediaUrl(string $mediaUrl): self
    {
        $this->mediaUrl = $mediaUrl;
        return $this;
    }
}
