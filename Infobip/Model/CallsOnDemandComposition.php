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

class CallsOnDemandComposition
{
    /**
     */
    public function __construct(
        protected ?bool $deleteCallRecordings = true,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsMultiChannel $multiChannel = null,
    ) {

    }


    public function getDeleteCallRecordings(): bool|null
    {
        return $this->deleteCallRecordings;
    }

    public function setDeleteCallRecordings(?bool $deleteCallRecordings): self
    {
        $this->deleteCallRecordings = $deleteCallRecordings;
        return $this;
    }

    public function getMultiChannel(): \Infobip\Model\CallsMultiChannel|null
    {
        return $this->multiChannel;
    }

    public function setMultiChannel(?\Infobip\Model\CallsMultiChannel $multiChannel): self
    {
        $this->multiChannel = $multiChannel;
        return $this;
    }
}
