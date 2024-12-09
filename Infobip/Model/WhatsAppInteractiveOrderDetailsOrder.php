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

class WhatsAppInteractiveOrderDetailsOrder
{
    /**
     * @param \Infobip\Model\WhatsAppInteractiveOrderDetailsOrderItem[] $items
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $items,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppInteractiveOrderDetailsAmount $subtotal,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppInteractiveOrderDetailsDescriptiveAmount $tax,
        protected ?string $catalogId = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppInteractiveOrderDetailsDescriptiveAmount $shipping = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppInteractiveOrderDetailsDiscount $discount = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppInteractiveOrderDetailsOrderExpiration $orderExpiration = null,
    ) {

    }


    public function getCatalogId(): string|null
    {
        return $this->catalogId;
    }

    public function setCatalogId(?string $catalogId): self
    {
        $this->catalogId = $catalogId;
        return $this;
    }

    /**
     * @return \Infobip\Model\WhatsAppInteractiveOrderDetailsOrderItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param \Infobip\Model\WhatsAppInteractiveOrderDetailsOrderItem[] $items An array of items in the order.
     */
    public function setItems(array $items): self
    {
        $this->items = $items;
        return $this;
    }

    public function getSubtotal(): \Infobip\Model\WhatsAppInteractiveOrderDetailsAmount
    {
        return $this->subtotal;
    }

    public function setSubtotal(\Infobip\Model\WhatsAppInteractiveOrderDetailsAmount $subtotal): self
    {
        $this->subtotal = $subtotal;
        return $this;
    }

    public function getTax(): \Infobip\Model\WhatsAppInteractiveOrderDetailsDescriptiveAmount
    {
        return $this->tax;
    }

    public function setTax(\Infobip\Model\WhatsAppInteractiveOrderDetailsDescriptiveAmount $tax): self
    {
        $this->tax = $tax;
        return $this;
    }

    public function getShipping(): \Infobip\Model\WhatsAppInteractiveOrderDetailsDescriptiveAmount|null
    {
        return $this->shipping;
    }

    public function setShipping(?\Infobip\Model\WhatsAppInteractiveOrderDetailsDescriptiveAmount $shipping): self
    {
        $this->shipping = $shipping;
        return $this;
    }

    public function getDiscount(): \Infobip\Model\WhatsAppInteractiveOrderDetailsDiscount|null
    {
        return $this->discount;
    }

    public function setDiscount(?\Infobip\Model\WhatsAppInteractiveOrderDetailsDiscount $discount): self
    {
        $this->discount = $discount;
        return $this;
    }

    public function getOrderExpiration(): \Infobip\Model\WhatsAppInteractiveOrderDetailsOrderExpiration|null
    {
        return $this->orderExpiration;
    }

    public function setOrderExpiration(?\Infobip\Model\WhatsAppInteractiveOrderDetailsOrderExpiration $orderExpiration): self
    {
        $this->orderExpiration = $orderExpiration;
        return $this;
    }
}
