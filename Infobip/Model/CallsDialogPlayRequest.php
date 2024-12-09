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

class CallsDialogPlayRequest
{
    /**
     */
    public function __construct(
        protected ?int $loopCount = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsPlayContent $content = null,
    ) {

    }


    public function getLoopCount(): int|null
    {
        return $this->loopCount;
    }

    public function setLoopCount(?int $loopCount): self
    {
        $this->loopCount = $loopCount;
        return $this;
    }

    public function getContent(): \Infobip\Model\CallsPlayContent|null
    {
        return $this->content;
    }

    public function setContent(?\Infobip\Model\CallsPlayContent $content): self
    {
        $this->content = $content;
        return $this;
    }
}
