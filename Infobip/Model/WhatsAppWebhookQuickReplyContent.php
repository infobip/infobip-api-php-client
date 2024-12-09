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

class WhatsAppWebhookQuickReplyContent extends WhatsAppWebhookInboundMessage
{
    public const TYPE = 'BUTTON';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(max: 20)]
        #[Assert\Length(min: 0)]
        protected string $text,
        #[Assert\NotBlank]
        #[Assert\Length(max: 128)]
        #[Assert\Length(min: 0)]
        protected string $payload,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppContext $context = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppWebhookIdentity $identity = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppWebhookReferral $referral = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
            context: $context,
            identity: $identity,
            referral: $referral,
        );
    }


    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function setPayload(string $payload): self
    {
        $this->payload = $payload;
        return $this;
    }
}
