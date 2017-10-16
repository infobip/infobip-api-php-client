<?php

namespace infobip\api\client;

use infobip\api\model\sms\mt\bulks\GetBulksExecuteContext;
use infobip\api\AbstractApiClient;
use infobip\api\model\sms\mt\bulks\BulkResponse;

/**
 * This is a generated class and is not intended for modification!
 */
class GetBulks extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param GetBulksExecuteContext $params
     * @return BulkResponse
     */
    public function execute(GetBulksExecuteContext $params) {
        $restPath = $this->getRestUrl("/sms/1/bulks");
        $content = $this->executeGET($restPath, $params);
        return $this->map(json_decode($content), get_class(new BulkResponse));
    }

}