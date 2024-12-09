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

class CallsPlayRequest
{
    /**
     * @param array<string,string> $customData
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\CallsPlayContent $content,
        protected ?int $loopCount = null,
        protected ?int $timeout = null,
        protected ?int $offset = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsTermination $stopOn = null,
        protected ?array $customData = null,
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

    public function getTimeout(): int|null
    {
        return $this->timeout;
    }

    public function setTimeout(?int $timeout): self
    {
        $this->timeout = $timeout;
        return $this;
    }

    public function getOffset(): int|null
    {
        return $this->offset;
    }

    public function setOffset(?int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    public function getContent(): \Infobip\Model\CallsPlayContent
    {
        return $this->content;
    }

    public function setContent(\Infobip\Model\CallsPlayContent $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getStopOn(): \Infobip\Model\CallsTermination|null
    {
        return $this->stopOn;
    }

    public function setStopOn(?\Infobip\Model\CallsTermination $stopOn): self
    {
        $this->stopOn = $stopOn;
        return $this;
    }

    /**
     * @return array<string,string>|null
     */
    public function getCustomData()
    {
        return $this->customData;
    }

    /**
     * @param array<string,string>|null $customData Optional parameter to update a call's custom data.
     */
    public function setCustomData(?array $customData): self
    {
        $this->customData = $customData;
        return $this;
    }
}
