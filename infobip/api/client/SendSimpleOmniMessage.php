<?php

namespace infobip\api\client;

use infobip\api\AbstractApiClient;
use infobip\api\model\omni\send\OmniSimpleRequest;
use infobip\api\model\omni\send\OmniResponse;

/**
 * This is a generated class and is not intended for modification!
 */
class SendSimpleOmniMessage extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param OmniSimpleRequest $body
     * @return OmniResponse
     */
    public function execute(OmniSimpleRequest $body) {
        $restPath = $this->getRestUrl("/omni/1/text");
        $content = $this->executePOST($restPath, null, $body);
        return $this->map(json_decode($content), get_class(new OmniResponse));
    }

}