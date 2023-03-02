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

class WhatsAppInteractiveProductContent implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'WhatsAppInteractiveProductContent';

    public const OPENAPI_FORMATS = [
        'action' => null,
        'body' => null,
        'footer' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\Valid]
    #[Assert\NotBlank]

    protected \Infobip\Model\WhatsAppInteractiveProductActionContent $action,
        #[Assert\Valid]

    protected ?\Infobip\Model\WhatsAppInteractiveBodyContent $body = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\WhatsAppInteractiveFooterContent $footer = null,
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

    public function getAction(): \Infobip\Model\WhatsAppInteractiveProductActionContent
    {
        return $this->action;
    }

    public function setAction(\Infobip\Model\WhatsAppInteractiveProductActionContent $action): self
    {
        $this->action = $action;
        return $this;
    }

    public function getBody(): \Infobip\Model\WhatsAppInteractiveBodyContent|null
    {
        return $this->body;
    }

    public function setBody(?\Infobip\Model\WhatsAppInteractiveBodyContent $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function getFooter(): \Infobip\Model\WhatsAppInteractiveFooterContent|null
    {
        return $this->footer;
    }

    public function setFooter(?\Infobip\Model\WhatsAppInteractiveFooterContent $footer): self
    {
        $this->footer = $footer;
        return $this;
    }
}
