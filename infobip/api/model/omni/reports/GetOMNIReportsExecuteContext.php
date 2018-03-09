<?php
namespace infobip\api\model\omni\reports;

/**
 * This is a generated class and is not intended for modification!
 */
class GetOMNIReportsExecuteContext implements \JsonSerializable
{
    private $channel;
    private $messageId;
    private $bulkId;
    private $limit;


    public function setChannel($channel)
    {
        $this->channel = $channel;
    }
    public function getChannel()
    {
        return $this->channel;
    }

    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }
    public function getMessageId()
    {
        return $this->messageId;
    }

    public function setBulkId($bulkId)
    {
        $this->bulkId = $bulkId;
    }
    public function getBulkId()
    {
        return $this->bulkId;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
    }
    public function getLimit()
    {
        return $this->limit;
    }


  /**
   * (PHP 5 &gt;= 5.4.0)<br/>
   * Specify data which should be serialized to JSON
   * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
   * @return mixed data which can be serialized by <b>json_encode</b>,
   * which is a value of any type other than a resource.
   */
  function jsonSerialize()
  {
      return get_object_vars($this);
  }
}