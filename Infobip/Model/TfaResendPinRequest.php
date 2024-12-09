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


class TfaResendPinRequest
{
    /**
     * @param array<string,string> $placeholders
     */
    public function __construct(
        protected ?array $placeholders = null,
    ) {

    }


    /**
     * @return array<string,string>|null
     */
    public function getPlaceholders()
    {
        return $this->placeholders;
    }

    /**
     * @param array<string,string>|null $placeholders Key value pairs that will be replaced during message sending. Placeholder keys should NOT contain curly brackets and should NOT contain a `pin` placeholder. Valid example: `\"placeholders\":{\"firstName\":\"John\"}`
     */
    public function setPlaceholders(?array $placeholders): self
    {
        $this->placeholders = $placeholders;
        return $this;
    }
}
