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

class MessagesApiDeliveryResult
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $event = 'DELIVERY',
        #[Assert\NotBlank]
        protected string $channel,
        #[Assert\NotBlank]
        protected string $sender,
        #[Assert\NotBlank]
        protected string $destination,
        #[Assert\NotBlank]
        protected string $sentAt,
        #[Assert\NotBlank]
        protected string $doneAt,
        #[Assert\NotBlank]
        protected string $bulkId,
        #[Assert\NotBlank]
        protected string $messageId,
        #[Assert\NotBlank]
        protected int $messageCount,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\MessagesApiDeliveryStatus $status,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\MessageError $error,
        protected ?string $callbackData = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\Platform $platform = null,
        protected ?string $deviceDetails = null,
        protected ?int $mccMnc = null,
        protected ?int $networkId = null,
        protected ?string $campaignReferenceId = null,
    ) {

    }


    public function getEvent(): string
    {
        return $this->event;
    }

    public function setEvent(string $event): self
    {
        $this->event = $event;
        return $this;
    }

    public function getChannel(): mixed
    {
        return $this->channel;
    }

    public function setChannel($channel): self
    {
        $this->channel = $channel;
        return $this;
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;
        return $this;
    }

    public function getSentAt(): string
    {
        return $this->sentAt;
    }

    public function setSentAt(string $sentAt): self
    {
        $this->sentAt = $sentAt;
        return $this;
    }

    public function getDoneAt(): string
    {
        return $this->doneAt;
    }

    public function setDoneAt(string $doneAt): self
    {
        $this->doneAt = $doneAt;
        return $this;
    }

    public function getBulkId(): string
    {
        return $this->bulkId;
    }

    public function setBulkId(string $bulkId): self
    {
        $this->bulkId = $bulkId;
        return $this;
    }

    public function getMessageId(): string
    {
        return $this->messageId;
    }

    public function setMessageId(string $messageId): self
    {
        $this->messageId = $messageId;
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

    public function getMessageCount(): int
    {
        return $this->messageCount;
    }

    public function setMessageCount(int $messageCount): self
    {
        $this->messageCount = $messageCount;
        return $this;
    }

    public function getStatus(): \Infobip\Model\MessagesApiDeliveryStatus
    {
        return $this->status;
    }

    public function setStatus(\Infobip\Model\MessagesApiDeliveryStatus $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getError(): \Infobip\Model\MessageError
    {
        return $this->error;
    }

    public function setError(\Infobip\Model\MessageError $error): self
    {
        $this->error = $error;
        return $this;
    }

    public function getPlatform(): \Infobip\Model\Platform|null
    {
        return $this->platform;
    }

    public function setPlatform(?\Infobip\Model\Platform $platform): self
    {
        $this->platform = $platform;
        return $this;
    }

    public function getDeviceDetails(): string|null
    {
        return $this->deviceDetails;
    }

    public function setDeviceDetails(?string $deviceDetails): self
    {
        $this->deviceDetails = $deviceDetails;
        return $this;
    }

    public function getMccMnc(): int|null
    {
        return $this->mccMnc;
    }

    public function setMccMnc(?int $mccMnc): self
    {
        $this->mccMnc = $mccMnc;
        return $this;
    }

    public function getNetworkId(): int|null
    {
        return $this->networkId;
    }

    public function setNetworkId(?int $networkId): self
    {
        $this->networkId = $networkId;
        return $this;
    }

    public function getCampaignReferenceId(): string|null
    {
        return $this->campaignReferenceId;
    }

    public function setCampaignReferenceId(?string $campaignReferenceId): self
    {
        $this->campaignReferenceId = $campaignReferenceId;
        return $this;
    }
}
