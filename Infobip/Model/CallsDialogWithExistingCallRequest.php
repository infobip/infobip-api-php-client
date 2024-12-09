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

class CallsDialogWithExistingCallRequest
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsDialogRecordingRequest $recording = null,
        protected ?int $maxDuration = 28800,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsDialogPropagationOptions $propagationOptions = null,
    ) {

    }


    public function getRecording(): \Infobip\Model\CallsDialogRecordingRequest|null
    {
        return $this->recording;
    }

    public function setRecording(?\Infobip\Model\CallsDialogRecordingRequest $recording): self
    {
        $this->recording = $recording;
        return $this;
    }

    public function getMaxDuration(): int|null
    {
        return $this->maxDuration;
    }

    public function setMaxDuration(?int $maxDuration): self
    {
        $this->maxDuration = $maxDuration;
        return $this;
    }

    public function getPropagationOptions(): \Infobip\Model\CallsDialogPropagationOptions|null
    {
        return $this->propagationOptions;
    }

    public function setPropagationOptions(?\Infobip\Model\CallsDialogPropagationOptions $propagationOptions): self
    {
        $this->propagationOptions = $propagationOptions;
        return $this;
    }
}
