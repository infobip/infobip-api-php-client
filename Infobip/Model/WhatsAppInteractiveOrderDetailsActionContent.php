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

class WhatsAppInteractiveOrderDetailsActionContent
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppInteractiveAllowedOrderPaymentDetails $payment,
        #[Assert\NotBlank]
        protected string $orderCurrency,
        #[Assert\NotBlank]
        protected string $orderType,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppInteractiveOrderDetailsAmount $totalAmount,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppInteractiveOrderDetailsOrder $order,
        #[Assert\Length(max: 60)]
        #[Assert\Length(min: 1)]
        protected ?string $paymentConfiguration = null,
    ) {

    }


    public function getPayment(): \Infobip\Model\WhatsAppInteractiveAllowedOrderPaymentDetails
    {
        return $this->payment;
    }

    public function setPayment(\Infobip\Model\WhatsAppInteractiveAllowedOrderPaymentDetails $payment): self
    {
        $this->payment = $payment;
        return $this;
    }

    public function getPaymentConfiguration(): string|null
    {
        return $this->paymentConfiguration;
    }

    public function setPaymentConfiguration(?string $paymentConfiguration): self
    {
        $this->paymentConfiguration = $paymentConfiguration;
        return $this;
    }

    public function getOrderCurrency(): mixed
    {
        return $this->orderCurrency;
    }

    public function setOrderCurrency($orderCurrency): self
    {
        $this->orderCurrency = $orderCurrency;
        return $this;
    }

    public function getOrderType(): mixed
    {
        return $this->orderType;
    }

    public function setOrderType($orderType): self
    {
        $this->orderType = $orderType;
        return $this;
    }

    public function getTotalAmount(): \Infobip\Model\WhatsAppInteractiveOrderDetailsAmount
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(\Infobip\Model\WhatsAppInteractiveOrderDetailsAmount $totalAmount): self
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    public function getOrder(): \Infobip\Model\WhatsAppInteractiveOrderDetailsOrder
    {
        return $this->order;
    }

    public function setOrder(\Infobip\Model\WhatsAppInteractiveOrderDetailsOrder $order): self
    {
        $this->order = $order;
        return $this;
    }
}
