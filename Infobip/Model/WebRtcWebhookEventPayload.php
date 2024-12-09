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

class WebRtcWebhookEventPayload
{
    /**
     * @param array<string,string> $customData
     */
    public function __construct(
        protected ?string $callLinkId = null,
        protected ?string $callLinkConfigId = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcCallDetails $callDetails = null,
        protected ?array $customData = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\ClientRecording $recording = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcErrorCode $errorCode = null,
    ) {

    }


    public function getCallLinkId(): string|null
    {
        return $this->callLinkId;
    }

    public function setCallLinkId(?string $callLinkId): self
    {
        $this->callLinkId = $callLinkId;
        return $this;
    }

    public function getCallLinkConfigId(): string|null
    {
        return $this->callLinkConfigId;
    }

    public function setCallLinkConfigId(?string $callLinkConfigId): self
    {
        $this->callLinkConfigId = $callLinkConfigId;
        return $this;
    }

    public function getCallDetails(): \Infobip\Model\WebRtcCallDetails|null
    {
        return $this->callDetails;
    }

    public function setCallDetails(?\Infobip\Model\WebRtcCallDetails $callDetails): self
    {
        $this->callDetails = $callDetails;
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
     * @param array<string,string>|null $customData Custom attributes sent in a call once it has started.
     */
    public function setCustomData(?array $customData): self
    {
        $this->customData = $customData;
        return $this;
    }

    public function getRecording(): \Infobip\Model\ClientRecording|null
    {
        return $this->recording;
    }

    public function setRecording(?\Infobip\Model\ClientRecording $recording): self
    {
        $this->recording = $recording;
        return $this;
    }

    public function getErrorCode(): \Infobip\Model\WebRtcErrorCode|null
    {
        return $this->errorCode;
    }

    public function setErrorCode(?\Infobip\Model\WebRtcErrorCode $errorCode): self
    {
        $this->errorCode = $errorCode;
        return $this;
    }
}
