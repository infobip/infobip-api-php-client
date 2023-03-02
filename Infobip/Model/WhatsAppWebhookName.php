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

class WhatsAppWebhookName implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'WhatsAppWebhookName';

    public const OPENAPI_FORMATS = [
        'firstName' => null,
        'formattedName' => null,
        'lastName' => null,
        'middleName' => null,
        'nameSuffix' => null,
        'namePrefix' => null
    ];

    /**
     */
    public function __construct(
        protected ?string $firstName = null,
        protected ?string $formattedName = null,
        protected ?string $lastName = null,
        protected ?string $middleName = null,
        protected ?string $nameSuffix = null,
        protected ?string $namePrefix = null,
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

    public function getFirstName(): string|null
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getFormattedName(): string|null
    {
        return $this->formattedName;
    }

    public function setFormattedName(?string $formattedName): self
    {
        $this->formattedName = $formattedName;
        return $this;
    }

    public function getLastName(): string|null
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getMiddleName(): string|null
    {
        return $this->middleName;
    }

    public function setMiddleName(?string $middleName): self
    {
        $this->middleName = $middleName;
        return $this;
    }

    public function getNameSuffix(): string|null
    {
        return $this->nameSuffix;
    }

    public function setNameSuffix(?string $nameSuffix): self
    {
        $this->nameSuffix = $nameSuffix;
        return $this;
    }

    public function getNamePrefix(): string|null
    {
        return $this->namePrefix;
    }

    public function setNamePrefix(?string $namePrefix): self
    {
        $this->namePrefix = $namePrefix;
        return $this;
    }
}
