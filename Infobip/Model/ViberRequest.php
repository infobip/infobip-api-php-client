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

class ViberRequest
{
    /**
     * @param \Infobip\Model\ViberMessage[] $messages
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $messages,
        #[Assert\Valid]
        protected ?\Infobip\Model\ViberDefaultMessageRequestOptions $options = null,
    ) {

    }


    /**
     * @return \Infobip\Model\ViberMessage[]
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param \Infobip\Model\ViberMessage[] $messages An array of message objects of a single message or multiple messages sent under one bulk ID.
     */
    public function setMessages(array $messages): self
    {
        $this->messages = $messages;
        return $this;
    }

    public function getOptions(): \Infobip\Model\ViberDefaultMessageRequestOptions|null
    {
        return $this->options;
    }

    public function setOptions(?\Infobip\Model\ViberDefaultMessageRequestOptions $options): self
    {
        $this->options = $options;
        return $this;
    }
}
