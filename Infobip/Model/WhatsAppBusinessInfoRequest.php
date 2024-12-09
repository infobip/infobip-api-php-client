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

class WhatsAppBusinessInfoRequest
{
    /**
     * @param string[] $websites
     */
    public function __construct(
        #[Assert\Length(max: 130)]
        #[Assert\Length(min: 0)]
        protected ?string $about = null,
        #[Assert\Length(max: 256)]
        #[Assert\Length(min: 0)]
        protected ?string $address = null,
        #[Assert\Length(max: 256)]
        #[Assert\Length(min: 0)]
        protected ?string $description = null,
        #[Assert\Length(max: 128)]
        #[Assert\Length(min: 0)]
        protected ?string $email = null,
        protected ?string $vertical = null,
        #[Assert\Count(max: 2)]
        #[Assert\Count(min: 0)]
        protected ?array $websites = null,
        #[Assert\Length(max: 2048)]
        #[Assert\Length(min: 0)]
        protected ?string $logoUrl = null,
    ) {

    }


    public function getAbout(): string|null
    {
        return $this->about;
    }

    public function setAbout(?string $about): self
    {
        $this->about = $about;
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

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getEmail(): string|null
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getVertical(): mixed
    {
        return $this->vertical;
    }

    public function setVertical($vertical): self
    {
        $this->vertical = $vertical;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getWebsites(): ?array
    {
        return $this->websites;
    }

    /**
     * @param string[]|null $websites Websites of the business.
     */
    public function setWebsites(?array $websites): self
    {
        $this->websites = $websites;
        return $this;
    }

    public function getLogoUrl(): string|null
    {
        return $this->logoUrl;
    }

    public function setLogoUrl(?string $logoUrl): self
    {
        $this->logoUrl = $logoUrl;
        return $this;
    }
}
