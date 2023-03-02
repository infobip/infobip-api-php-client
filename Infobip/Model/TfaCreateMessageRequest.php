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

class TfaCreateMessageRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'TfaCreateMessageRequest';

    public const OPENAPI_FORMATS = [
        'language' => null,
        'messageText' => null,
        'pinLength' => 'int32',
        'pinType' => null,
        'regional' => null,
        'repeatDTMF' => null,
        'senderId' => null,
        'speechRate' => 'double'
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]

    protected string $messageText,
        #[Assert\NotBlank]
    #[Assert\Choice(['NUMERIC','ALPHA','HEX','ALPHANUMERIC',])]

    protected string $pinType,
        #[Assert\Choice(['en','es','ca','da','nl','fr','de','it','ja','ko','no','pl','ru','sv','fi','hr','sl','ro','pt-pt','pt-br','zh-cn','zh-tw',])]

    protected ?string $language = null,
        protected ?int $pinLength = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\TfaRegionalOptions $regional = null,
        protected ?string $repeatDTMF = null,
        protected ?string $senderId = null,
        protected ?float $speechRate = null,
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

    public function getLanguage(): mixed
    {
        return $this->language;
    }

    public function setLanguage($language): self
    {
        $this->language = $language;
        return $this;
    }

    public function getMessageText(): string
    {
        return $this->messageText;
    }

    public function setMessageText(string $messageText): self
    {
        $this->messageText = $messageText;
        return $this;
    }

    public function getPinLength(): int|null
    {
        return $this->pinLength;
    }

    public function setPinLength(?int $pinLength): self
    {
        $this->pinLength = $pinLength;
        return $this;
    }

    public function getPinType(): mixed
    {
        return $this->pinType;
    }

    public function setPinType($pinType): self
    {
        $this->pinType = $pinType;
        return $this;
    }

    public function getRegional(): \Infobip\Model\TfaRegionalOptions|null
    {
        return $this->regional;
    }

    public function setRegional(?\Infobip\Model\TfaRegionalOptions $regional): self
    {
        $this->regional = $regional;
        return $this;
    }

    public function getRepeatDTMF(): string|null
    {
        return $this->repeatDTMF;
    }

    public function setRepeatDTMF(?string $repeatDTMF): self
    {
        $this->repeatDTMF = $repeatDTMF;
        return $this;
    }

    public function getSenderId(): string|null
    {
        return $this->senderId;
    }

    public function setSenderId(?string $senderId): self
    {
        $this->senderId = $senderId;
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
}
