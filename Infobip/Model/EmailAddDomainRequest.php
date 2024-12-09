<?php

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

class EmailAddDomainRequest
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $domainName,
        #[Assert\NotBlank]
        #[Assert\GreaterThanOrEqual(1)]
        protected int $targetedDailyTraffic,
        protected ?string $dkimKeyLength = self::DKIM_KEY_LENGTH_2048,
        protected ?string $applicationId = null,
        protected ?string $entityId = null,
        protected ?string $returnPathAddress = null,
    ) {

    }


    public function getDomainName(): string
    {
        return $this->domainName;
    }

    public function setDomainName(string $domainName): self
    {
        $this->domainName = $domainName;
        return $this;
    }

    public function getDkimKeyLength(): mixed
    {
        return $this->dkimKeyLength;
    }

    public function setDkimKeyLength($dkimKeyLength): self
    {
        $this->dkimKeyLength = $dkimKeyLength;
        return $this;
    }

    public function getTargetedDailyTraffic(): int
    {
        return $this->targetedDailyTraffic;
    }

    public function setTargetedDailyTraffic(int $targetedDailyTraffic): self
    {
        $this->targetedDailyTraffic = $targetedDailyTraffic;
        return $this;
    }

    public function getApplicationId(): string|null
    {
        return $this->applicationId;
    }

    public function setApplicationId(?string $applicationId): self
    {
        $this->applicationId = $applicationId;
        return $this;
    }

    public function getEntityId(): string|null
    {
        return $this->entityId;
    }

    public function setEntityId(?string $entityId): self
    {
        $this->entityId = $entityId;
        return $this;
    }

    public function getReturnPathAddress(): string|null
    {
        return $this->returnPathAddress;
    }

    public function setReturnPathAddress(?string $returnPathAddress): self
    {
        $this->returnPathAddress = $returnPathAddress;
        return $this;
    }
}
