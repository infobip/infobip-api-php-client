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

class CallsGetVoicesResponse
{
    /**
     * @param \Infobip\Model\CallsSynthesisVoice[] $voices
     */
    public function __construct(
        protected ?array $voices = null,
    ) {

    }


    /**
     * @return \Infobip\Model\CallsSynthesisVoice[]|null
     */
    public function getVoices(): ?array
    {
        return $this->voices;
    }

    /**
     * @param \Infobip\Model\CallsSynthesisVoice[]|null $voices Array of voices belonging to the specified language.
     */
    public function setVoices(?array $voices): self
    {
        $this->voices = $voices;
        return $this;
    }
}
