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

class CallsIfThenElse implements CallsScriptOneOf
{
    /**
     * @param object[] $then
     * @param object[] $else
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $if,
        protected ?array $then = null,
        protected ?array $else = null,
        protected ?int $actionId = null,
    ) {

    }


    public function getIf(): string
    {
        return $this->if;
    }

    public function setIf(string $if): self
    {
        $this->if = $if;
        return $this;
    }

    /**
     * @return object[]|null
     */
    public function getThen(): ?array
    {
        return $this->then;
    }

    /**
     * @param object[]|null $then The actions to execute if condition is evaluated to true.
     */
    public function setThen(?array $then): self
    {
        $this->then = $then;
        return $this;
    }

    /**
     * @return object[]|null
     */
    public function getElse(): ?array
    {
        return $this->else;
    }

    /**
     * @param object[]|null $else The actions to execute if condition is evaluated to false.
     */
    public function setElse(?array $else): self
    {
        $this->else = $else;
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
