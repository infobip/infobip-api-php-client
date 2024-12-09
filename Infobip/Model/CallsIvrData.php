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


class CallsIvrData
{
    /**
     */
    public function __construct(
        protected ?string $scenarioId = null,
        protected ?string $scenarioName = null,
        protected ?string $collectedDtmfs = null,
        protected ?string $collectedMappedDtmfs = null,
        protected ?string $spokenInput = null,
        protected ?string $matchedSpokenInput = null,
    ) {

    }


    public function getScenarioId(): string|null
    {
        return $this->scenarioId;
    }

    public function setScenarioId(?string $scenarioId): self
    {
        $this->scenarioId = $scenarioId;
        return $this;
    }

    public function getScenarioName(): string|null
    {
        return $this->scenarioName;
    }

    public function setScenarioName(?string $scenarioName): self
    {
        $this->scenarioName = $scenarioName;
        return $this;
    }

    public function getCollectedDtmfs(): string|null
    {
        return $this->collectedDtmfs;
    }

    public function setCollectedDtmfs(?string $collectedDtmfs): self
    {
        $this->collectedDtmfs = $collectedDtmfs;
        return $this;
    }

    public function getCollectedMappedDtmfs(): string|null
    {
        return $this->collectedMappedDtmfs;
    }

    public function setCollectedMappedDtmfs(?string $collectedMappedDtmfs): self
    {
        $this->collectedMappedDtmfs = $collectedMappedDtmfs;
        return $this;
    }

    public function getSpokenInput(): string|null
    {
        return $this->spokenInput;
    }

    public function setSpokenInput(?string $spokenInput): self
    {
        $this->spokenInput = $spokenInput;
        return $this;
    }

    public function getMatchedSpokenInput(): string|null
    {
        return $this->matchedSpokenInput;
    }

    public function setMatchedSpokenInput(?string $matchedSpokenInput): self
    {
        $this->matchedSpokenInput = $matchedSpokenInput;
        return $this;
    }
}
