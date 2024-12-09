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

class CallTransfer
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $transferTo,
        #[Assert\NotBlank]
        protected string $if,
        protected ?int $callTransferMaxDuration = null,
        protected ?string $equals = null,
    ) {

    }


    public function getCallTransferMaxDuration(): int|null
    {
        return $this->callTransferMaxDuration;
    }

    public function setCallTransferMaxDuration(?int $callTransferMaxDuration): self
    {
        $this->callTransferMaxDuration = $callTransferMaxDuration;
        return $this;
    }

    public function getEquals(): string|null
    {
        return $this->equals;
    }

    public function setEquals(?string $equals): self
    {
        $this->equals = $equals;
        return $this;
    }

    public function getTransferTo(): string
    {
        return $this->transferTo;
    }

    public function setTransferTo(string $transferTo): self
    {
        $this->transferTo = $transferTo;
        return $this;
    }

    public function getIf(): string
    {
        return $this->if;
    }

    public function setIf(string $if): self
    {
        $this->if = $if;
        return $this;
    }
}
