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

class WhatsAppInteractiveOrderDetailsDiscount
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppInteractiveOrderDetailsDescriptiveAmount $amount,
        #[Assert\Length(max: 60)]
        #[Assert\Length(min: 0)]
        protected ?string $programName = null,
    ) {

    }


    public function getAmount(): \Infobip\Model\WhatsAppInteractiveOrderDetailsDescriptiveAmount
    {
        return $this->amount;
    }

    public function setAmount(\Infobip\Model\WhatsAppInteractiveOrderDetailsDescriptiveAmount $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function getProgramName(): string|null
    {
        return $this->programName;
    }

    public function setProgramName(?string $programName): self
    {
        $this->programName = $programName;
        return $this;
    }
}
