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

class CallsRetryOptions implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsRetryOptions';

    public const OPENAPI_FORMATS = [
        'minWaitPeriod' => 'int32',
        'maxWaitPeriod' => 'int32',
        'maxAttempts' => 'int32'
    ];

    /**
     */
    public function __construct(
        protected ?int $minWaitPeriod = null,
        protected ?int $maxWaitPeriod = null,
        protected ?int $maxAttempts = null,
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

    public function getMinWaitPeriod(): int|null
    {
        return $this->minWaitPeriod;
    }

    public function setMinWaitPeriod(?int $minWaitPeriod): self
    {
        $this->minWaitPeriod = $minWaitPeriod;
        return $this;
    }

    public function getMaxWaitPeriod(): int|null
    {
        return $this->maxWaitPeriod;
    }

    public function setMaxWaitPeriod(?int $maxWaitPeriod): self
    {
        $this->maxWaitPeriod = $maxWaitPeriod;
        return $this;
    }

    public function getMaxAttempts(): int|null
    {
        return $this->maxAttempts;
    }

    public function setMaxAttempts(?int $maxAttempts): self
    {
        $this->maxAttempts = $maxAttempts;
        return $this;
    }
}
