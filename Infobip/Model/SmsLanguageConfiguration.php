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

class SmsLanguageConfiguration
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        protected ?\Infobip\Model\SmsPreviewLanguage $language = null,
        protected ?string $transliteration = null,
    ) {

    }


    public function getLanguage(): \Infobip\Model\SmsPreviewLanguage|null
    {
        return $this->language;
    }

    public function setLanguage(?\Infobip\Model\SmsPreviewLanguage $language): self
    {
        $this->language = $language;
        return $this;
    }

    public function getTransliteration(): string|null
    {
        return $this->transliteration;
    }

    public function setTransliteration(?string $transliteration): self
    {
        $this->transliteration = $transliteration;
        return $this;
    }
}
