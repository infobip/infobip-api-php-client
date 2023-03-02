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

#[DiscriminatorMap(typeProperty: "type", mapping: [
    "DOCUMENT" => "\Infobip\Model\WhatsAppTemplateDocumentHeaderContent",
    "IMAGE" => "\Infobip\Model\WhatsAppTemplateImageHeaderContent",
    "LOCATION" => "\Infobip\Model\WhatsAppTemplateLocationHeaderContent",
    "TEXT" => "\Infobip\Model\WhatsAppTemplateTextHeaderContent",
    "VIDEO" => "\Infobip\Model\WhatsAppTemplateVideoHeaderContent",
    "WhatsAppTemplateDocumentHeaderContent" => "\Infobip\Model\WhatsAppTemplateDocumentHeaderContent",
    "WhatsAppTemplateImageHeaderContent" => "\Infobip\Model\WhatsAppTemplateImageHeaderContent",
    "WhatsAppTemplateLocationHeaderContent" => "\Infobip\Model\WhatsAppTemplateLocationHeaderContent",
    "WhatsAppTemplateTextHeaderContent" => "\Infobip\Model\WhatsAppTemplateTextHeaderContent",
    "WhatsAppTemplateVideoHeaderContent" => "\Infobip\Model\WhatsAppTemplateVideoHeaderContent",
])]
class WhatsAppTemplateHeaderContent implements ModelInterface
{
    public const DISCRIMINATOR = 'type';
    public const OPENAPI_MODEL_NAME = 'WhatsAppTemplateHeaderContent';

    public const OPENAPI_FORMATS = [
        'type' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]

    protected string $type,
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

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }
}
