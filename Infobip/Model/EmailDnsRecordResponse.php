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

class EmailDnsRecordResponse implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'EmailDnsRecordResponse';

    public const OPENAPI_FORMATS = [
        'recordType' => null,
        'name' => null,
        'expectedValue' => null,
        'verified' => null
    ];

    /**
     */
    public function __construct(
        protected ?string $recordType = null,
        protected ?string $name = null,
        protected ?string $expectedValue = null,
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

    public function getRecordType(): string|null
    {
        return $this->recordType;
    }

    public function setRecordType(?string $recordType): self
    {
        $this->recordType = $recordType;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getExpectedValue(): string|null
    {
        return $this->expectedValue;
    }

    public function setExpectedValue(?string $expectedValue): self
    {
        $this->expectedValue = $expectedValue;
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
