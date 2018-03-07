<?php

namespace infobip\api\client;

use infobip\api\model\sms\mt\bulks\RescheduleBulkExecuteContext;
use infobip\api\AbstractApiClient;
use infobip\api\model\sms\mt\bulks\BulkRequest;
use infobip\api\model\sms\mt\bulks\BulkResponse;

/**
 * This is a generated class and is not intended for modification!
 */
class RescheduleBulk extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param RescheduleBulkExecuteContext $params
     * @param BulkRequest $body
     * @return BulkResponse
     */
    public function execute(RescheduleBulkExecuteContext $params, BulkRequest $body) {
        $restPath = $this->getRestUrl("/sms/1/bulks");
        $content = $this->executePUT($restPath, $params, $body);
        return $this->map(json_decode($content), get_class(new BulkResponse));
    }

}