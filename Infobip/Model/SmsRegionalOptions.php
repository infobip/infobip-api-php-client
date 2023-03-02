<?php

// phpcs:ignorefile

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
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

class SmsRegionalOptions implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'SmsRegionalOptions';

    public const OPENAPI_FORMATS = [
        'indiaDlt' => null,
        'turkeyIys' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\Valid]

    protected ?\Infobip\Model\SmsIndiaDltOptions $indiaDlt = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\SmsTurkeyIysOptions $turkeyIys = null,
    ) {
    }

    #[Ignore]
    public function getModelName(): string
    {
        return self::OPENAPI_MODEL_NAME;
    }

    #[Ignore]
    public static function getDiscriminator(): ?string
    {
        return self::DISCRIMINATOR;
    }

    public function getIndiaDlt(): \Infobip\Model\SmsIndiaDltOptions|null
    {
        return $this->indiaDlt;
    }

    public function setIndiaDlt(?\Infobip\Model\SmsIndiaDltOptions $indiaDlt): self
    {
        $this->indiaDlt = $indiaDlt;
        return $this;
    }

    public function getTurkeyIys(): \Infobip\Model\SmsTurkeyIysOptions|null
    {
        return $this->turkeyIys;
    }

    public function setTurkeyIys(?\Infobip\Model\SmsTurkeyIysOptions $turkeyIys): self
    {
        $this->turkeyIys = $turkeyIys;
        return $this;
    }
}
