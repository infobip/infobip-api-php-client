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

class CallsProviderSipTrunkRequest extends CallsSipTrunkRequest
{
    public const TYPE = 'PROVIDER';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(max: 128)]
        #[Assert\Length(min: 0)]
        protected string $name,
        #[Assert\NotBlank]
        #[Assert\LessThanOrEqual(1000)]
        protected int $channelLimit,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\CallsBillingPackage $billingPackage,
        #[Assert\Valid]
        #[Assert\NotBlank]
        protected \Infobip\Model\CallsProvider $provider,
        protected ?string $location = null,
        protected ?bool $tls = false,
        protected ?bool $internationalCallsAllowed = false,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
            name: $name,
            location: $location,
            tls: $tls,
            internationalCallsAllowed: $internationalCallsAllowed,
            channelLimit: $channelLimit,
            billingPackage: $billingPackage,
        );
    }


    public function getProvider(): \Infobip\Model\CallsProvider
    {
        return $this->provider;
    }

    public function setProvider(\Infobip\Model\CallsProvider $provider): self
    {
        $this->provider = $provider;
        return $this;
    }
}
