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

class CallsRegisteredSipTrunkResponse extends CallsSipTrunkResponse
{
    public const TYPE = 'REGISTERED';

    /**
     */
    public function __construct(
        protected ?string $id = null,
        protected ?string $name = null,
        protected ?string $location = null,
        protected ?bool $tls = null,
        protected ?array $codecs = null,
        protected ?string $dtmf = null,
        protected ?string $fax = null,
        protected ?string $numberFormat = null,
        protected ?bool $internationalCallsAllowed = null,
        protected ?int $channelLimit = null,
        protected ?string $anonymization = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsBillingPackage $billingPackage = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsSbcHosts $sbcHosts = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsSipOptions $sipOptions = null,
        protected ?string $username = null,
        protected ?bool $inviteAuthentication = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            id: $id,
            type: $modelDiscriminatorValue,
            name: $name,
            location: $location,
            tls: $tls,
            codecs: $codecs,
            dtmf: $dtmf,
            fax: $fax,
            numberFormat: $numberFormat,
            internationalCallsAllowed: $internationalCallsAllowed,
            channelLimit: $channelLimit,
            anonymization: $anonymization,
            billingPackage: $billingPackage,
            sbcHosts: $sbcHosts,
            sipOptions: $sipOptions,
        );
    }


    public function getUsername(): string|null
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getInviteAuthentication(): bool|null
    {
        return $this->inviteAuthentication;
    }

    public function setInviteAuthentication(?bool $inviteAuthentication): self
    {
        $this->inviteAuthentication = $inviteAuthentication;
        return $this;
    }
}
