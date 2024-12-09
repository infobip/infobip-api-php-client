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

class SmsDestination
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(max: 64)]
        #[Assert\Length(min: 0)]
        protected string $to,
        protected ?string $messageId = null,
        protected ?int $networkId = null,
    ) {

    }


    public function getTo(): string
    {
        return $this->to;
    }

    public function setTo(string $to): self
    {
        $this->to = $to;
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

    public function getNetworkId(): int|null
    {
        return $this->networkId;
    }

    public function setNetworkId(?int $networkId): self
    {
        $this->networkId = $networkId;
        return $this;
    }
}
