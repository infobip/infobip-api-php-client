<?php
namespace infobip\api\model\conversion;

/**
 * This is a generated class and is not intended for modification!
 */
class EndTagResponse implements \JsonSerializable
{
    private $processKey;


    public function setProcessKey($processKey)
    {
        $this->processKey = $processKey;
    }
    public function getProcessKey()
    {
        return $this->processKey;
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