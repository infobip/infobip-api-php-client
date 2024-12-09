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

class CallsSpeechCaptureRequest
{
    /**
     * @param string[] $keyPhrases
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $language,
        #[Assert\NotBlank]
        #[Assert\LessThanOrEqual(30)]
        #[Assert\GreaterThanOrEqual(1)]
        protected int $timeout,
        #[Assert\NotBlank]
        protected array $keyPhrases,
        #[Assert\LessThanOrEqual(5)]
        #[Assert\GreaterThanOrEqual(1)]
        protected ?int $maxSilence = null,
    ) {

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

    public function getTimeout(): int
    {
        return $this->timeout;
    }

    public function setTimeout(int $timeout): self
    {
        $this->timeout = $timeout;
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

    /**
     * @return string[]
     */
    public function getKeyPhrases(): array
    {
        return $this->keyPhrases;
    }

    /**
     * @param string[] $keyPhrases Array of key-phrases used for matching capturing speech.
     */
    public function setKeyPhrases(array $keyPhrases): self
    {
        $this->keyPhrases = $keyPhrases;
        return $this;
    }
}
