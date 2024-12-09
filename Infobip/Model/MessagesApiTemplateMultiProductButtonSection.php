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

class MessagesApiTemplateMultiProductButtonSection
{
    /**
     * @param string[] $productIds
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(max: 24)]
        #[Assert\Length(min: 0)]
        protected string $title,
        #[Assert\NotBlank]
        protected array $productIds,
    ) {

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
     * @return string[]
     */
    public function getProductIds(): array
    {
        return $this->productIds;
    }

    /**
     * @param string[] $productIds An array of product-unique identifiers as defined in the catalog. If product retailer ID doesn't exist in your catalog, the product won't be displayed.
     */
    public function setProductIds(array $productIds): self
    {
        $this->productIds = $productIds;
        return $this;
    }
}
