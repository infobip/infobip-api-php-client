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


class TfaVerificationResponse
{
    /**
     * @param \Infobip\Model\TfaVerification[] $verifications
     */
    public function __construct(
        protected ?array $verifications = null,
    ) {

    }


    /**
     * @return \Infobip\Model\TfaVerification[]|null
     */
    public function getVerifications(): ?array
    {
        return $this->verifications;
    }

    /**
     * @param \Infobip\Model\TfaVerification[]|null $verifications Collection of verifications
     */
    public function setVerifications(?array $verifications): self
    {
        $this->verifications = $verifications;
        return $this;
    }
}
