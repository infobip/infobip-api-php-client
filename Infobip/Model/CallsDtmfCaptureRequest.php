<?php

// phpcs:ignorefile

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
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

class CallsDtmfCaptureRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsDtmfCaptureRequest';

    public const OPENAPI_FORMATS = [
        'maxLength' => 'int32',
        'timeout' => 'int32',
        'terminator' => null,
        'digitTimeout' => 'int32'
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]

    protected int $maxLength,
        #[Assert\NotBlank]

    protected int $timeout,
        protected ?string $terminator = null,
        protected ?int $digitTimeout = null,
    ) {
    }

    #[Ignore]
    public function getModelName(): string
    {
        return self::OPENAPI_MODEL_NAME;
    }

    #[Ignore]
    public static function getDiscriminator(): ?string
    {
        return self::DISCRIMINATOR;
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
}
