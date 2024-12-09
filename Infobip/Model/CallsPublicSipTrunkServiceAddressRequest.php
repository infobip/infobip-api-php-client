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

class CallsPublicSipTrunkServiceAddressRequest
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $name,
        #[Assert\NotBlank]
        protected string $street,
        #[Assert\NotBlank]
        protected string $city,
        #[Assert\NotBlank]
        protected string $postCode,
        #[Assert\NotBlank]
        protected string $countryCode,
        protected ?string $suite = null,
        protected ?string $countryRegionCode = null,
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

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getPostCode(): string
    {
        return $this->postCode;
    }

    public function setPostCode(string $postCode): self
    {
        $this->postCode = $postCode;
        return $this;
    }

    public function getSuite(): string|null
    {
        return $this->suite;
    }

    public function setSuite(?string $suite): self
    {
        $this->suite = $suite;
        return $this;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    public function getCountryRegionCode(): string|null
    {
        return $this->countryRegionCode;
    }

    public function setCountryRegionCode(?string $countryRegionCode): self
    {
        $this->countryRegionCode = $countryRegionCode;
        return $this;
    }
}
