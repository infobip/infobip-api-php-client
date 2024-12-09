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

class WhatsAppWebhookPaymentNotification
{
    /**
     * @param string[] $callbackData
     * @param \Infobip\Model\WhatsAppWebhookPaymentTransactionNotification[] $transactions
     */
    public function __construct(
        #[Assert\Length(min: 1)]
        protected ?string $from = null,
        #[Assert\Length(min: 1)]
        protected ?string $type = null,
        #[Assert\Length(min: 1)]
        protected ?string $referenceId = null,
        #[Assert\Length(min: 1)]
        protected ?string $paymentId = null,
        protected ?string $paymentStatus = null,
        protected ?string $currency = null,
        #[Assert\GreaterThanOrEqual(1)]
        protected ?int $totalAmountValue = null,
        #[Assert\GreaterThanOrEqual(1)]
        protected ?int $totalAmountOffset = null,
        #[Assert\Count(min: 0)]
        protected ?array $callbackData = null,
        #[Assert\Count(min: 0)]
        protected ?array $transactions = null,
    ) {

    }


    public function getFrom(): string|null
    {
        return $this->from;
    }

    public function setFrom(?string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getType(): string|null
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getReferenceId(): string|null
    {
        return $this->referenceId;
    }

    public function setReferenceId(?string $referenceId): self
    {
        $this->referenceId = $referenceId;
        return $this;
    }

    public function getPaymentId(): string|null
    {
        return $this->paymentId;
    }

    public function setPaymentId(?string $paymentId): self
    {
        $this->paymentId = $paymentId;
        return $this;
    }

    public function getPaymentStatus(): mixed
    {
        return $this->paymentStatus;
    }

    public function setPaymentStatus($paymentStatus): self
    {
        $this->paymentStatus = $paymentStatus;
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

    public function getTotalAmountValue(): int|null
    {
        return $this->totalAmountValue;
    }

    public function setTotalAmountValue(?int $totalAmountValue): self
    {
        $this->totalAmountValue = $totalAmountValue;
        return $this;
    }

    public function getTotalAmountOffset(): int|null
    {
        return $this->totalAmountOffset;
    }

    public function setTotalAmountOffset(?int $totalAmountOffset): self
    {
        $this->totalAmountOffset = $totalAmountOffset;
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
     * @param string[]|null $callbackData List of custom parameters corresponding to the transaction. Available only for UPI Payments.
     */
    public function setCallbackData(?array $callbackData): self
    {
        $this->callbackData = $callbackData;
        return $this;
    }

    /**
     * @return \Infobip\Model\WhatsAppWebhookPaymentTransactionNotification[]|null
     */
    public function getTransactions(): ?array
    {
        return $this->transactions;
    }

    /**
     * @param \Infobip\Model\WhatsAppWebhookPaymentTransactionNotification[]|null $transactions Transactions of the payment.
     */
    public function setTransactions(?array $transactions): self
    {
        $this->transactions = $transactions;
        return $this;
    }
}
