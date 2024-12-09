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
    "CATALOG" => "\Infobip\Model\MessagesApiTemplateCatalogButton",
    "COPY_CODE" => "\Infobip\Model\MessagesApiTemplateCopyCodeButton",
    "FLOW" => "\Infobip\Model\MessagesApiTemplateFlowButton",
    "MULTI_PRODUCT" => "\Infobip\Model\MessagesApiTemplateMultiProductButton",
    "OPEN_URL" => "\Infobip\Model\MessagesApiTemplateOpenUrlButton",
    "PHONE_NUMBER" => "\Infobip\Model\MessagesApiTemplatePhoneNumberButton",
    "QUICK_REPLY" => "\Infobip\Model\MessagesApiTemplateQuickReplyButton",
])]

class MessagesApiTemplateButton
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $type,
    ) {

    }


    public function getType(): mixed
    {
        return $this->type;
    }

    public function setType($type): self
    {
        $this->type = $type;
        return $this;
    }
}
