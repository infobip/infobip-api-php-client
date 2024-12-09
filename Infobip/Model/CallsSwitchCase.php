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

class CallsSwitchCase implements CallsScriptOneOf
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $switch,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\CallsCaseObject $case,
        protected ?int $actionId = null,
    ) {

    }


    public function getSwitch(): string
    {
        return $this->switch;
    }

    public function setSwitch(string $switch): self
    {
        $this->switch = $switch;
        return $this;
    }

    public function getCase(): \Infobip\Model\CallsCaseObject
    {
        return $this->case;
    }

    public function setCase(\Infobip\Model\CallsCaseObject $case): self
    {
        $this->case = $case;
        return $this;
    }

    public function getActionId(): int|null
    {
        return $this->actionId;
    }

    public function setActionId(?int $actionId): self
    {
        $this->actionId = $actionId;
        return $this;
    }
}
