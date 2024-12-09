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
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

#[DiscriminatorMap(typeProperty: "type", mapping: [
    "AUDIO" => "\Infobip\Model\WhatsAppWebhookInboundAudioMessage",
    "BUTTON" => "\Infobip\Model\WhatsAppWebhookQuickReplyContent",
    "CONTACT" => "\Infobip\Model\WhatsAppWebhookInboundContactMessage",
    "DOCUMENT" => "\Infobip\Model\WhatsAppWebhookInboundDocumentMessage",
    "IMAGE" => "\Infobip\Model\WhatsAppWebhookInboundImageMessage",
    "INTERACTIVE_BUTTON_REPLY" => "\Infobip\Model\WhatsAppWebhookButtonReplyContent",
    "INTERACTIVE_LIST_REPLY" => "\Infobip\Model\WhatsAppWebhookListReplyContent",
    "INTERACTIVE_PAYMENT_CONFIRMATION" => "\Infobip\Model\WhatsAppWebhookPaymentConfirmationContent",
    "LOCATION" => "\Infobip\Model\WhatsAppWebhookInboundLocationMessage",
    "ORDER" => "\Infobip\Model\WhatsAppWebhookOrderContent",
    "STICKER" => "\Infobip\Model\WhatsAppWebhookInboundStickerMessage",
    "TEXT" => "\Infobip\Model\WhatsAppWebhookInboundTextMessage",
    "VIDEO" => "\Infobip\Model\WhatsAppWebhookInboundVideoMessage",
    "VOICE" => "\Infobip\Model\WhatsAppWebhookInboundVoiceMessage",
])]

class WhatsAppWebhookInboundMessage
{
    /**
     */
    public function __construct(
        protected ?string $type = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppContext $context = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppWebhookIdentity $identity = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppWebhookReferral $referral = null,
    ) {

    }


    public function getType(): mixed
    {
        return $this->type;
    }

    public function setType($type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getContext(): \Infobip\Model\WhatsAppContext|null
    {
        return $this->context;
    }

    public function setContext(?\Infobip\Model\WhatsAppContext $context): self
    {
        $this->context = $context;
        return $this;
    }

    public function getIdentity(): \Infobip\Model\WhatsAppWebhookIdentity|null
    {
        return $this->identity;
    }

    public function setIdentity(?\Infobip\Model\WhatsAppWebhookIdentity $identity): self
    {
        $this->identity = $identity;
        return $this;
    }

    public function getReferral(): \Infobip\Model\WhatsAppWebhookReferral|null
    {
        return $this->referral;
    }

    public function setReferral(?\Infobip\Model\WhatsAppWebhookReferral $referral): self
    {
        $this->referral = $referral;
        return $this;
    }
}
