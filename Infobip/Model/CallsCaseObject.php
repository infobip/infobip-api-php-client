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

class CallsCaseObject
{
    /**
     * @param object[] $default
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $default,
    ) {

    }


    /**
     * @return object[]
     */
    public function getDefault(): array
    {
        return $this->default;
    }

    /**
     * @param object[] $default Array of actions to execute if none of the conditions above are met.
     */
    public function setDefault(array $default): self
    {
        $this->default = $default;
        return $this;
    }
}
