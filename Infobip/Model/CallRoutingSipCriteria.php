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


class CallRoutingSipCriteria extends CallRoutingCriteria
{
    public const TYPE = 'SIP';

    /**
     * @param \Infobip\Model\CallRoutingSipHeader[] $headers
     */
    public function __construct(
        protected ?string $sipTrunkId = null,
        protected ?string $username = null,
        protected ?array $headers = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getSipTrunkId(): string|null
    {
        return $this->sipTrunkId;
    }

    public function setSipTrunkId(?string $sipTrunkId): self
    {
        $this->sipTrunkId = $sipTrunkId;
        return $this;
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

    /**
     * @return \Infobip\Model\CallRoutingSipHeader[]|null
     */
    public function getHeaders(): ?array
    {
        return $this->headers;
    }

    /**
     * @param \Infobip\Model\CallRoutingSipHeader[]|null $headers SIP headers. To meet the criteria, all of the provided headers must match.
     */
    public function setHeaders(?array $headers): self
    {
        $this->headers = $headers;
        return $this;
    }
}
