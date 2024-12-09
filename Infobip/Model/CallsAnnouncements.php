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

class CallsAnnouncements
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsAnnouncementCaller $caller = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\CallsAnnouncementCallee $callee = null,
    ) {

    }


    public function getCaller(): \Infobip\Model\CallsAnnouncementCaller|null
    {
        return $this->caller;
    }

    public function setCaller(?\Infobip\Model\CallsAnnouncementCaller $caller): self
    {
        $this->caller = $caller;
        return $this;
    }

    public function getCallee(): \Infobip\Model\CallsAnnouncementCallee|null
    {
        return $this->callee;
    }

    public function setCallee(?\Infobip\Model\CallsAnnouncementCallee $callee): self
    {
        $this->callee = $callee;
        return $this;
    }
}
