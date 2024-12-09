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


class EmailValidationResponse
{
    /**
     */
    public function __construct(
        protected ?string $to = null,
        protected ?string $validMailbox = null,
        protected ?bool $validSyntax = null,
        protected ?bool $catchAll = null,
        protected ?string $didYouMean = null,
        protected ?bool $disposable = null,
        protected ?bool $roleBased = null,
        protected ?string $reason = null,
        protected ?string $detailedReasons = null,
        protected ?string $risk = null,
    ) {

    }


    public function getTo(): string|null
    {
        return $this->to;
    }

    public function setTo(?string $to): self
    {
        $this->to = $to;
        return $this;
    }

    public function getValidMailbox(): string|null
    {
        return $this->validMailbox;
    }

    public function setValidMailbox(?string $validMailbox): self
    {
        $this->validMailbox = $validMailbox;
        return $this;
    }

    public function getValidSyntax(): bool|null
    {
        return $this->validSyntax;
    }

    public function setValidSyntax(?bool $validSyntax): self
    {
        $this->validSyntax = $validSyntax;
        return $this;
    }

    public function getCatchAll(): bool|null
    {
        return $this->catchAll;
    }

    public function setCatchAll(?bool $catchAll): self
    {
        $this->catchAll = $catchAll;
        return $this;
    }

    public function getDidYouMean(): string|null
    {
        return $this->didYouMean;
    }

    public function setDidYouMean(?string $didYouMean): self
    {
        $this->didYouMean = $didYouMean;
        return $this;
    }

    public function getDisposable(): bool|null
    {
        return $this->disposable;
    }

    public function setDisposable(?bool $disposable): self
    {
        $this->disposable = $disposable;
        return $this;
    }

    public function getRoleBased(): bool|null
    {
        return $this->roleBased;
    }

    public function setRoleBased(?bool $roleBased): self
    {
        $this->roleBased = $roleBased;
        return $this;
    }

    public function getReason(): string|null
    {
        return $this->reason;
    }

    public function setReason(?string $reason): self
    {
        $this->reason = $reason;
        return $this;
    }

    public function getDetailedReasons(): string|null
    {
        return $this->detailedReasons;
    }

    public function setDetailedReasons(?string $detailedReasons): self
    {
        $this->detailedReasons = $detailedReasons;
        return $this;
    }

    public function getRisk(): string|null
    {
        return $this->risk;
    }

    public function setRisk(?string $risk): self
    {
        $this->risk = $risk;
        return $this;
    }
}
