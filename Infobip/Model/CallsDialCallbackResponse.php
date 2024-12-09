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

class CallsDialCallbackResponse extends CallbackResponse
{
    public const COMMAND = 'dial';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $phoneNumber,
        #[Assert\NotBlank]
        protected string $callerId,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsAnnouncements $announcements = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsRecording $recording = null,
        protected ?string $clientReferenceId = null,
    ) {
        $modelDiscriminatorValue = self::COMMAND;

        parent::__construct(
            command: $modelDiscriminatorValue,
        );
    }


    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getCallerId(): string
    {
        return $this->callerId;
    }

    public function setCallerId(string $callerId): self
    {
        $this->callerId = $callerId;
        return $this;
    }

    public function getAnnouncements(): \Infobip\Model\CallsAnnouncements|null
    {
        return $this->announcements;
    }

    public function setAnnouncements(?\Infobip\Model\CallsAnnouncements $announcements): self
    {
        $this->announcements = $announcements;
        return $this;
    }

    public function getRecording(): \Infobip\Model\CallsRecording|null
    {
        return $this->recording;
    }

    public function setRecording(?\Infobip\Model\CallsRecording $recording): self
    {
        $this->recording = $recording;
        return $this;
    }

    public function getClientReferenceId(): string|null
    {
        return $this->clientReferenceId;
    }

    public function setClientReferenceId(?string $clientReferenceId): self
    {
        $this->clientReferenceId = $clientReferenceId;
        return $this;
    }
}
