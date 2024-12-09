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

use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

#[DiscriminatorMap(typeProperty: "format", mapping: [
    "DOCUMENT" => "\Infobip\Model\WhatsAppDocumentHeaderApiData",
    "IMAGE" => "\Infobip\Model\WhatsAppImageHeaderApiData",
    "LOCATION" => "\Infobip\Model\WhatsAppLocationHeaderApiData",
    "TEXT" => "\Infobip\Model\WhatsAppTextHeaderApiData",
    "VIDEO" => "\Infobip\Model\WhatsAppVideoHeaderApiData",
])]

class WhatsAppHeaderApiData
{
    /**
     */
    public function __construct(
        protected ?string $format = null,
    ) {

    }


    public function getFormat(): mixed
    {
        return $this->format;
    }

    public function setFormat($format): self
    {
        $this->format = $format;
        return $this;
    }
}
