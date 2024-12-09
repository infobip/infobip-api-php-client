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


class WebRtcCapabilities
{
    /**
     */
    public function __construct(
        protected ?string $recording = null,
    ) {

    }


    public function getRecording(): mixed
    {
        return $this->recording;
    }

    public function setRecording($recording): self
    {
        $this->recording = $recording;
        return $this;
    }
}
