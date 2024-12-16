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
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints as Assert;

class WhatsAppDefaultUtilityTemplateApiResponse extends WhatsAppTemplateApiResponse
{
    public const CATEGORY = 'UTILITY';

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
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $createdAt = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $lastUpdatedAt = null,
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
            createdAt: $createdAt,
            lastUpdatedAt: $lastUpdatedAt,
        );
    }

}
