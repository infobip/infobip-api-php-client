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

class FlowAddFlowParticipantsRequest
{
    /**
     * @param \Infobip\Model\FlowParticipant[] $participants
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $participants,
        #[Assert\Length(max: 1000)]
        protected ?string $notifyUrl = null,
        #[Assert\Length(max: 2000)]
        protected ?string $callbackData = null,
    ) {

    }


    /**
     * @return \Infobip\Model\FlowParticipant[]
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    /**
     * @param \Infobip\Model\FlowParticipant[] $participants Array of participants to add.
     */
    public function setParticipants(array $participants): self
    {
        $this->participants = $participants;
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

    public function getCallbackData(): string|null
    {
        return $this->callbackData;
    }

    public function setCallbackData(?string $callbackData): self
    {
        $this->callbackData = $callbackData;
        return $this;
    }
}
