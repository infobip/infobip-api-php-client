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

class SmsPreviewRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'SmsPreviewRequest';

    public const OPENAPI_FORMATS = [
        'text' => null,
        'languageCode' => null,
        'transliteration' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]

    protected string $text,
        #[Assert\Regex('/^(TR|ES|PT|AUTODETECT)$/')]

    protected ?string $languageCode = null,
        #[Assert\Regex('/^(TURKISH|GREEK|CYRILLIC|SERBIAN_CYRILLIC|BULGARIAN_CYRILLIC|CENTRAL_EUROPEAN|BALTIC|NON_UNICODE)$/')]

    protected ?string $transliteration = null,
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

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getLanguageCode(): string|null
    {
        return $this->languageCode;
    }

    public function setLanguageCode(?string $languageCode): self
    {
        $this->languageCode = $languageCode;
        return $this;
    }

    public function getTransliteration(): string|null
    {
        return $this->transliteration;
    }

    public function setTransliteration(?string $transliteration): self
    {
        $this->transliteration = $transliteration;
        return $this;
    }
}
