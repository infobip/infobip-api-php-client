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

class CallsMediaStreamConfigRequest
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(max: 128)]
        #[Assert\Length(min: 0)]
        protected string $name,
        #[Assert\NotBlank]
        protected string $url,
        #[Assert\Valid]
        protected ?\Infobip\Model\SecurityConfig $securityConfig = null,
    ) {

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

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getSecurityConfig(): \Infobip\Model\SecurityConfig|null
    {
        return $this->securityConfig;
    }

    public function setSecurityConfig(?\Infobip\Model\SecurityConfig $securityConfig): self
    {
        $this->securityConfig = $securityConfig;
        return $this;
    }
}
