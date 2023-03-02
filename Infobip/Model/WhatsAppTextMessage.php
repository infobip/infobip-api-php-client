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

class WhatsAppTextMessage implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'WhatsAppTextMessage';

    public const OPENAPI_FORMATS = [
        'from' => null,
        'to' => null,
        'messageId' => null,
        'content' => null,
        'callbackData' => null,
        'notifyUrl' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
    #[Assert\Length(max: 24)]
    #[Assert\Length(min: 1)]

    protected string $from,
        #[Assert\NotBlank]
    #[Assert\Length(max: 24)]
    #[Assert\Length(min: 1)]

    protected string $to,
        #[Assert\Valid]
    #[Assert\NotBlank]

    protected \Infobip\Model\WhatsAppTextContent $content,
        #[Assert\Length(max: 100)]
    #[Assert\Length(min: 0)]

    protected ?string $messageId = null,
        #[Assert\Length(max: 4000)]
    #[Assert\Length(min: 0)]

    protected ?string $callbackData = null,
        #[Assert\Length(max: 2048)]
    #[Assert\Length(min: 0)]

    protected ?string $notifyUrl = null,
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

    public function getFrom(): string
    {
        return $this->from;
    }

    public function setFrom(string $from): self
    {
        $this->from = $from;
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

    public function getMessageId(): string|null
    {
        return $this->messageId;
    }

    public function setMessageId(?string $messageId): self
    {
        $this->messageId = $messageId;
        return $this;
    }

    public function getContent(): \Infobip\Model\WhatsAppTextContent
    {
        return $this->content;
    }

    public function setContent(\Infobip\Model\WhatsAppTextContent $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getCallbackData(): string|null
    {
        return $this->callbackData;
    }

    public function setCallbackData(?string $callbackData): self
    {
        $this->callbackData = $callbackData;
        return $this;
    }

    public function getNotifyUrl(): string|null
    {
        return $this->notifyUrl;
    }

    public function setNotifyUrl(?string $notifyUrl): self
    {
        $this->notifyUrl = $notifyUrl;
        return $this;
    }
}
