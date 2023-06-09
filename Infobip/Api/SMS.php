<?php

namespace Infobip\Api;
use Infobip\Client;

final class SMS {
    public function __construct(public Client $client) {

    }
}