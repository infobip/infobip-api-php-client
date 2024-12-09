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

class MessagesApiEventRequest
{
    /**
     * @param \Infobip\Model\MessagesApiOutboundEvent[] $events
     */
    public function __construct(
        #[Assert\NotBlank]
        protected array $events,
    ) {

    }


    /**
     * @return \Infobip\Model\MessagesApiOutboundEvent[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * @param \Infobip\Model\MessagesApiOutboundEvent[] $events Array of event objects of a single event or multiple events sent
     */
    public function setEvents(array $events): self
    {
        $this->events = $events;
        return $this;
    }
}
