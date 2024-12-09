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

class CallsStaticSipTrunkRequest extends CallsSipTrunkRequest
{
    public const TYPE = 'STATIC';

    /**
     * @param \Infobip\Model\CallsAudioCodec[] $codecs
     * @param string[] $sourceHosts
     * @param string[] $destinationHosts
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
        protected ?string $location = null,
        protected ?bool $tls = false,
        protected ?bool $internationalCallsAllowed = false,
        protected ?array $codecs = null,
        protected ?string $dtmf = null,
        protected ?string $fax = null,
        protected ?string $numberFormat = null,
        protected ?string $anonymization = null,
        protected ?array $sourceHosts = null,
        protected ?array $destinationHosts = null,
        protected ?string $strategy = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsSipOptions $sipOptions = null,
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


    /**
     * @return \Infobip\Model\CallsAudioCodec[]|null
     */
    public function getCodecs(): ?array
    {
        return $this->codecs;
    }

    /**
     * @param \Infobip\Model\CallsAudioCodec[]|null $codecs List of audio codecs supported by a SIP trunk.
     */
    public function setCodecs(?array $codecs): self
    {
        $this->codecs = $codecs;
        return $this;
    }

    public function getDtmf(): mixed
    {
        return $this->dtmf;
    }

    public function setDtmf($dtmf): self
    {
        $this->dtmf = $dtmf;
        return $this;
    }

    public function getFax(): mixed
    {
        return $this->fax;
    }

    public function setFax($fax): self
    {
        $this->fax = $fax;
        return $this;
    }

    public function getNumberFormat(): mixed
    {
        return $this->numberFormat;
    }

    public function setNumberFormat($numberFormat): self
    {
        $this->numberFormat = $numberFormat;
        return $this;
    }

    public function getAnonymization(): mixed
    {
        return $this->anonymization;
    }

    public function setAnonymization($anonymization): self
    {
        $this->anonymization = $anonymization;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getSourceHosts(): ?array
    {
        return $this->sourceHosts;
    }

    /**
     * @param string[]|null $sourceHosts List of SIP trunk source hosts. If empty, destination host list must not be empty. Source hosts can be sent in 2 formats: IP address without port or domain without port.
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
     * @param string[]|null $destinationHosts List of SIP trunk destination hosts. If empty, source host list must not be empty. Destination hosts can be sent in 3 formats: IP address with port, domain name with port or domain name without port. The port must fall in the range 1025-65535 or be 0 for SRV lookup.
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

    public function getSipOptions(): \Infobip\Model\CallsSipOptions|null
    {
        return $this->sipOptions;
    }

    public function setSipOptions(?\Infobip\Model\CallsSipOptions $sipOptions): self
    {
        $this->sipOptions = $sipOptions;
        return $this;
    }
}
