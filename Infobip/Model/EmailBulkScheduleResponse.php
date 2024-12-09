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


class EmailBulkScheduleResponse
{
    /**
     * @param \Infobip\Model\EmailBulkInfo[] $bulks
     */
    public function __construct(
        protected ?string $externalBulkId = null,
        protected ?array $bulks = null,
    ) {

    }


    public function getExternalBulkId(): string|null
    {
        return $this->externalBulkId;
    }

    public function setExternalBulkId(?string $externalBulkId): self
    {
        $this->externalBulkId = $externalBulkId;
        return $this;
    }

    /**
     * @return \Infobip\Model\EmailBulkInfo[]|null
     */
    public function getBulks(): ?array
    {
        return $this->bulks;
    }

    /**
     * @param \Infobip\Model\EmailBulkInfo[]|null $bulks bulks
     */
    public function setBulks(?array $bulks): self
    {
        $this->bulks = $bulks;
        return $this;
    }
}
