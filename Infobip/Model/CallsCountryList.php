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


class CallsCountryList
{
    /**
     * @param \Infobip\Model\CallsPublicCountry[] $countries
     */
    public function __construct(
        protected ?array $countries = null,
    ) {

    }


    /**
     * @return \Infobip\Model\CallsPublicCountry[]|null
     */
    public function getCountries(): ?array
    {
        return $this->countries;
    }

    /**
     * @param \Infobip\Model\CallsPublicCountry[]|null $countries List of countries.
     */
    public function setCountries(?array $countries): self
    {
        $this->countries = $countries;
        return $this;
    }
}
