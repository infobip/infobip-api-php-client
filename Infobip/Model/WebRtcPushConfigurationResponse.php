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


class WebRtcPushConfigurationResponse
{
    /**
     */
    public function __construct(
        protected ?string $id = null,
        protected ?string $applicationId = null,
        protected ?string $name = null,
        protected ?bool $androidConfigured = null,
        protected ?bool $iosConfigured = null,
    ) {

    }


    public function getId(): string|null
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getApplicationId(): string|null
    {
        return $this->applicationId;
    }

    public function setApplicationId(?string $applicationId): self
    {
        $this->applicationId = $applicationId;
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

    public function getAndroidConfigured(): bool|null
    {
        return $this->androidConfigured;
    }

    public function setAndroidConfigured(?bool $androidConfigured): self
    {
        $this->androidConfigured = $androidConfigured;
        return $this;
    }

    public function getIosConfigured(): bool|null
    {
        return $this->iosConfigured;
    }

    public function setIosConfigured(?bool $iosConfigured): self
    {
        $this->iosConfigured = $iosConfigured;
        return $this;
    }
}
