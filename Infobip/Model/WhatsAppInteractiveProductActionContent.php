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

class WhatsAppInteractiveProductActionContent
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $catalogId,
        #[Assert\NotBlank]
        protected string $productRetailerId,
    ) {

    }


    public function getCatalogId(): string
    {
        return $this->catalogId;
    }

    public function setCatalogId(string $catalogId): self
    {
        $this->catalogId = $catalogId;
        return $this;
    }

    public function getProductRetailerId(): string
    {
        return $this->productRetailerId;
    }

    public function setProductRetailerId(string $productRetailerId): self
    {
        $this->productRetailerId = $productRetailerId;
        return $this;
    }
}
