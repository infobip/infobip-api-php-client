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

class WhatsAppInteractiveOrderStatusActionContent
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppInteractiveOrderPaymentStatus $payment,
        #[Assert\NotBlank]
        protected string $status,
        #[Assert\Length(max: 120)]
        #[Assert\Length(min: 0)]
        protected ?string $description = null,
    ) {

    }


    public function getPayment(): \Infobip\Model\WhatsAppInteractiveOrderPaymentStatus
    {
        return $this->payment;
    }

    public function setPayment(\Infobip\Model\WhatsAppInteractiveOrderPaymentStatus $payment): self
    {
        $this->payment = $payment;
        return $this;
    }

    public function getStatus(): mixed
    {
        return $this->status;
    }

    public function setStatus($status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }
}
