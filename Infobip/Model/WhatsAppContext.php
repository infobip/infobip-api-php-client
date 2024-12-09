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

class WhatsAppContext
{
    /**
     */
    public function __construct(
        protected ?string $id = null,
        protected ?string $from = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppWebhookReferredProduct $referredProduct = null,
    ) {

    }


    public function getId(): string|null
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getFrom(): string|null
    {
        return $this->from;
    }

    public function setFrom(?string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getReferredProduct(): \Infobip\Model\WhatsAppWebhookReferredProduct|null
    {
        return $this->referredProduct;
    }

    public function setReferredProduct(?\Infobip\Model\WhatsAppWebhookReferredProduct $referredProduct): self
    {
        $this->referredProduct = $referredProduct;
        return $this;
    }
}
