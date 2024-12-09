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


class CallsRecordedAudioFilesResponse
{
    /**
     * @param \Infobip\Model\CallsRecordedIvrFile[] $files
     */
    public function __construct(
        protected ?array $files = null,
    ) {

    }


    /**
     * @return \Infobip\Model\CallsRecordedIvrFile[]|null
     */
    public function getFiles(): ?array
    {
        return $this->files;
    }

    /**
     * @param \Infobip\Model\CallsRecordedIvrFile[]|null $files Array of recorded files metadata, one for each recorded file.
     */
    public function setFiles(?array $files): self
    {
        $this->files = $files;
        return $this;
    }
}
