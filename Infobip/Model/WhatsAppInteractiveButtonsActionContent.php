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

class WhatsAppInteractiveButtonsActionContent
{
    /**
     * @param \Infobip\Model\WhatsAppInteractiveButtonContent[] $buttons
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Count(max: 3)]
        #[Assert\Count(min: 1)]
        protected array $buttons,
    ) {

    }


    /**
     * @return \Infobip\Model\WhatsAppInteractiveButtonContent[]
     */
    public function getButtons(): array
    {
        return $this->buttons;
    }

    /**
     * @param \Infobip\Model\WhatsAppInteractiveButtonContent[] $buttons An array of buttons sent in a message. It can have up to three buttons.
     */
    public function setButtons(array $buttons): self
    {
        $this->buttons = $buttons;
        return $this;
    }
}
