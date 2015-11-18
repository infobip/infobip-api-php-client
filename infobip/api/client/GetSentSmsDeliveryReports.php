<?php

namespace infobip\api\client;

use infobip\api\model\sms\mt\reports\GetSentSmsDeliveryReportsExecuteContext;
use infobip\api\model\sms\mt\reports\SMSReportResponse;
use infobip\api\AbstractApiClient;

/**
 * This is a generated class and is not intended for modification!
 * TODO: Point to Github contribution instructions
 */
class GetSentSmsDeliveryReports extends AbstractApiClient
{

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param GetSentSmsDeliveryReportsExecuteContext $params
     * @return SMSReportResponse
     */
    public function execute(GetSentSmsDeliveryReportsExecuteContext $params) {
        $restPath = $this->getRestUrl("/sms/1/reports");
        $content = $this->executeGET($restPath, $params);
        return $this->map(json_decode($content), get_class(new SMSReportResponse));
    }

}