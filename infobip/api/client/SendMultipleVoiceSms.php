<?php

namespace infobip\api\client;

use infobip\api\model\sms\mt\send\SMSResponse;
use infobip\api\AbstractApiClient;
use infobip\api\model\sms\mt\send\voice\SMSMultiVoiceRequest;

/**
 * This is a generated class and is not intended for modification!
 */
class SendMultipleVoiceSms extends AbstractApiClient {

    public function __construct($configuration) {
        parent::__construct($configuration);
    }

    /**
     * @param SMSMultiVoiceRequest $body
     * @return SMSResponse
     */
    public function execute(SMSMultiVoiceRequest $body) {
        $restPath = $this->getRestUrl("/tts/3/multi");
        $content = $this->executePOST($restPath, null, $body);
        return $this->map(json_decode($content), get_class(new SMSResponse));
    }
}
