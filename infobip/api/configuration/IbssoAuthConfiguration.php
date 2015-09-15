<?php

namespace infobip\api\configuration;


class IbssoAuthConfiguration extends Configuration
{

    private $ibssoToken;

    public function __construct($ibssoToken, $baseUrl = null)
    {
        parent::__construct($baseUrl);
        $this->ibssoToken = $ibssoToken;
    }

    public function getAuthenticationHeader()
    {
        return "IBSSO " . $this->ibssoToken;
    }
}