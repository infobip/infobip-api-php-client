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

class FlowParticipant
{
    /**
     * @param array<string,mixed> $variables
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\FlowPersonUniqueField $identifyBy,
        protected ?array $variables = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\FlowPerson $person = null,
    ) {

    }


    public function getIdentifyBy(): \Infobip\Model\FlowPersonUniqueField
    {
        return $this->identifyBy;
    }

    public function setIdentifyBy(\Infobip\Model\FlowPersonUniqueField $identifyBy): self
    {
        $this->identifyBy = $identifyBy;
        return $this;
    }

    /**
     * @return array<string,mixed>|null
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * @param array<string,mixed>|null $variables Flow variables to assign to the participant when it is added to the flow.
     */
    public function setVariables(?array $variables): self
    {
        $this->variables = $variables;
        return $this;
    }

    public function getPerson(): \Infobip\Model\FlowPerson|null
    {
        return $this->person;
    }

    public function setPerson(?\Infobip\Model\FlowPerson $person): self
    {
        $this->person = $person;
        return $this;
    }
}
