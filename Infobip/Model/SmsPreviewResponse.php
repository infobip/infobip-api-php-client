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


class SmsPreviewResponse
{
    /**
     * @param \Infobip\Model\SmsPreview[] $previews
     */
    public function __construct(
        protected ?string $originalText = null,
        protected ?array $previews = null,
    ) {

    }


    public function getOriginalText(): string|null
    {
        return $this->originalText;
    }

    public function setOriginalText(?string $originalText): self
    {
        $this->originalText = $originalText;
        return $this;
    }

    /**
     * @return \Infobip\Model\SmsPreview[]|null
     */
    public function getPreviews(): ?array
    {
        return $this->previews;
    }

    /**
     * @param \Infobip\Model\SmsPreview[]|null $previews Allows for previewing the original message content once additional language configuration has been applied to it.
     */
    public function setPreviews(?array $previews): self
    {
        $this->previews = $previews;
        return $this;
    }
}
