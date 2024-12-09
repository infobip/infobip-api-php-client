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

class SmsRequest
{
    /**
     * @param \Infobip\Model\SmsMessage[] $messages
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $messages,
        #[Assert\Valid]
        protected ?\Infobip\Model\SmsMessageRequestOptions $options = null,
    ) {

    }


    /**
     * @return \Infobip\Model\SmsMessage[]
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param \Infobip\Model\SmsMessage[] $messages An array of message objects of a single message or multiple messages sent under one bulk ID.
     */
    public function setMessages(array $messages): self
    {
        $this->messages = $messages;
        return $this;
    }

    public function getOptions(): \Infobip\Model\SmsMessageRequestOptions|null
    {
        return $this->options;
    }

    public function setOptions(?\Infobip\Model\SmsMessageRequestOptions $options): self
    {
        $this->options = $options;
        return $this;
    }
}
