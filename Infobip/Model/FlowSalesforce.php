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

class FlowSalesforce
{
    /**
     */
    public function __construct(
        protected ?string $leadId = null,
        protected ?string $contactId = null,
    ) {

    }


    public function getLeadId(): string|null
    {
        return $this->leadId;
    }

    public function setLeadId(?string $leadId): self
    {
        $this->leadId = $leadId;
        return $this;
    }

    public function getContactId(): string|null
    {
        return $this->contactId;
    }

    public function setContactId(?string $contactId): self
    {
        $this->contactId = $contactId;
        return $this;
    }
}
