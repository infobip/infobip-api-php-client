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

class WhatsAppAuthenticationFooterApiData
{
    /**
     */
    public function __construct(
        #[Assert\LessThanOrEqual(90)]
        #[Assert\GreaterThanOrEqual(1)]
        protected ?int $codeExpirationMinutes = null,
    ) {

    }


    public function getCodeExpirationMinutes(): int|null
    {
        return $this->codeExpirationMinutes;
    }

    public function setCodeExpirationMinutes(?int $codeExpirationMinutes): self
    {
        $this->codeExpirationMinutes = $codeExpirationMinutes;
        return $this;
    }
}
