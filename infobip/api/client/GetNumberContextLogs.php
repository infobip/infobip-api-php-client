<?php

namespace infobip\api\client;

use infobip\api\model\nc\logs\GetNumberContextLogsExecuteContext;
use infobip\api\AbstractApiClient;
use infobip\api\model\nc\logs\NumberContextLogsResponse;

/**
 * This is a generated class and is not intended for modification!
 */
class GetNumberContextLogs extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param GetNumberContextLogsExecuteContext $params
     * @return NumberContextLogsResponse
     */
    public function execute(GetNumberContextLogsExecuteContext $params) {
        $restPath = $this->getRestUrl("/number/1/logs");
        $content = $this->executeGET($restPath, $params);
        return $this->map(json_decode($content), get_class(new NumberContextLogsResponse));
    }

}