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

class NumberMaskingSetupBody
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Regex('/[a-zA-Z0-9 ]+/')]
        protected string $name,
        #[Assert\NotBlank]
        protected string $callbackUrl,
        protected ?string $statusUrl = null,
        protected ?string $backupCallbackUrl = null,
        protected ?string $backupStatusUrl = null,
        #[Assert\Regex('/[a-zA-Z0-9 ]*/')]
        protected ?string $description = null,
    ) {

    }


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl(string $callbackUrl): self
    {
        $this->callbackUrl = $callbackUrl;
        return $this;
    }

    public function getStatusUrl(): string|null
    {
        return $this->statusUrl;
    }

    public function setStatusUrl(?string $statusUrl): self
    {
        $this->statusUrl = $statusUrl;
        return $this;
    }

    public function getBackupCallbackUrl(): string|null
    {
        return $this->backupCallbackUrl;
    }

    public function setBackupCallbackUrl(?string $backupCallbackUrl): self
    {
        $this->backupCallbackUrl = $backupCallbackUrl;
        return $this;
    }

    public function getBackupStatusUrl(): string|null
    {
        return $this->backupStatusUrl;
    }

    public function setBackupStatusUrl(?string $backupStatusUrl): self
    {
        $this->backupStatusUrl = $backupStatusUrl;
        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }
}
