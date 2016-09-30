<?php
namespace infobip\api\model\sms\mo\logs;

/**
 * This is a generated class and is not intended for modification!
 */
class GetReceivedSmsLogsExecuteContext implements \JsonSerializable
{
    private $to;
    /**
     * @var \DateTime
     */
    private $receivedSince;
    /**
     * @var \DateTime
     */
    private $receivedUntil;
    private $limit;
    private $keyword;


    public function setTo($to)
    {
        $this->to = $to;
    }
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param \DateTime $receivedSince
     */
    public function setReceivedSince($receivedSince)
    {
        $this->receivedSince = $receivedSince;
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
        $this->receivedUntil = $receivedUntil;
    }

    /**
     * @return \DateTime
     */
    public function getReceivedUntil()
    {
        return $this->receivedUntil;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
    }
    public function getLimit()
    {
        return $this->limit;
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