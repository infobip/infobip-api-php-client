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

class WhatsAppTemplateDataContent
{
    /**
     * @param \Infobip\Model\WhatsAppTemplateButtonContent[] $buttons
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppTemplateBodyContent $body,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppTemplateHeaderContent $header = null,
        protected ?array $buttons = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppTemplateCarouselContent $carousel = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppTemplateLimitedTimeOfferContent $limitedTimeOffer = null,
    ) {

    }


    public function getBody(): \Infobip\Model\WhatsAppTemplateBodyContent
    {
        return $this->body;
    }

    public function setBody(\Infobip\Model\WhatsAppTemplateBodyContent $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function getHeader(): \Infobip\Model\WhatsAppTemplateHeaderContent|null
    {
        return $this->header;
    }

    public function setHeader(?\Infobip\Model\WhatsAppTemplateHeaderContent $header): self
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @return \Infobip\Model\WhatsAppTemplateButtonContent[]|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }

    /**
     * @param \Infobip\Model\WhatsAppTemplateButtonContent[]|null $buttons Template buttons. Should be defined in the correct order, only if `quick reply`, `dynamic URL`, `copy code` or `flow`  buttons have been registered. It can have up to ten buttons including a maximum of two `dynamic URL` buttons and one `copy code` button. When `flow`, `catalog`, `multi product` or `order details` button is used it needs to be the only button.
     */
    public function setButtons(?array $buttons): self
    {
        $this->buttons = $buttons;
        return $this;
    }

    public function getCarousel(): \Infobip\Model\WhatsAppTemplateCarouselContent|null
    {
        return $this->carousel;
    }

    public function setCarousel(?\Infobip\Model\WhatsAppTemplateCarouselContent $carousel): self
    {
        $this->carousel = $carousel;
        return $this;
    }

    public function getLimitedTimeOffer(): \Infobip\Model\WhatsAppTemplateLimitedTimeOfferContent|null
    {
        return $this->limitedTimeOffer;
    }

    public function setLimitedTimeOffer(?\Infobip\Model\WhatsAppTemplateLimitedTimeOfferContent $limitedTimeOffer): self
    {
        $this->limitedTimeOffer = $limitedTimeOffer;
        return $this;
    }
}
