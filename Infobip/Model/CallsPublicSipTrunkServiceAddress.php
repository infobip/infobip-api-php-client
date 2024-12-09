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

class CallsPublicSipTrunkServiceAddress
{
    /**
     */
    public function __construct(
        protected ?string $id = null,
        protected ?string $name = null,
        protected ?string $street = null,
        protected ?string $city = null,
        protected ?string $postCode = null,
        protected ?string $suite = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsPublicCountry $country = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsPublicRegion $region = null,
    ) {

    }


    public function getId(): string|null
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
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

    public function getStreet(): string|null
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;
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

    public function getPostCode(): string|null
    {
        return $this->postCode;
    }

    public function setPostCode(?string $postCode): self
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

    public function getCountry(): \Infobip\Model\CallsPublicCountry|null
    {
        return $this->country;
    }

    public function setCountry(?\Infobip\Model\CallsPublicCountry $country): self
    {
        $this->country = $country;
        return $this;
    }

    public function getRegion(): \Infobip\Model\CallsPublicRegion|null
    {
        return $this->region;
    }

    public function setRegion(?\Infobip\Model\CallsPublicRegion $region): self
    {
        $this->region = $region;
        return $this;
    }
}
