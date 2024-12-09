<?php

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

class WhatsAppInteractiveOrderBrazilPixDcPaymentDetails extends WhatsAppTemplateAllowedOrderPaymentDetails
{
    public const TYPE = 'BRAZIL_PIX_DC';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Regex('/[A-Za-z0-9\\-_.]{1,35}/')]
        protected string $id,
        #[Assert\NotBlank]
        protected string $code,
        #[Assert\NotBlank]
        protected string $merchantName,
        #[Assert\NotBlank]
        protected string $keyType,
        #[Assert\NotBlank]
        protected string $key,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function getMerchantName(): string
    {
        return $this->merchantName;
    }

    public function setMerchantName(string $merchantName): self
    {
        $this->merchantName = $merchantName;
        return $this;
    }

    public function getKeyType(): mixed
    {
        return $this->keyType;
    }

    public function setKeyType($keyType): self
    {
        $this->keyType = $keyType;
        return $this;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): self
    {
        $this->key = $key;
        return $this;
    }
}
