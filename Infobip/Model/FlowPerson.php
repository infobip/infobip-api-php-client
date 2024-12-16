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

class FlowPerson
{
    /**
     * @param string[] $tags
     * @param array<string,mixed> $customAttributes
     * @param array<string,mixed> $computedAttributes
     */
    public function __construct(
        protected ?string $createdAt = null,
        protected ?string $modifiedAt = null,
        protected ?int $id = null,
        protected ?string $externalId = null,
        protected ?string $firstName = null,
        protected ?string $lastName = null,
        protected ?string $type = null,
        protected ?string $address = null,
        protected ?string $city = null,
        protected ?string $country = null,
        protected ?string $gender = null,
        protected ?string $birthDate = null,
        protected ?string $middleName = null,
        protected ?string $preferredLanguage = null,
        protected ?string $profilePicture = null,
        protected ?string $origin = null,
        protected ?string $modifiedFrom = null,
        protected ?array $tags = null,
        protected ?array $customAttributes = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\FlowPersonContacts $contactInformation = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\FlowIntegrations $integrations = null,
        protected ?array $computedAttributes = null,
    ) {

    }


    public function getCreatedAt(): string|null
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getModifiedAt(): string|null
    {
        return $this->modifiedAt;
    }

    public function setModifiedAt(?string $modifiedAt): self
    {
        $this->modifiedAt = $modifiedAt;
        return $this;
    }

    public function getId(): int|null
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getExternalId(): string|null
    {
        return $this->externalId;
    }

    public function setExternalId(?string $externalId): self
    {
        $this->externalId = $externalId;
        return $this;
    }

    public function getFirstName(): string|null
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
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

    public function getType(): mixed
    {
        return $this->type;
    }

    public function setType($type): self
    {
        $this->type = $type;
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

    public function getCity(): string|null
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getCountry(): string|null
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;
        return $this;
    }

    public function getGender(): mixed
    {
        return $this->gender;
    }

    public function setGender($gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    public function getBirthDate(): string|null
    {
        return $this->birthDate;
    }

    public function setBirthDate(?string $birthDate): self
    {
        $this->birthDate = $birthDate;
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

    public function getPreferredLanguage(): string|null
    {
        return $this->preferredLanguage;
    }

    public function setPreferredLanguage(?string $preferredLanguage): self
    {
        $this->preferredLanguage = $preferredLanguage;
        return $this;
    }

    public function getProfilePicture(): string|null
    {
        return $this->profilePicture;
    }

    public function setProfilePicture(?string $profilePicture): self
    {
        $this->profilePicture = $profilePicture;
        return $this;
    }

    public function getOrigin(): mixed
    {
        return $this->origin;
    }

    public function setOrigin($origin): self
    {
        $this->origin = $origin;
        return $this;
    }

    public function getModifiedFrom(): mixed
    {
        return $this->modifiedFrom;
    }

    public function setModifiedFrom($modifiedFrom): self
    {
        $this->modifiedFrom = $modifiedFrom;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * @param string[]|null $tags List of tags that this person has.
     */
    public function setTags(?array $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return array<string,mixed>|null
     */
    public function getCustomAttributes()
    {
        return $this->customAttributes;
    }

    /**
     * @param array<string,mixed>|null $customAttributes List of custom attributes for the person, 4096 characters max per value.
     */
    public function setCustomAttributes(?array $customAttributes): self
    {
        $this->customAttributes = $customAttributes;
        return $this;
    }

    public function getContactInformation(): \Infobip\Model\FlowPersonContacts|null
    {
        return $this->contactInformation;
    }

    public function setContactInformation(?\Infobip\Model\FlowPersonContacts $contactInformation): self
    {
        $this->contactInformation = $contactInformation;
        return $this;
    }

    public function getIntegrations(): \Infobip\Model\FlowIntegrations|null
    {
        return $this->integrations;
    }

    public function setIntegrations(?\Infobip\Model\FlowIntegrations $integrations): self
    {
        $this->integrations = $integrations;
        return $this;
    }

    /**
     * @return array<string,mixed>|null
     */
    public function getComputedAttributes()
    {
        return $this->computedAttributes;
    }

    /**
     * @param array<string,mixed>|null $computedAttributes Person's computed attributes grouped by type.
     */
    public function setComputedAttributes(?array $computedAttributes): self
    {
        $this->computedAttributes = $computedAttributes;
        return $this;
    }
}
