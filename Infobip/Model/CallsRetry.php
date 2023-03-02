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

class CallsRetry implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsRetry';

    public const OPENAPI_FORMATS = [
        'maxCount' => 'int32',
        'maxPeriod' => 'int32',
        'minPeriod' => 'int32'
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
    #[Assert\LessThan(32767)]
    #[Assert\GreaterThan(-32768)]

    protected int $maxCount,
        #[Assert\NotBlank]

    protected int $maxPeriod,
        #[Assert\NotBlank]

    protected int $minPeriod,
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

    public function getMaxCount(): int
    {
        return $this->maxCount;
    }

    public function setMaxCount(int $maxCount): self
    {
        $this->maxCount = $maxCount;
        return $this;
    }

    public function getMaxPeriod(): int
    {
        return $this->maxPeriod;
    }

    public function setMaxPeriod(int $maxPeriod): self
    {
        $this->maxPeriod = $maxPeriod;
        return $this;
    }

    public function getMinPeriod(): int
    {
        return $this->minPeriod;
    }

    public function setMinPeriod(int $minPeriod): self
    {
        $this->minPeriod = $minPeriod;
        return $this;
    }
}
