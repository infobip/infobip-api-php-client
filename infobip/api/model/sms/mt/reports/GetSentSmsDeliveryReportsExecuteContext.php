<?php
namespace infobip\api\model\sms\mt\reports;

/**
 * This is a generated class and is not intended for modification!
 * TODO: Point to Github contribution instructions
 */
class GetSentSmsDeliveryReportsExecuteContext
{
    private $bulkId;
    private $messageId;
    private $limit;


    public function setBulkId($bulkId)
    {
        $this->bulkId = $bulkId;
    }

    public function getBulkId()
    {
        return $this->bulkId;
    }

    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }

    public function getMessageId()
    {
        return $this->messageId;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    public function getLimit()
    {
        return $this->limit;
    }

}

?>