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

class MmsSmsFailover
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $text,
        protected ?string $sender = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\ValidityPeriod $validityPeriod = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\MmsRegional $regional = null,
    ) {

    }


    public function getSender(): string|null
    {
        return $this->sender;
    }

    public function setSender(?string $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getValidityPeriod(): \Infobip\Model\ValidityPeriod|null
    {
        return $this->validityPeriod;
    }

    public function setValidityPeriod(?\Infobip\Model\ValidityPeriod $validityPeriod): self
    {
        $this->validityPeriod = $validityPeriod;
        return $this;
    }

    public function getRegional(): \Infobip\Model\MmsRegional|null
    {
        return $this->regional;
    }

    public function setRegional(?\Infobip\Model\MmsRegional $regional): self
    {
        $this->regional = $regional;
        return $this;
    }
}
