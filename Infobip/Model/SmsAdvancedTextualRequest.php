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

class SmsAdvancedTextualRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'SmsAdvancedTextualRequest';

    public const OPENAPI_FORMATS = [
        'bulkId' => null,
        'messages' => null,
        'sendingSpeedLimit' => null,
        'urlOptions' => null,
        'tracking' => null
    ];

    /**
     * @param \Infobip\Model\SmsTextualMessage[] $messages
     */
    public function __construct(
        #[Assert\NotBlank]

    protected array $messages,
        protected ?string $bulkId = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\SmsSendingSpeedLimit $sendingSpeedLimit = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\SmsUrlOptions $urlOptions = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\SmsTracking $tracking = null,
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

    public function getBulkId(): string|null
    {
        return $this->bulkId;
    }

    public function setBulkId(?string $bulkId): self
    {
        $this->bulkId = $bulkId;
        return $this;
    }

    /**
     * @return \Infobip\Model\SmsTextualMessage[]
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param \Infobip\Model\SmsTextualMessage[] $messages An array of message objects of a single message or multiple messages sent under one bulk ID.
     */
    public function setMessages(array $messages): self
    {
        $this->messages = $messages;
        return $this;
    }

    public function getSendingSpeedLimit(): \Infobip\Model\SmsSendingSpeedLimit|null
    {
        return $this->sendingSpeedLimit;
    }

    public function setSendingSpeedLimit(?\Infobip\Model\SmsSendingSpeedLimit $sendingSpeedLimit): self
    {
        $this->sendingSpeedLimit = $sendingSpeedLimit;
        return $this;
    }

    public function getUrlOptions(): \Infobip\Model\SmsUrlOptions|null
    {
        return $this->urlOptions;
    }

    public function setUrlOptions(?\Infobip\Model\SmsUrlOptions $urlOptions): self
    {
        $this->urlOptions = $urlOptions;
        return $this;
    }

    public function getTracking(): \Infobip\Model\SmsTracking|null
    {
        return $this->tracking;
    }

    public function setTracking(?\Infobip\Model\SmsTracking $tracking): self
    {
        $this->tracking = $tracking;
        return $this;
    }
}
