<?php
namespace infobip\api\model\sms\mt\bulks;

/**
 * This is a generated class and is not intended for modification!
 */
class BulkRequest implements \JsonSerializable
{
    /**
     * @var \infobip\api\model\FormattedDateTime
     */
    private $sendAt;


    /**
     * @param \DateTime $sendAt
     */
    public function setSendAt($sendAt)
    {
        $this->sendAt = new \infobip\api\model\FormattedDateTime($sendAt);
    }

    /**
     * @return \DateTime
     */
    public function getSendAt()
    {
        return $this->sendAt;
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