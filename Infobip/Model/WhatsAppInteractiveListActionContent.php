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

class WhatsAppInteractiveListActionContent implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'WhatsAppInteractiveListActionContent';

    public const OPENAPI_FORMATS = [
        'title' => null,
        'sections' => null
    ];

    /**
     * @param \Infobip\Model\WhatsAppInteractiveListSectionContent[] $sections
     */
    public function __construct(
        #[Assert\NotBlank]
    #[Assert\Length(max: 20)]
    #[Assert\Length(min: 1)]

    protected string $title,
        #[Assert\NotBlank]
    #[Assert\Count(max: 10)]
    #[Assert\Count(min: 1)]

    protected array $sections,
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return \Infobip\Model\WhatsAppInteractiveListSectionContent[]
     */
    public function getSections(): array
    {
        return $this->sections;
    }

    /**
     * @param \Infobip\Model\WhatsAppInteractiveListSectionContent[] $sections Array of sections in the list.
     */
    public function setSections(array $sections): self
    {
        $this->sections = $sections;
        return $this;
    }
}
