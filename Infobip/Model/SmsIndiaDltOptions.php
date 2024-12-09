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

class SmsIndiaDltOptions
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $principalEntityId,
        protected ?string $contentTemplateId = null,
        protected ?string $telemarketerId = null,
    ) {

    }


    public function getContentTemplateId(): string|null
    {
        return $this->contentTemplateId;
    }

    public function setContentTemplateId(?string $contentTemplateId): self
    {
        $this->contentTemplateId = $contentTemplateId;
        return $this;
    }

    public function getPrincipalEntityId(): string
    {
        return $this->principalEntityId;
    }

    public function setPrincipalEntityId(string $principalEntityId): self
    {
        $this->principalEntityId = $principalEntityId;
        return $this;
    }

    public function getTelemarketerId(): string|null
    {
        return $this->telemarketerId;
    }

    public function setTelemarketerId(?string $telemarketerId): self
    {
        $this->telemarketerId = $telemarketerId;
        return $this;
    }
}
