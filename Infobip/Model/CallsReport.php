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

class CallsReport
{
    /**
     */
    public function __construct(
        protected ?string $bulkId = null,
        protected ?string $messageId = null,
        protected ?string $from = null,
        protected ?string $to = null,
        protected ?string $sentAt = null,
        protected ?string $mccMnc = null,
        protected ?string $callbackData = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsVoiceData $voiceCall = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsPrice $price = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsSingleMessageStatus $status = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsVoiceError $error = null,
    ) {

    }


    public function getBulkId(): string|null
    {
        return $this->bulkId;
    }

    public function setBulkId(?string $bulkId): self
    {
        $this->bulkId = $bulkId;
        return $this;
    }

    public function getMessageId(): string|null
    {
        return $this->messageId;
    }

    public function setMessageId(?string $messageId): self
    {
        $this->messageId = $messageId;
        return $this;
    }

    public function getFrom(): string|null
    {
        return $this->from;
    }

    public function setFrom(?string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getTo(): string|null
    {
        return $this->to;
    }

    public function setTo(?string $to): self
    {
        $this->to = $to;
        return $this;
    }

    public function getSentAt(): string|null
    {
        return $this->sentAt;
    }

    public function setSentAt(?string $sentAt): self
    {
        $this->sentAt = $sentAt;
        return $this;
    }

    public function getMccMnc(): string|null
    {
        return $this->mccMnc;
    }

    public function setMccMnc(?string $mccMnc): self
    {
        $this->mccMnc = $mccMnc;
        return $this;
    }

    public function getCallbackData(): string|null
    {
        return $this->callbackData;
    }

    public function setCallbackData(?string $callbackData): self
    {
        $this->callbackData = $callbackData;
        return $this;
    }

    public function getVoiceCall(): \Infobip\Model\CallsVoiceData|null
    {
        return $this->voiceCall;
    }

    public function setVoiceCall(?\Infobip\Model\CallsVoiceData $voiceCall): self
    {
        $this->voiceCall = $voiceCall;
        return $this;
    }

    public function getPrice(): \Infobip\Model\CallsPrice|null
    {
        return $this->price;
    }

    public function setPrice(?\Infobip\Model\CallsPrice $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getStatus(): \Infobip\Model\CallsSingleMessageStatus|null
    {
        return $this->status;
    }

    public function setStatus(?\Infobip\Model\CallsSingleMessageStatus $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getError(): \Infobip\Model\CallsVoiceError|null
    {
        return $this->error;
    }

    public function setError(?\Infobip\Model\CallsVoiceError $error): self
    {
        $this->error = $error;
        return $this;
    }
}
