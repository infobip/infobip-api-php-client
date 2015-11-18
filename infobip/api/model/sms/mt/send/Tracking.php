<?php
namespace infobip\api\model\sms\mt\send;

/**
 * This is a generated class and is not intended for modification!
 * TODO: Point to Github contribution instructions
 */
class Tracking implements \JsonSerializable
{
    private $processKey;
    private $track;
    private $type;


    public function setProcessKey($processKey)
    {
        $this->processKey = $processKey;
    }
    public function getProcessKey()
    {
        return $this->processKey;
    }

    public function setTrack($track)
    {
        $this->track = $track;
    }
    public function getTrack()
    {
        return $this->track;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
    public function getType()
    {
        return $this->type;
    }


  /**
   * (PHP 5 &gt;= 5.4.0)
   * Specify data which should be serialized to JSON
   * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
   * @return mixed data which can be serialized by json_encode,
   * which is a value of any type other than a resource.
   */
  function jsonSerialize()
  {
      return get_object_vars($this);
  }
}

?>