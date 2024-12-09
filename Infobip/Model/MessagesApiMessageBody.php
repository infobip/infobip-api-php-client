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
    "AUTHENTICATION_REQUEST" => "\Infobip\Model\MessagesApiMessageAuthenticationRequestBody",
    "CAROUSEL" => "\Infobip\Model\MessagesApiMessageCarouselBody",
    "CONTACT" => "\Infobip\Model\MessagesApiMessageContactBody",
    "DOCUMENT" => "\Infobip\Model\MessagesApiMessageDocumentBody",
    "IMAGE" => "\Infobip\Model\MessagesApiMessageImageBody",
    "LIST" => "\Infobip\Model\MessagesApiMessageListBody",
    "LOCATION" => "\Infobip\Model\MessagesApiMessageLocationBody",
    "RICH_LINK" => "\Infobip\Model\MessagesApiMessageRichLinkBody",
    "STICKER" => "\Infobip\Model\MessagesApiMessageStickerBody",
    "TEXT" => "\Infobip\Model\MessagesApiMessageTextBody",
    "VIDEO" => "\Infobip\Model\MessagesApiMessageVideoBody",
])]

class MessagesApiMessageBody
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
