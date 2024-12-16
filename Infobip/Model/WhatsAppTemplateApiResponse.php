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

use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints as Assert;

#[DiscriminatorMap(typeProperty: "category", mapping: [
    "AUTHENTICATION" => "\Infobip\Model\WhatsAppAuthenticationTemplateApiResponse",
    "MARKETING" => "\Infobip\Model\WhatsAppDefaultMarketingTemplateApiResponse",
    "UTILITY" => "\Infobip\Model\WhatsAppDefaultUtilityTemplateApiResponse",
])]

class WhatsAppTemplateApiResponse
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppDefaultTemplateStructureApiData $structure,
        protected ?string $id = null,
        protected ?int $businessAccountId = null,
        protected ?string $name = null,
        protected ?string $language = null,
        protected ?string $status = null,
        protected ?string $category = null,
        protected ?string $quality = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\Platform $platform = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $createdAt = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $lastUpdatedAt = null,
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

    public function getBusinessAccountId(): int|null
    {
        return $this->businessAccountId;
    }

    public function setBusinessAccountId(?int $businessAccountId): self
    {
        $this->businessAccountId = $businessAccountId;
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

    public function getLanguage(): mixed
    {
        return $this->language;
    }

    public function setLanguage($language): self
    {
        $this->language = $language;
        return $this;
    }

    public function getStatus(): mixed
    {
        return $this->status;
    }

    public function setStatus($status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getCategory(): mixed
    {
        return $this->category;
    }

    public function setCategory($category): self
    {
        $this->category = $category;
        return $this;
    }

    public function getStructure(): \Infobip\Model\WhatsAppDefaultTemplateStructureApiData
    {
        return $this->structure;
    }

    public function setStructure(\Infobip\Model\WhatsAppDefaultTemplateStructureApiData $structure): self
    {
        $this->structure = $structure;
        return $this;
    }

    public function getQuality(): mixed
    {
        return $this->quality;
    }

    public function setQuality($quality): self
    {
        $this->quality = $quality;
        return $this;
    }

    public function getPlatform(): \Infobip\Model\Platform|null
    {
        return $this->platform;
    }

    public function setPlatform(?\Infobip\Model\Platform $platform): self
    {
        $this->platform = $platform;
        return $this;
    }

    public function getCreatedAt(): \DateTime|null
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getLastUpdatedAt(): \DateTime|null
    {
        return $this->lastUpdatedAt;
    }

    public function setLastUpdatedAt(?\DateTime $lastUpdatedAt): self
    {
        $this->lastUpdatedAt = $lastUpdatedAt;
        return $this;
    }
}
