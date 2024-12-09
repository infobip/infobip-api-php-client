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
    "PROVIDER" => "\Infobip\Model\CallsProviderSipTrunkUpdateRequest",
    "REGISTERED" => "\Infobip\Model\CallsRegisteredSipTrunkUpdateRequest",
    "STATIC" => "\Infobip\Model\CallsStaticSipTrunkUpdateRequest",
])]

class CallsSipTrunkUpdateRequest
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $name,
        protected ?string $type = null,
        protected ?bool $internationalCallsAllowed = false,
        #[Assert\LessThanOrEqual(1000)]
        protected ?int $channelLimit = null,
    ) {

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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
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
}
