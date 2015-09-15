<?php

namespace infobip\api\configuration;


class ApiKeyAuthConfiguration extends Configuration
{

    private $apiKey;

    public function __construct($apiKey, $baseUrl = null)
    {
        parent::__construct($baseUrl);
        $this->apiKey = $apiKey;
    }

    public function getAuthenticationHeader()
    {
        return "App " . $this->apiKey;
    }
}