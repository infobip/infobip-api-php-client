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

class SmsDeliveryTimeWindow implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'SmsDeliveryTimeWindow';

    public const OPENAPI_FORMATS = [
        'days' => null,
        'from' => null,
        'to' => null
    ];

    /**
     * @param \Infobip\Model\SmsDeliveryDay[] $days
     */
    public function __construct(
        #[Assert\NotBlank]

    protected array $days,
        #[Assert\Valid]

    protected ?\Infobip\Model\SmsDeliveryTimeFrom $from = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\SmsDeliveryTimeTo $to = null,
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

    /**
     * @return \Infobip\Model\SmsDeliveryDay[]
     */
    public function getDays(): array
    {
        return $this->days;
    }

    /**
     * @param \Infobip\Model\SmsDeliveryDay[] $days Days of the week which are included in the delivery time window. At least one day must be provided. Separate multiple days with a comma.
     */
    public function setDays(array $days): self
    {
        $this->days = $days;
        return $this;
    }

    public function getFrom(): \Infobip\Model\SmsDeliveryTimeFrom|null
    {
        return $this->from;
    }

    public function setFrom(?\Infobip\Model\SmsDeliveryTimeFrom $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getTo(): \Infobip\Model\SmsDeliveryTimeTo|null
    {
        return $this->to;
    }

    public function setTo(?\Infobip\Model\SmsDeliveryTimeTo $to): self
    {
        $this->to = $to;
        return $this;
    }
}
