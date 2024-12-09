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

class CallsPause implements CallsScriptOneOf
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\LessThanOrEqual(5.0)]
        #[Assert\GreaterThanOrEqual(0.0)]
        protected float $pause,
        protected ?int $actionId = null,
    ) {

    }


    public function getPause(): float
    {
        return $this->pause;
    }

    public function setPause(float $pause): self
    {
        $this->pause = $pause;
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
