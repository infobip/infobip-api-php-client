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


class CallsRecording
{
    /**
     */
    public function __construct(
        protected ?bool $enabled = null,
        protected ?bool $recordCalleeAnnouncement = true,
    ) {

    }


    public function getEnabled(): bool|null
    {
        return $this->enabled;
    }

    public function setEnabled(?bool $enabled): self
    {
        $this->enabled = $enabled;
        return $this;
    }

    public function getRecordCalleeAnnouncement(): bool|null
    {
        return $this->recordCalleeAnnouncement;
    }

    public function setRecordCalleeAnnouncement(?bool $recordCalleeAnnouncement): self
    {
        $this->recordCalleeAnnouncement = $recordCalleeAnnouncement;
        return $this;
    }
}
