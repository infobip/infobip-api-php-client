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

class CallsDialogSayRequest
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $text,
        #[Assert\NotBlank]
        protected string $language,
        protected ?float $speechRate = null,
        protected ?int $loopCount = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsVoicePreferences $preferences = null,
    ) {

    }


    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getLanguage(): mixed
    {
        return $this->language;
    }

    public function setLanguage($language): self
    {
        $this->language = $language;
        return $this;
    }

    public function getSpeechRate(): float|null
    {
        return $this->speechRate;
    }

    public function setSpeechRate(?float $speechRate): self
    {
        $this->speechRate = $speechRate;
        return $this;
    }

    public function getLoopCount(): int|null
    {
        return $this->loopCount;
    }

    public function setLoopCount(?int $loopCount): self
    {
        $this->loopCount = $loopCount;
        return $this;
    }

    public function getPreferences(): \Infobip\Model\CallsVoicePreferences|null
    {
        return $this->preferences;
    }

    public function setPreferences(?\Infobip\Model\CallsVoicePreferences $preferences): self
    {
        $this->preferences = $preferences;
        return $this;
    }
}
