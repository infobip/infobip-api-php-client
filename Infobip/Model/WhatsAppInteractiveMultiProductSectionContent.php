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

class WhatsAppInteractiveMultiProductSectionContent
{
    /**
     * @param string[] $productRetailerIds
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $productRetailerIds,
        #[Assert\Length(max: 24)]
        #[Assert\Length(min: 0)]
        protected ?string $title = null,
    ) {

    }


    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getProductRetailerIds(): array
    {
        return $this->productRetailerIds;
    }

    /**
     * @param string[] $productRetailerIds An array of product-unique identifiers as defined in the [catalog](https://www.infobip.com/docs/whatsapp/manage-connection#manage-catalog). If product retailer ID doesn't exist in your catalog, the product won't be displayed.
     */
    public function setProductRetailerIds(array $productRetailerIds): self
    {
        $this->productRetailerIds = $productRetailerIds;
        return $this;
    }
}
