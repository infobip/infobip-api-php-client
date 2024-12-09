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

class CallsBulkCallRequest
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\CallsBulkEndpoint $endpoint,
        protected ?string $externalId = null,
    ) {

    }


    public function getExternalId(): string|null
    {
        return $this->externalId;
    }

    public function setExternalId(?string $externalId): self
    {
        $this->externalId = $externalId;
        return $this;
    }

    public function getEndpoint(): \Infobip\Model\CallsBulkEndpoint
    {
        return $this->endpoint;
    }

    public function setEndpoint(\Infobip\Model\CallsBulkEndpoint $endpoint): self
    {
        $this->endpoint = $endpoint;
        return $this;
    }
}
