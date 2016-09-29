<?php

namespace infobip\api\client;

use infobip\api\model\sms\mt\send\SMSResponse;
use infobip\api\AbstractApiClient;
use infobip\api\model\sms\mt\send\textual\SMSMultiTextualRequest;

/**
 * This is a generated class and is not intended for modification!
 */
class SendMultipleSmsTextual extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param SMSMultiTextualRequest $body
     * @return SMSResponse
     */
    public function execute(SMSMultiTextualRequest $body) {
        $restPath = $this->getRestUrl("/sms/1/text/multi");
        $content = $this->executePOST($restPath, null, $body);
        return $this->map(json_decode($content), get_class(new SMSResponse));
    }

}