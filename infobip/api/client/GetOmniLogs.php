<?php

namespace infobip\api\client;

use infobip\api\AbstractApiClient;
use infobip\api\model\omni\logs\OmniLogsResponse;
use infobip\api\model\omni\logs\GetOmniLogsExecuteContext;

/**
 * This is a generated class and is not intended for modification!
 */
class GetOmniLogs extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param GetOmniLogsExecuteContext $params
     * @return OmniLogsResponse
     */
    public function execute(GetOmniLogsExecuteContext $params) {
        $restPath = $this->getRestUrl("/omni/1/logs");
        $content = $this->executeGET($restPath, $params);
        return $this->map(json_decode($content), get_class(new OmniLogsResponse));
    }

}