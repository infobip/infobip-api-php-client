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

class WhatsAppWebhookReferral
{
    /**
     */
    public function __construct(
        protected ?string $sourceType = null,
        protected ?string $sourceId = null,
        protected ?string $sourceUrl = null,
        protected ?string $headline = null,
        protected ?string $body = null,
        protected ?string $ctwaClickId = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppWebhookReferralMedia $referralMedia = null,
    ) {

    }


    public function getSourceType(): mixed
    {
        return $this->sourceType;
    }

    public function setSourceType($sourceType): self
    {
        $this->sourceType = $sourceType;
        return $this;
    }

    public function getSourceId(): string|null
    {
        return $this->sourceId;
    }

    public function setSourceId(?string $sourceId): self
    {
        $this->sourceId = $sourceId;
        return $this;
    }

    public function getSourceUrl(): string|null
    {
        return $this->sourceUrl;
    }

    public function setSourceUrl(?string $sourceUrl): self
    {
        $this->sourceUrl = $sourceUrl;
        return $this;
    }

    public function getHeadline(): string|null
    {
        return $this->headline;
    }

    public function setHeadline(?string $headline): self
    {
        $this->headline = $headline;
        return $this;
    }

    public function getBody(): string|null
    {
        return $this->body;
    }

    public function setBody(?string $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function getCtwaClickId(): string|null
    {
        return $this->ctwaClickId;
    }

    public function setCtwaClickId(?string $ctwaClickId): self
    {
        $this->ctwaClickId = $ctwaClickId;
        return $this;
    }

    public function getReferralMedia(): \Infobip\Model\WhatsAppWebhookReferralMedia|null
    {
        return $this->referralMedia;
    }

    public function setReferralMedia(?\Infobip\Model\WhatsAppWebhookReferralMedia $referralMedia): self
    {
        $this->referralMedia = $referralMedia;
        return $this;
    }
}
