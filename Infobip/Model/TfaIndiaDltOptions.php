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

class TfaIndiaDltOptions implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'TfaIndiaDltOptions';

    public const OPENAPI_FORMATS = [
        'contentTemplateId' => null,
        'principalEntityId' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
    #[Assert\Length(max: 30)]
    #[Assert\Length(min: 0)]

    protected string $principalEntityId,
        #[Assert\Length(max: 30)]
    #[Assert\Length(min: 0)]

    protected ?string $contentTemplateId = null,
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

    public function getContentTemplateId(): string|null
    {
        return $this->contentTemplateId;
    }

    public function setContentTemplateId(?string $contentTemplateId): self
    {
        $this->contentTemplateId = $contentTemplateId;
        return $this;
    }

    public function getPrincipalEntityId(): string
    {
        return $this->principalEntityId;
    }

    public function setPrincipalEntityId(string $principalEntityId): self
    {
        $this->principalEntityId = $principalEntityId;
        return $this;
    }
}
