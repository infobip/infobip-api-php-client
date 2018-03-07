<?php

namespace infobip\api\client;

use infobip\api\AbstractApiClient;
use infobip\api\model\omni\send\OmniResponse;
use infobip\api\model\omni\send\OmniAdvancedRequest;

/**
 * This is a generated class and is not intended for modification!
 */
class SendAdvancedOmniMessage extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param OmniAdvancedRequest $body
     * @return OmniResponse
     */
    public function execute(OmniAdvancedRequest $body) {
        $restPath = $this->getRestUrl("/omni/1/advanced");
        $content = $this->executePOST($restPath, null, $body);
        return $this->map(json_decode($content), get_class(new OmniResponse));
    }

}