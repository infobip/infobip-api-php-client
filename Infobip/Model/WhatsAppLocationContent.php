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

class WhatsAppLocationContent
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\LessThanOrEqual(90)]
        #[Assert\GreaterThanOrEqual(-90)]
        protected float $latitude,
        #[Assert\NotBlank]
        #[Assert\LessThanOrEqual(180)]
        #[Assert\GreaterThanOrEqual(-180)]
        protected float $longitude,
        #[Assert\Length(max: 1000)]
        #[Assert\Length(min: 0)]
        protected ?string $name = null,
        #[Assert\Length(max: 1000)]
        #[Assert\Length(min: 0)]
        protected ?string $address = null,
    ) {

    }


    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;
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

    public function getAddress(): string|null
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;
        return $this;
    }
}
