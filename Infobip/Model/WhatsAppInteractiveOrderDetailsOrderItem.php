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

class WhatsAppInteractiveOrderDetailsOrderItem
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $retailerId,
        #[Assert\NotBlank]
        #[Assert\Length(max: 60)]
        #[Assert\Length(min: 1)]
        protected string $name,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppInteractiveOrderDetailsAmount $amount,
        #[Assert\NotBlank]
        protected int $quantity,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppInteractiveOrderDetailsAmount $saleAmount = null,
        protected ?string $originCountry = null,
        protected ?string $importerName = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppInteractiveOrderDetailsImporterAddress $importerAddress = null,
    ) {

    }


    public function getRetailerId(): string
    {
        return $this->retailerId;
    }

    public function setRetailerId(string $retailerId): self
    {
        $this->retailerId = $retailerId;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getAmount(): \Infobip\Model\WhatsAppInteractiveOrderDetailsAmount
    {
        return $this->amount;
    }

    public function setAmount(\Infobip\Model\WhatsAppInteractiveOrderDetailsAmount $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function getSaleAmount(): \Infobip\Model\WhatsAppInteractiveOrderDetailsAmount|null
    {
        return $this->saleAmount;
    }

    public function setSaleAmount(?\Infobip\Model\WhatsAppInteractiveOrderDetailsAmount $saleAmount): self
    {
        $this->saleAmount = $saleAmount;
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

    public function getOriginCountry(): string|null
    {
        return $this->originCountry;
    }

    public function setOriginCountry(?string $originCountry): self
    {
        $this->originCountry = $originCountry;
        return $this;
    }

    public function getImporterName(): string|null
    {
        return $this->importerName;
    }

    public function setImporterName(?string $importerName): self
    {
        $this->importerName = $importerName;
        return $this;
    }

    public function getImporterAddress(): \Infobip\Model\WhatsAppInteractiveOrderDetailsImporterAddress|null
    {
        return $this->importerAddress;
    }

    public function setImporterAddress(?\Infobip\Model\WhatsAppInteractiveOrderDetailsImporterAddress $importerAddress): self
    {
        $this->importerAddress = $importerAddress;
        return $this;
    }
}
