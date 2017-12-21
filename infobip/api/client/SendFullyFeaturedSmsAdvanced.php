<?php
/**
 * Created by PhpStorm.
 * User: Sirolad
 * Date: 21/12/2017
 * Time: 7:57 PM
 */

namespace infobip\api\client;

use infobip\api\AbstractApiClient;
use infobip\api\model\sms\mt\send\SMSResponse;
use infobip\api\model\sms\mt\send\voice\SMSAdvancedVoiceRequest;

/**
 * This is a generated class and is not intended for modification!
 */
class SendFullyFeaturedSmsAdvanced extends AbstractApiClient
{
    /**
     * SendFullyFeaturedSmsAdvanced constructor.
     * @param $configuration
     */
    public function __construct($configuration)
    {
        parent::__construct($configuration);
    }

    /**
     * @param SMSAdvancedVoiceRequest $body
     * @return SMSResponse
     */
    public function execute(SMSAdvancedVoiceRequest $body) {
        $restPath = $this->getRestUrl("/tts/3/advanced");
        $content = $this->executePOST($restPath, null, $body);
        return $this->map(json_decode($content), get_class(new SMSResponse()));
    }
}