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

class MessageResponseDetails
{
    /**
     */
    public function __construct(
        protected ?string $messageId = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\MessageStatus $status = null,
        protected ?string $destination = null,
        protected ?object $details = null,
    ) {

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

    public function getStatus(): \Infobip\Model\MessageStatus|null
    {
        return $this->status;
    }

    public function setStatus(?\Infobip\Model\MessageStatus $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getDestination(): string|null
    {
        return $this->destination;
    }

    public function setDestination(?string $destination): self
    {
        $this->destination = $destination;
        return $this;
    }

    public function getDetails(): object|null
    {
        return $this->details;
    }

    public function setDetails(?object $details): self
    {
        $this->details = $details;
        return $this;
    }
}
