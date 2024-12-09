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
    "ENDPOINT" => "\Infobip\Model\CallRoutingEndpointDestination",
    "URL" => "\Infobip\Model\CallRoutingUrlDestination",
])]

class CallRoutingDestination
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $type,
        #[Assert\LessThanOrEqual(100)]
        #[Assert\GreaterThanOrEqual(1)]
        protected ?int $priority = null,
        #[Assert\LessThanOrEqual(100)]
        #[Assert\GreaterThanOrEqual(1)]
        protected ?int $weight = null,
    ) {

    }


    public function getPriority(): int|null
    {
        return $this->priority;
    }

    public function setPriority(?int $priority): self
    {
        $this->priority = $priority;
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

    public function getWeight(): int|null
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;
        return $this;
    }
}
