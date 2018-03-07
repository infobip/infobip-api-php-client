<?php
namespace infobip\api\model\sms\mo\logs;

/**
 * This is a generated class and is not intended for modification!
 */
class GetReceivedSmsLogsExecuteContext implements \JsonSerializable
{
    private $keyword;
    private $to;
    private $limit;
    /**
     * @var \infobip\api\model\FormattedDateTime
     */
    private $receivedSince;
    /**
     * @var \infobip\api\model\FormattedDateTime
     */
    private $receivedUntil;


    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    }
    public function getKeyword()
    {
        return $this->keyword;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }
    public function getTo()
    {
        return $this->to;
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
     * @param \DateTime $receivedSince
     */
    public function setReceivedSince($receivedSince)
    {
        $this->receivedSince = new \infobip\api\model\FormattedDateTime($receivedSince);
    }

    /**
     * @return \DateTime
     */
    public function getReceivedSince()
    {
        return $this->receivedSince;
    }

    /**
     * @param \DateTime $receivedUntil
     */
    public function setReceivedUntil($receivedUntil)
    {
        $this->receivedUntil = new \infobip\api\model\FormattedDateTime($receivedUntil);
    }

    /**
     * @return \DateTime
     */
    public function getReceivedUntil()
    {
        return $this->receivedUntil;
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