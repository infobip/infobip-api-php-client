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

class CallRoutingEndpointDestination extends CallRoutingDestination
{
    public const TYPE = 'ENDPOINT';

    /**
     * @param \Infobip\Model\DeliveryTimeWindow[] $allowedTimeWindows
     */
    public function __construct(
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\CallRoutingEndpoint $value,
        #[Assert\LessThanOrEqual(100)]
        #[Assert\GreaterThanOrEqual(1)]
        protected ?int $priority = null,
        #[Assert\LessThanOrEqual(100)]
        #[Assert\GreaterThanOrEqual(1)]
        protected ?int $weight = null,
        protected ?int $connectTimeout = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallRoutingRecording $recording = null,
        protected ?array $allowedTimeWindows = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            priority: $priority,
            type: $modelDiscriminatorValue,
            weight: $weight,
        );
    }


    public function getValue(): \Infobip\Model\CallRoutingEndpoint
    {
        return $this->value;
    }

    public function setValue(\Infobip\Model\CallRoutingEndpoint $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function getConnectTimeout(): int|null
    {
        return $this->connectTimeout;
    }

    public function setConnectTimeout(?int $connectTimeout): self
    {
        $this->connectTimeout = $connectTimeout;
        return $this;
    }

    public function getRecording(): \Infobip\Model\CallRoutingRecording|null
    {
        return $this->recording;
    }

    public function setRecording(?\Infobip\Model\CallRoutingRecording $recording): self
    {
        $this->recording = $recording;
        return $this;
    }

    /**
     * @return \Infobip\Model\DeliveryTimeWindow[]|null
     */
    public function getAllowedTimeWindows(): ?array
    {
        return $this->allowedTimeWindows;
    }

    /**
     * @param \Infobip\Model\DeliveryTimeWindow[]|null $allowedTimeWindows Sets specific delivery windows outside of which calls won't be forwarded to the destination. If defined, call forwarding is allowed only if any time window in array is satisfied.
     */
    public function setAllowedTimeWindows(?array $allowedTimeWindows): self
    {
        $this->allowedTimeWindows = $allowedTimeWindows;
        return $this;
    }
}
