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

class WhatsAppAuthenticationTemplateStructureApiData implements WhatsAppTemplateStructureApiData
{
    /**
     * @param \Infobip\Model\WhatsAppAuthenticationButtonApiData[] $buttons
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppAuthenticationBodyApiData $body,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppAuthenticationFooterApiData $footer,
        #[Assert\NotBlank]
        #[Assert\Count(max: 1)]
        #[Assert\Count(min: 1)]
        protected array $buttons,
    ) {

    }


    public function getBody(): \Infobip\Model\WhatsAppAuthenticationBodyApiData
    {
        return $this->body;
    }

    public function setBody(\Infobip\Model\WhatsAppAuthenticationBodyApiData $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function getFooter(): \Infobip\Model\WhatsAppAuthenticationFooterApiData
    {
        return $this->footer;
    }

    public function setFooter(\Infobip\Model\WhatsAppAuthenticationFooterApiData $footer): self
    {
        $this->footer = $footer;
        return $this;
    }

    /**
     * @return \Infobip\Model\WhatsAppAuthenticationButtonApiData[]
     */
    public function getButtons(): array
    {
        return $this->buttons;
    }

    /**
     * @param \Infobip\Model\WhatsAppAuthenticationButtonApiData[] $buttons Authentication template buttons. Has to be either a 'copy code'  button or 'one-tap' button.
     */
    public function setButtons(array $buttons): self
    {
        $this->buttons = $buttons;
        return $this;
    }
}
