<?php

namespace infobip\api\configuration;

abstract class Configuration {

    public $baseUrl = 'https://api.infobip.com/';

    public function __construct($baseUrl)
    {
        if($baseUrl) {
            if ($baseUrl[strlen($baseUrl) - 1] != '/')
                $baseUrl .= '/';
            $this->baseUrl = $baseUrl;
        }
    }


    public abstract function getAuthenticationHeader();

}