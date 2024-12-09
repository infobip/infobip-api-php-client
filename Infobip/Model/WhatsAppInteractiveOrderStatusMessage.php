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

class WhatsAppInteractiveOrderStatusMessage
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(max: 24)]
        #[Assert\Length(min: 1)]
        protected string $from,
        #[Assert\NotBlank]
        #[Assert\Length(max: 24)]
        #[Assert\Length(min: 1)]
        protected string $to,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppInteractiveOrderStatusContent $content,
        #[Assert\Length(max: 100)]
        #[Assert\Length(min: 0)]
        protected ?string $messageId = null,
        #[Assert\Length(max: 4000)]
        #[Assert\Length(min: 0)]
        protected ?string $callbackData = null,
        #[Assert\Length(max: 2048)]
        #[Assert\Length(min: 0)]
        protected ?string $notifyUrl = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\UrlOptions $urlOptions = null,
        #[Assert\Length(max: 255)]
        #[Assert\Length(min: 0)]
        protected ?string $entityId = null,
        #[Assert\Length(max: 255)]
        #[Assert\Length(min: 0)]
        protected ?string $applicationId = null,
    ) {

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

    public function getTo(): string
    {
        return $this->to;
    }

    public function setTo(string $to): self
    {
        $this->to = $to;
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

    public function getContent(): \Infobip\Model\WhatsAppInteractiveOrderStatusContent
    {
        return $this->content;
    }

    public function setContent(\Infobip\Model\WhatsAppInteractiveOrderStatusContent $content): self
    {
        $this->content = $content;
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

    public function getNotifyUrl(): string|null
    {
        return $this->notifyUrl;
    }

    public function setNotifyUrl(?string $notifyUrl): self
    {
        $this->notifyUrl = $notifyUrl;
        return $this;
    }

    public function getUrlOptions(): \Infobip\Model\UrlOptions|null
    {
        return $this->urlOptions;
    }

    public function setUrlOptions(?\Infobip\Model\UrlOptions $urlOptions): self
    {
        $this->urlOptions = $urlOptions;
        return $this;
    }

    public function getEntityId(): string|null
    {
        return $this->entityId;
    }

    public function setEntityId(?string $entityId): self
    {
        $this->entityId = $entityId;
        return $this;
    }

    public function getApplicationId(): string|null
    {
        return $this->applicationId;
    }

    public function setApplicationId(?string $applicationId): self
    {
        $this->applicationId = $applicationId;
        return $this;
    }
}
