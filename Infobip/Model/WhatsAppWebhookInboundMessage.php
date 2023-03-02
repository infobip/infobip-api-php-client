<?php

// phpcs:ignorefile

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
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

#[DiscriminatorMap(typeProperty: "type", mapping: [
    "AUDIO" => "\Infobip\Model\WhatsAppWebhookInboundAudioMessage",
    "BUTTON" => "\Infobip\Model\WhatsAppWebhookQuickReplyContent",
    "CONTACT" => "\Infobip\Model\WhatsAppWebhookInboundContactMessage",
    "DOCUMENT" => "\Infobip\Model\WhatsAppWebhookInboundDocumentMessage",
    "IMAGE" => "\Infobip\Model\WhatsAppWebhookInboundImageMessage",
    "INTERACTIVE_BUTTON_REPLY" => "\Infobip\Model\WhatsAppWebhookButtonReplyContent",
    "INTERACTIVE_LIST_REPLY" => "\Infobip\Model\WhatsAppWebhookListReplyContent",
    "LOCATION" => "\Infobip\Model\WhatsAppWebhookInboundLocationMessage",
    "ORDER" => "\Infobip\Model\WhatsAppWebhookOrderContent",
    "STICKER" => "\Infobip\Model\WhatsAppWebhookInboundStickerMessage",
    "TEXT" => "\Infobip\Model\WhatsAppWebhookInboundTextMessage",
    "VIDEO" => "\Infobip\Model\WhatsAppWebhookInboundVideoMessage",
    "VOICE" => "\Infobip\Model\WhatsAppWebhookInboundVoiceMessage",
    "WhatsAppWebhookButtonReplyContent" => "\Infobip\Model\WhatsAppWebhookButtonReplyContent",
    "WhatsAppWebhookInboundAudioMessage" => "\Infobip\Model\WhatsAppWebhookInboundAudioMessage",
    "WhatsAppWebhookInboundContactMessage" => "\Infobip\Model\WhatsAppWebhookInboundContactMessage",
    "WhatsAppWebhookInboundDocumentMessage" => "\Infobip\Model\WhatsAppWebhookInboundDocumentMessage",
    "WhatsAppWebhookInboundImageMessage" => "\Infobip\Model\WhatsAppWebhookInboundImageMessage",
    "WhatsAppWebhookInboundLocationMessage" => "\Infobip\Model\WhatsAppWebhookInboundLocationMessage",
    "WhatsAppWebhookInboundStickerMessage" => "\Infobip\Model\WhatsAppWebhookInboundStickerMessage",
    "WhatsAppWebhookInboundTextMessage" => "\Infobip\Model\WhatsAppWebhookInboundTextMessage",
    "WhatsAppWebhookInboundVideoMessage" => "\Infobip\Model\WhatsAppWebhookInboundVideoMessage",
    "WhatsAppWebhookInboundVoiceMessage" => "\Infobip\Model\WhatsAppWebhookInboundVoiceMessage",
    "WhatsAppWebhookListReplyContent" => "\Infobip\Model\WhatsAppWebhookListReplyContent",
    "WhatsAppWebhookOrderContent" => "\Infobip\Model\WhatsAppWebhookOrderContent",
    "WhatsAppWebhookQuickReplyContent" => "\Infobip\Model\WhatsAppWebhookQuickReplyContent",
])]
class WhatsAppWebhookInboundMessage implements ModelInterface
{
    public const DISCRIMINATOR = 'type';
    public const OPENAPI_MODEL_NAME = 'WhatsAppWebhookInboundMessage';

    public const OPENAPI_FORMATS = [
        'type' => null,
        'context' => null,
        'identity' => null,
        'referral' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\Choice(['TEXT','IMAGE','DOCUMENT','STICKER','LOCATION','CONTACT','VIDEO','VOICE','AUDIO','BUTTON','INTERACTIVE_BUTTON_REPLY','INTERACTIVE_LIST_REPLY','ORDER','UNSUPPORTED',])]

    protected ?string $type = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\WhatsAppWebhookContext $context = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\WhatsAppWebhookIdentity $identity = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\WhatsAppWebhookReferral $referral = null,
    ) {
    }

    #[Ignore]
    public function getModelName(): string
    {
        return self::OPENAPI_MODEL_NAME;
    }

    #[Ignore]
    public static function getDiscriminator(): ?string
    {
        return self::DISCRIMINATOR;
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

    public function getContext(): \Infobip\Model\WhatsAppWebhookContext|null
    {
        return $this->context;
    }

    public function setContext(?\Infobip\Model\WhatsAppWebhookContext $context): self
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
