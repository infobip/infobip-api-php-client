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


class WhatsAppAuthenticationBodyApiData
{
    /**
     */
    public function __construct(
        protected ?bool $addSecurityRecommendation = null,
    ) {

    }


    public function getAddSecurityRecommendation(): bool|null
    {
        return $this->addSecurityRecommendation;
    }

    public function setAddSecurityRecommendation(?bool $addSecurityRecommendation): self
    {
        $this->addSecurityRecommendation = $addSecurityRecommendation;
        return $this;
    }
}
