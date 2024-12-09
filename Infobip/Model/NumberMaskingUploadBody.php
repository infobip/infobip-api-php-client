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


class NumberMaskingUploadBody
{
    /**
     * @param string[] $content
     */
    public function __construct(
        protected ?string $url = null,
        protected ?array $content = null,
    ) {

    }


    public function getUrl(): string|null
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getContent(): ?array
    {
        return $this->content;
    }

    /**
     * @param string[]|null $content Encoded (Base64) value of mp3 file can be included instead of the file location URL.
     */
    public function setContent(?array $content): self
    {
        $this->content = $content;
        return $this;
    }
}
