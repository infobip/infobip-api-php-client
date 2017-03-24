<?php

namespace infobip\api\model;

class FormattedDateTime extends \DateTime implements \JsonSerializable
{

    const API_FORMAT = 'Y-m-d\TH:i:s.000P';

    /**
     * FormattedDateTime constructor.
     * @param \DateTime $backingDate
     */
    public function __construct($backingDate)
    {
        parent::__construct($backingDate->format('c'), $backingDate->getTimezone());
    }

    public function jsonSerialize()
    {
        return self::toApiFormat();
    }

    public function __toString()
    {
        return self::toApiFormat();
    }

    private function toApiFormat() {
        return parent::format(self::API_FORMAT);
    }

}