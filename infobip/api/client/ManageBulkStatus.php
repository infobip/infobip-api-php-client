<?php

namespace infobip\api\client;

use infobip\api\AbstractApiClient;
use infobip\api\model\sms\mt\bulks\status\ManageBulkStatusExecuteContext;
use infobip\api\model\sms\mt\bulks\status\UpdateStatusRequest;
use infobip\api\model\sms\mt\bulks\status\BulkStatusResponse;

/**
 * This is a generated class and is not intended for modification!
 */
class ManageBulkStatus extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param ManageBulkStatusExecuteContext $params
     * @param UpdateStatusRequest $body
     * @return BulkStatusResponse
     */
    public function execute(ManageBulkStatusExecuteContext $params, UpdateStatusRequest $body) {
        $restPath = $this->getRestUrl("/sms/1/bulks/status");
        $content = $this->executePUT($restPath, $params, $body);
        return $this->map(json_decode($content), get_class(new BulkStatusResponse));
    }

}