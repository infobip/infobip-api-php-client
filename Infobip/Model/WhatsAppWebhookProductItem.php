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

class WhatsAppWebhookProductItem implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'WhatsAppWebhookProductItem';

    public const OPENAPI_FORMATS = [
        'currency' => null,
        'itemPrice' => null,
        'productRetailerId' => null,
        'quantity' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
    #[Assert\Length(min: 0)]

    protected string $currency,
        #[Assert\NotBlank]

    protected float $itemPrice,
        #[Assert\NotBlank]
    #[Assert\Length(min: 0)]

    protected string $productRetailerId,
        #[Assert\NotBlank]
    #[Assert\GreaterThan(1)]

    protected int $quantity,
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

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    public function getItemPrice(): float
    {
        return $this->itemPrice;
    }

    public function setItemPrice(float $itemPrice): self
    {
        $this->itemPrice = $itemPrice;
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

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }
}
