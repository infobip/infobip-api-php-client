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

class MmsAdvancedRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'MmsAdvancedRequest';

    public const OPENAPI_FORMATS = [
        'bulkId' => null,
        'messages' => null,
        'sendingSpeedLimit' => null
    ];

    /**
     * @param \Infobip\Model\MmsAdvancedMessage[] $messages
     */
    public function __construct(
        #[Assert\NotBlank]

    protected array $messages,
        protected ?string $bulkId = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\MmsSendingSpeedLimit $sendingSpeedLimit = null,
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
     * @return \Infobip\Model\MmsAdvancedMessage[]
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param \Infobip\Model\MmsAdvancedMessage[] $messages An array of message objects of a single message or multiple messages sent under one bulk ID.
     */
    public function setMessages(array $messages): self
    {
        $this->messages = $messages;
        return $this;
    }

    public function getSendingSpeedLimit(): \Infobip\Model\MmsSendingSpeedLimit|null
    {
        return $this->sendingSpeedLimit;
    }

    public function setSendingSpeedLimit(?\Infobip\Model\MmsSendingSpeedLimit $sendingSpeedLimit): self
    {
        $this->sendingSpeedLimit = $sendingSpeedLimit;
        return $this;
    }
}
