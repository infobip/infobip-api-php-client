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


class CallsAudioCallbackResponse extends CallbackResponse
{
    public const COMMAND = 'audio';

    /**
     */
    public function __construct(
        protected ?string $fileUrl = null,
        protected ?string $fileId = null,
    ) {
        $modelDiscriminatorValue = self::COMMAND;

        parent::__construct(
            command: $modelDiscriminatorValue,
        );
    }


    public function getFileUrl(): string|null
    {
        return $this->fileUrl;
    }

    public function setFileUrl(?string $fileUrl): self
    {
        $this->fileUrl = $fileUrl;
        return $this;
    }

    public function getFileId(): string|null
    {
        return $this->fileId;
    }

    public function setFileId(?string $fileId): self
    {
        $this->fileId = $fileId;
        return $this;
    }
}
