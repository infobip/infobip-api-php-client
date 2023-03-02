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

class EmailDomainResponse implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'EmailDomainResponse';

    public const OPENAPI_FORMATS = [
        'domainId' => 'int64',
        'domainName' => null,
        'active' => null,
        'tracking' => null,
        'dnsRecords' => null,
        'blocked' => null,
        'createdAt' => 'date-time'
    ];

    /**
     * @param \Infobip\Model\EmailDnsRecordResponse[] $dnsRecords
     */
    public function __construct(
        protected ?int $domainId = null,
        protected ?string $domainName = null,
        protected ?bool $active = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\EmailTrackingResponse $tracking = null,
        protected ?array $dnsRecords = null,
        protected ?bool $blocked = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]

    protected ?\DateTime $createdAt = null,
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

    public function getDomainId(): int|null
    {
        return $this->domainId;
    }

    public function setDomainId(?int $domainId): self
    {
        $this->domainId = $domainId;
        return $this;
    }

    public function getDomainName(): string|null
    {
        return $this->domainName;
    }

    public function setDomainName(?string $domainName): self
    {
        $this->domainName = $domainName;
        return $this;
    }

    public function getActive(): bool|null
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;
        return $this;
    }

    public function getTracking(): \Infobip\Model\EmailTrackingResponse|null
    {
        return $this->tracking;
    }

    public function setTracking(?\Infobip\Model\EmailTrackingResponse $tracking): self
    {
        $this->tracking = $tracking;
        return $this;
    }

    /**
     * @return \Infobip\Model\EmailDnsRecordResponse[]|null
     */
    public function getDnsRecords(): ?array
    {
        return $this->dnsRecords;
    }

    /**
     * @param \Infobip\Model\EmailDnsRecordResponse[]|null $dnsRecords DNS records for the domain.
     */
    public function setDnsRecords(?array $dnsRecords): self
    {
        $this->dnsRecords = $dnsRecords;
        return $this;
    }

    public function getBlocked(): bool|null
    {
        return $this->blocked;
    }

    public function setBlocked(?bool $blocked): self
    {
        $this->blocked = $blocked;
        return $this;
    }

    public function getCreatedAt(): \DateTime|null
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}
