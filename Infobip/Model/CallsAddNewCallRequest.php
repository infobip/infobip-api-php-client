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

class CallsAddNewCallRequest
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\CallsActionCallRequest $callRequest,
        protected ?bool $connectOnEarlyMedia = false,
        #[Assert\Valid]
        protected ?\Infobip\Model\RingbackGeneration $ringbackGeneration = null,
    ) {

    }


    public function getCallRequest(): \Infobip\Model\CallsActionCallRequest
    {
        return $this->callRequest;
    }

    public function setCallRequest(\Infobip\Model\CallsActionCallRequest $callRequest): self
    {
        $this->callRequest = $callRequest;
        return $this;
    }

    public function getConnectOnEarlyMedia(): bool|null
    {
        return $this->connectOnEarlyMedia;
    }

    public function setConnectOnEarlyMedia(?bool $connectOnEarlyMedia): self
    {
        $this->connectOnEarlyMedia = $connectOnEarlyMedia;
        return $this;
    }

    public function getRingbackGeneration(): \Infobip\Model\RingbackGeneration|null
    {
        return $this->ringbackGeneration;
    }

    public function setRingbackGeneration(?\Infobip\Model\RingbackGeneration $ringbackGeneration): self
    {
        $this->ringbackGeneration = $ringbackGeneration;
        return $this;
    }
}
