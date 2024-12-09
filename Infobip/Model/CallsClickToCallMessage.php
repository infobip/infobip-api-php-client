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

class CallsClickToCallMessage
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $destinationA,
        #[Assert\NotBlank]
        protected string $destinationB,
        #[Assert\NotBlank]
        protected string $from,
        protected ?bool $anonymization = null,
        protected ?string $audioFileUrl = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\DeliveryTimeWindow $deliveryTimeWindow = null,
        protected ?string $fromB = null,
        protected ?string $language = null,
        protected ?string $machineDetection = null,
        protected ?int $maxDuration = null,
        protected ?string $messageId = null,
        protected ?string $notifyContentType = null,
        protected ?int $notifyContentVersion = null,
        protected ?string $notifyUrl = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsRetry $retry = null,
        protected ?string $text = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsVoice $voice = null,
        protected ?int $warningTime = null,
    ) {

    }


    public function getAnonymization(): bool|null
    {
        return $this->anonymization;
    }

    public function setAnonymization(?bool $anonymization): self
    {
        $this->anonymization = $anonymization;
        return $this;
    }

    public function getAudioFileUrl(): string|null
    {
        return $this->audioFileUrl;
    }

    public function setAudioFileUrl(?string $audioFileUrl): self
    {
        $this->audioFileUrl = $audioFileUrl;
        return $this;
    }

    public function getDeliveryTimeWindow(): \Infobip\Model\DeliveryTimeWindow|null
    {
        return $this->deliveryTimeWindow;
    }

    public function setDeliveryTimeWindow(?\Infobip\Model\DeliveryTimeWindow $deliveryTimeWindow): self
    {
        $this->deliveryTimeWindow = $deliveryTimeWindow;
        return $this;
    }

    public function getDestinationA(): string
    {
        return $this->destinationA;
    }

    public function setDestinationA(string $destinationA): self
    {
        $this->destinationA = $destinationA;
        return $this;
    }

    public function getDestinationB(): string
    {
        return $this->destinationB;
    }

    public function setDestinationB(string $destinationB): self
    {
        $this->destinationB = $destinationB;
        return $this;
    }

    public function getFrom(): string
    {
        return $this->from;
    }

    public function setFrom(string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getFromB(): string|null
    {
        return $this->fromB;
    }

    public function setFromB(?string $fromB): self
    {
        $this->fromB = $fromB;
        return $this;
    }

    public function getLanguage(): string|null
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;
        return $this;
    }

    public function getMachineDetection(): string|null
    {
        return $this->machineDetection;
    }

    public function setMachineDetection(?string $machineDetection): self
    {
        $this->machineDetection = $machineDetection;
        return $this;
    }

    public function getMaxDuration(): int|null
    {
        return $this->maxDuration;
    }

    public function setMaxDuration(?int $maxDuration): self
    {
        $this->maxDuration = $maxDuration;
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

    public function getNotifyContentType(): string|null
    {
        return $this->notifyContentType;
    }

    public function setNotifyContentType(?string $notifyContentType): self
    {
        $this->notifyContentType = $notifyContentType;
        return $this;
    }

    public function getNotifyContentVersion(): int|null
    {
        return $this->notifyContentVersion;
    }

    public function setNotifyContentVersion(?int $notifyContentVersion): self
    {
        $this->notifyContentVersion = $notifyContentVersion;
        return $this;
    }

    public function getNotifyUrl(): string|null
    {
        return $this->notifyUrl;
    }

    public function setNotifyUrl(?string $notifyUrl): self
    {
        $this->notifyUrl = $notifyUrl;
        return $this;
    }

    public function getRetry(): \Infobip\Model\CallsRetry|null
    {
        return $this->retry;
    }

    public function setRetry(?\Infobip\Model\CallsRetry $retry): self
    {
        $this->retry = $retry;
        return $this;
    }

    public function getText(): string|null
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getVoice(): \Infobip\Model\CallsVoice|null
    {
        return $this->voice;
    }

    public function setVoice(?\Infobip\Model\CallsVoice $voice): self
    {
        $this->voice = $voice;
        return $this;
    }

    public function getWarningTime(): int|null
    {
        return $this->warningTime;
    }

    public function setWarningTime(?int $warningTime): self
    {
        $this->warningTime = $warningTime;
        return $this;
    }
}
