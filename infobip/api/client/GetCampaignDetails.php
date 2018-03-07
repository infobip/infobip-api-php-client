<?php

namespace infobip\api\client;

use infobip\api\AbstractApiClient;
use infobip\api\model\omni\campaign\Campaign;

/**
 * This is a generated class and is not intended for modification!
 */
class GetCampaignDetails extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @return Campaign
     */
    public function execute($campaignKey) {
        $restPath = $this->getRestUrl("/omni/1/campaigns/{$campaignKey}");
        $content = $this->executeGET($restPath, null);
        return $this->map(json_decode($content), get_class(new Campaign));
    }

}