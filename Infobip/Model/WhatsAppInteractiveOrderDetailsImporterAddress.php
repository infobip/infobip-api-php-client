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


class WhatsAppInteractiveOrderDetailsImporterAddress
{
    /**
     */
    public function __construct(
        protected ?string $firstAddressLine = null,
        protected ?string $secondAddressLine = null,
        protected ?string $city = null,
        protected ?string $zoneCode = null,
        protected ?string $postalCode = null,
        protected ?string $countryCode = null,
    ) {

    }


    public function getFirstAddressLine(): string|null
    {
        return $this->firstAddressLine;
    }

    public function setFirstAddressLine(?string $firstAddressLine): self
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

    public function getZoneCode(): string|null
    {
        return $this->zoneCode;
    }

    public function setZoneCode(?string $zoneCode): self
    {
        $this->zoneCode = $zoneCode;
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

    public function getCountryCode(): string|null
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }
}
