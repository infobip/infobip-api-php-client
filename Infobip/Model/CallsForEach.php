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

class CallsForEach implements CallsScriptOneOf
{
    /**
     * @param object[] $do
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $forEach,
        #[Assert\NotBlank]
        protected string $in,
        #[Assert\NotBlank]
        protected array $do,
        protected ?string $delimiter = null,
    ) {

    }


    public function getForEach(): string
    {
        return $this->forEach;
    }

    public function setForEach(string $forEach): self
    {
        $this->forEach = $forEach;
        return $this;
    }

    public function getIn(): string
    {
        return $this->in;
    }

    public function setIn(string $in): self
    {
        $this->in = $in;
        return $this;
    }

    public function getDelimiter(): string|null
    {
        return $this->delimiter;
    }

    public function setDelimiter(?string $delimiter): self
    {
        $this->delimiter = $delimiter;
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
     * @param object[] $do Array of actions to execute.
     */
    public function setDo(array $do): self
    {
        $this->do = $do;
        return $this;
    }
}
