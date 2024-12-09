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


class WhatsAppBulkMessageInfo
{
    /**
     * @param \Infobip\Model\WhatsAppSingleMessageInfo[] $messages
     */
    public function __construct(
        protected ?array $messages = null,
        protected ?string $bulkId = null,
    ) {

    }


    /**
     * @return \Infobip\Model\WhatsAppSingleMessageInfo[]|null
     */
    public function getMessages(): ?array
    {
        return $this->messages;
    }

    /**
     * @param \Infobip\Model\WhatsAppSingleMessageInfo[]|null $messages Array of sent message objects, one object per every message.
     */
    public function setMessages(?array $messages): self
    {
        $this->messages = $messages;
        return $this;
    }

    public function getBulkId(): string|null
    {
        return $this->bulkId;
    }

    public function setBulkId(?string $bulkId): self
    {
        $this->bulkId = $bulkId;
        return $this;
    }
}
