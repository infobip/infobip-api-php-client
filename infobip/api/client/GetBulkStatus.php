<?php

namespace infobip\api\client;

use infobip\api\model\sms\mt\bulks\status\GetBulkStatusExecuteContext;
use infobip\api\AbstractApiClient;
use infobip\api\model\sms\mt\bulks\status\BulkStatusResponse;

/**
 * This is a generated class and is not intended for modification!
 */
class GetBulkStatus extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param GetBulkStatusExecuteContext $params
     * @return BulkStatusResponse
     */
    public function execute(GetBulkStatusExecuteContext $params) {
        $restPath = $this->getRestUrl("/sms/1/bulks/status");
        $content = $this->executeGET($restPath, $params);
        return $this->map(json_decode($content), get_class(new BulkStatusResponse));
    }

}