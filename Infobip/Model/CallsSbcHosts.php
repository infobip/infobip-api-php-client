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


class CallsSbcHosts
{
    /**
     * @param string[] $primary
     * @param string[] $backup
     */
    public function __construct(
        protected ?array $primary = null,
        protected ?array $backup = null,
    ) {

    }


    /**
     * @return string[]|null
     */
    public function getPrimary(): ?array
    {
        return $this->primary;
    }

    /**
     * @param string[]|null $primary primary
     */
    public function setPrimary(?array $primary): self
    {
        $this->primary = $primary;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getBackup(): ?array
    {
        return $this->backup;
    }

    /**
     * @param string[]|null $backup backup
     */
    public function setBackup(?array $backup): self
    {
        $this->backup = $backup;
        return $this;
    }
}
