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

class SmsWebhooks
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        protected ?\Infobip\Model\SmsMessageDeliveryReporting $delivery = null,
        protected ?string $contentType = null,
        #[Assert\Length(max: 4000)]
        #[Assert\Length(min: 0)]
        protected ?string $callbackData = null,
    ) {

    }


    public function getDelivery(): \Infobip\Model\SmsMessageDeliveryReporting|null
    {
        return $this->delivery;
    }

    public function setDelivery(?\Infobip\Model\SmsMessageDeliveryReporting $delivery): self
    {
        $this->delivery = $delivery;
        return $this;
    }

    public function getContentType(): string|null
    {
        return $this->contentType;
    }

    public function setContentType(?string $contentType): self
    {
        $this->contentType = $contentType;
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
}
