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

class SmsPreview
{
    /**
     */
    public function __construct(
        protected ?string $textPreview = null,
        protected ?int $messageCount = null,
        protected ?int $charactersRemaining = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\SmsLanguageConfiguration $configuration = null,
    ) {

    }


    public function getTextPreview(): string|null
    {
        return $this->textPreview;
    }

    public function setTextPreview(?string $textPreview): self
    {
        $this->textPreview = $textPreview;
        return $this;
    }

    public function getMessageCount(): int|null
    {
        return $this->messageCount;
    }

    public function setMessageCount(?int $messageCount): self
    {
        $this->messageCount = $messageCount;
        return $this;
    }

    public function getCharactersRemaining(): int|null
    {
        return $this->charactersRemaining;
    }

    public function setCharactersRemaining(?int $charactersRemaining): self
    {
        $this->charactersRemaining = $charactersRemaining;
        return $this;
    }

    public function getConfiguration(): \Infobip\Model\SmsLanguageConfiguration|null
    {
        return $this->configuration;
    }

    public function setConfiguration(?\Infobip\Model\SmsLanguageConfiguration $configuration): self
    {
        $this->configuration = $configuration;
        return $this;
    }
}
