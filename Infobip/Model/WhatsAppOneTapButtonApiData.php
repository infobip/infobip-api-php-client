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

class WhatsAppOneTapButtonApiData extends WhatsAppAuthenticationButtonApiData
{
    public const OTPTYPE = 'ONE_TAP';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $packageName,
        #[Assert\NotBlank]
        #[Assert\Length(max: 11)]
        #[Assert\Length(min: 11)]
        protected string $signatureHash,
        #[Assert\Length(max: 25)]
        #[Assert\Length(min: 0)]
        protected ?string $text = null,
        #[Assert\Length(max: 25)]
        #[Assert\Length(min: 0)]
        protected ?string $autofillText = null,
    ) {
        $modelDiscriminatorValue = self::OTPTYPE;

        parent::__construct(
            otpType: $modelDiscriminatorValue,
        );
    }


    public function getText(): string|null
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getAutofillText(): string|null
    {
        return $this->autofillText;
    }

    public function setAutofillText(?string $autofillText): self
    {
        $this->autofillText = $autofillText;
        return $this;
    }

    public function getPackageName(): string
    {
        return $this->packageName;
    }

    public function setPackageName(string $packageName): self
    {
        $this->packageName = $packageName;
        return $this;
    }

    public function getSignatureHash(): string
    {
        return $this->signatureHash;
    }

    public function setSignatureHash(string $signatureHash): self
    {
        $this->signatureHash = $signatureHash;
        return $this;
    }
}
