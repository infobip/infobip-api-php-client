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

class TurkeyIysOptions
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $recipientType,
        protected ?int $brandCode = null,
    ) {

    }


    public function getBrandCode(): int|null
    {
        return $this->brandCode;
    }

    public function setBrandCode(?int $brandCode): self
    {
        $this->brandCode = $brandCode;
        return $this;
    }

    public function getRecipientType(): mixed
    {
        return $this->recipientType;
    }

    public function setRecipientType($recipientType): self
    {
        $this->recipientType = $recipientType;
        return $this;
    }
}
