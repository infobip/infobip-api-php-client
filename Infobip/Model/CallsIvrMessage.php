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
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class CallsIvrMessage
{
    /**
     * @param \Infobip\Model\CallsDestination[] $destinations
     * @param array<string,string> $parameters
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $scenarioId,
        #[Assert\NotBlank]
        protected array $destinations,
        protected ?string $from = null,
        protected ?string $notifyUrl = null,
        protected ?string $notifyContentType = null,
        protected ?int $notifyContentVersion = null,
        protected ?string $callbackData = null,
        protected ?int $validityPeriod = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $sendAt = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsRetry $retry = null,
        protected ?int $ringTimeout = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsSendingSpeed $sendingSpeed = null,
        protected ?array $parameters = null,
        protected ?int $pause = null,
        protected ?bool $record = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\DeliveryTimeWindow $deliveryTimeWindow = null,
        protected ?int $callTimeout = null,
    ) {

    }


    public function getScenarioId(): string
    {
        return $this->scenarioId;
    }

    public function setScenarioId(string $scenarioId): self
    {
        $this->scenarioId = $scenarioId;
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

    /**
     * @return \Infobip\Model\CallsDestination[]
     */
    public function getDestinations(): array
    {
        return $this->destinations;
    }

    /**
     * @param \Infobip\Model\CallsDestination[] $destinations Array of message destination addresses. Maximum number of destination addresses is 20k.
     */
    public function setDestinations(array $destinations): self
    {
        $this->destinations = $destinations;
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

    public function getCallbackData(): string|null
    {
        return $this->callbackData;
    }

    public function setCallbackData(?string $callbackData): self
    {
        $this->callbackData = $callbackData;
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

    public function getSendAt(): \DateTime|null
    {
        return $this->sendAt;
    }

    public function setSendAt(?\DateTime $sendAt): self
    {
        $this->sendAt = $sendAt;
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

    public function getSendingSpeed(): \Infobip\Model\CallsSendingSpeed|null
    {
        return $this->sendingSpeed;
    }

    public function setSendingSpeed(?\Infobip\Model\CallsSendingSpeed $sendingSpeed): self
    {
        $this->sendingSpeed = $sendingSpeed;
        return $this;
    }

    /**
     * @return array<string,string>|null
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param array<string,string>|null $parameters The parameters that should be passed to the scenario on execution.
     */
    public function setParameters(?array $parameters): self
    {
        $this->parameters = $parameters;
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

    public function getDeliveryTimeWindow(): \Infobip\Model\DeliveryTimeWindow|null
    {
        return $this->deliveryTimeWindow;
    }

    public function setDeliveryTimeWindow(?\Infobip\Model\DeliveryTimeWindow $deliveryTimeWindow): self
    {
        $this->deliveryTimeWindow = $deliveryTimeWindow;
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
}
