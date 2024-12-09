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

class SmsTextContent implements SmsMessageContent
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $text,
        protected ?string $transliteration = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\SmsLanguage $language = null,
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

    public function getTransliteration(): mixed
    {
        return $this->transliteration;
    }

    public function setTransliteration($transliteration): self
    {
        $this->transliteration = $transliteration;
        return $this;
    }

    public function getLanguage(): \Infobip\Model\SmsLanguage|null
    {
        return $this->language;
    }

    public function setLanguage(?\Infobip\Model\SmsLanguage $language): self
    {
        $this->language = $language;
        return $this;
    }
}
