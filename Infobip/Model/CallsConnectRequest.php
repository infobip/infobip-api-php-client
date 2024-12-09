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

class CallsConnectRequest
{
    /**
     * @param string[] $callIds
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $callIds,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsActionConferenceRequest $conferenceRequest = null,
    ) {

    }


    /**
     * @return string[]
     */
    public function getCallIds(): array
    {
        return $this->callIds;
    }

    /**
     * @param string[] $callIds IDs of the calls to connect.
     */
    public function setCallIds(array $callIds): self
    {
        $this->callIds = $callIds;
        return $this;
    }

    public function getConferenceRequest(): \Infobip\Model\CallsActionConferenceRequest|null
    {
        return $this->conferenceRequest;
    }

    public function setConferenceRequest(?\Infobip\Model\CallsActionConferenceRequest $conferenceRequest): self
    {
        $this->conferenceRequest = $conferenceRequest;
        return $this;
    }
}
