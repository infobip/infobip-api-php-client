<?php
namespace infobip\api\model\sms\mt\send;

/**
 * This is a generated class and is not intended for modification!
 */
class DeliveryTime implements \JsonSerializable
{
    private $hour;
    private $minute;


    public function setHour($hour)
    {
        $this->hour = $hour;
    }
    public function getHour()
    {
        return $this->hour;
    }

    public function setMinute($minute)
    {
        $this->minute = $minute;
    }
    public function getMinute()
    {
        return $this->minute;
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