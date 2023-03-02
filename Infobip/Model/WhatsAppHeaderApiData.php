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

#[DiscriminatorMap(typeProperty: "format", mapping: [
    "DOCUMENT" => "\Infobip\Model\WhatsAppDocumentHeaderApiData",
    "IMAGE" => "\Infobip\Model\WhatsAppImageHeaderApiData",
    "LOCATION" => "\Infobip\Model\WhatsAppLocationHeaderApiData",
    "TEXT" => "\Infobip\Model\WhatsAppTextHeaderApiData",
    "VIDEO" => "\Infobip\Model\WhatsAppVideoHeaderApiData",
    "WhatsAppDocumentHeaderApiData" => "\Infobip\Model\WhatsAppDocumentHeaderApiData",
    "WhatsAppImageHeaderApiData" => "\Infobip\Model\WhatsAppImageHeaderApiData",
    "WhatsAppLocationHeaderApiData" => "\Infobip\Model\WhatsAppLocationHeaderApiData",
    "WhatsAppTextHeaderApiData" => "\Infobip\Model\WhatsAppTextHeaderApiData",
    "WhatsAppVideoHeaderApiData" => "\Infobip\Model\WhatsAppVideoHeaderApiData",
])]
class WhatsAppHeaderApiData implements ModelInterface
{
    public const DISCRIMINATOR = 'format';
    public const OPENAPI_MODEL_NAME = 'WhatsAppHeaderApiData';

    public const OPENAPI_FORMATS = [
        'format' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\Choice(['TEXT','IMAGE','VIDEO','DOCUMENT','LOCATION',])]

    protected ?string $format = null,
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

    public function getFormat(): mixed
    {
        return $this->format;
    }

    public function setFormat($format): self
    {
        $this->format = $format;
        return $this;
    }
}
