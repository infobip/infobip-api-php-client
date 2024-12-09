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


class CallsConferenceRecordingLog
{
    /**
     * @param \Infobip\Model\CallsRecordingFile[] $composedFiles
     * @param \Infobip\Model\CallRecording[] $callRecordings
     */
    public function __construct(
        protected ?array $composedFiles = null,
        protected ?array $callRecordings = null,
    ) {

    }


    /**
     * @return \Infobip\Model\CallsRecordingFile[]|null
     */
    public function getComposedFiles(): ?array
    {
        return $this->composedFiles;
    }

    /**
     * @param \Infobip\Model\CallsRecordingFile[]|null $composedFiles File(s) with a recording of all conference participants.
     */
    public function setComposedFiles(?array $composedFiles): self
    {
        $this->composedFiles = $composedFiles;
        return $this;
    }

    /**
     * @return \Infobip\Model\CallRecording[]|null
     */
    public function getCallRecordings(): ?array
    {
        return $this->callRecordings;
    }

    /**
     * @param \Infobip\Model\CallRecording[]|null $callRecordings File(s) with a recording of one conference participant.
     */
    public function setCallRecordings(?array $callRecordings): self
    {
        $this->callRecordings = $callRecordings;
        return $this;
    }
}
