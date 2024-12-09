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

class CallsVoiceResponseDetails
{
    /**
     */
    public function __construct(
        protected ?string $to = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsSingleMessageStatus $status = null,
        protected ?string $messageId = null,
    ) {

    }


    public function getTo(): string|null
    {
        return $this->to;
    }

    public function setTo(?string $to): self
    {
        $this->to = $to;
        return $this;
    }

    public function getStatus(): \Infobip\Model\CallsSingleMessageStatus|null
    {
        return $this->status;
    }

    public function setStatus(?\Infobip\Model\CallsSingleMessageStatus $status): self
    {
        $this->status = $status;
        return $this;
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
}
