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


class CallsVoicePreferences
{
    /**
     */
    public function __construct(
        protected ?string $voiceGender = null,
        protected ?string $voiceName = null,
    ) {

    }


    public function getVoiceGender(): mixed
    {
        return $this->voiceGender;
    }

    public function setVoiceGender($voiceGender): self
    {
        $this->voiceGender = $voiceGender;
        return $this;
    }

    public function getVoiceName(): mixed
    {
        return $this->voiceName;
    }

    public function setVoiceName($voiceName): self
    {
        $this->voiceName = $voiceName;
        return $this;
    }
}
