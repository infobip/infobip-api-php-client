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

class CallRoutingSipEndpoint extends CallRoutingEndpoint
{
    public const TYPE = 'SIP';

    /**
     * @param array<string,string> $customHeaders
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $sipTrunkId,
        protected ?string $username = null,
        protected ?array $customHeaders = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getUsername(): string|null
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getSipTrunkId(): string
    {
        return $this->sipTrunkId;
    }

    public function setSipTrunkId(string $sipTrunkId): self
    {
        $this->sipTrunkId = $sipTrunkId;
        return $this;
    }

    /**
     * @return array<string,string>|null
     */
    public function getCustomHeaders()
    {
        return $this->customHeaders;
    }

    /**
     * @param array<string,string>|null $customHeaders Custom headers. Only headers starting with `X-Client-` prefix will be propagated.
     */
    public function setCustomHeaders(?array $customHeaders): self
    {
        $this->customHeaders = $customHeaders;
        return $this;
    }
}
