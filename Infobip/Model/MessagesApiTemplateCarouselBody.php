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

class MessagesApiTemplateCarouselBody extends MessagesApiTemplateBody
{
    public const TYPE = 'CAROUSEL';

    /**
     * @param \Infobip\Model\MessagesApiTemplateCarouselCard[] $cards
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $cards,
    ) {
        $modelDiscriminatorValue = self::TYPE;

        parent::__construct(
            type: $modelDiscriminatorValue,
        );
    }


    /**
     * @return \Infobip\Model\MessagesApiTemplateCarouselCard[]
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    /**
     * @param \Infobip\Model\MessagesApiTemplateCarouselCard[] $cards Carousel cards.
     */
    public function setCards(array $cards): self
    {
        $this->cards = $cards;
        return $this;
    }
}
