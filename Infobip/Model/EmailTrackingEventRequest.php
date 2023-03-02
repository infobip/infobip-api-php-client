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

class EmailTrackingEventRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'EmailTrackingEventRequest';

    public const OPENAPI_FORMATS = [
        'open' => null,
        'clicks' => null,
        'unsubscribe' => null
    ];

    /**
     */
    public function __construct(
        protected ?bool $open = null,
        protected ?bool $clicks = null,
        protected ?bool $unsubscribe = null,
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

    public function getOpen(): bool|null
    {
        return $this->open;
    }

    public function setOpen(?bool $open): self
    {
        $this->open = $open;
        return $this;
    }

    public function getClicks(): bool|null
    {
        return $this->clicks;
    }

    public function setClicks(?bool $clicks): self
    {
        $this->clicks = $clicks;
        return $this;
    }

    public function getUnsubscribe(): bool|null
    {
        return $this->unsubscribe;
    }

    public function setUnsubscribe(?bool $unsubscribe): self
    {
        $this->unsubscribe = $unsubscribe;
        return $this;
    }
}
