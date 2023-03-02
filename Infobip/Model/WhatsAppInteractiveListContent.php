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

class WhatsAppInteractiveListContent implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'WhatsAppInteractiveListContent';

    public const OPENAPI_FORMATS = [
        'body' => null,
        'action' => null,
        'header' => null,
        'footer' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\Valid]
    #[Assert\NotBlank]

    protected \Infobip\Model\WhatsAppInteractiveBodyContent $body,
        #[Assert\Valid]
    #[Assert\NotBlank]

    protected \Infobip\Model\WhatsAppInteractiveListActionContent $action,
        #[Assert\Valid]

    protected ?\Infobip\Model\WhatsAppInteractiveListHeaderContent $header = null,
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

    public function getBody(): \Infobip\Model\WhatsAppInteractiveBodyContent
    {
        return $this->body;
    }

    public function setBody(\Infobip\Model\WhatsAppInteractiveBodyContent $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function getAction(): \Infobip\Model\WhatsAppInteractiveListActionContent
    {
        return $this->action;
    }

    public function setAction(\Infobip\Model\WhatsAppInteractiveListActionContent $action): self
    {
        $this->action = $action;
        return $this;
    }

    public function getHeader(): \Infobip\Model\WhatsAppInteractiveListHeaderContent|null
    {
        return $this->header;
    }

    public function setHeader(?\Infobip\Model\WhatsAppInteractiveListHeaderContent $header): self
    {
        $this->header = $header;
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
