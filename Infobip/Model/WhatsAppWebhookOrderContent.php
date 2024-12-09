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

class WhatsAppWebhookOrderContent extends WhatsAppWebhookInboundMessage
{
    public const TYPE = 'ORDER';

    /**
     * @param \Infobip\Model\WhatsAppWebhookProductItem[] $productItems
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(min: 0)]
        protected string $catalogId,
        #[Assert\NotBlank]
        #[Assert\Count(min: 1)]
        protected array $productItems,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppContext $context = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppWebhookIdentity $identity = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppWebhookReferral $referral = null,
        protected ?string $text = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
            context: $context,
            identity: $identity,
            referral: $referral,
        );
    }


    public function getCatalogId(): string
    {
        return $this->catalogId;
    }

    public function setCatalogId(string $catalogId): self
    {
        $this->catalogId = $catalogId;
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

    /**
     * @return \Infobip\Model\WhatsAppWebhookProductItem[]
     */
    public function getProductItems(): array
    {
        return $this->productItems;
    }

    /**
     * @param \Infobip\Model\WhatsAppWebhookProductItem[] $productItems An array of selected products.
     */
    public function setProductItems(array $productItems): self
    {
        $this->productItems = $productItems;
        return $this;
    }
}
