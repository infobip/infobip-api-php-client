<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use infobip\api\client\SendMultipleTextualSmsAdvanced;
use infobip\api\client\GetBulks;
use infobip\api\client\RescheduleBulk;
use infobip\api\client\GetBulkStatus;
use infobip\api\client\ManageBulkStatus;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\Destination;
use infobip\api\model\sms\mt\bulks\BulkRequest;
use infobip\api\model\sms\mt\bulks\BulkResponse;
use infobip\api\model\sms\mt\bulks\GetBulksExecuteContext;
use infobip\api\model\sms\mt\bulks\RescheduleBulkExecuteContext;
use infobip\api\model\sms\mt\bulks\status\BulkStatus;
use infobip\api\model\sms\mt\bulks\status\BulkStatusResponse;
use infobip\api\model\sms\mt\bulks\status\GetBulkStatusExecuteContext;
use infobip\api\model\sms\mt\bulks\status\ManageBulkStatusExecuteContext;
use infobip\api\model\sms\mt\bulks\status\UpdateStatusRequest;
use infobip\api\model\sms\mt\send\Message;
use infobip\api\model\sms\mt\send\SMSResponse;
use infobip\api\model\sms\mt\send\textual\SMSAdvancedTextualRequest;

// Initializing clients with appropriate configuration
$configuration = new BasicAuthConfiguration(USERNAME, PASSWORD);
$sendMessageClient = new SendMultipleTextualSmsAdvanced($configuration);
$getBulksClient = new GetBulks($configuration);
$rescheduleBulkClient = new RescheduleBulk($configuration);
$getBulkStatusClient = new GetBulkStatus($configuration);
$manageBulkStatusClient = new ManageBulkStatus($configuration);

/**
 * @return SMSResponse
 */
function sendScheduledMessage() {
    // Creating request body
    $destination = new Destination();
    $destination->setTo(TO);

    $message = new Message();
    $message->setFrom(FROM);
    $message->setDestinations([$destination]);
    $message->setText("This is an example of a scheduled message.");

    // Note that timezone used for this DateTime is defined in examples.php
    $tenMinutesInTheFuture = new DateTime("now +10 minute");
    $message->setSendAt($tenMinutesInTheFuture);

    $requestBody = new SMSAdvancedTextualRequest();
    $requestBody->setMessages([$message]);

    // Executing request
    global $sendMessageClient;
    $response = $sendMessageClient->execute($requestBody);

    $sentMessageInfo = $response->getMessages()[0];
    echo "------------------------------------------------\n";
    echo "Scheduled SMS" . "\n";
    echo "Message ID: " . $sentMessageInfo->getMessageId() . "\n";
    echo "Bulk ID: " . $response->getBulkId() . "\n";
    echo "Receiver: " . $sentMessageInfo->getTo() . "\n";
    echo "Message status: " . $sentMessageInfo->getStatus()->getName() . "\n";
    echo "------------------------------------------------\n";

    return $response;
}

/**
 * @param string $bulkId
 * @return BulkResponse
 */
function getBulk($bulkId) {
    $bulksContext = new GetBulksExecuteContext();
    $bulksContext->setBulkId($bulkId);

    global $getBulksClient;
    return $getBulksClient->execute($bulksContext);
}

/**
 * @param string $bulkId
 */
function rescheduleMessage($bulkId) {
    $rescheduleContext = new RescheduleBulkExecuteContext();
    $rescheduleContext->setBulkId($bulkId);

    $rescheduleRequest = new BulkRequest();
    $rescheduleRequest->setSendAt(new DateTime("now +30 minute"));

    global $rescheduleBulkClient;
    $rescheduleBulkClient->execute($rescheduleContext, $rescheduleRequest);
}

/**
 * @param string $bulkId
 * @return BulkStatusResponse
 */
function getBulkStatus($bulkId) {
    $getStatusContext = new GetBulkStatusExecuteContext();
    $getStatusContext->setBulkId($bulkId);

    global $getBulkStatusClient;
    return $getBulkStatusClient->execute($getStatusContext);
}

/**
 * @param string $bulkId
 */
function cancelScheduledMessage($bulkId) {
    $manageBulkContext = new ManageBulkStatusExecuteContext();
    $manageBulkContext->setBulkId($bulkId);

    $updateStatusRequest = new UpdateStatusRequest();
    $updateStatusRequest->setStatus(BulkStatus::CANCELED);

    global $manageBulkStatusClient;
    $manageBulkStatusClient->execute($manageBulkContext, $updateStatusRequest);
}

// Sending a scheduled message
$response = sendScheduledMessage();
$bulkId = $response->getBulkId();

sleep(3);

// Fetching bulk via bulkId
$bulkResponse = getBulk($bulkId);
echo "Fetched scheduling date.\n";
echo "Bulk ID: " . $bulkResponse->getBulkId() . "\n";
echo "SendAt: " . date_format($bulkResponse->getSendAt(),"Y/m/d H:i:s") . "\n";
echo "------------------------------------------------\n";

// Rescheduling the message via the bulkId
rescheduleMessage($bulkId);
echo "Rescheduling message.\n";
echo "------------------------------------------------\n";

// Fetching bulk via bulkId after rescheduling
$bulkResponse = getBulk($bulkId);
echo "Fetched scheduling date after rescheduling.\n";
echo "Bulk ID: " . $bulkResponse->getBulkId() . "\n";
echo "SendAt: " . date_format($bulkResponse->getSendAt(),"Y/m/d H:i:s") . "\n";
echo "------------------------------------------------\n";

// Fetching bulk status via bulkId
$statusResponse = getBulkStatus($bulkId);
echo "Fetched bulk status.\n";
echo "Bulk status: " . $statusResponse->getStatus() . "\n";
echo "------------------------------------------------\n";

// Change the PENDING status of the scheduled message bulk to CANCELED to cancel the scheduled message
if ($statusResponse->getStatus() === BulkStatus::PENDING) {
    echo "Fetched bulk is in PENDING status, attempting to cancel bulk.\n";
    echo "------------------------------------------------\n";

    cancelScheduledMessage($bulkId);

    $statusResponse = getBulkStatus($bulkId);
    echo "Fetched bulk status after update.\n";
    echo "Bulk status: " . $statusResponse->getStatus() . "\n";

} else {
    echo "Fetched bulk is not in PENDING status, aborting update.\n";
}
echo "------------------------------------------------\n";
