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


class CallsNumbers
{
    /**
     */
    public function __construct(
        protected ?string $number = null,
        protected ?string $numbers = null,
    ) {

    }


    public function getNumber(): string|null
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;
        return $this;
    }

    public function getNumbers(): string|null
    {
        return $this->numbers;
    }

    public function setNumbers(?string $numbers): self
    {
        $this->numbers = $numbers;
        return $this;
    }
}
