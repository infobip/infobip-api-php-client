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

class FormsValidationRules
{
    /**
     * @param string[] $forbiddenSymbols
     */
    public function __construct(
        protected ?string $datePattern = null,
        protected ?int $maxLength = null,
        protected ?string $maxValue = null,
        protected ?string $minValue = null,
        protected ?string $pattern = null,
        protected ?string $sample = null,
        protected ?array $forbiddenSymbols = null,
    ) {

    }


    public function getDatePattern(): string|null
    {
        return $this->datePattern;
    }

    public function setDatePattern(?string $datePattern): self
    {
        $this->datePattern = $datePattern;
        return $this;
    }

    public function getMaxLength(): int|null
    {
        return $this->maxLength;
    }

    public function setMaxLength(?int $maxLength): self
    {
        $this->maxLength = $maxLength;
        return $this;
    }

    public function getMaxValue(): string|null
    {
        return $this->maxValue;
    }

    public function setMaxValue(?string $maxValue): self
    {
        $this->maxValue = $maxValue;
        return $this;
    }

    public function getMinValue(): string|null
    {
        return $this->minValue;
    }

    public function setMinValue(?string $minValue): self
    {
        $this->minValue = $minValue;
        return $this;
    }

    public function getPattern(): string|null
    {
        return $this->pattern;
    }

    public function setPattern(?string $pattern): self
    {
        $this->pattern = $pattern;
        return $this;
    }

    public function getSample(): string|null
    {
        return $this->sample;
    }

    public function setSample(?string $sample): self
    {
        $this->sample = $sample;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getForbiddenSymbols(): ?array
    {
        return $this->forbiddenSymbols;
    }

    /**
     * @param string[]|null $forbiddenSymbols forbiddenSymbols
     */
    public function setForbiddenSymbols(?array $forbiddenSymbols): self
    {
        $this->forbiddenSymbols = $forbiddenSymbols;
        return $this;
    }
}
