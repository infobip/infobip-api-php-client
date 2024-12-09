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

class CallsGoToOptions
{
    /**
     */
    public function __construct(
        #[Assert\LessThanOrEqual(100)]
        #[Assert\GreaterThanOrEqual(1)]
        protected ?int $goToLimit = null,
        protected ?string $countVariable = null,
    ) {

    }


    public function getGoToLimit(): int|null
    {
        return $this->goToLimit;
    }

    public function setGoToLimit(?int $goToLimit): self
    {
        $this->goToLimit = $goToLimit;
        return $this;
    }

    public function getCountVariable(): string|null
    {
        return $this->countVariable;
    }

    public function setCountVariable(?string $countVariable): self
    {
        $this->countVariable = $countVariable;
        return $this;
    }
}
