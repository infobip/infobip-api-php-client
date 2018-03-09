<?php
namespace infobip\api\model\omni;

/**
 * This is a generated class and is not intended for modification!
 */
class Destination implements \JsonSerializable
{
    private $messageId;
    /**
     * @var \infobip\api\model\omni\To
     */
    private $to;


    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param \infobip\api\model\omni\To $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return \infobip\api\model\omni\To
     */
    public function getTo()
    {
        return $this->to;
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