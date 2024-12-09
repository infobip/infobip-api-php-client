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

class WhatsAppContactsContent
{
    /**
     * @param \Infobip\Model\WhatsAppContactContent[] $contacts
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $contacts,
    ) {

    }


    /**
     * @return \Infobip\Model\WhatsAppContactContent[]
     */
    public function getContacts(): array
    {
        return $this->contacts;
    }

    /**
     * @param \Infobip\Model\WhatsAppContactContent[] $contacts An array of contacts sent in a WhatsApp message.
     */
    public function setContacts(array $contacts): self
    {
        $this->contacts = $contacts;
        return $this;
    }
}
