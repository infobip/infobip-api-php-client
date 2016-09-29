<?php
namespace infobip\api\model\sms\mt\logs;

/**
 * This is a generated class and is not intended for modification!
 */
class SMSLog implements \JsonSerializable
{
    /**
     * @var \DateTime
     */
    private $doneAt;
    private $bulkId;
    private $mccMnc;
    private $smsCount;
    /**
     * @var \infobip\api\model\Price
     */
    private $price;
    private $messageId;
    private $from;
    private $to;
    private $text;
    /**
     * @var \DateTime
     */
    private $sentAt;
    /**
     * @var \infobip\api\model\Error
     */
    private $error;
    /**
     * @var \infobip\api\model\Status
     */
    private $status;


    /**
     * @param \DateTime $doneAt
     */
    public function setDoneAt($doneAt)
    {
        $this->doneAt = $doneAt;
    }

    /**
     * @return \DateTime
     */
    public function getDoneAt()
    {
        return $this->doneAt;
    }

    public function setBulkId($bulkId)
    {
        $this->bulkId = $bulkId;
    }
    public function getBulkId()
    {
        return $this->bulkId;
    }

    public function setMccMnc($mccMnc)
    {
        $this->mccMnc = $mccMnc;
    }
    public function getMccMnc()
    {
        return $this->mccMnc;
    }

    public function setSmsCount($smsCount)
    {
        $this->smsCount = $smsCount;
    }
    public function getSmsCount()
    {
        return $this->smsCount;
    }

    /**
     * @param \infobip\api\model\Price $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return \infobip\api\model\Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }
    public function getMessageId()
    {
        return $this->messageId;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }
    public function getFrom()
    {
        return $this->from;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }
    public function getTo()
    {
        return $this->to;
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
        $this->sentAt = $sentAt;
    }

    /**
     * @return \DateTime
     */
    public function getSentAt()
    {
        return $this->sentAt;
    }

    /**
     * @param \infobip\api\model\Error $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @return \infobip\api\model\Error
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param \infobip\api\model\Status $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return \infobip\api\model\Status
     */
    public function getStatus()
    {
        return $this->status;
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