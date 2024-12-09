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

use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class NumberMaskingSetupResponse
{
    /**
     */
    public function __construct(
        protected ?string $key = null,
        protected ?string $name = null,
        protected ?string $callbackUrl = null,
        protected ?string $statusUrl = null,
        protected ?string $backupCallbackUrl = null,
        protected ?string $backupStatusUrl = null,
        protected ?string $description = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $insertDateTime = null,
        #[Serializer\Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.vP'])]
        protected ?\DateTime $updateDateTime = null,
    ) {

    }


    public function getKey(): string|null
    {
        return $this->key;
    }

    public function setKey(?string $key): self
    {
        $this->key = $key;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getCallbackUrl(): string|null
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl(?string $callbackUrl): self
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

    public function getInsertDateTime(): \DateTime|null
    {
        return $this->insertDateTime;
    }

    public function setInsertDateTime(?\DateTime $insertDateTime): self
    {
        $this->insertDateTime = $insertDateTime;
        return $this;
    }

    public function getUpdateDateTime(): \DateTime|null
    {
        return $this->updateDateTime;
    }

    public function setUpdateDateTime(?\DateTime $updateDateTime): self
    {
        $this->updateDateTime = $updateDateTime;
        return $this;
    }
}
