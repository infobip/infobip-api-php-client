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

class MessagesApiRegionalOptions
{
    /**
     */
    public function __construct(
        #[Assert\Valid]
        protected ?\Infobip\Model\MessagesApiIndiaDltOptions $indiaDlt = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\TurkeyIysOptions $turkeyIys = null,
        #[Assert\Valid]
        protected ?\Infobip\Model\MessagesApiSouthKoreaOptions $southKorea = null,
    ) {

    }


    public function getIndiaDlt(): \Infobip\Model\MessagesApiIndiaDltOptions|null
    {
        return $this->indiaDlt;
    }

    public function setIndiaDlt(?\Infobip\Model\MessagesApiIndiaDltOptions $indiaDlt): self
    {
        $this->indiaDlt = $indiaDlt;
        return $this;
    }

    public function getTurkeyIys(): \Infobip\Model\TurkeyIysOptions|null
    {
        return $this->turkeyIys;
    }

    public function setTurkeyIys(?\Infobip\Model\TurkeyIysOptions $turkeyIys): self
    {
        $this->turkeyIys = $turkeyIys;
        return $this;
    }

    public function getSouthKorea(): \Infobip\Model\MessagesApiSouthKoreaOptions|null
    {
        return $this->southKorea;
    }

    public function setSouthKorea(?\Infobip\Model\MessagesApiSouthKoreaOptions $southKorea): self
    {
        $this->southKorea = $southKorea;
        return $this;
    }
}
