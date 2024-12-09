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

class MessagesApiWebhookEventSubjectContent extends MessagesApiWebhookEventContent
{
    public const TYPE = 'SUBJECT';

    /**
     */
    public function __construct(
        #[Assert\NotBlank]
        protected string $text,
        #[Assert\NotBlank]
        protected string $cleanText,
        protected ?string $keyword = null,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
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

    public function getCleanText(): string
    {
        return $this->cleanText;
    }

    public function setCleanText(string $cleanText): self
    {
        $this->cleanText = $cleanText;
        return $this;
    }

    public function getKeyword(): string|null
    {
        return $this->keyword;
    }

    public function setKeyword(?string $keyword): self
    {
        $this->keyword = $keyword;
        return $this;
    }
}