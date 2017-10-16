<?php

namespace infobip\api\client;

use infobip\api\model\sms\mt\send\preview\PreviewRequest;
use infobip\api\model\sms\mt\send\preview\PreviewResponse;
use infobip\api\AbstractApiClient;

/**
 * This is a generated class and is not intended for modification!
 */
class PreviewSms extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param PreviewRequest $body
     * @return PreviewResponse
     */
    public function execute(PreviewRequest $body) {
        $restPath = $this->getRestUrl("/sms/1/preview");
        $content = $this->executePOST($restPath, null, $body);
        return $this->map(json_decode($content), get_class(new PreviewResponse));
    }

}