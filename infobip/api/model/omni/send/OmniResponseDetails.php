<?php
namespace infobip\api\model\omni\send;

/**
 * This is a generated class and is not intended for modification!
 */
class OmniResponseDetails implements \JsonSerializable
{
    /**
     * @var \infobip\api\model\omni\To
     */
    private $to;
    /**
     * @var \infobip\api\model\omni\Status
     */
    private $status;
    private $messageId;


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
     * @param \infobip\api\model\omni\Status $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return \infobip\api\model\omni\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }
    public function getMessageId()
    {
        return $this->messageId;
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