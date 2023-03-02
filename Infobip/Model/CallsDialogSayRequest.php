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

class CallsDialogSayRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsDialogSayRequest';

    public const OPENAPI_FORMATS = [
        'text' => null,
        'language' => null,
        'speechRate' => 'double',
        'loopCount' => 'int32',
        'preferences' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]

    protected string $text,
        #[Assert\NotBlank]
    #[Assert\Choice(['ar','bn','bg','ca','zh-cn','zh-tw','hr','cs','da','nl','en','en-au','en-gb','en-ca','en-in','en-ie','en-gb-wls','epo','fil-ph','fi','fr','fr-ca','fr-ch','de','de-at','de-ch','el','gu','he','hi','hu','is','id','it','ja','kn','ko','ms','ml','no','pl','pt-pt','pt-br','ro','ru','sk','sl','es','es-gl','es-mx','sv','ta','te','th','tr','uk','vi','wls',])]

    protected string $language,
        protected ?float $speechRate = null,
        protected ?int $loopCount = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsVoicePreferences $preferences = null,
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

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
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

    public function getSpeechRate(): float|null
    {
        return $this->speechRate;
    }

    public function setSpeechRate(?float $speechRate): self
    {
        $this->speechRate = $speechRate;
        return $this;
    }

    public function getLoopCount(): int|null
    {
        return $this->loopCount;
    }

    public function setLoopCount(?int $loopCount): self
    {
        $this->loopCount = $loopCount;
        return $this;
    }

    public function getPreferences(): \Infobip\Model\CallsVoicePreferences|null
    {
        return $this->preferences;
    }

    public function setPreferences(?\Infobip\Model\CallsVoicePreferences $preferences): self
    {
        $this->preferences = $preferences;
        return $this;
    }
}
