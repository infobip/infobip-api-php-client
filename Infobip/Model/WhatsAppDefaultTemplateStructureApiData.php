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

class WhatsAppDefaultTemplateStructureApiData implements WhatsAppTemplateStructureApiData
{
    /**
     * @param \Infobip\Model\WhatsAppButtonApiData[] $buttons
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\WhatsAppBodyApiData $body,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppHeaderApiData $header = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppFooterApiData $footer = null,
        protected ?array $buttons = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppCarouselApiData $carousel = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppLimitedTimeOfferApiData $limitedTimeOffer = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WhatsAppShorteningOptionsApiData $shorteningOptions = null,
        protected ?string $type = null,
    ) {

    }


    public function getHeader(): \Infobip\Model\WhatsAppHeaderApiData|null
    {
        return $this->header;
    }

    public function setHeader(?\Infobip\Model\WhatsAppHeaderApiData $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function getBody(): \Infobip\Model\WhatsAppBodyApiData
    {
        return $this->body;
    }

    public function setBody(\Infobip\Model\WhatsAppBodyApiData $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function getFooter(): \Infobip\Model\WhatsAppFooterApiData|null
    {
        return $this->footer;
    }

    public function setFooter(?\Infobip\Model\WhatsAppFooterApiData $footer): self
    {
        $this->footer = $footer;
        return $this;
    }

    /**
     * @return \Infobip\Model\WhatsAppButtonApiData[]|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }

    /**
     * @param \Infobip\Model\WhatsAppButtonApiData[]|null $buttons Template buttons. Can contain 1 to 10 buttons which include up to 2 URL buttons, a phone number button and `copy code` button. `quick reply` and non `quick reply` buttons have to be grouped together.
     */
    public function setButtons(?array $buttons): self
    {
        $this->buttons = $buttons;
        return $this;
    }

    public function getCarousel(): \Infobip\Model\WhatsAppCarouselApiData|null
    {
        return $this->carousel;
    }

    public function setCarousel(?\Infobip\Model\WhatsAppCarouselApiData $carousel): self
    {
        $this->carousel = $carousel;
        return $this;
    }

    public function getLimitedTimeOffer(): \Infobip\Model\WhatsAppLimitedTimeOfferApiData|null
    {
        return $this->limitedTimeOffer;
    }

    public function setLimitedTimeOffer(?\Infobip\Model\WhatsAppLimitedTimeOfferApiData $limitedTimeOffer): self
    {
        $this->limitedTimeOffer = $limitedTimeOffer;
        return $this;
    }

    public function getShorteningOptions(): \Infobip\Model\WhatsAppShorteningOptionsApiData|null
    {
        return $this->shorteningOptions;
    }

    public function setShorteningOptions(?\Infobip\Model\WhatsAppShorteningOptionsApiData $shorteningOptions): self
    {
        $this->shorteningOptions = $shorteningOptions;
        return $this;
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
}
