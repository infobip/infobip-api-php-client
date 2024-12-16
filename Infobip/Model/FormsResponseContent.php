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

use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints as Assert;

class FormsResponseContent
{
    /**
     * @param \Infobip\Model\FormsElement[] $elements
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $id,
        #[Assert\NotBlank]
        protected string $name,
        #[Assert\NotBlank]
        protected array $elements,
        #[Assert\NotBlank]
        protected bool $resubmitEnabled,
        #[Assert\NotBlank]
        protected string $formType,
        #[Assert\NotBlank]
        protected string $formStatus,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $createdAt = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $updatedAt = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\FormsActionAfterSubmission $actionAfterSubmission = null,
    ) {

    }


    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
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

    /**
     * @return \Infobip\Model\FormsElement[]
     */
    public function getElements(): array
    {
        return $this->elements;
    }

    /**
     * @param \Infobip\Model\FormsElement[] $elements List of form fields
     */
    public function setElements(array $elements): self
    {
        $this->elements = $elements;
        return $this;
    }

    public function getCreatedAt(): \DateTime|null
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): \DateTime|null
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getActionAfterSubmission(): \Infobip\Model\FormsActionAfterSubmission|null
    {
        return $this->actionAfterSubmission;
    }

    public function setActionAfterSubmission(?\Infobip\Model\FormsActionAfterSubmission $actionAfterSubmission): self
    {
        $this->actionAfterSubmission = $actionAfterSubmission;
        return $this;
    }

    public function getResubmitEnabled(): bool
    {
        return $this->resubmitEnabled;
    }

    public function setResubmitEnabled(bool $resubmitEnabled): self
    {
        $this->resubmitEnabled = $resubmitEnabled;
        return $this;
    }

    public function getFormType(): mixed
    {
        return $this->formType;
    }

    public function setFormType($formType): self
    {
        $this->formType = $formType;
        return $this;
    }

    public function getFormStatus(): mixed
    {
        return $this->formStatus;
    }

    public function setFormStatus($formStatus): self
    {
        $this->formStatus = $formStatus;
        return $this;
    }
}
