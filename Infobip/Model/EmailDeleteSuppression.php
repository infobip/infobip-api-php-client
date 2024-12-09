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

class EmailDeleteSuppression
{
    /**
     * @param string[] $emailAddress
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $domainName,
        #[Assert\NotBlank]
        #[Assert\Count(max: 1000)]
        #[Assert\Count(min: 1)]
        protected array $emailAddress,
        #[Assert\NotBlank]
        protected string $type,
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

    /**
     * @return string[]
     */
    public function getEmailAddress(): array
    {
        return $this->emailAddress;
    }

    /**
     * @param string[] $emailAddress Email addresses that need to be deleted.
     */
    public function setEmailAddress(array $emailAddress): self
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }

    public function getType(): mixed
    {
        return $this->type;
    }

    public function setType($type): self
    {
        $this->type = $type;
        return $this;
    }
}
