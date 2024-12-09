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

class CallsFreshworksProvider extends CallsProvider
{
    public const TYPE = 'FRESHWORKS';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $accountSid,
        #[Assert\NotBlank]
        protected string $sipDomain,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getAccountSid(): string
    {
        return $this->accountSid;
    }

    public function setAccountSid(string $accountSid): self
    {
        $this->accountSid = $accountSid;
        return $this;
    }

    public function getSipDomain(): string
    {
        return $this->sipDomain;
    }

    public function setSipDomain(string $sipDomain): self
    {
        $this->sipDomain = $sipDomain;
        return $this;
    }
}
