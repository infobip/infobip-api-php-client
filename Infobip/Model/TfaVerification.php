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

class TfaVerification implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'TfaVerification';

    public const OPENAPI_FORMATS = [
        'msisdn' => null,
        'sentAt' => 'int64',
        'verified' => null,
        'verifiedAt' => 'int64'
    ];

    /**
     */
    public function __construct(
        protected ?string $msisdn = null,
        protected ?int $sentAt = null,
        protected ?bool $verified = null,
        protected ?int $verifiedAt = null,
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

    public function getMsisdn(): string|null
    {
        return $this->msisdn;
    }

    public function setMsisdn(?string $msisdn): self
    {
        $this->msisdn = $msisdn;
        return $this;
    }

    public function getSentAt(): int|null
    {
        return $this->sentAt;
    }

    public function setSentAt(?int $sentAt): self
    {
        $this->sentAt = $sentAt;
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

    public function getVerifiedAt(): int|null
    {
        return $this->verifiedAt;
    }

    public function setVerifiedAt(?int $verifiedAt): self
    {
        $this->verifiedAt = $verifiedAt;
        return $this;
    }
}
