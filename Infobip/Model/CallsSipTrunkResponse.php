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
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

#[DiscriminatorMap(typeProperty: "type", mapping: [
    "PROVIDER" => "\Infobip\Model\CallsProviderSipTrunkResponse",
    "REGISTERED" => "\Infobip\Model\CallsRegisteredSipTrunkResponse",
    "STATIC" => "\Infobip\Model\CallsStaticSipTrunkResponse",
])]

class CallsSipTrunkResponse
{
    /**
     * @param \Infobip\Model\CallsAudioCodec[] $codecs
     */
    public function __construct(
        protected ?string $id = null,
        protected ?string $type = null,
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
    ) {

    }


    public function getId(): string|null
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): mixed
    {
        return $this->type;
    }

    public function setType($type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getLocation(): mixed
    {
        return $this->location;
    }

    public function setLocation($location): self
    {
        $this->location = $location;
        return $this;
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

    public function getInternationalCallsAllowed(): bool|null
    {
        return $this->internationalCallsAllowed;
    }

    public function setInternationalCallsAllowed(?bool $internationalCallsAllowed): self
    {
        $this->internationalCallsAllowed = $internationalCallsAllowed;
        return $this;
    }

    public function getChannelLimit(): int|null
    {
        return $this->channelLimit;
    }

    public function setChannelLimit(?int $channelLimit): self
    {
        $this->channelLimit = $channelLimit;
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

    public function getBillingPackage(): \Infobip\Model\CallsBillingPackage|null
    {
        return $this->billingPackage;
    }

    public function setBillingPackage(?\Infobip\Model\CallsBillingPackage $billingPackage): self
    {
        $this->billingPackage = $billingPackage;
        return $this;
    }

    public function getSbcHosts(): \Infobip\Model\CallsSbcHosts|null
    {
        return $this->sbcHosts;
    }

    public function setSbcHosts(?\Infobip\Model\CallsSbcHosts $sbcHosts): self
    {
        $this->sbcHosts = $sbcHosts;
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
