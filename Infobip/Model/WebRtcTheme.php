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

class WebRtcTheme
{
    /**
     * @param \Infobip\Model\WebRtcLayout[] $layouts
     */
    public function __construct(
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcImages $images = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcMessages $messages = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcColors $colors = null,
        protected ?array $layouts = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcLocalization $localization = null,
    ) {

    }


    public function getImages(): \Infobip\Model\WebRtcImages|null
    {
        return $this->images;
    }

    public function setImages(?\Infobip\Model\WebRtcImages $images): self
    {
        $this->images = $images;
        return $this;
    }

    public function getMessages(): \Infobip\Model\WebRtcMessages|null
    {
        return $this->messages;
    }

    public function setMessages(?\Infobip\Model\WebRtcMessages $messages): self
    {
        $this->messages = $messages;
        return $this;
    }

    public function getColors(): \Infobip\Model\WebRtcColors|null
    {
        return $this->colors;
    }

    public function setColors(?\Infobip\Model\WebRtcColors $colors): self
    {
        $this->colors = $colors;
        return $this;
    }

    /**
     * @return \Infobip\Model\WebRtcLayout[]|null
     */
    public function getLayouts(): ?array
    {
        return $this->layouts;
    }

    /**
     * @param \Infobip\Model\WebRtcLayout[]|null $layouts Represents layout during the call.When GRID layout is selected, multiple video streams are displayed simultaneously and user can spotlight specific video stream.When SOLO layout is selected, an user can see only his video streams.If there are more than one layout in this list, the first one will be initially selected, and users can change it during the call.The default layout will be set to GRID.
     */
    public function setLayouts(?array $layouts): self
    {
        $this->layouts = $layouts;
        return $this;
    }

    public function getLocalization(): \Infobip\Model\WebRtcLocalization|null
    {
        return $this->localization;
    }

    public function setLocalization(?\Infobip\Model\WebRtcLocalization $localization): self
    {
        $this->localization = $localization;
        return $this;
    }
}
