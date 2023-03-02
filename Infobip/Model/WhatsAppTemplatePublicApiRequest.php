<?php

// phpcs:ignorefile

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
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

class WhatsAppTemplatePublicApiRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'WhatsAppTemplatePublicApiRequest';

    public const OPENAPI_FORMATS = [
        'name' => null,
        'language' => null,
        'category' => null,
        'structure' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]

    protected string $name,
        #[Assert\NotBlank]
    #[Assert\Choice(['af','sq','ar','az','bn','bg','ca','zh_CN','zh_HK','zh_TW','hr','cs','da','nl','en','en_GB','en_US','et','fil','fi','fr','ka','de','el','gu','ha','he','hi','hu','id','ga','it','ja','kn','kk','rw_RW','ko','ky_KG','lo','lv','lt','mk','ms','ml','mr','nb','fa','pl','pt_BR','pt_PT','pa','ro','ru','sr','sk','sl','es','es_AR','es_ES','es_MX','sw','sv','ta','te','th','tr','uk','ur','uz','vi','zu','unknown',])]

    protected string $language,
        #[Assert\NotBlank]
    #[Assert\Choice(['MARKETING','TRANSACTIONAL','OTP',])]

    protected string $category,
        #[Assert\Valid]
    #[Assert\NotBlank]

    protected \Infobip\Model\WhatsAppTemplateStructureApiData $structure,
    ) {
    }

    #[Ignore]
    public function getModelName(): string
    {
        return self::OPENAPI_MODEL_NAME;
    }

    #[Ignore]
    public static function getDiscriminator(): ?string
    {
        return self::DISCRIMINATOR;
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

    public function getStructure(): \Infobip\Model\WhatsAppTemplateStructureApiData
    {
        return $this->structure;
    }

    public function setStructure(\Infobip\Model\WhatsAppTemplateStructureApiData $structure): self
    {
        $this->structure = $structure;
        return $this;
    }
}
