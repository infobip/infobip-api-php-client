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

class CallsConference
{
    /**
     * @param \Infobip\Model\CallsParticipant[] $participants
     */
    public function __construct(
        #[Assert\Length(max: 128)]
        protected ?string $id = null,
        protected ?string $name = null,
        protected ?array $participants = null,
        protected ?string $callsConfigurationId = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\Platform $platform = null,
    ) {

    }


    public function getId(): string|null
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return \Infobip\Model\CallsParticipant[]|null
     */
    public function getParticipants(): ?array
    {
        return $this->participants;
    }

    /**
     * @param \Infobip\Model\CallsParticipant[]|null $participants The list of conference participants.
     */
    public function setParticipants(?array $participants): self
    {
        $this->participants = $participants;
        return $this;
    }

    public function getCallsConfigurationId(): string|null
    {
        return $this->callsConfigurationId;
    }

    public function setCallsConfigurationId(?string $callsConfigurationId): self
    {
        $this->callsConfigurationId = $callsConfigurationId;
        return $this;
    }

    public function getPlatform(): \Infobip\Model\Platform|null
    {
        return $this->platform;
    }

    public function setPlatform(?\Infobip\Model\Platform $platform): self
    {
        $this->platform = $platform;
        return $this;
    }
}
