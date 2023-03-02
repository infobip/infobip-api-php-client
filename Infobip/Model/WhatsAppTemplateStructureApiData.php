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

class WhatsAppTemplateStructureApiData implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'WhatsAppTemplateStructureApiData';

    public const OPENAPI_FORMATS = [
        'header' => null,
        'body' => null,
        'footer' => null,
        'buttons' => null,
        'type' => null
    ];

    /**
     * @param \Infobip\Model\WhatsAppButtonApiData[] $buttons
     */
    public function __construct(
        #[Assert\Valid]
    #[Assert\NotBlank]

    protected \Infobip\Model\WhatsAppBodyApiData $body,
        #[Assert\Valid]

    protected ?\Infobip\Model\WhatsAppHeaderApiData $header = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\WhatsAppFooterApiData $footer = null,
        #[Assert\Count(max: 3)]
    #[Assert\Count(min: 1)]

    protected ?array $buttons = null,
        #[Assert\Choice(['TEXT','MEDIA','UNSUPPORTED',])]

    protected ?string $type = null,
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

    public function getHeader(): \Infobip\Model\WhatsAppHeaderApiData|null
    {
        return $this->header;
    }

    public function setHeader(?\Infobip\Model\WhatsAppHeaderApiData $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function getBody(): \Infobip\Model\WhatsAppBodyApiData
    {
        return $this->body;
    }

    public function setBody(\Infobip\Model\WhatsAppBodyApiData $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function getFooter(): \Infobip\Model\WhatsAppFooterApiData|null
    {
        return $this->footer;
    }

    public function setFooter(?\Infobip\Model\WhatsAppFooterApiData $footer): self
    {
        $this->footer = $footer;
        return $this;
    }

    /**
     * @return \Infobip\Model\WhatsAppButtonApiData[]|null
     */
    public function getButtons(): ?array
    {
        return $this->buttons;
    }

    /**
     * @param \Infobip\Model\WhatsAppButtonApiData[]|null $buttons Template buttons. Can be either up to 3 `quick reply` buttons or up to 2 `call to action` buttons. Call to action buttons must be unique in type.
     */
    public function setButtons(?array $buttons): self
    {
        $this->buttons = $buttons;
        return $this;
    }

    public function getType(): mixed
    {
        return $this->type;
    }

    public function setType($type): self
    {
        $this->type = $type;
        return $this;
    }
}
