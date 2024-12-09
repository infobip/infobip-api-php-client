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

class WhatsAppTemplateOrderDetailsButtonContent extends WhatsAppTemplateButtonContent
{
    public const TYPE = 'ORDER_DETAILS';

    /**
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppTemplateOrderDetailsActionContent $action,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getAction(): \Infobip\Model\WhatsAppTemplateOrderDetailsActionContent
    {
        return $this->action;
    }

    public function setAction(\Infobip\Model\WhatsAppTemplateOrderDetailsActionContent $action): self
    {
        $this->action = $action;
        return $this;
    }
}
