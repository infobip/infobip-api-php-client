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
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

#[DiscriminatorMap(typeProperty: "type", mapping: [
    "PROVIDER" => "\Infobip\Model\CallsCreateProviderSipTrunkResponse",
    "REGISTERED" => "\Infobip\Model\CallsCreateRegisteredSipTrunkResponse",
    "STATIC" => "\Infobip\Model\CallsCreateStaticSipTrunkResponse",
])]

class CallsCreateSipTrunkResponse
{
    /**
     */
    public function __construct(
        protected ?string $id = null,
        protected ?string $type = null,
        protected ?string $name = null,
        protected ?string $location = null,
        protected ?bool $internationalCallsAllowed = null,
        protected ?int $channelLimit = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsBillingPackage $billingPackage = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsSbcHosts $sbcHosts = null,
    ) {

    }


    public function getId(): string|null
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): mixed
    {
        return $this->type;
    }

    public function setType($type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getLocation(): mixed
    {
        return $this->location;
    }

    public function setLocation($location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getInternationalCallsAllowed(): bool|null
    {
        return $this->internationalCallsAllowed;
    }

    public function setInternationalCallsAllowed(?bool $internationalCallsAllowed): self
    {
        $this->internationalCallsAllowed = $internationalCallsAllowed;
        return $this;
    }

    public function getChannelLimit(): int|null
    {
        return $this->channelLimit;
    }

    public function setChannelLimit(?int $channelLimit): self
    {
        $this->channelLimit = $channelLimit;
        return $this;
    }

    public function getBillingPackage(): \Infobip\Model\CallsBillingPackage|null
    {
        return $this->billingPackage;
    }

    public function setBillingPackage(?\Infobip\Model\CallsBillingPackage $billingPackage): self
    {
        $this->billingPackage = $billingPackage;
        return $this;
    }

    public function getSbcHosts(): \Infobip\Model\CallsSbcHosts|null
    {
        return $this->sbcHosts;
    }

    public function setSbcHosts(?\Infobip\Model\CallsSbcHosts $sbcHosts): self
    {
        $this->sbcHosts = $sbcHosts;
        return $this;
    }
}
