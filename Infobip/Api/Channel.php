<?php

namespace Infobip\Api;
use Infobip\Client;
use Infobip\Api\SMS;

class Channel {
    public SMS $sms;

    public function __construct(private Client $client) {
        $this->sms = new SMS($client);
    }
}