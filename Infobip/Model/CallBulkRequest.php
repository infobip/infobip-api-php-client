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

class CallBulkRequest
{
    /**
     * @param \Infobip\Model\CallsBulkItem[] $items
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $callsConfigurationId,
        #[Assert\NotBlank]
        protected array $items,
        protected ?string $bulkId = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\Platform $platform = null,
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

    public function getCallsConfigurationId(): string
    {
        return $this->callsConfigurationId;
    }

    public function setCallsConfigurationId(string $callsConfigurationId): self
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

    /**
     * @return \Infobip\Model\CallsBulkItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param \Infobip\Model\CallsBulkItem[] $items Bulk item list.
     */
    public function setItems(array $items): self
    {
        $this->items = $items;
        return $this;
    }
}
