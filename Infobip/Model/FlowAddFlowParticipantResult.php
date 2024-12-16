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

class FlowAddFlowParticipantResult
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\FlowPersonUniqueField $identifyBy,
        #[Assert\NotBlank]
        protected string $status,
        protected ?string $errorReason = null,
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

    public function getStatus(): mixed
    {
        return $this->status;
    }

    public function setStatus($status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getErrorReason(): mixed
    {
        return $this->errorReason;
    }

    public function setErrorReason($errorReason): self
    {
        $this->errorReason = $errorReason;
        return $this;
    }
}
