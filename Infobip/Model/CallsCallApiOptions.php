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

class CallsCallApiOptions
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $method,
        protected ?object $headers = null,
        protected ?string $body = null,
        protected ?bool $collectResponse = null,
    ) {

    }


    public function getMethod(): mixed
    {
        return $this->method;
    }

    public function setMethod($method): self
    {
        $this->method = $method;
        return $this;
    }

    public function getHeaders(): object|null
    {
        return $this->headers;
    }

    public function setHeaders(?object $headers): self
    {
        $this->headers = $headers;
        return $this;
    }

    public function getBody(): string|null
    {
        return $this->body;
    }

    public function setBody(?string $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function getCollectResponse(): bool|null
    {
        return $this->collectResponse;
    }

    public function setCollectResponse(?bool $collectResponse): self
    {
        $this->collectResponse = $collectResponse;
        return $this;
    }
}
