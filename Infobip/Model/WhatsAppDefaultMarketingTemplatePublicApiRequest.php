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

class WhatsAppDefaultMarketingTemplatePublicApiRequest extends WhatsAppTemplatePublicApiRequest
{
    public const CATEGORY = 'MARKETING';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $name,
        #[Assert\NotBlank]
        protected string $language,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppTemplateStructureApiData $structure,
        protected ?bool $allowCategoryChange = false,
        #[Assert\Valid]
        protected ?\Infobip\Model\Platform $platform = null,
    ) {
        $modelDiscriminatorValue = self::CATEGORY;

        parent::__construct(
            name: $name,
            language: $language,
            category: $modelDiscriminatorValue,
            allowCategoryChange: $allowCategoryChange,
            structure: $structure,
            platform: $platform,
        );
    }

}
