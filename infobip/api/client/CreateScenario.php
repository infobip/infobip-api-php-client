<?php

namespace infobip\api\client;

use infobip\api\model\omni\scenarios\Scenario;
use infobip\api\AbstractApiClient;

/**
 * This is a generated class and is not intended for modification!
 */
class CreateScenario extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param Scenario $body
     * @return Scenario
     */
    public function execute(Scenario $body) {
        $restPath = $this->getRestUrl("/omni/1/scenarios");
        $content = $this->executePOST($restPath, null, $body);
        return $this->map(json_decode($content), get_class(new Scenario));
    }

}