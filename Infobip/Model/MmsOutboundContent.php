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

class MmsOutboundContent
{
    /**
     * @param \Infobip\Model\MmsOutboundSegment[] $messageSegments
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $messageSegments,
        #[Assert\Length(max: 66)]
        #[Assert\Length(min: 0)]
        protected ?string $title = null,
    ) {

    }


    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return \Infobip\Model\MmsOutboundSegment[]
     */
    public function getMessageSegments(): array
    {
        return $this->messageSegments;
    }

    /**
     * @param \Infobip\Model\MmsOutboundSegment[] $messageSegments Content of the message being sent.
     */
    public function setMessageSegments(array $messageSegments): self
    {
        $this->messageSegments = $messageSegments;
        return $this;
    }
}
