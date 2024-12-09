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


class SmsInboundMessageResult
{
    /**
     * @param \Infobip\Model\SmsInboundMessage[] $results
     */
    public function __construct(
        protected ?int $messageCount = null,
        protected ?int $pendingMessageCount = null,
        protected ?array $results = null,
    ) {

    }


    public function getMessageCount(): int|null
    {
        return $this->messageCount;
    }

    public function setMessageCount(?int $messageCount): self
    {
        $this->messageCount = $messageCount;
        return $this;
    }

    public function getPendingMessageCount(): int|null
    {
        return $this->pendingMessageCount;
    }

    public function setPendingMessageCount(?int $pendingMessageCount): self
    {
        $this->pendingMessageCount = $pendingMessageCount;
        return $this;
    }

    /**
     * @return \Infobip\Model\SmsInboundMessage[]|null
     */
    public function getResults(): ?array
    {
        return $this->results;
    }

    /**
     * @param \Infobip\Model\SmsInboundMessage[]|null $results An array of result objects.
     */
    public function setResults(?array $results): self
    {
        $this->results = $results;
        return $this;
    }
}
