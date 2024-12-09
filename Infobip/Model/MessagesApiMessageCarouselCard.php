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

class MessagesApiMessageCarouselCard
{
    /**
     * @param \Infobip\Model\MessagesApiMessageButton[] $buttons
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\MessagesApiMessageCarouselCardBody $body,
        protected ?array $buttons = null,
    ) {

    }


    public function getBody(): \Infobip\Model\MessagesApiMessageCarouselCardBody
    {
        return $this->body;
    }

    public function setBody(\Infobip\Model\MessagesApiMessageCarouselCardBody $body): self
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
     * @param \Infobip\Model\MessagesApiMessageButton[]|null $buttons List of buttons of a card.
     */
    public function setButtons(?array $buttons): self
    {
        $this->buttons = $buttons;
        return $this;
    }
}
