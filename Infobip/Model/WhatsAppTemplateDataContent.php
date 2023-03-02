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

class WhatsAppTemplateDataContent implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'WhatsAppTemplateDataContent';

    public const OPENAPI_FORMATS = [
        'body' => null,
        'header' => null,
        'buttons' => null
    ];

    /**
     * @param \Infobip\Model\WhatsAppTemplateButtonContent[] $buttons
     */
    public function __construct(
        #[Assert\Valid]
    #[Assert\NotBlank]

    protected \Infobip\Model\WhatsAppTemplateBodyContent $body,
        #[Assert\Valid]

    protected ?\Infobip\Model\WhatsAppTemplateHeaderContent $header = null,
        protected ?array $buttons = null,
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

    public function getBody(): \Infobip\Model\WhatsAppTemplateBodyContent
    {
        return $this->body;
    }

    public function setBody(\Infobip\Model\WhatsAppTemplateBodyContent $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function getHeader(): \Infobip\Model\WhatsAppTemplateHeaderContent|null
    {
        return $this->header;
    }

    public function setHeader(?\Infobip\Model\WhatsAppTemplateHeaderContent $header): self
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @return \Infobip\Model\WhatsAppTemplateButtonContent[]|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }

    /**
     * @param \Infobip\Model\WhatsAppTemplateButtonContent[]|null $buttons Template buttons. Should be defined in correct order, only if `quick reply` or `dynamic URL` buttons have been registered. It can have up to three `quick reply` buttons or only one `dynamic URL` button.
     */
    public function setButtons(?array $buttons): self
    {
        $this->buttons = $buttons;
        return $this;
    }
}
