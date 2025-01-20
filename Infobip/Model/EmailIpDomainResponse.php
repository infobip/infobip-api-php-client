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

class EmailIpDomainResponse
{
    /**
     * @param \Infobip\Model\EmailDomainIpPool[] $pools
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\GreaterThanOrEqual(1)]
        protected int $id,
        #[Assert\NotBlank]
        protected string $name,
        #[Assert\NotBlank]
        #[Assert\Count(min: 0)]
        protected array $pools,
    ) {

    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return \Infobip\Model\EmailDomainIpPool[]
     */
    public function getPools(): array
    {
        return $this->pools;
    }

    /**
     * @param \Infobip\Model\EmailDomainIpPool[] $pools pools
     */
    public function setPools(array $pools): self
    {
        $this->pools = $pools;
        return $this;
    }
}
