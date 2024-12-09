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


class WebRtcInitialOptions
{
    /**
     */
    public function __construct(
        protected ?bool $audio = true,
        protected ?bool $video = true,
        protected ?bool $muted = true,
        protected ?bool $settings = true,
        protected ?string $cameraFacingMode = null,
    ) {

    }


    public function getAudio(): bool|null
    {
        return $this->audio;
    }

    public function setAudio(?bool $audio): self
    {
        $this->audio = $audio;
        return $this;
    }

    public function getVideo(): bool|null
    {
        return $this->video;
    }

    public function setVideo(?bool $video): self
    {
        $this->video = $video;
        return $this;
    }

    public function getMuted(): bool|null
    {
        return $this->muted;
    }

    public function setMuted(?bool $muted): self
    {
        $this->muted = $muted;
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

    public function getCameraFacingMode(): mixed
    {
        return $this->cameraFacingMode;
    }

    public function setCameraFacingMode($cameraFacingMode): self
    {
        $this->cameraFacingMode = $cameraFacingMode;
        return $this;
    }
}
