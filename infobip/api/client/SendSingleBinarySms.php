<?php

namespace infobip\api\client;

use infobip\api\model\sms\mt\send\SMSResponse;
use infobip\api\AbstractApiClient;
use infobip\api\model\sms\mt\send\binary\SMSBinaryRequest;

/**
 * This is a generated class and is not intended for modification!
 */
class SendSingleBinarySms extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param SMSBinaryRequest $body
     * @return SMSResponse
     */
    public function execute(SMSBinaryRequest $body) {
        $restPath = $this->getRestUrl("/sms/1/binary/single");
        $content = $this->executePOST($restPath, null, $body);
        return $this->map(json_decode($content), get_class(new SMSResponse));
    }

}