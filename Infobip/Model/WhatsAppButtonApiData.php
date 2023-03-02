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
    "PHONE_NUMBER" => "\Infobip\Model\WhatsAppPhoneNumberButtonApiData",
    "QUICK_REPLY" => "\Infobip\Model\WhatsAppQuickReplyButtonApiData",
    "URL" => "\Infobip\Model\WhatsAppUrlButtonApiData",
    "WhatsAppPhoneNumberButtonApiData" => "\Infobip\Model\WhatsAppPhoneNumberButtonApiData",
    "WhatsAppQuickReplyButtonApiData" => "\Infobip\Model\WhatsAppQuickReplyButtonApiData",
    "WhatsAppUrlButtonApiData" => "\Infobip\Model\WhatsAppUrlButtonApiData",
])]
class WhatsAppButtonApiData implements ModelInterface
{
    public const DISCRIMINATOR = 'type';
    public const OPENAPI_MODEL_NAME = 'WhatsAppButtonApiData';

    public const OPENAPI_FORMATS = [
        'type' => null,
        'text' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
    #[Assert\Length(max: 200)]
    #[Assert\Length(min: 0)]

    protected string $text,
        #[Assert\Choice(['PHONE_NUMBER','URL','QUICK_REPLY',])]

    protected ?string $type = null,
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

    public function getType(): mixed
    {
        return $this->type;
    }

    public function setType($type): self
    {
        $this->type = $type;
        return $this;
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
}
