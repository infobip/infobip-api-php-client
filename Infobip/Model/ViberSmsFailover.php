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

class ViberSmsFailover implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'ViberSmsFailover';

    public const OPENAPI_FORMATS = [
        'from' => null,
        'text' => null,
        'validityPeriod' => 'int32',
        'validityPeriodTimeUnit' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]

    protected string $from,
        #[Assert\NotBlank]

    protected string $text,
        protected ?int $validityPeriod = null,
        #[Assert\Choice(['SECONDS','MINUTES','HOURS','DAYS',])]

    protected ?string $validityPeriodTimeUnit = null,
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

    public function getFrom(): string
    {
        return $this->from;
    }

    public function setFrom(string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getValidityPeriod(): int|null
    {
        return $this->validityPeriod;
    }

    public function setValidityPeriod(?int $validityPeriod): self
    {
        $this->validityPeriod = $validityPeriod;
        return $this;
    }

    public function getValidityPeriodTimeUnit(): mixed
    {
        return $this->validityPeriodTimeUnit;
    }

    public function setValidityPeriodTimeUnit($validityPeriodTimeUnit): self
    {
        $this->validityPeriodTimeUnit = $validityPeriodTimeUnit;
        return $this;
    }
}
