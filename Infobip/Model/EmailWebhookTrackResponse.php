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

class EmailWebhookTrackResponse
{
    /**
     */
    public function __construct(
        protected ?string $notificationType = null,
        protected ?string $domain = null,
        protected ?string $recipient = null,
        protected ?string $url = null,
        protected ?float $sendDateTime = null,
        protected ?string $messageId = null,
        protected ?string $bulkId = null,
        protected ?string $callbackData = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\EmailWebhookRecipientInfo $recipientInfo = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\EmailWebhookGeoLocation $geoLocation = null,
    ) {

    }


    public function getNotificationType(): string|null
    {
        return $this->notificationType;
    }

    public function setNotificationType(?string $notificationType): self
    {
        $this->notificationType = $notificationType;
        return $this;
    }

    public function getDomain(): string|null
    {
        return $this->domain;
    }

    public function setDomain(?string $domain): self
    {
        $this->domain = $domain;
        return $this;
    }

    public function getRecipient(): string|null
    {
        return $this->recipient;
    }

    public function setRecipient(?string $recipient): self
    {
        $this->recipient = $recipient;
        return $this;
    }

    public function getUrl(): string|null
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getSendDateTime(): float|null
    {
        return $this->sendDateTime;
    }

    public function setSendDateTime(?float $sendDateTime): self
    {
        $this->sendDateTime = $sendDateTime;
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

    public function getBulkId(): string|null
    {
        return $this->bulkId;
    }

    public function setBulkId(?string $bulkId): self
    {
        $this->bulkId = $bulkId;
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

    public function getRecipientInfo(): \Infobip\Model\EmailWebhookRecipientInfo|null
    {
        return $this->recipientInfo;
    }

    public function setRecipientInfo(?\Infobip\Model\EmailWebhookRecipientInfo $recipientInfo): self
    {
        $this->recipientInfo = $recipientInfo;
        return $this;
    }

    public function getGeoLocation(): \Infobip\Model\EmailWebhookGeoLocation|null
    {
        return $this->geoLocation;
    }

    public function setGeoLocation(?\Infobip\Model\EmailWebhookGeoLocation $geoLocation): self
    {
        $this->geoLocation = $geoLocation;
        return $this;
    }
}
