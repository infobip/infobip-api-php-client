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

class TfaIndiaDltOptions
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(max: 30)]
        #[Assert\Length(min: 0)]
        protected string $principalEntityId,
        #[Assert\Length(max: 30)]
        #[Assert\Length(min: 0)]
        protected ?string $contentTemplateId = null,
        #[Assert\Length(max: 255)]
        #[Assert\Length(min: 0)]
        protected ?string $teleMarketerId = null,
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

    public function getTeleMarketerId(): string|null
    {
        return $this->teleMarketerId;
    }

    public function setTeleMarketerId(?string $teleMarketerId): self
    {
        $this->teleMarketerId = $teleMarketerId;
        return $this;
    }
}
