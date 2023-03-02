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

class WhatsAppTemplateBodyContent implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'WhatsAppTemplateBodyContent';

    public const OPENAPI_FORMATS = [
        'placeholders' => null
    ];

    /**
     * @param string[] $placeholders
     */
    public function __construct(
        #[Assert\NotBlank]

    protected array $placeholders,
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

    /**
     * @return string[]
     */
    public function getPlaceholders(): array
    {
        return $this->placeholders;
    }

    /**
     * @param string[] $placeholders Template's parameter values submitted in the same order as in the registered template. The value must not be null, but it can be an empty array, if the template was registered without placeholders. Values within the array must not be null or empty.
     */
    public function setPlaceholders(array $placeholders): self
    {
        $this->placeholders = $placeholders;
        return $this;
    }
}
