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

class CallsAdvancedMessage implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsAdvancedMessage';

    public const OPENAPI_FORMATS = [
        'audioFileUrl' => null,
        'callTimeout' => 'int32',
        'callTransfers' => null,
        'callbackData' => null,
        'deliveryTimeWindow' => null,
        'destinations' => null,
        'dtmfTimeout' => 'int32',
        'from' => null,
        'language' => null,
        'machineDetection' => null,
        'maxDtmf' => 'int32',
        'notifyContentType' => null,
        'notifyContentVersion' => 'int32',
        'notifyUrl' => null,
        'pause' => 'int32',
        'record' => null,
        'repeatDtmf' => null,
        'retry' => null,
        'ringTimeout' => 'int32',
        'sendAt' => 'date-time',
        'sendingSpeed' => null,
        'speechRate' => 'double',
        'text' => null,
        'validityPeriod' => 'int32',
        'voice' => null
    ];

    /**
     * @param \Infobip\Model\CallTransfer[] $callTransfers
     * @param \Infobip\Model\CallsDestination[] $destinations
     */
    public function __construct(
        #[Assert\NotBlank]

    protected array $destinations,
        protected ?string $audioFileUrl = null,
        protected ?int $callTimeout = null,
        protected ?array $callTransfers = null,
        protected ?string $callbackData = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsDeliveryTimeWindow $deliveryTimeWindow = null,
        protected ?int $dtmfTimeout = null,
        protected ?string $from = null,
        protected ?string $language = null,
        protected ?string $machineDetection = null,
        protected ?int $maxDtmf = null,
        protected ?string $notifyContentType = null,
        protected ?int $notifyContentVersion = null,
        protected ?string $notifyUrl = null,
        protected ?int $pause = null,
        protected ?bool $record = null,
        protected ?string $repeatDtmf = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsRetry $retry = null,
        protected ?int $ringTimeout = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]

    protected ?\DateTime $sendAt = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsSendingSpeed $sendingSpeed = null,
        protected ?float $speechRate = null,
        protected ?string $text = null,
        protected ?int $validityPeriod = null,
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

    public function getCallTimeout(): int|null
    {
        return $this->callTimeout;
    }

    public function setCallTimeout(?int $callTimeout): self
    {
        $this->callTimeout = $callTimeout;
        return $this;
    }

    /**
     * @return \Infobip\Model\CallTransfer[]|null
     */
    public function getCallTransfers(): ?array
    {
        return $this->callTransfers;
    }

    /**
     * @param \Infobip\Model\CallTransfer[]|null $callTransfers Call transfers object enables transferring the ongoing call to another recipient(s) and establish a communication between your original recipient and additional one.
     */
    public function setCallTransfers(?array $callTransfers): self
    {
        $this->callTransfers = $callTransfers;
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

    public function getDeliveryTimeWindow(): \Infobip\Model\CallsDeliveryTimeWindow|null
    {
        return $this->deliveryTimeWindow;
    }

    public function setDeliveryTimeWindow(?\Infobip\Model\CallsDeliveryTimeWindow $deliveryTimeWindow): self
    {
        $this->deliveryTimeWindow = $deliveryTimeWindow;
        return $this;
    }

    /**
     * @return \Infobip\Model\CallsDestination[]
     */
    public function getDestinations(): array
    {
        return $this->destinations;
    }

    /**
     * @param \Infobip\Model\CallsDestination[] $destinations Message destination addresses. Destination address must be in the E.164 standard format (Example: 41793026727).
     */
    public function setDestinations(array $destinations): self
    {
        $this->destinations = $destinations;
        return $this;
    }

    public function getDtmfTimeout(): int|null
    {
        return $this->dtmfTimeout;
    }

    public function setDtmfTimeout(?int $dtmfTimeout): self
    {
        $this->dtmfTimeout = $dtmfTimeout;
        return $this;
    }

    public function getFrom(): string|null
    {
        return $this->from;
    }

    public function setFrom(?string $from): self
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

    public function getMachineDetection(): string|null
    {
        return $this->machineDetection;
    }

    public function setMachineDetection(?string $machineDetection): self
    {
        $this->machineDetection = $machineDetection;
        return $this;
    }

    public function getMaxDtmf(): int|null
    {
        return $this->maxDtmf;
    }

    public function setMaxDtmf(?int $maxDtmf): self
    {
        $this->maxDtmf = $maxDtmf;
        return $this;
    }

    public function getNotifyContentType(): string|null
    {
        return $this->notifyContentType;
    }

    public function setNotifyContentType(?string $notifyContentType): self
    {
        $this->notifyContentType = $notifyContentType;
        return $this;
    }

    public function getNotifyContentVersion(): int|null
    {
        return $this->notifyContentVersion;
    }

    public function setNotifyContentVersion(?int $notifyContentVersion): self
    {
        $this->notifyContentVersion = $notifyContentVersion;
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

    public function getPause(): int|null
    {
        return $this->pause;
    }

    public function setPause(?int $pause): self
    {
        $this->pause = $pause;
        return $this;
    }

    public function getRecord(): bool|null
    {
        return $this->record;
    }

    public function setRecord(?bool $record): self
    {
        $this->record = $record;
        return $this;
    }

    public function getRepeatDtmf(): string|null
    {
        return $this->repeatDtmf;
    }

    public function setRepeatDtmf(?string $repeatDtmf): self
    {
        $this->repeatDtmf = $repeatDtmf;
        return $this;
    }

    public function getRetry(): \Infobip\Model\CallsRetry|null
    {
        return $this->retry;
    }

    public function setRetry(?\Infobip\Model\CallsRetry $retry): self
    {
        $this->retry = $retry;
        return $this;
    }

    public function getRingTimeout(): int|null
    {
        return $this->ringTimeout;
    }

    public function setRingTimeout(?int $ringTimeout): self
    {
        $this->ringTimeout = $ringTimeout;
        return $this;
    }

    public function getSendAt(): \DateTime|null
    {
        return $this->sendAt;
    }

    public function setSendAt(?\DateTime $sendAt): self
    {
        $this->sendAt = $sendAt;
        return $this;
    }

    public function getSendingSpeed(): \Infobip\Model\CallsSendingSpeed|null
    {
        return $this->sendingSpeed;
    }

    public function setSendingSpeed(?\Infobip\Model\CallsSendingSpeed $sendingSpeed): self
    {
        $this->sendingSpeed = $sendingSpeed;
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

    public function getText(): string|null
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getValidityPeriod(): int|null
    {
        return $this->validityPeriod;
    }

    public function setValidityPeriod(?int $validityPeriod): self
    {
        $this->validityPeriod = $validityPeriod;
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
