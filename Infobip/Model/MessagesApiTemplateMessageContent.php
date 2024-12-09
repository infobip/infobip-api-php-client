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

class MessagesApiTemplateMessageContent
{
    /**
     * @param \Infobip\Model\MessagesApiTemplateButton[] $buttons
     */
    public function __construct(
        #[Assert\Valid]
        protected ?\Infobip\Model\MessagesApiTemplateHeader $header = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\MessagesApiTemplateBody $body = null,
        protected ?array $buttons = null,
        protected ?string $expirationTime = null,
    ) {

    }


    public function getHeader(): \Infobip\Model\MessagesApiTemplateHeader|null
    {
        return $this->header;
    }

    public function setHeader(?\Infobip\Model\MessagesApiTemplateHeader $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function getBody(): \Infobip\Model\MessagesApiTemplateBody|null
    {
        return $this->body;
    }

    public function setBody(?\Infobip\Model\MessagesApiTemplateBody $body): self
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return \Infobip\Model\MessagesApiTemplateButton[]|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }

    /**
     * @param \Infobip\Model\MessagesApiTemplateButton[]|null $buttons List of buttons of a template message.
     */
    public function setButtons(?array $buttons): self
    {
        $this->buttons = $buttons;
        return $this;
    }

    public function getExpirationTime(): string|null
    {
        return $this->expirationTime;
    }

    public function setExpirationTime(?string $expirationTime): self
    {
        $this->expirationTime = $expirationTime;
        return $this;
    }
}
