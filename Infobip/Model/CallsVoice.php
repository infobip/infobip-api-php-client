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


class CallsVoice
{
    /**
     */
    public function __construct(
        protected ?string $name = null,
        protected ?string $gender = null,
        protected ?string $supplier = null,
        protected ?bool $ssmlSupported = null,
        protected ?bool $isDefault = null,
        protected ?bool $isNeural = null,
    ) {

    }


    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getGender(): string|null
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    public function getSupplier(): string|null
    {
        return $this->supplier;
    }

    public function setSupplier(?string $supplier): self
    {
        $this->supplier = $supplier;
        return $this;
    }

    public function getSsmlSupported(): bool|null
    {
        return $this->ssmlSupported;
    }

    public function setSsmlSupported(?bool $ssmlSupported): self
    {
        $this->ssmlSupported = $ssmlSupported;
        return $this;
    }

    public function getIsDefault(): bool|null
    {
        return $this->isDefault;
    }

    public function setIsDefault(?bool $isDefault): self
    {
        $this->isDefault = $isDefault;
        return $this;
    }

    public function getIsNeural(): bool|null
    {
        return $this->isNeural;
    }

    public function setIsNeural(?bool $isNeural): self
    {
        $this->isNeural = $isNeural;
        return $this;
    }
}
