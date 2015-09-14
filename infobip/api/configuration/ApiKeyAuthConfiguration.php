<?php

namespace infobip\api\configuration;


class ApiKeyAuthConfiguration extends Configuration
{

    private $apiKey;

    public function __construct($apiKey, $baseUrl)
    {
        parent::__construct($baseUrl);
        $this->apiKey = $apiKey;
    }

    public function getAuthenticationHeader()
    {
        return "Api " . $this->apiKey;
    }
}