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
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

#[DiscriminatorMap(typeProperty: "category", mapping: [
    "AUTHENTICATION" => "\Infobip\Model\WhatsAppAuthenticationTemplatePublicApiRequest",
    "MARKETING" => "\Infobip\Model\WhatsAppDefaultMarketingTemplatePublicApiRequest",
    "UTILITY" => "\Infobip\Model\WhatsAppDefaultUtilityTemplatePublicApiRequest",
])]

class WhatsAppTemplatePublicApiRequest
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $name,
        #[Assert\NotBlank]
        protected string $language,
        #[Assert\NotBlank]

        protected string $category,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppTemplateStructureApiData $structure,
        protected ?bool $allowCategoryChange = false,
        #[Assert\Valid]
        protected ?\Infobip\Model\Platform $platform = null,
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

    public function getLanguage(): mixed
    {
        return $this->language;
    }

    public function setLanguage($language): self
    {
        $this->language = $language;
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

    public function getAllowCategoryChange(): bool|null
    {
        return $this->allowCategoryChange;
    }

    public function setAllowCategoryChange(?bool $allowCategoryChange): self
    {
        $this->allowCategoryChange = $allowCategoryChange;
        return $this;
    }

    public function getStructure(): \Infobip\Model\WhatsAppTemplateStructureApiData
    {
        return $this->structure;
    }

    public function setStructure(\Infobip\Model\WhatsAppTemplateStructureApiData $structure): self
    {
        $this->structure = $structure;
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
}
