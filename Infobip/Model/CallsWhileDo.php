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

class CallsWhileDo implements CallsScriptOneOf
{
    /**
     * @param object[] $do
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $while,
        #[Assert\NotBlank]
        protected array $do,
    ) {

    }


    public function getWhile(): string
    {
        return $this->while;
    }

    public function setWhile(string $while): self
    {
        $this->while = $while;
        return $this;
    }

    /**
     * @return object[]
     */
    public function getDo(): array
    {
        return $this->do;
    }

    /**
     * @param object[] $do Array of actions to execute if none of the conditions above are met.
     */
    public function setDo(array $do): self
    {
        $this->do = $do;
        return $this;
    }
}
