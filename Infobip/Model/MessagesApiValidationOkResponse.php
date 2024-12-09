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

class MessagesApiValidationOkResponse
{
    /**
     * @param \Infobip\Model\ApiErrorViolation[] $skippableViolations
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $description,
        #[Assert\NotBlank]
        protected string $action,
        protected ?array $skippableViolations = null,
    ) {

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
     * @return \Infobip\Model\ApiErrorViolation[]|null
     */
    public function getSkippableViolations(): ?array
    {
        return $this->skippableViolations;
    }

    /**
     * @param \Infobip\Model\ApiErrorViolation[]|null $skippableViolations List of violations that may be omitted, but is recommended to address.
     */
    public function setSkippableViolations(?array $skippableViolations): self
    {
        $this->skippableViolations = $skippableViolations;
        return $this;
    }
}
