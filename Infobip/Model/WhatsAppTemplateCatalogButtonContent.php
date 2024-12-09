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

class WhatsAppTemplateCatalogButtonContent extends WhatsAppTemplateButtonContent
{
    public const TYPE = 'CATALOG';

    /**
     */
    public function __construct(
        #[Assert\Length(max: 3000)]
        #[Assert\Length(min: 0)]
        protected ?string $thumbnailProductRetailerId = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getThumbnailProductRetailerId(): string|null
    {
        return $this->thumbnailProductRetailerId;
    }

    public function setThumbnailProductRetailerId(?string $thumbnailProductRetailerId): self
    {
        $this->thumbnailProductRetailerId = $thumbnailProductRetailerId;
        return $this;
    }
}
