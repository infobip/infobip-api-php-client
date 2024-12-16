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

class FormsResponse
{
    /**
     * @param \Infobip\Model\FormsResponseContent[] $forms
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $forms,
        protected ?int $offset = null,
        protected ?int $limit = null,
        protected ?int $total = null,
    ) {

    }


    /**
     * @return \Infobip\Model\FormsResponseContent[]
     */
    public function getForms(): array
    {
        return $this->forms;
    }

    /**
     * @param \Infobip\Model\FormsResponseContent[] $forms Forms list
     */
    public function setForms(array $forms): self
    {
        $this->forms = $forms;
        return $this;
    }

    public function getOffset(): int|null
    {
        return $this->offset;
    }

    public function setOffset(?int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    public function getLimit(): int|null
    {
        return $this->limit;
    }

    public function setLimit(?int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    public function getTotal(): int|null
    {
        return $this->total;
    }

    public function setTotal(?int $total): self
    {
        $this->total = $total;
        return $this;
    }
}
