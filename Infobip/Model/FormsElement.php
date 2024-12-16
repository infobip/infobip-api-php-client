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

class FormsElement
{
    /**
     * @param array<string,string> $additionalConfiguration
     * @param \Infobip\Model\FormsElementOption[] $options
     * @param array<string,string> $validationMessages
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $component,
        protected ?string $fieldId = null,
        protected ?string $personField = null,
        protected ?string $label = null,
        protected ?bool $isRequired = null,
        protected ?bool $isHidden = null,
        protected ?array $additionalConfiguration = null,
        protected ?string $textContent = null,
        protected ?array $options = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\FormsValidationRules $validationRules = null,
        protected ?string $placeholder = null,
        protected ?string $checkboxText = null,
        protected ?array $validationMessages = null,
    ) {

    }


    public function getComponent(): mixed
    {
        return $this->component;
    }

    public function setComponent($component): self
    {
        $this->component = $component;
        return $this;
    }

    public function getFieldId(): string|null
    {
        return $this->fieldId;
    }

    public function setFieldId(?string $fieldId): self
    {
        $this->fieldId = $fieldId;
        return $this;
    }

    public function getPersonField(): string|null
    {
        return $this->personField;
    }

    public function setPersonField(?string $personField): self
    {
        $this->personField = $personField;
        return $this;
    }

    public function getLabel(): string|null
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;
        return $this;
    }

    public function getIsRequired(): bool|null
    {
        return $this->isRequired;
    }

    public function setIsRequired(?bool $isRequired): self
    {
        $this->isRequired = $isRequired;
        return $this;
    }

    public function getIsHidden(): bool|null
    {
        return $this->isHidden;
    }

    public function setIsHidden(?bool $isHidden): self
    {
        $this->isHidden = $isHidden;
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

    public function getTextContent(): string|null
    {
        return $this->textContent;
    }

    public function setTextContent(?string $textContent): self
    {
        $this->textContent = $textContent;
        return $this;
    }

    /**
     * @return \Infobip\Model\FormsElementOption[]|null
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * @param \Infobip\Model\FormsElementOption[]|null $options options
     */
    public function setOptions(?array $options): self
    {
        $this->options = $options;
        return $this;
    }

    public function getValidationRules(): \Infobip\Model\FormsValidationRules|null
    {
        return $this->validationRules;
    }

    public function setValidationRules(?\Infobip\Model\FormsValidationRules $validationRules): self
    {
        $this->validationRules = $validationRules;
        return $this;
    }

    public function getPlaceholder(): string|null
    {
        return $this->placeholder;
    }

    public function setPlaceholder(?string $placeholder): self
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    public function getCheckboxText(): string|null
    {
        return $this->checkboxText;
    }

    public function setCheckboxText(?string $checkboxText): self
    {
        $this->checkboxText = $checkboxText;
        return $this;
    }

    /**
     * @return array<string,string>|null
     */
    public function getValidationMessages()
    {
        return $this->validationMessages;
    }

    /**
     * @param array<string,string>|null $validationMessages validationMessages
     */
    public function setValidationMessages(?array $validationMessages): self
    {
        $this->validationMessages = $validationMessages;
        return $this;
    }
}
