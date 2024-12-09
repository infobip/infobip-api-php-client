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


class SmsLanguage
{
    /**
     */
    public function __construct(
        protected ?string $languageCode = null,
        protected ?bool $singleShift = false,
        protected ?bool $lockingShift = false,
    ) {

    }


    public function getLanguageCode(): mixed
    {
        return $this->languageCode;
    }

    public function setLanguageCode($languageCode): self
    {
        $this->languageCode = $languageCode;
        return $this;
    }

    public function getSingleShift(): bool|null
    {
        return $this->singleShift;
    }

    public function setSingleShift(?bool $singleShift): self
    {
        $this->singleShift = $singleShift;
        return $this;
    }

    public function getLockingShift(): bool|null
    {
        return $this->lockingShift;
    }

    public function setLockingShift(?bool $lockingShift): self
    {
        $this->lockingShift = $lockingShift;
        return $this;
    }
}
