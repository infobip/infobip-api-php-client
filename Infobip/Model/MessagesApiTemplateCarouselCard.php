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

class MessagesApiTemplateCarouselCard
{
    /**
     * @param array<string,string> $body
     * @param \Infobip\Model\MessagesApiCarouselTemplateButton[] $buttons
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\MessagesApiTemplateCarouselCardHeader $header,
        protected ?array $body = null,
        protected ?array $buttons = null,
    ) {

    }


    public function getHeader(): \Infobip\Model\MessagesApiTemplateCarouselCardHeader
    {
        return $this->header;
    }

    public function setHeader(\Infobip\Model\MessagesApiTemplateCarouselCardHeader $header): self
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @return array<string,string>|null
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param array<string,string>|null $body Body of a card.
     */
    public function setBody(?array $body): self
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return \Infobip\Model\MessagesApiCarouselTemplateButton[]|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }

    /**
     * @param \Infobip\Model\MessagesApiCarouselTemplateButton[]|null $buttons List of buttons of a card.
     */
    public function setButtons(?array $buttons): self
    {
        $this->buttons = $buttons;
        return $this;
    }
}
