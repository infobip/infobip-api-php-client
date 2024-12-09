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

class WhatsAppCardApiData
{
    /**
     * @param \Infobip\Model\WhatsAppButtonApiData[] $buttons
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppHeaderApiData $header,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppBodyApiData $body,
        #[Assert\NotBlank]
        #[Assert\Count(max: 2)]
        #[Assert\Count(min: 1)]
        protected array $buttons,
    ) {

    }


    public function getHeader(): \Infobip\Model\WhatsAppHeaderApiData
    {
        return $this->header;
    }

    public function setHeader(\Infobip\Model\WhatsAppHeaderApiData $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function getBody(): \Infobip\Model\WhatsAppBodyApiData
    {
        return $this->body;
    }

    public function setBody(\Infobip\Model\WhatsAppBodyApiData $body): self
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return \Infobip\Model\WhatsAppButtonApiData[]
     */
    public function getButtons(): array
    {
        return $this->buttons;
    }

    /**
     * @param \Infobip\Model\WhatsAppButtonApiData[] $buttons Card buttons. Can contain 1 to 2 buttons.
     */
    public function setButtons(array $buttons): self
    {
        $this->buttons = $buttons;
        return $this;
    }
}
