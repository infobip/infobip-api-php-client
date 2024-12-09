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

class CallRoutingRouteResponse
{
    /**
     * @param \Infobip\Model\CallRoutingSearchCriteria[] $criteria
     * @param \Infobip\Model\CallRoutingDestination[] $destinations
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $id,
        #[Assert\NotBlank]
        protected string $name,
        #[Assert\NotBlank]
        #[Assert\Count(max: 10)]
        #[Assert\Count(min: 1)]
        protected array $destinations,
        protected ?array $criteria = null,
    ) {

    }


    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
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

    /**
     * @return \Infobip\Model\CallRoutingSearchCriteria[]|null
     */
    public function getCriteria(): ?array
    {
        return $this->criteria;
    }

    /**
     * @param \Infobip\Model\CallRoutingSearchCriteria[]|null $criteria List of criteria that should match route. For a route to match, any criterion should be met.
     */
    public function setCriteria(?array $criteria): self
    {
        $this->criteria = $criteria;
        return $this;
    }

    /**
     * @return \Infobip\Model\CallRoutingDestination[]
     */
    public function getDestinations(): array
    {
        return $this->destinations;
    }

    /**
     * @param \Infobip\Model\CallRoutingDestination[] $destinations List of destinations. First destination in the list is the first one to be executed. Subsequent destinations are executed only if the previous one fails.
     */
    public function setDestinations(array $destinations): self
    {
        $this->destinations = $destinations;
        return $this;
    }
}
