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

class WhatsAppPayment
{
    /**
     * @param \Infobip\Model\WhatsAppPaymentTransaction[] $transactions
     * @param string[] $callbackData
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $referenceId,
        #[Assert\NotBlank]
        protected string $paymentId,
        #[Assert\NotBlank]
        protected string $paymentStatus,
        #[Assert\NotBlank]
        protected string $currency,
        #[Assert\NotBlank]
        protected int $totalAmountValue,
        #[Assert\NotBlank]
        protected int $totalAmountOffset,
        #[Assert\NotBlank]
        protected array $transactions,
        protected ?array $callbackData = null,
    ) {

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

    public function getTotalAmountValue(): int
    {
        return $this->totalAmountValue;
    }

    public function setTotalAmountValue(int $totalAmountValue): self
    {
        $this->totalAmountValue = $totalAmountValue;
        return $this;
    }

    public function getTotalAmountOffset(): int
    {
        return $this->totalAmountOffset;
    }

    public function setTotalAmountOffset(int $totalAmountOffset): self
    {
        $this->totalAmountOffset = $totalAmountOffset;
        return $this;
    }

    /**
     * @return \Infobip\Model\WhatsAppPaymentTransaction[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * @param \Infobip\Model\WhatsAppPaymentTransaction[] $transactions Transactions of the payment.
     */
    public function setTransactions(array $transactions): self
    {
        $this->transactions = $transactions;
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
}
