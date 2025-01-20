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

class FlowCommonOttContact
{
    /**
     * @param array<string,mixed> $systemData
     */
    public function __construct(
        protected ?string $applicationId = null,
        protected ?string $userId = null,
        protected ?array $systemData = null,
    ) {

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

    public function getUserId(): string|null
    {
        return $this->userId;
    }

    public function setUserId(?string $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return array<string,mixed>|null
     */
    public function getSystemData()
    {
        return $this->systemData;
    }

    /**
     * @param array<string,mixed>|null $systemData System data collected from the user's profile.
     */
    public function setSystemData(?array $systemData): self
    {
        $this->systemData = $systemData;
        return $this;
    }
}
