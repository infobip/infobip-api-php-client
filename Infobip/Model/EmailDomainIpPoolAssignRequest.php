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

class EmailDomainIpPoolAssignRequest
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $poolId,
        #[Assert\NotBlank]
        #[Assert\LessThanOrEqual(49)]
        #[Assert\GreaterThanOrEqual(0)]
        protected int $priority,
    ) {

    }


    public function getPoolId(): string
    {
        return $this->poolId;
    }

    public function setPoolId(string $poolId): self
    {
        $this->poolId = $poolId;
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
}
