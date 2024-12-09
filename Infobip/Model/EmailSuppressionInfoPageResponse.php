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

class EmailSuppressionInfoPageResponse
{
    /**
     * @param \Infobip\Model\EmailSuppressionInfo[] $results
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $results,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\EmailPageDetails $paging,
    ) {

    }


    /**
     * @return \Infobip\Model\EmailSuppressionInfo[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param \Infobip\Model\EmailSuppressionInfo[] $results Suppressed addresses for requested paging information.
     */
    public function setResults(array $results): self
    {
        $this->results = $results;
        return $this;
    }

    public function getPaging(): \Infobip\Model\EmailPageDetails
    {
        return $this->paging;
    }

    public function setPaging(\Infobip\Model\EmailPageDetails $paging): self
    {
        $this->paging = $paging;
        return $this;
    }
}
