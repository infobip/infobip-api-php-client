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

class CallsMultiMessage
{
    /**
     * @param string[] $to
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $to,
        protected ?string $audioFileUrl = null,
        protected ?string $from = null,
        protected ?string $language = null,
        protected ?string $text = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsVoice $voice = null,
    ) {

    }


    public function getAudioFileUrl(): string|null
    {
        return $this->audioFileUrl;
    }

    public function setAudioFileUrl(?string $audioFileUrl): self
    {
        $this->audioFileUrl = $audioFileUrl;
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

    public function getLanguage(): string|null
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;
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
     * @return string[]
     */
    public function getTo(): array
    {
        return $this->to;
    }

    /**
     * @param string[] $to Phone number of the recipient. Phone number must be written in E.164 standard format (Example: 41793026727). Maximum number of phone numbers listed is 20k.
     */
    public function setTo(array $to): self
    {
        $this->to = $to;
        return $this;
    }

    public function getVoice(): \Infobip\Model\CallsVoice|null
    {
        return $this->voice;
    }

    public function setVoice(?\Infobip\Model\CallsVoice $voice): self
    {
        $this->voice = $voice;
        return $this;
    }
}
