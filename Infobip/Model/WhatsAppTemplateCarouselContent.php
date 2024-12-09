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

class WhatsAppTemplateCarouselContent
{
    /**
     * @param \Infobip\Model\WhatsAppTemplateCardContent[] $cards
     */
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Count(max: 10)]
        #[Assert\Count(min: 1)]
        protected array $cards,
    ) {

    }


    /**
     * @return \Infobip\Model\WhatsAppTemplateCardContent[]
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    /**
     * @param \Infobip\Model\WhatsAppTemplateCardContent[] $cards Carousel cards. Should be defined in the correct order. It can have between one and ten cards.
     */
    public function setCards(array $cards): self
    {
        $this->cards = $cards;
        return $this;
    }
}
