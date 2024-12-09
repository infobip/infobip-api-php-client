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


class TfaApplicationConfiguration
{
    /**
     */
    public function __construct(
        protected ?bool $allowMultiplePinVerifications = true,
        protected ?int $pinAttempts = 10,
        protected ?string $pinTimeToLive = '15m',
        protected ?string $sendPinPerApplicationLimit = '10000/1d',
        protected ?string $sendPinPerPhoneNumberLimit = '3/1d',
        protected ?string $verifyPinLimit = '1/3s',
    ) {

    }


    public function getAllowMultiplePinVerifications(): bool|null
    {
        return $this->allowMultiplePinVerifications;
    }

    public function setAllowMultiplePinVerifications(?bool $allowMultiplePinVerifications): self
    {
        $this->allowMultiplePinVerifications = $allowMultiplePinVerifications;
        return $this;
    }

    public function getPinAttempts(): int|null
    {
        return $this->pinAttempts;
    }

    public function setPinAttempts(?int $pinAttempts): self
    {
        $this->pinAttempts = $pinAttempts;
        return $this;
    }

    public function getPinTimeToLive(): string|null
    {
        return $this->pinTimeToLive;
    }

    public function setPinTimeToLive(?string $pinTimeToLive): self
    {
        $this->pinTimeToLive = $pinTimeToLive;
        return $this;
    }

    public function getSendPinPerApplicationLimit(): string|null
    {
        return $this->sendPinPerApplicationLimit;
    }

    public function setSendPinPerApplicationLimit(?string $sendPinPerApplicationLimit): self
    {
        $this->sendPinPerApplicationLimit = $sendPinPerApplicationLimit;
        return $this;
    }

    public function getSendPinPerPhoneNumberLimit(): string|null
    {
        return $this->sendPinPerPhoneNumberLimit;
    }

    public function setSendPinPerPhoneNumberLimit(?string $sendPinPerPhoneNumberLimit): self
    {
        $this->sendPinPerPhoneNumberLimit = $sendPinPerPhoneNumberLimit;
        return $this;
    }

    public function getVerifyPinLimit(): string|null
    {
        return $this->verifyPinLimit;
    }

    public function setVerifyPinLimit(?string $verifyPinLimit): self
    {
        $this->verifyPinLimit = $verifyPinLimit;
        return $this;
    }
}
