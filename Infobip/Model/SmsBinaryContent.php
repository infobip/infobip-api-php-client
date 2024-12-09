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

class SmsBinaryContent implements SmsMessageContent
{
    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $hex,
        protected ?int $dataCoding = 0,
        protected ?int $esmClass = 0,
    ) {

    }


    public function getDataCoding(): int|null
    {
        return $this->dataCoding;
    }

    public function setDataCoding(?int $dataCoding): self
    {
        $this->dataCoding = $dataCoding;
        return $this;
    }

    public function getEsmClass(): int|null
    {
        return $this->esmClass;
    }

    public function setEsmClass(?int $esmClass): self
    {
        $this->esmClass = $esmClass;
        return $this;
    }

    public function getHex(): string
    {
        return $this->hex;
    }

    public function setHex(string $hex): self
    {
        $this->hex = $hex;
        return $this;
    }
}
