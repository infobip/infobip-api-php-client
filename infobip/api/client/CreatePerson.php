<?php

namespace infobip\api\client;

use infobip\api\AbstractApiClient;
use infobip\api\model\people\Persons;
use infobip\api\model\people\PersonsResponse;

class CreatePerson extends AbstractApiClient
{
    public function __construct($configuration)
    {
        parent::__construct($configuration);
    }

    /**
     * @param Persons $body
     * @return PersonsResponse
     */
    public function execute(Persons $body)
    {
        $restPath = $this->getRestUrl("/people/1/persons");
        $content  = $this->executePOST($restPath, null, $body);
        return $this->map(json_decode($content), get_class(new PersonsResponse));
    }
}