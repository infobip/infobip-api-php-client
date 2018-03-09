<?php

namespace infobip\api\client;

use infobip\api\model\omni\campaign\Destinations;
use infobip\api\AbstractApiClient;
use infobip\api\model\omni\campaign\Campaign;

/**
 * This is a generated class and is not intended for modification!
 */
class AddDestination extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param Destinations $body
     * @return Campaign
     */
    public function execute($campaignKey, Destinations $body) {
        $restPath = $this->getRestUrl("/omni/2/campaigns/{$campaignKey}/destinations");
        $content = $this->executePUT($restPath, null, $body);
        return $this->map(json_decode($content), get_class(new Campaign));
    }

}