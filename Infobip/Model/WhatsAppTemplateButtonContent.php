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
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

#[DiscriminatorMap(typeProperty: "type", mapping: [
    "CATALOG" => "\Infobip\Model\WhatsAppTemplateCatalogButtonContent",
    "COPY_CODE" => "\Infobip\Model\WhatsAppTemplateCopyCodeButtonContent",
    "FLOW" => "\Infobip\Model\WhatsAppTemplateFlowButtonContent",
    "MULTI_PRODUCT" => "\Infobip\Model\WhatsAppTemplateMultiProductButtonContent",
    "ORDER_DETAILS" => "\Infobip\Model\WhatsAppTemplateOrderDetailsButtonContent",
    "QUICK_REPLY" => "\Infobip\Model\WhatsAppTemplateQuickReplyButtonContent",
    "URL" => "\Infobip\Model\WhatsAppTemplateUrlButtonContent",
])]

class WhatsAppTemplateButtonContent
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $type,
    ) {

    }


    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }
}
