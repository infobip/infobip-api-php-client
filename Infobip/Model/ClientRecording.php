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


class ClientRecording
{
    /**
     * @param \Infobip\Model\WebRtcFile[] $composedFiles
     * @param \Infobip\Model\WebRtcFileRecording[] $callRecordings
     */
    public function __construct(
        protected ?array $composedFiles = null,
        protected ?array $callRecordings = null,
    ) {

    }


    /**
     * @return \Infobip\Model\WebRtcFile[]|null
     */
    public function getComposedFiles(): ?array
    {
        return $this->composedFiles;
    }

    /**
     * @param \Infobip\Model\WebRtcFile[]|null $composedFiles List of composed files.
     */
    public function setComposedFiles(?array $composedFiles): self
    {
        $this->composedFiles = $composedFiles;
        return $this;
    }

    /**
     * @return \Infobip\Model\WebRtcFileRecording[]|null
     */
    public function getCallRecordings(): ?array
    {
        return $this->callRecordings;
    }

    /**
     * @param \Infobip\Model\WebRtcFileRecording[]|null $callRecordings List of call recordings.
     */
    public function setCallRecordings(?array $callRecordings): self
    {
        $this->callRecordings = $callRecordings;
        return $this;
    }
}
