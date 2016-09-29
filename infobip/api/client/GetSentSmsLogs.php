<?php

namespace infobip\api\client;

use infobip\api\model\sms\mt\logs\GetSentSmsLogsExecuteContext;
use infobip\api\AbstractApiClient;
use infobip\api\model\sms\mt\logs\SMSLogsResponse;

/**
 * This is a generated class and is not intended for modification!
 */
class GetSentSmsLogs extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param GetSentSmsLogsExecuteContext $params
     * @return SMSLogsResponse
     */
    public function execute(GetSentSmsLogsExecuteContext $params) {
        $restPath = $this->getRestUrl("/sms/1/logs");
        $content = $this->executeGET($restPath, $params);
        return $this->map(json_decode($content), get_class(new SMSLogsResponse));
    }

}