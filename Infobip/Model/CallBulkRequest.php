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

class CallBulkRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallBulkRequest';

    public const OPENAPI_FORMATS = [
        'bulkId' => null,
        'applicationId' => null,
        'items' => null
    ];

    /**
     * @param \Infobip\Model\CallsBulkItem[] $items
     */
    public function __construct(
        #[Assert\NotBlank]

    protected string $applicationId,
        #[Assert\NotBlank]

    protected array $items,
        protected ?string $bulkId = null,
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

    public function getBulkId(): string|null
    {
        return $this->bulkId;
    }

    public function setBulkId(?string $bulkId): self
    {
        $this->bulkId = $bulkId;
        return $this;
    }

    public function getApplicationId(): string
    {
        return $this->applicationId;
    }

    public function setApplicationId(string $applicationId): self
    {
        $this->applicationId = $applicationId;
        return $this;
    }

    /**
     * @return \Infobip\Model\CallsBulkItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param \Infobip\Model\CallsBulkItem[] $items Bulk item list.
     */
    public function setItems(array $items): self
    {
        $this->items = $items;
        return $this;
    }
}
