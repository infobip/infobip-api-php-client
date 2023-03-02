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

class EmailDomainIp implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'EmailDomainIp';

    public const OPENAPI_FORMATS = [
        'ipAddress' => null,
        'dedicated' => null,
        'assignedDomainCount' => 'int32',
        'status' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]

    protected string $ipAddress,
        #[Assert\NotBlank]

    protected bool $dedicated,
        #[Assert\NotBlank]

    protected int $assignedDomainCount,
        #[Assert\NotBlank]

    protected string $status,
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

    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    public function getDedicated(): bool
    {
        return $this->dedicated;
    }

    public function setDedicated(bool $dedicated): self
    {
        $this->dedicated = $dedicated;
        return $this;
    }

    public function getAssignedDomainCount(): int
    {
        return $this->assignedDomainCount;
    }

    public function setAssignedDomainCount(int $assignedDomainCount): self
    {
        $this->assignedDomainCount = $assignedDomainCount;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }
}
