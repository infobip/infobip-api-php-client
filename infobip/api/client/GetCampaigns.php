<?php

namespace infobip\api\client;

use infobip\api\model\omni\campaign\CampaignsResponse;
use infobip\api\AbstractApiClient;
use infobip\api\model\omni\campaign\GetCampaignsExecuteContext;

/**
 * This is a generated class and is not intended for modification!
 */
class GetCampaigns extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param GetCampaignsExecuteContext $params
     * @return CampaignsResponse
     */
    public function execute(GetCampaignsExecuteContext $params) {
        $restPath = $this->getRestUrl("/omni/1/campaigns");
        $content = $this->executeGET($restPath, $params);
        return $this->map(json_decode($content), get_class(new CampaignsResponse));
    }

}