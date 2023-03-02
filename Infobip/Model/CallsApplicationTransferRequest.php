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

class CallsApplicationTransferRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsApplicationTransferRequest';

    public const OPENAPI_FORMATS = [
        'destinationApplicationId' => null,
        'timeout' => 'int32',
        'context' => null
    ];

    /**
     * @param array<string,string> $context
     */
    public function __construct(
        #[Assert\NotBlank]

    protected string $destinationApplicationId,
        protected ?int $timeout = 30,
        protected ?array $context = null,
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

    public function getDestinationApplicationId(): string
    {
        return $this->destinationApplicationId;
    }

    public function setDestinationApplicationId(string $destinationApplicationId): self
    {
        $this->destinationApplicationId = $destinationApplicationId;
        return $this;
    }

    public function getTimeout(): int|null
    {
        return $this->timeout;
    }

    public function setTimeout(?int $timeout): self
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * @return array<string,string>|null
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param array<string,string>|null $context Client defined data to be passed to the destination application.
     */
    public function setContext(?array $context): self
    {
        $this->context = $context;
        return $this;
    }
}
