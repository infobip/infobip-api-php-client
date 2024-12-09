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

class CallsGoTo implements CallsScriptOneOf
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected int $goTo,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsGoToOptions $options = null,
    ) {

    }


    public function getGoTo(): int
    {
        return $this->goTo;
    }

    public function setGoTo(int $goTo): self
    {
        $this->goTo = $goTo;
        return $this;
    }

    public function getOptions(): \Infobip\Model\CallsGoToOptions|null
    {
        return $this->options;
    }

    public function setOptions(?\Infobip\Model\CallsGoToOptions $options): self
    {
        $this->options = $options;
        return $this;
    }
}
