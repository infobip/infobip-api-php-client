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

class TfaVerifyPinResponse implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'TfaVerifyPinResponse';

    public const OPENAPI_FORMATS = [
        'attemptsRemaining' => 'int32',
        'msisdn' => null,
        'pinError' => null,
        'pinId' => null,
        'verified' => null
    ];

    /**
     */
    public function __construct(
        protected ?int $attemptsRemaining = null,
        protected ?string $msisdn = null,
        protected ?string $pinError = null,
        protected ?string $pinId = null,
        protected ?bool $verified = null,
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

    public function getAttemptsRemaining(): int|null
    {
        return $this->attemptsRemaining;
    }

    public function setAttemptsRemaining(?int $attemptsRemaining): self
    {
        $this->attemptsRemaining = $attemptsRemaining;
        return $this;
    }

    public function getMsisdn(): string|null
    {
        return $this->msisdn;
    }

    public function setMsisdn(?string $msisdn): self
    {
        $this->msisdn = $msisdn;
        return $this;
    }

    public function getPinError(): string|null
    {
        return $this->pinError;
    }

    public function setPinError(?string $pinError): self
    {
        $this->pinError = $pinError;
        return $this;
    }

    public function getPinId(): string|null
    {
        return $this->pinId;
    }

    public function setPinId(?string $pinId): self
    {
        $this->pinId = $pinId;
        return $this;
    }

    public function getVerified(): bool|null
    {
        return $this->verified;
    }

    public function setVerified(?bool $verified): self
    {
        $this->verified = $verified;
        return $this;
    }
}
