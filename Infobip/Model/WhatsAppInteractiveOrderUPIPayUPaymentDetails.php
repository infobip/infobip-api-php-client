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

class WhatsAppInteractiveOrderUPIPayUPaymentDetails extends WhatsAppInteractiveAllowedOrderPaymentDetails
{
    public const TYPE = 'UPI_PAYU';

    /**
     * @param string[] $callbackData
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(max: 25)]
        #[Assert\Length(min: 1)]
        protected string $id,
        #[Assert\NotBlank]
        #[Assert\Length(max: 100)]
        #[Assert\Length(min: 1)]
        protected string $productDescription,
        #[Assert\NotBlank]
        #[Assert\Length(max: 60)]
        #[Assert\Length(min: 1)]
        protected string $customerFirstName,
        #[Assert\NotBlank]
        #[Assert\Length(max: 50)]
        #[Assert\Length(min: 1)]
        protected string $customerEmail,
        #[Assert\Length(max: 20)]
        #[Assert\Length(min: 0)]
        protected ?string $customerLastName = null,
        #[Assert\Count(max: 5)]
        #[Assert\Count(min: 0)]
        protected ?array $callbackData = null,
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

    public function getProductDescription(): string
    {
        return $this->productDescription;
    }

    public function setProductDescription(string $productDescription): self
    {
        $this->productDescription = $productDescription;
        return $this;
    }

    public function getCustomerFirstName(): string
    {
        return $this->customerFirstName;
    }

    public function setCustomerFirstName(string $customerFirstName): self
    {
        $this->customerFirstName = $customerFirstName;
        return $this;
    }

    public function getCustomerLastName(): string|null
    {
        return $this->customerLastName;
    }

    public function setCustomerLastName(?string $customerLastName): self
    {
        $this->customerLastName = $customerLastName;
        return $this;
    }

    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    public function setCustomerEmail(string $customerEmail): self
    {
        $this->customerEmail = $customerEmail;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getCallbackData(): ?array
    {
        return $this->callbackData;
    }

    /**
     * @param string[]|null $callbackData List of custom parameters corresponding to the transaction.
     */
    public function setCallbackData(?array $callbackData): self
    {
        $this->callbackData = $callbackData;
        return $this;
    }
}
