<?php
namespace infobip\api\model\omni\logs;

/**
 * This is a generated class and is not intended for modification!
 */
class OmniLog implements \JsonSerializable
{
    private $bulkId;
    private $messageId;
    private $to;
    private $from;
    private $text;
    /**
     * @var \infobip\api\model\FormattedDateTime
     */
    private $sentAt;
    /**
     * @var \infobip\api\model\FormattedDateTime
     */
    private $doneAt;
    private $messageCount;
    private $mccMnc;
    /**
     * @var \infobip\api\model\omni\Price
     */
    private $price;
    /**
     * @var \infobip\api\model\omni\Status
     */
    private $status;
    private $channel;


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

    public function setTo($to)
    {
        $this->to = $to;
    }
    public function getTo()
    {
        return $this->to;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }
    public function getFrom()
    {
        return $this->from;
    }

    public function setText($text)
    {
        $this->text = $text;
    }
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param \DateTime $sentAt
     */
    public function setSentAt($sentAt)
    {
        $this->sentAt = new \infobip\api\model\FormattedDateTime($sentAt);
    }

    /**
     * @return \DateTime
     */
    public function getSentAt()
    {
        return $this->sentAt;
    }

    /**
     * @param \DateTime $doneAt
     */
    public function setDoneAt($doneAt)
    {
        $this->doneAt = new \infobip\api\model\FormattedDateTime($doneAt);
    }

    /**
     * @return \DateTime
     */
    public function getDoneAt()
    {
        return $this->doneAt;
    }

    public function setMessageCount($messageCount)
    {
        $this->messageCount = $messageCount;
    }
    public function getMessageCount()
    {
        return $this->messageCount;
    }

    public function setMccMnc($mccMnc)
    {
        $this->mccMnc = $mccMnc;
    }
    public function getMccMnc()
    {
        return $this->mccMnc;
    }

    /**
     * @param \infobip\api\model\omni\Price $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return \infobip\api\model\omni\Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param \infobip\api\model\omni\Status $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return \infobip\api\model\omni\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function setChannel($channel)
    {
        $this->channel = $channel;
    }
    public function getChannel()
    {
        return $this->channel;
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