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

class WhatsAppWebhookInboundContactMessage extends WhatsAppWebhookInboundMessage
{
    public const DISCRIMINATOR = 'type';
    public const OPENAPI_MODEL_NAME = 'WhatsAppWebhookInboundContactMessage';

    public const TYPE = 'CONTACT';

    public const OPENAPI_FORMATS = [
        'contacts' => null
    ];

    /**
     * @param \Infobip\Model\WhatsAppWebhookContact[] $contacts
     */
    public function __construct(
        #[Assert\Valid]

    protected ?\Infobip\Model\WhatsAppWebhookContext $context = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\WhatsAppWebhookIdentity $identity = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\WhatsAppWebhookReferral $referral = null,
        protected ?array $contacts = null,
    ) {
        $modelDiscriminatorValue = 'CONTACT';

        parent::__construct(
            type: $modelDiscriminatorValue,
            context: $context,
            identity: $identity,
            referral: $referral,
        );
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

    /**
     * @return \Infobip\Model\WhatsAppWebhookContact[]|null
     */
    public function getContacts(): ?array
    {
        return $this->contacts;
    }

    /**
     * @param \Infobip\Model\WhatsAppWebhookContact[]|null $contacts contacts
     */
    public function setContacts(?array $contacts): self
    {
        $this->contacts = $contacts;
        return $this;
    }
}
