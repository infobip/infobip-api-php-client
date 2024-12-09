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

class CallsRegisteredSipTrunkRequest extends CallsSipTrunkRequest
{
    public const TYPE = 'REGISTERED';

    /**
     * @param \Infobip\Model\CallsAudioCodec[] $codecs
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
        protected ?bool $inviteAuthentication = false,
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
