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

class CallsExtendedSipTrunkStatusResponse
{
    /**
     */
    public function __construct(
        protected ?string $adminStatus = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsSipTrunkActionStatusResponse $actionStatus = null,
        protected ?string $registrationStatus = null,
        protected ?int $activeCalls = null,
    ) {

    }


    public function getAdminStatus(): mixed
    {
        return $this->adminStatus;
    }

    public function setAdminStatus($adminStatus): self
    {
        $this->adminStatus = $adminStatus;
        return $this;
    }

    public function getActionStatus(): \Infobip\Model\CallsSipTrunkActionStatusResponse|null
    {
        return $this->actionStatus;
    }

    public function setActionStatus(?\Infobip\Model\CallsSipTrunkActionStatusResponse $actionStatus): self
    {
        $this->actionStatus = $actionStatus;
        return $this;
    }

    public function getRegistrationStatus(): mixed
    {
        return $this->registrationStatus;
    }

    public function setRegistrationStatus($registrationStatus): self
    {
        $this->registrationStatus = $registrationStatus;
        return $this;
    }

    public function getActiveCalls(): int|null
    {
        return $this->activeCalls;
    }

    public function setActiveCalls(?int $activeCalls): self
    {
        $this->activeCalls = $activeCalls;
        return $this;
    }
}
