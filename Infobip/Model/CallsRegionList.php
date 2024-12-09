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


class CallsRegionList
{
    /**
     * @param \Infobip\Model\CallsPublicRegion[] $regions
     */
    public function __construct(
        protected ?array $regions = null,
    ) {

    }


    /**
     * @return \Infobip\Model\CallsPublicRegion[]|null
     */
    public function getRegions(): ?array
    {
        return $this->regions;
    }

    /**
     * @param \Infobip\Model\CallsPublicRegion[]|null $regions List of regions.
     */
    public function setRegions(?array $regions): self
    {
        $this->regions = $regions;
        return $this;
    }
}
