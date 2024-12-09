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


class ViberWebhookInboundReportResponse
{
    /**
     * @param \Infobip\Model\ViberInboundMessageViberInboundContent[] $results
     */
    public function __construct(
        protected ?array $results = null,
        protected ?int $messageCount = null,
        protected ?int $pendingMessageCount = null,
    ) {

    }


    /**
     * @return \Infobip\Model\ViberInboundMessageViberInboundContent[]|null
     */
    public function getResults(): ?array
    {
        return $this->results;
    }

    /**
     * @param \Infobip\Model\ViberInboundMessageViberInboundContent[]|null $results Collection of mobile originated messages.
     */
    public function setResults(?array $results): self
    {
        $this->results = $results;
        return $this;
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
}
