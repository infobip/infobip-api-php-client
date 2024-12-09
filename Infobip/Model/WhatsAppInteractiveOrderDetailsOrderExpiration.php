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

class WhatsAppInteractiveOrderDetailsOrderExpiration
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\GreaterThanOrEqual(360)]
        protected int $expirationSeconds,
        #[Assert\NotBlank]
        #[Assert\Length(max: 120)]
        #[Assert\Length(min: 0)]
        protected string $description,
    ) {

    }


    public function getExpirationSeconds(): int
    {
        return $this->expirationSeconds;
    }

    public function setExpirationSeconds(int $expirationSeconds): self
    {
        $this->expirationSeconds = $expirationSeconds;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
}
