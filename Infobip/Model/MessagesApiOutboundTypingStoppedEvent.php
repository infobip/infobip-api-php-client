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

class MessagesApiOutboundTypingStoppedEvent extends MessagesApiOutboundEvent
{
    public const EVENT = 'TYPING_STOPPED';

    /**
     * @param \Infobip\Model\MessagesApiToDestination[] $destinations
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $channel,
        #[Assert\NotBlank]
        protected string $sender,
        #[Assert\NotBlank]
        protected array $destinations,
        #[Assert\Valid]
        protected ?\Infobip\Model\MessagesApiEventOptions $options = null,
    ) {
        $modelDiscriminatorValue = self::EVENT;

        parent::__construct(
            event: $modelDiscriminatorValue,
        );
    }


    public function getChannel(): mixed
    {
        return $this->channel;
    }

    public function setChannel($channel): self
    {
        $this->channel = $channel;
        return $this;
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return \Infobip\Model\MessagesApiToDestination[]
     */
    public function getDestinations(): array
    {
        return $this->destinations;
    }

    /**
     * @param \Infobip\Model\MessagesApiToDestination[] $destinations Array of destination objects for where events are being sent. A valid destination is required.
     */
    public function setDestinations(array $destinations): self
    {
        $this->destinations = $destinations;
        return $this;
    }

    public function getOptions(): \Infobip\Model\MessagesApiEventOptions|null
    {
        return $this->options;
    }

    public function setOptions(?\Infobip\Model\MessagesApiEventOptions $options): self
    {
        $this->options = $options;
        return $this;
    }
}
