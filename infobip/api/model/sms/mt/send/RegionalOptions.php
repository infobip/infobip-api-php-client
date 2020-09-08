<?php
namespace infobip\api\model\sms\mt\send;

/**
 * This is a generated class and is not intended for modification!
 */
class RegionalOptions implements \JsonSerializable
{
    /**
     * @var \infobip\api\model\sms\mt\send\IndiaDltOptions
     */
    private $indiaDlt;


    /**
     * @param \infobip\api\model\sms\mt\send\IndiaDltOptions $indiaDlt
     */
    public function setIndiaDlt($indiaDlt)
    {
        $this->indiaDlt = $indiaDlt;
    }

    /**
     * @return \infobip\api\model\sms\mt\send\IndiaDltOptions
     */
    public function getIndiaDlt()
    {
        return $this->indiaDlt;
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