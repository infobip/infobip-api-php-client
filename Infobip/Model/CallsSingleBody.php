<?php

// phpcs:ignorefile

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
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

class CallsSingleBody implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsSingleBody';

    public const OPENAPI_FORMATS = [
        'audioFileUrl' => null,
        'from' => null,
        'language' => null,
        'text' => null,
        'to' => null,
        'voice' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]

    protected string $from,
        #[Assert\NotBlank]

    protected string $to,
        protected ?string $audioFileUrl = null,
        protected ?string $language = null,
        protected ?string $text = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsVoice $voice = null,
    ) {
    }

    #[Ignore]
    public function getModelName(): string
    {
        return self::OPENAPI_MODEL_NAME;
    }

    #[Ignore]
    public static function getDiscriminator(): ?string
    {
        return self::DISCRIMINATOR;
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

    public function getFrom(): string
    {
        return $this->from;
    }

    public function setFrom(string $from): self
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

    public function getTo(): string
    {
        return $this->to;
    }

    public function setTo(string $to): self
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
