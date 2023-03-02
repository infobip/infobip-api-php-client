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

class CallsDialogPlayRequest implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'CallsDialogPlayRequest';

    public const OPENAPI_FORMATS = [
        'loopCount' => 'int32',
        'content' => null
    ];

    /**
     */
    public function __construct(
        protected ?int $loopCount = null,
        #[Assert\Valid]

    protected ?\Infobip\Model\CallsPlayContent $content = null,
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

    public function getLoopCount(): int|null
    {
        return $this->loopCount;
    }

    public function setLoopCount(?int $loopCount): self
    {
        $this->loopCount = $loopCount;
        return $this;
    }

    public function getContent(): \Infobip\Model\CallsPlayContent|null
    {
        return $this->content;
    }

    public function setContent(?\Infobip\Model\CallsPlayContent $content): self
    {
        $this->content = $content;
        return $this;
    }
}
