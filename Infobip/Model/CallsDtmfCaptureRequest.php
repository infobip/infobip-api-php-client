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

class CallsDtmfCaptureRequest
{
    /**
     * @param array<string,string> $customData
     */
    public function __construct(
        #[Assert\NotBlank]
        protected int $maxLength,
        #[Assert\NotBlank]
        protected int $timeout,
        protected ?string $terminator = null,
        protected ?int $digitTimeout = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsPlayContent $playContent = null,
        protected ?array $customData = null,
    ) {

    }


    public function getMaxLength(): int
    {
        return $this->maxLength;
    }

    public function setMaxLength(int $maxLength): self
    {
        $this->maxLength = $maxLength;
        return $this;
    }

    public function getTimeout(): int
    {
        return $this->timeout;
    }

    public function setTimeout(int $timeout): self
    {
        $this->timeout = $timeout;
        return $this;
    }

    public function getTerminator(): string|null
    {
        return $this->terminator;
    }

    public function setTerminator(?string $terminator): self
    {
        $this->terminator = $terminator;
        return $this;
    }

    public function getDigitTimeout(): int|null
    {
        return $this->digitTimeout;
    }

    public function setDigitTimeout(?int $digitTimeout): self
    {
        $this->digitTimeout = $digitTimeout;
        return $this;
    }

    public function getPlayContent(): \Infobip\Model\CallsPlayContent|null
    {
        return $this->playContent;
    }

    public function setPlayContent(?\Infobip\Model\CallsPlayContent $playContent): self
    {
        $this->playContent = $playContent;
        return $this;
    }

    /**
     * @return array<string,string>|null
     */
    public function getCustomData()
    {
        return $this->customData;
    }

    /**
     * @param array<string,string>|null $customData Optional parameter to update a call's custom data.
     */
    public function setCustomData(?array $customData): self
    {
        $this->customData = $customData;
        return $this;
    }
}
