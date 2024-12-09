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

#[DiscriminatorMap(typeProperty: "command", mapping: [
    "audio" => "\Infobip\Model\CallsAudioCallbackResponse",
    "captureDtmf" => "\Infobip\Model\CallsCaptureDtmfCallbackResponse",
    "dial" => "\Infobip\Model\CallsDialCallbackResponse",
])]

class CallbackResponse
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $command,
    ) {

    }


    public function getCommand(): string
    {
        return $this->command;
    }

    public function setCommand(string $command): self
    {
        $this->command = $command;
        return $this;
    }
}
