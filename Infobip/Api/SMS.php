<?php

namespace Infobip\Api;
use Infobip\Client;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsSendingSpeedLimit;
use Infobip\Model\SmsUrlOptions;
use Infobip\Model\SmsTracking;

final class SMS {
    public function __construct(public Client $client)
    {

    }

    function getInboundSmsMessages(?int $limit = null)
    {
        $query = ($limit) ? ['limit' => $limit] : null;
        return $this->client->get('/sms/1/inbox/reports', $query);
    }

    function sendSmsMessages(array $messages, ?string $bulkId = null, ?SmsSendingSpeedLimit $sendingSpeedLimit = null, ?SmsUrlOptions $urlOptions = null, ?SmsTracking $tracking = null)
    {
        $body = new SmsAdvancedTextualRequest($messages, $bulkId, $sendingSpeedLimit, $urlOptions, $tracking);
        // @todo Do some validation
        return $this->client->post('/sms/1/inbox/reports', $body);
    }
}