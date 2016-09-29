<?php

namespace infobip\api\client;

use infobip\api\model\sms\mo\logs\MOLogsResponse;
use infobip\api\AbstractApiClient;
use infobip\api\model\sms\mo\logs\GetReceivedSmsLogsExecuteContext;

/**
 * This is a generated class and is not intended for modification!
 */
class GetReceivedSmsLogs extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param GetReceivedSmsLogsExecuteContext $params
     * @return MOLogsResponse
     */
    public function execute(GetReceivedSmsLogsExecuteContext $params) {
        $restPath = $this->getRestUrl("/sms/1/inbox/logs");
        $content = $this->executeGET($restPath, $params);
        return $this->map(json_decode($content), get_class(new MOLogsResponse));
    }

}