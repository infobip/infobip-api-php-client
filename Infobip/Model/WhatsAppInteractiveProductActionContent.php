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

class WhatsAppInteractiveProductActionContent implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'WhatsAppInteractiveProductActionContent';

    public const OPENAPI_FORMATS = [
        'catalogId' => null,
        'productRetailerId' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]

    protected string $catalogId,
        #[Assert\NotBlank]

    protected string $productRetailerId,
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

    public function getCatalogId(): string
    {
        return $this->catalogId;
    }

    public function setCatalogId(string $catalogId): self
    {
        $this->catalogId = $catalogId;
        return $this;
    }

    public function getProductRetailerId(): string
    {
        return $this->productRetailerId;
    }

    public function setProductRetailerId(string $productRetailerId): self
    {
        $this->productRetailerId = $productRetailerId;
        return $this;
    }
}
