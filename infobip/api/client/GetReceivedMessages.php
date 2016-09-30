<?php

namespace infobip\api\client;

use infobip\api\model\sms\mo\reports\GetReceivedMessagesExecuteContext;
use infobip\api\model\sms\mo\reports\MOReportResponse;
use infobip\api\AbstractApiClient;

/**
 * This is a generated class and is not intended for modification!
 */
class GetReceivedMessages extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param GetReceivedMessagesExecuteContext $params
     * @return MOReportResponse
     */
    public function execute(GetReceivedMessagesExecuteContext $params) {
        $restPath = $this->getRestUrl("/sms/1/inbox/reports");
        $content = $this->executeGET($restPath, $params);
        return $this->map(json_decode($content), get_class(new MOReportResponse));
    }

}