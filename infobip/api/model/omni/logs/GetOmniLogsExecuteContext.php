<?php
namespace infobip\api\model\omni\logs;

/**
 * This is a generated class and is not intended for modification!
 */
class GetOmniLogsExecuteContext implements \JsonSerializable
{
    /**
     * @var \infobip\api\model\FormattedDateTime
     */
    private $sentUntil;
    /**
     * @var \string[]
     */
    private $messageId;
    private $channel;
    private $to;
    private $generalStatus;
    private $from;
    /**
     * @var \infobip\api\model\FormattedDateTime
     */
    private $sentSince;
    private $mcc;
    private $limit;
    /**
     * @var \string[]
     */
    private $bulkId;
    private $mnc;


    /**
     * @param \DateTime $sentUntil
     */
    public function setSentUntil($sentUntil)
    {
        $this->sentUntil = new \infobip\api\model\FormattedDateTime($sentUntil);
    }

    /**
     * @return \DateTime
     */
    public function getSentUntil()
    {
        return $this->sentUntil;
    }

    /**
     * @param \string[] $messageId
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }

    /**
     * @return \string[]
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    public function setChannel($channel)
    {
        $this->channel = $channel;
    }
    public function getChannel()
    {
        return $this->channel;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }
    public function getTo()
    {
        return $this->to;
    }

    public function setGeneralStatus($generalStatus)
    {
        $this->generalStatus = $generalStatus;
    }
    public function getGeneralStatus()
    {
        return $this->generalStatus;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param \DateTime $sentSince
     */
    public function setSentSince($sentSince)
    {
        $this->sentSince = new \infobip\api\model\FormattedDateTime($sentSince);
    }

    /**
     * @return \DateTime
     */
    public function getSentSince()
    {
        return $this->sentSince;
    }

    public function setMcc($mcc)
    {
        $this->mcc = $mcc;
    }
    public function getMcc()
    {
        return $this->mcc;
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
     * @param \string[] $bulkId
     */
    public function setBulkId($bulkId)
    {
        $this->bulkId = $bulkId;
    }

    /**
     * @return \string[]
     */
    public function getBulkId()
    {
        return $this->bulkId;
    }

    public function setMnc($mnc)
    {
        $this->mnc = $mnc;
    }
    public function getMnc()
    {
        return $this->mnc;
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