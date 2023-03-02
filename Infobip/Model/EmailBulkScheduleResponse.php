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

class EmailBulkScheduleResponse implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'EmailBulkScheduleResponse';

    public const OPENAPI_FORMATS = [
        'externalBulkId' => null,
        'bulks' => null
    ];

    /**
     * @param \Infobip\Model\EmailBulkInfo[] $bulks
     */
    public function __construct(
        protected ?string $externalBulkId = null,
        protected ?array $bulks = null,
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

    public function getExternalBulkId(): string|null
    {
        return $this->externalBulkId;
    }

    public function setExternalBulkId(?string $externalBulkId): self
    {
        $this->externalBulkId = $externalBulkId;
        return $this;
    }

    /**
     * @return \Infobip\Model\EmailBulkInfo[]|null
     */
    public function getBulks(): ?array
    {
        return $this->bulks;
    }

    /**
     * @param \Infobip\Model\EmailBulkInfo[]|null $bulks bulks
     */
    public function setBulks(?array $bulks): self
    {
        $this->bulks = $bulks;
        return $this;
    }
}
