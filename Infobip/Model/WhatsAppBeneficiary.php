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

class WhatsAppBeneficiary
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(max: 200)]
        #[Assert\Length(min: 0)]
        protected string $name,
        #[Assert\NotBlank]
        #[Assert\Length(max: 100)]
        #[Assert\Length(min: 0)]
        protected string $firstAddressLine,
        #[Assert\NotBlank]
        protected string $country,
        #[Assert\Length(max: 100)]
        #[Assert\Length(min: 0)]
        protected ?string $secondAddressLine = null,
        protected ?string $city = null,
        protected ?string $state = null,
        #[Assert\Regex('/^[0-9]{6}$/')]
        protected ?string $postalCode = null,
    ) {

    }


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getFirstAddressLine(): string
    {
        return $this->firstAddressLine;
    }

    public function setFirstAddressLine(string $firstAddressLine): self
    {
        $this->firstAddressLine = $firstAddressLine;
        return $this;
    }

    public function getSecondAddressLine(): string|null
    {
        return $this->secondAddressLine;
    }

    public function setSecondAddressLine(?string $secondAddressLine): self
    {
        $this->secondAddressLine = $secondAddressLine;
        return $this;
    }

    public function getCity(): string|null
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getState(): string|null
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;
        return $this;
    }

    public function getCountry(): mixed
    {
        return $this->country;
    }

    public function setCountry($country): self
    {
        $this->country = $country;
        return $this;
    }

    public function getPostalCode(): string|null
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;
        return $this;
    }
}
