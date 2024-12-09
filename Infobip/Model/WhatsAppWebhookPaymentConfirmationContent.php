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

class WhatsAppWebhookPaymentConfirmationContent extends WhatsAppWebhookInboundMessage
{
    public const TYPE = 'INTERACTIVE_PAYMENT_CONFIRMATION';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(min: 1)]
        protected string $referenceId,
        #[Assert\NotBlank]
        #[Assert\Length(min: 1)]
        protected string $paymentId,
        #[Assert\NotBlank]

        protected string $status,
        #[Assert\NotBlank]

        protected string $currency,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppWebhookPaymentAmount $totalAmount,
        #[Assert\NotBlank]
        #[Assert\Length(min: 1)]
        protected string $transactionId,
        #[Assert\NotBlank]

        protected string $transactionType,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppContext $context = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppWebhookIdentity $identity = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppWebhookReferral $referral = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
            context: $context,
            identity: $identity,
            referral: $referral,
        );
    }


    public function getReferenceId(): string
    {
        return $this->referenceId;
    }

    public function setReferenceId(string $referenceId): self
    {
        $this->referenceId = $referenceId;
        return $this;
    }

    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

    public function setPaymentId(string $paymentId): self
    {
        $this->paymentId = $paymentId;
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

    public function getCurrency(): mixed
    {
        return $this->currency;
    }

    public function setCurrency($currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    public function getTotalAmount(): \Infobip\Model\WhatsAppWebhookPaymentAmount
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(\Infobip\Model\WhatsAppWebhookPaymentAmount $totalAmount): self
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    public function setTransactionId(string $transactionId): self
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    public function getTransactionType(): mixed
    {
        return $this->transactionType;
    }

    public function setTransactionType($transactionType): self
    {
        $this->transactionType = $transactionType;
        return $this;
    }
}
