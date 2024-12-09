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

class CallsSpeechOptions
{
    /**
     * @param string[] $keyPhrases
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $language,
        protected ?array $keyPhrases = null,
        #[Assert\LessThanOrEqual(5)]
        #[Assert\GreaterThanOrEqual(1)]
        protected ?int $maxSilence = null,
    ) {

    }


    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getKeyPhrases(): ?array
    {
        return $this->keyPhrases;
    }

    /**
     * @param string[]|null $keyPhrases Array of keyphrases used for matching capturing speech. If full captured text contains one of the specified phrases, that phrase will be set in variable specified in capture parameter. If keyphrases are not set or no matching is done, variable will be set to empty string. Every keyphrase can contain up to 5 words and number of keyphrases is not limited.
     */
    public function setKeyPhrases(?array $keyPhrases): self
    {
        $this->keyPhrases = $keyPhrases;
        return $this;
    }

    public function getMaxSilence(): int|null
    {
        return $this->maxSilence;
    }

    public function setMaxSilence(?int $maxSilence): self
    {
        $this->maxSilence = $maxSilence;
        return $this;
    }
}
