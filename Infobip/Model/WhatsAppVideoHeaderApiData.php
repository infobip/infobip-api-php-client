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

class WhatsAppVideoHeaderApiData extends WhatsAppHeaderApiData
{
    public const DISCRIMINATOR = 'format';
    public const OPENAPI_MODEL_NAME = 'WhatsAppVideoHeaderApiData';

    public const FORMAT = 'VIDEO';

    public const OPENAPI_FORMATS = [
        'example' => null
    ];

    /**
     */
    public function __construct(
        protected ?string $example = null,
    ) {
        $modelDiscriminatorValue = 'VIDEO';

        parent::__construct(
            format: $modelDiscriminatorValue,
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

    public function getExample(): string|null
    {
        return $this->example;
    }

    public function setExample(?string $example): self
    {
        $this->example = $example;
        return $this;
    }
}
