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

class CallsSayOptions
{
    /**
     */
    public function __construct(
        protected ?string $language = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsVoiceOptions $voice = null,
        #[Assert\LessThanOrEqual(2.0)]
        #[Assert\GreaterThanOrEqual(0.5)]
        protected ?float $speechRate = null,
    ) {

    }


    public function getLanguage(): string|null
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;
        return $this;
    }

    public function getVoice(): \Infobip\Model\CallsVoiceOptions|null
    {
        return $this->voice;
    }

    public function setVoice(?\Infobip\Model\CallsVoiceOptions $voice): self
    {
        $this->voice = $voice;
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
}
