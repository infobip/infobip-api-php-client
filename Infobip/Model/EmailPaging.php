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

class EmailPaging implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'EmailPaging';

    public const OPENAPI_FORMATS = [
        'page' => 'int32',
        'size' => 'int32',
        'totalPages' => 'int32',
        'totalResults' => 'int32'
    ];

    /**
     */
    public function __construct(
        protected ?int $page = null,
        protected ?int $size = null,
        protected ?int $totalPages = null,
        protected ?int $totalResults = null,
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

    public function getPage(): int|null
    {
        return $this->page;
    }

    public function setPage(?int $page): self
    {
        $this->page = $page;
        return $this;
    }

    public function getSize(): int|null
    {
        return $this->size;
    }

    public function setSize(?int $size): self
    {
        $this->size = $size;
        return $this;
    }

    public function getTotalPages(): int|null
    {
        return $this->totalPages;
    }

    public function setTotalPages(?int $totalPages): self
    {
        $this->totalPages = $totalPages;
        return $this;
    }

    public function getTotalResults(): int|null
    {
        return $this->totalResults;
    }

    public function setTotalResults(?int $totalResults): self
    {
        $this->totalResults = $totalResults;
        return $this;
    }
}
