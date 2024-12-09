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

class TfaCreateEmailMessageRequest
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected int $emailTemplateId,
        protected ?string $from = null,
        protected ?int $pinLength = 4,
        protected ?string $pinType = null,
    ) {

    }


    public function getEmailTemplateId(): int
    {
        return $this->emailTemplateId;
    }

    public function setEmailTemplateId(int $emailTemplateId): self
    {
        $this->emailTemplateId = $emailTemplateId;
        return $this;
    }

    public function getFrom(): string|null
    {
        return $this->from;
    }

    public function setFrom(?string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getPinLength(): int|null
    {
        return $this->pinLength;
    }

    public function setPinLength(?int $pinLength): self
    {
        $this->pinLength = $pinLength;
        return $this;
    }

    public function getPinType(): mixed
    {
        return $this->pinType;
    }

    public function setPinType($pinType): self
    {
        $this->pinType = $pinType;
        return $this;
    }
}
