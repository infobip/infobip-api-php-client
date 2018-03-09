<?php
namespace infobip\api\model\nc\notify;

/**
 * This is a generated class and is not intended for modification!
 */
class NumberContextRequest implements \JsonSerializable
{
    /**
     * @var \string[]
     */
    private $to;
    private $notifyUrl;
    private $notifyContentType;


    /**
     * @param \string[] $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return \string[]
     */
    public function getTo()
    {
        return $this->to;
    }

    public function setNotifyUrl($notifyUrl)
    {
        $this->notifyUrl = $notifyUrl;
    }
    public function getNotifyUrl()
    {
        return $this->notifyUrl;
    }

    public function setNotifyContentType($notifyContentType)
    {
        $this->notifyContentType = $notifyContentType;
    }
    public function getNotifyContentType()
    {
        return $this->notifyContentType;
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