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

class WhatsAppAuthenticationTemplateApiResponse extends WhatsAppTemplateApiResponse
{
    public const CATEGORY = 'AUTHENTICATION';

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
        protected ?string $quality = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\Platform $platform = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppValidityPeriodApiData $validityPeriod = null,
    ) {
        $modelDiscriminatorValue = self::CATEGORY;

        parent::__construct(
            id: $id,
            businessAccountId: $businessAccountId,
            name: $name,
            language: $language,
            status: $status,
            category: $modelDiscriminatorValue,
            structure: $structure,
            quality: $quality,
            platform: $platform,
        );
    }


    public function getValidityPeriod(): \Infobip\Model\WhatsAppValidityPeriodApiData|null
    {
        return $this->validityPeriod;
    }

    public function setValidityPeriod(?\Infobip\Model\WhatsAppValidityPeriodApiData $validityPeriod): self
    {
        $this->validityPeriod = $validityPeriod;
        return $this;
    }
}
