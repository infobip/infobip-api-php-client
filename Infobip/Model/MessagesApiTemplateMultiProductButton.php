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

class MessagesApiTemplateMultiProductButton extends MessagesApiTemplateButton
{
    public const TYPE = 'MULTI_PRODUCT';

    /**
     * @param \Infobip\Model\MessagesApiTemplateMultiProductButtonSection[] $sections
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Count(max: 10)]
        #[Assert\Count(min: 1)]
        protected array $sections,
        #[Assert\Length(max: 3000)]
        #[Assert\Length(min: 0)]
        protected ?string $productId = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getProductId(): string|null
    {
        return $this->productId;
    }

    public function setProductId(?string $productId): self
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @return \Infobip\Model\MessagesApiTemplateMultiProductButtonSection[]
     */
    public function getSections(): array
    {
        return $this->sections;
    }

    /**
     * @param \Infobip\Model\MessagesApiTemplateMultiProductButtonSection[] $sections An array of multi product sections.
     */
    public function setSections(array $sections): self
    {
        $this->sections = $sections;
        return $this;
    }
}
