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

class ApiError
{
    /**
     * @param \Infobip\Model\ApiErrorViolation[] $violations
     * @param \Infobip\Model\ApiErrorResource[] $resources
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $errorCode,
        #[Assert\NotBlank]
        protected string $description,
        #[Assert\NotBlank]
        protected string $action,
        #[Assert\NotBlank]
        protected array $violations,
        #[Assert\NotBlank]
        protected array $resources,
    ) {

    }


    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    public function setErrorCode(string $errorCode): self
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return \Infobip\Model\ApiErrorViolation[]
     */
    public function getViolations(): array
    {
        return $this->violations;
    }

    /**
     * @param \Infobip\Model\ApiErrorViolation[] $violations List of violations that caused the error.
     */
    public function setViolations(array $violations): self
    {
        $this->violations = $violations;
        return $this;
    }

    /**
     * @return \Infobip\Model\ApiErrorResource[]
     */
    public function getResources(): array
    {
        return $this->resources;
    }

    /**
     * @param \Infobip\Model\ApiErrorResource[] $resources List of available resources to recover from the error.
     */
    public function setResources(array $resources): self
    {
        $this->resources = $resources;
        return $this;
    }
}
