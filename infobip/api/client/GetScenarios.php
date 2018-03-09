<?php

namespace infobip\api\client;

use infobip\api\AbstractApiClient;
use infobip\api\model\omni\scenarios\ScenariosResponse;
use infobip\api\model\omni\scenarios\GetScenariosExecuteContext;

/**
 * This is a generated class and is not intended for modification!
 */
class GetScenarios extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param GetScenariosExecuteContext $params
     * @return ScenariosResponse
     */
    public function execute(GetScenariosExecuteContext $params) {
        $restPath = $this->getRestUrl("/omni/1/scenarios");
        $content = $this->executeGET($restPath, $params);
        return $this->map(json_decode($content), get_class(new ScenariosResponse));
    }

}