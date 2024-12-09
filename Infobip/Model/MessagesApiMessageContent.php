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

class MessagesApiMessageContent
{
    /**
     * @param \Infobip\Model\MessagesApiMessageButton[] $buttons
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\MessagesApiMessageBody $body,
        #[Assert\Valid]
        protected ?\Infobip\Model\MessagesApiMessageHeader $header = null,
        protected ?array $buttons = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\MessagesApiMessageConfirmationBody $confirmationBody = null,
    ) {

    }


    public function getHeader(): \Infobip\Model\MessagesApiMessageHeader|null
    {
        return $this->header;
    }

    public function setHeader(?\Infobip\Model\MessagesApiMessageHeader $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function getBody(): \Infobip\Model\MessagesApiMessageBody
    {
        return $this->body;
    }

    public function setBody(\Infobip\Model\MessagesApiMessageBody $body): self
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return \Infobip\Model\MessagesApiMessageButton[]|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }

    /**
     * @param \Infobip\Model\MessagesApiMessageButton[]|null $buttons List of buttons for the message.
     */
    public function setButtons(?array $buttons): self
    {
        $this->buttons = $buttons;
        return $this;
    }

    public function getConfirmationBody(): \Infobip\Model\MessagesApiMessageConfirmationBody|null
    {
        return $this->confirmationBody;
    }

    public function setConfirmationBody(?\Infobip\Model\MessagesApiMessageConfirmationBody $confirmationBody): self
    {
        $this->confirmationBody = $confirmationBody;
        return $this;
    }
}
