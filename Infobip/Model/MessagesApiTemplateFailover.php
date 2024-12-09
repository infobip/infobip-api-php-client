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

class MessagesApiTemplateFailover implements MessagesApiBaseFailover
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $channel,
        #[Assert\NotBlank]
        protected string $sender,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\MessagesApiTemplate $template,
        #[Assert\Valid]
        protected ?\Infobip\Model\MessagesApiTemplateMessageContent $content = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\ValidityPeriod $validityPeriod = null,
    ) {

    }


    public function getChannel(): mixed
    {
        return $this->channel;
    }

    public function setChannel($channel): self
    {
        $this->channel = $channel;
        return $this;
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    public function getTemplate(): \Infobip\Model\MessagesApiTemplate
    {
        return $this->template;
    }

    public function setTemplate(\Infobip\Model\MessagesApiTemplate $template): self
    {
        $this->template = $template;
        return $this;
    }

    public function getContent(): \Infobip\Model\MessagesApiTemplateMessageContent|null
    {
        return $this->content;
    }

    public function setContent(?\Infobip\Model\MessagesApiTemplateMessageContent $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getValidityPeriod(): \Infobip\Model\ValidityPeriod|null
    {
        return $this->validityPeriod;
    }

    public function setValidityPeriod(?\Infobip\Model\ValidityPeriod $validityPeriod): self
    {
        $this->validityPeriod = $validityPeriod;
        return $this;
    }
}
