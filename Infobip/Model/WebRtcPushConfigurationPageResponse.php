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

class WebRtcPushConfigurationPageResponse
{
    /**
     * @param \Infobip\Model\WebRtcPushConfigurationResponse[] $results
     */
    public function __construct(
        protected ?array $results = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\PageInfo $pageInfo = null,
    ) {

    }


    /**
     * @return \Infobip\Model\WebRtcPushConfigurationResponse[]|null
     */
    public function getResults(): ?array
    {
        return $this->results;
    }

    /**
     * @param \Infobip\Model\WebRtcPushConfigurationResponse[]|null $results List of results for this page.
     */
    public function setResults(?array $results): self
    {
        $this->results = $results;
        return $this;
    }

    public function getPageInfo(): \Infobip\Model\PageInfo|null
    {
        return $this->pageInfo;
    }

    public function setPageInfo(?\Infobip\Model\PageInfo $pageInfo): self
    {
        $this->pageInfo = $pageInfo;
        return $this;
    }
}
