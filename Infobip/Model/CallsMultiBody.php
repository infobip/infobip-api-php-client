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

class CallsMultiBody
{
    /**
     * @param \Infobip\Model\CallsMultiMessage[] $messages
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $messages,
    ) {

    }


    /**
     * @return \Infobip\Model\CallsMultiMessage[]
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param \Infobip\Model\CallsMultiMessage[] $messages Array of messages to be sent, one per every message.
     */
    public function setMessages(array $messages): self
    {
        $this->messages = $messages;
        return $this;
    }
}
