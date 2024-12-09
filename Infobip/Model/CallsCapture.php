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

class CallsCapture implements CallsScriptOneOf
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $capture,
        #[Assert\NotBlank]
        #[Assert\LessThanOrEqual(30)]
        #[Assert\GreaterThanOrEqual(1)]
        protected int $timeout,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\CallsSpeechOptions $speechOptions,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsDtmfOptions $dtmfOptions = null,
        protected ?string $sendToReports = null,
        protected ?int $actionId = null,
    ) {

    }


    public function getCapture(): string
    {
        return $this->capture;
    }

    public function setCapture(string $capture): self
    {
        $this->capture = $capture;
        return $this;
    }

    public function getTimeout(): int
    {
        return $this->timeout;
    }

    public function setTimeout(int $timeout): self
    {
        $this->timeout = $timeout;
        return $this;
    }

    public function getSpeechOptions(): \Infobip\Model\CallsSpeechOptions
    {
        return $this->speechOptions;
    }

    public function setSpeechOptions(\Infobip\Model\CallsSpeechOptions $speechOptions): self
    {
        $this->speechOptions = $speechOptions;
        return $this;
    }

    public function getDtmfOptions(): \Infobip\Model\CallsDtmfOptions|null
    {
        return $this->dtmfOptions;
    }

    public function setDtmfOptions(?\Infobip\Model\CallsDtmfOptions $dtmfOptions): self
    {
        $this->dtmfOptions = $dtmfOptions;
        return $this;
    }

    public function getSendToReports(): mixed
    {
        return $this->sendToReports;
    }

    public function setSendToReports($sendToReports): self
    {
        $this->sendToReports = $sendToReports;
        return $this;
    }

    public function getActionId(): int|null
    {
        return $this->actionId;
    }

    public function setActionId(?int $actionId): self
    {
        $this->actionId = $actionId;
        return $this;
    }
}
