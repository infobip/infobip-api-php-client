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

class WhatsAppBusinessInfoResponse
{
    /**
     * @param string[] $websites
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $about,
        #[Assert\NotBlank]
        protected string $address,
        #[Assert\NotBlank]
        protected string $description,
        #[Assert\NotBlank]
        protected string $email,
        #[Assert\NotBlank]
        protected string $vertical,
        #[Assert\NotBlank]
        protected array $websites,
        #[Assert\NotBlank]
        protected string $displayName,
    ) {

    }


    public function getAbout(): string
    {
        return $this->about;
    }

    public function setAbout(string $about): self
    {
        $this->about = $about;
        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
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
     * @return string[]
     */
    public function getWebsites(): array
    {
        return $this->websites;
    }

    /**
     * @param string[] $websites Websites of the business.
     */
    public function setWebsites(array $websites): self
    {
        $this->websites = $websites;
        return $this;
    }

    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    public function setDisplayName(string $displayName): self
    {
        $this->displayName = $displayName;
        return $this;
    }
}
