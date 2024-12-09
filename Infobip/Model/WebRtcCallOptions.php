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


class WebRtcCallOptions
{
    /**
     */
    public function __construct(
        protected ?bool $mute = true,
        protected ?bool $screenShare = true,
        protected ?bool $camera = true,
        protected ?bool $switchCameraFacingMode = true,
        protected ?bool $dialPad = false,
        protected ?bool $chat = false,
        protected ?bool $settings = true,
        protected ?bool $recordingIndicator = false,
    ) {

    }


    public function getMute(): bool|null
    {
        return $this->mute;
    }

    public function setMute(?bool $mute): self
    {
        $this->mute = $mute;
        return $this;
    }

    public function getScreenShare(): bool|null
    {
        return $this->screenShare;
    }

    public function setScreenShare(?bool $screenShare): self
    {
        $this->screenShare = $screenShare;
        return $this;
    }

    public function getCamera(): bool|null
    {
        return $this->camera;
    }

    public function setCamera(?bool $camera): self
    {
        $this->camera = $camera;
        return $this;
    }

    public function getSwitchCameraFacingMode(): bool|null
    {
        return $this->switchCameraFacingMode;
    }

    public function setSwitchCameraFacingMode(?bool $switchCameraFacingMode): self
    {
        $this->switchCameraFacingMode = $switchCameraFacingMode;
        return $this;
    }

    public function getDialPad(): bool|null
    {
        return $this->dialPad;
    }

    public function setDialPad(?bool $dialPad): self
    {
        $this->dialPad = $dialPad;
        return $this;
    }

    public function getChat(): bool|null
    {
        return $this->chat;
    }

    public function setChat(?bool $chat): self
    {
        $this->chat = $chat;
        return $this;
    }

    public function getSettings(): bool|null
    {
        return $this->settings;
    }

    public function setSettings(?bool $settings): self
    {
        $this->settings = $settings;
        return $this;
    }

    public function getRecordingIndicator(): bool|null
    {
        return $this->recordingIndicator;
    }

    public function setRecordingIndicator(?bool $recordingIndicator): self
    {
        $this->recordingIndicator = $recordingIndicator;
        return $this;
    }
}
