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


class CallBulkResponse
{
    /**
     * @param \Infobip\Model\CallsBulkCall[] $calls
     */
    public function __construct(
        protected ?string $bulkId = null,
        protected ?array $calls = null,
    ) {

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

    /**
     * @return \Infobip\Model\CallsBulkCall[]|null
     */
    public function getCalls(): ?array
    {
        return $this->calls;
    }

    /**
     * @param \Infobip\Model\CallsBulkCall[]|null $calls Bulk call list.
     */
    public function setCalls(?array $calls): self
    {
        $this->calls = $calls;
        return $this;
    }
}
