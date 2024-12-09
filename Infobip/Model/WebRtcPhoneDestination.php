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

class WebRtcPhoneDestination extends WebRtcDestination
{
    public const TYPE = 'PHONE';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Regex('/^[\\p{N}\\-_+=\/.]+$/')]
        protected string $phoneNumber,
        #[Assert\Regex('/^[\\p{N}\\-_+=\/.]+$/')]
        protected ?string $from = null,
        protected ?string $displayName = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\WebRtcHangupRestriction $hangupRestriction = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getFrom(): string|null
    {
        return $this->from;
    }

    public function setFrom(?string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getDisplayName(): string|null
    {
        return $this->displayName;
    }

    public function setDisplayName(?string $displayName): self
    {
        $this->displayName = $displayName;
        return $this;
    }

    public function getHangupRestriction(): \Infobip\Model\WebRtcHangupRestriction|null
    {
        return $this->hangupRestriction;
    }

    public function setHangupRestriction(?\Infobip\Model\WebRtcHangupRestriction $hangupRestriction): self
    {
        $this->hangupRestriction = $hangupRestriction;
        return $this;
    }
}
