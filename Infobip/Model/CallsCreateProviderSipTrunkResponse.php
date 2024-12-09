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

class CallsCreateProviderSipTrunkResponse extends CallsCreateSipTrunkResponse
{
    public const TYPE = 'PROVIDER';

    /**
     */
    public function __construct(
        protected ?string $id = null,
        protected ?string $name = null,
        protected ?string $location = null,
        protected ?bool $internationalCallsAllowed = null,
        protected ?int $channelLimit = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsBillingPackage $billingPackage = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsSbcHosts $sbcHosts = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsProvider $provider = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            id: $id,
            type: $modelDiscriminatorValue,
            name: $name,
            location: $location,
            internationalCallsAllowed: $internationalCallsAllowed,
            channelLimit: $channelLimit,
            billingPackage: $billingPackage,
            sbcHosts: $sbcHosts,
        );
    }


    public function getProvider(): \Infobip\Model\CallsProvider|null
    {
        return $this->provider;
    }

    public function setProvider(?\Infobip\Model\CallsProvider $provider): self
    {
        $this->provider = $provider;
        return $this;
    }
}
