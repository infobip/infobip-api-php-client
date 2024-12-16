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

class FormsElementOption
{
    /**
     * @param array<string,string> $additionalConfiguration
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $name,
        #[Assert\NotBlank]
        protected string $value,
        protected ?array $additionalConfiguration = null,
    ) {

    }


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return array<string,string>|null
     */
    public function getAdditionalConfiguration()
    {
        return $this->additionalConfiguration;
    }

    /**
     * @param array<string,string>|null $additionalConfiguration additionalConfiguration
     */
    public function setAdditionalConfiguration(?array $additionalConfiguration): self
    {
        $this->additionalConfiguration = $additionalConfiguration;
        return $this;
    }
}
