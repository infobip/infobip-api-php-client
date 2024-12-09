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

class WhatsAppNameContent
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $firstName,
        #[Assert\NotBlank]
        protected string $formattedName,
        protected ?string $lastName = null,
        protected ?string $middleName = null,
        protected ?string $nameSuffix = null,
        protected ?string $namePrefix = null,
    ) {

    }


    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): string|null
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getMiddleName(): string|null
    {
        return $this->middleName;
    }

    public function setMiddleName(?string $middleName): self
    {
        $this->middleName = $middleName;
        return $this;
    }

    public function getNameSuffix(): string|null
    {
        return $this->nameSuffix;
    }

    public function setNameSuffix(?string $nameSuffix): self
    {
        $this->nameSuffix = $nameSuffix;
        return $this;
    }

    public function getNamePrefix(): string|null
    {
        return $this->namePrefix;
    }

    public function setNamePrefix(?string $namePrefix): self
    {
        $this->namePrefix = $namePrefix;
        return $this;
    }

    public function getFormattedName(): string
    {
        return $this->formattedName;
    }

    public function setFormattedName(string $formattedName): self
    {
        $this->formattedName = $formattedName;
        return $this;
    }
}
