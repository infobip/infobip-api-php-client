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

class WebRtcFileRecording
{
    /**
     */
    public function __construct(
        protected ?string $callId = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcFile $file = null,
    ) {

    }


    public function getCallId(): string|null
    {
        return $this->callId;
    }

    public function setCallId(?string $callId): self
    {
        $this->callId = $callId;
        return $this;
    }

    public function getFile(): \Infobip\Model\WebRtcFile|null
    {
        return $this->file;
    }

    public function setFile(?\Infobip\Model\WebRtcFile $file): self
    {
        $this->file = $file;
        return $this;
    }
}
