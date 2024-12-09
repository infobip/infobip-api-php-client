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

class CallsCreateStaticSipTrunkResponse extends CallsCreateSipTrunkResponse
{
    public const TYPE = 'STATIC';

    /**
     * @param \Infobip\Model\CallsAudioCodec[] $codecs
     * @param string[] $sourceHosts
     * @param string[] $destinationHosts
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
        protected ?bool $tls = null,
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


    public function getTls(): bool|null
    {
        return $this->tls;
    }

    public function setTls(?bool $tls): self
    {
        $this->tls = $tls;
        return $this;
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
