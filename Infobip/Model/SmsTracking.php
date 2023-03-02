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

class SmsTracking implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'SmsTracking';

    public const OPENAPI_FORMATS = [
        'baseUrl' => null,
        'processKey' => null,
        'track' => null,
        'type' => null
    ];

    /**
     */
    public function __construct(
        protected ?string $baseUrl = null,
        protected ?string $processKey = null,
        protected ?string $track = null,
        protected ?string $type = null,
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

    public function getBaseUrl(): string|null
    {
        return $this->baseUrl;
    }

    public function setBaseUrl(?string $baseUrl): self
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    public function getProcessKey(): string|null
    {
        return $this->processKey;
    }

    public function setProcessKey(?string $processKey): self
    {
        $this->processKey = $processKey;
        return $this;
    }

    public function getTrack(): string|null
    {
        return $this->track;
    }

    public function setTrack(?string $track): self
    {
        $this->track = $track;
        return $this;
    }

    public function getType(): string|null
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }
}
