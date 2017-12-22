<?php
namespace infobip\api\model\sms\mt\send\voice;

/**
 * This is a generated class and is not intended for modification!
 */
class SMSMultiVoiceRequest implements \JsonSerializable
{
    /**
     * @var \infobip\api\model\sms\mt\send\Message[]
     */
    private $messages;

    /**
     * @var \infobip\api\model\sms\mt\send\Tracking
     */
    private $tracking;

    /**
     * @param \infobip\api\model\sms\mt\send\Message[] $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    /**
     * @return \infobip\api\model\sms\mt\send\Message[]
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param \infobip\api\model\sms\mt\send\Tracking $tracking
     */
    public function setTracking($tracking)
    {
        $this->tracking = $tracking;
    }

    /**
     * @return \infobip\api\model\sms\mt\send\Tracking
     */
    public function getTracking()
    {
        return $this->tracking;
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