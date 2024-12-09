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

class CallsStaticSipTrunkResponse extends CallsSipTrunkResponse
{
    public const TYPE = 'STATIC';

    /**
     * @param string[] $sourceHosts
     * @param string[] $destinationHosts
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
        protected ?array $sourceHosts = null,
        protected ?array $destinationHosts = null,
        protected ?string $strategy = null,
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


    /**
     * @return string[]|null
     */
    public function getSourceHosts(): ?array
    {
        return $this->sourceHosts;
    }

    /**
     * @param string[]|null $sourceHosts List of source hosts.
     */
    public function setSourceHosts(?array $sourceHosts): self
    {
        $this->sourceHosts = $sourceHosts;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getDestinationHosts(): ?array
    {
        return $this->destinationHosts;
    }

    /**
     * @param string[]|null $destinationHosts List of destination hosts.
     */
    public function setDestinationHosts(?array $destinationHosts): self
    {
        $this->destinationHosts = $destinationHosts;
        return $this;
    }

    public function getStrategy(): mixed
    {
        return $this->strategy;
    }

    public function setStrategy($strategy): self
    {
        $this->strategy = $strategy;
        return $this;
    }
}
