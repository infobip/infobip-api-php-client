<?php
namespace infobip\api\model\sms\mo\reports;

/**
 * This is a generated class and is not intended for modification!
 */
class MOReport implements \JsonSerializable
{
    private $cleanText;
    private $smsCount;
    private $messageId;
    private $from;
    private $to;
    private $text;
    private $keyword;
    /**
     * @var \DateTime
     */
    private $receivedAt;


    public function setCleanText($cleanText)
    {
        $this->cleanText = $cleanText;
    }
    public function getCleanText()
    {
        return $this->cleanText;
    }

    public function setSmsCount($smsCount)
    {
        $this->smsCount = $smsCount;
    }
    public function getSmsCount()
    {
        return $this->smsCount;
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

    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    }
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @param \DateTime $receivedAt
     */
    public function setReceivedAt($receivedAt)
    {
        $this->receivedAt = $receivedAt;
    }

    /**
     * @return \DateTime
     */
    public function getReceivedAt()
    {
        return $this->receivedAt;
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