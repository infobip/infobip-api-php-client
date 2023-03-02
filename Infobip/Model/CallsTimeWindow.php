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

class CallsTimeWindow implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsTimeWindow';

    public const OPENAPI_FORMATS = [
        'from' => null,
        'to' => null,
        'days' => null
    ];

    /**
     * @param string[] $days
     */
    public function __construct(
        #[Assert\NotBlank]
    #[Assert\Choice(['MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY','SUNDAY',])]

    protected string $days,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsTimeWindowPoint $from = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsTimeWindowPoint $to = null,
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

    public function getFrom(): \Infobip\Model\CallsTimeWindowPoint|null
    {
        return $this->from;
    }

    public function setFrom(?\Infobip\Model\CallsTimeWindowPoint $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getTo(): \Infobip\Model\CallsTimeWindowPoint|null
    {
        return $this->to;
    }

    public function setTo(?\Infobip\Model\CallsTimeWindowPoint $to): self
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getDays(): array
    {
        return $this->days;
    }

    /**
     * @param string[] $days Days when scheduling call establishment will be attempted.
     */
    public function setDays(array $days): self
    {
        $this->days = $days;
        return $this;
    }
}
