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

class CallsGenesysCloudProvider extends CallsProvider
{
    public const TYPE = 'GENESYS_CLOUD';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $region,
        protected ?string $outboundTerminationFQDN = null,
        protected ?string $inboundTerminationIdentifier = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getRegion(): mixed
    {
        return $this->region;
    }

    public function setRegion($region): self
    {
        $this->region = $region;
        return $this;
    }

    public function getOutboundTerminationFQDN(): string|null
    {
        return $this->outboundTerminationFQDN;
    }

    public function setOutboundTerminationFQDN(?string $outboundTerminationFQDN): self
    {
        $this->outboundTerminationFQDN = $outboundTerminationFQDN;
        return $this;
    }

    public function getInboundTerminationIdentifier(): string|null
    {
        return $this->inboundTerminationIdentifier;
    }

    public function setInboundTerminationIdentifier(?string $inboundTerminationIdentifier): self
    {
        $this->inboundTerminationIdentifier = $inboundTerminationIdentifier;
        return $this;
    }
}
