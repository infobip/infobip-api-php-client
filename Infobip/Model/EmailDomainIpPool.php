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

class EmailDomainIpPool
{
    /**
     * @param \Infobip\Model\EmailIpResponse[] $ips
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $id,
        #[Assert\NotBlank]
        protected string $name,
        #[Assert\NotBlank]
        #[Assert\LessThanOrEqual(49)]
        #[Assert\GreaterThanOrEqual(0)]
        protected int $priority,
        #[Assert\NotBlank]
        #[Assert\Count(min: 0)]
        protected array $ips,
    ) {

    }


    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
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

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): self
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @return \Infobip\Model\EmailIpResponse[]
     */
    public function getIps(): array
    {
        return $this->ips;
    }

    /**
     * @param \Infobip\Model\EmailIpResponse[] $ips ips
     */
    public function setIps(array $ips): self
    {
        $this->ips = $ips;
        return $this;
    }
}
