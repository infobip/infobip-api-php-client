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

class CallsCaptureDtmfCallbackResponse extends CallbackResponse
{
    public const COMMAND = 'captureDtmf';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected int $maxLength = 15,
        #[Assert\NotBlank]
        protected int $timeout,
        protected ?string $fileId = null,
        protected ?string $fileUrl = null,
        protected ?int $digitTimeout = null,
        protected ?string $terminator = '#',
        protected ?bool $addCountryCode = false,
    ) {
        $modelDiscriminatorValue = self::COMMAND;

        parent::__construct(
            command: $modelDiscriminatorValue,
        );
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

    public function getFileUrl(): string|null
    {
        return $this->fileUrl;
    }

    public function setFileUrl(?string $fileUrl): self
    {
        $this->fileUrl = $fileUrl;
        return $this;
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

    public function getDigitTimeout(): int|null
    {
        return $this->digitTimeout;
    }

    public function setDigitTimeout(?int $digitTimeout): self
    {
        $this->digitTimeout = $digitTimeout;
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

    public function getAddCountryCode(): bool|null
    {
        return $this->addCountryCode;
    }

    public function setAddCountryCode(?bool $addCountryCode): self
    {
        $this->addCountryCode = $addCountryCode;
        return $this;
    }
}
