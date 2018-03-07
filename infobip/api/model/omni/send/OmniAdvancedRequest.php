<?php
namespace infobip\api\model\omni\send;

/**
 * This is a generated class and is not intended for modification!
 */
class OmniAdvancedRequest implements \JsonSerializable
{
    /**
     * @var \infobip\api\model\omni\Destination[]
     */
    private $destinations;
    private $bulkId;
    private $scenarioKey;
    /**
     * @var \infobip\api\model\omni\send\SmsData
     */
    private $sms;
    /**
     * @var \infobip\api\model\omni\send\ParsecoData
     */
    private $parseco;
    /**
     * @var \infobip\api\model\omni\send\ViberData
     */
    private $viber;
    /**
     * @var \infobip\api\model\omni\send\VoiceData
     */
    private $voice;
    /**
     * @var \infobip\api\model\omni\send\EmailData
     */
    private $email;
    /**
     * @var \infobip\api\model\omni\send\PushData
     */
    private $push;
    /**
     * @var \infobip\api\model\omni\send\FacebookData
     */
    private $facebook;
    /**
     * @var \infobip\api\model\omni\send\LineData
     */
    private $line;
    /**
     * @var \infobip\api\model\omni\send\VKontakteData
     */
    private $vKontakte;
    private $notify;
    private $intermediateReport;
    private $notifyUrl;
    private $notifyContentType;
    private $callbackData;
    /**
     * @var \infobip\api\model\FormattedDateTime
     */
    private $sendAt;


    /**
     * @param \infobip\api\model\omni\Destination[] $destinations
     */
    public function setDestinations($destinations)
    {
        $this->destinations = $destinations;
    }

    /**
     * @return \infobip\api\model\omni\Destination[]
     */
    public function getDestinations()
    {
        return $this->destinations;
    }

    public function setBulkId($bulkId)
    {
        $this->bulkId = $bulkId;
    }
    public function getBulkId()
    {
        return $this->bulkId;
    }

    public function setScenarioKey($scenarioKey)
    {
        $this->scenarioKey = $scenarioKey;
    }
    public function getScenarioKey()
    {
        return $this->scenarioKey;
    }

    /**
     * @param \infobip\api\model\omni\send\SmsData $sms
     */
    public function setSms($sms)
    {
        $this->sms = $sms;
    }

    /**
     * @return \infobip\api\model\omni\send\SmsData
     */
    public function getSms()
    {
        return $this->sms;
    }

    /**
     * @param \infobip\api\model\omni\send\ParsecoData $parseco
     */
    public function setParseco($parseco)
    {
        $this->parseco = $parseco;
    }

    /**
     * @return \infobip\api\model\omni\send\ParsecoData
     */
    public function getParseco()
    {
        return $this->parseco;
    }

    /**
     * @param \infobip\api\model\omni\send\ViberData $viber
     */
    public function setViber($viber)
    {
        $this->viber = $viber;
    }

    /**
     * @return \infobip\api\model\omni\send\ViberData
     */
    public function getViber()
    {
        return $this->viber;
    }

    /**
     * @param \infobip\api\model\omni\send\VoiceData $voice
     */
    public function setVoice($voice)
    {
        $this->voice = $voice;
    }

    /**
     * @return \infobip\api\model\omni\send\VoiceData
     */
    public function getVoice()
    {
        return $this->voice;
    }

    /**
     * @param \infobip\api\model\omni\send\EmailData $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return \infobip\api\model\omni\send\EmailData
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param \infobip\api\model\omni\send\PushData $push
     */
    public function setPush($push)
    {
        $this->push = $push;
    }

    /**
     * @return \infobip\api\model\omni\send\PushData
     */
    public function getPush()
    {
        return $this->push;
    }

    /**
     * @param \infobip\api\model\omni\send\FacebookData $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @return \infobip\api\model\omni\send\FacebookData
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param \infobip\api\model\omni\send\LineData $line
     */
    public function setLine($line)
    {
        $this->line = $line;
    }

    /**
     * @return \infobip\api\model\omni\send\LineData
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * @param \infobip\api\model\omni\send\VKontakteData $vKontakte
     */
    public function setVKontakte($vKontakte)
    {
        $this->vKontakte = $vKontakte;
    }

    /**
     * @return \infobip\api\model\omni\send\VKontakteData
     */
    public function getVKontakte()
    {
        return $this->vKontakte;
    }

    public function setNotify($notify)
    {
        $this->notify = $notify;
    }
    public function isNotify()
    {
        return $this->notify;
    }

    public function setIntermediateReport($intermediateReport)
    {
        $this->intermediateReport = $intermediateReport;
    }
    public function isIntermediateReport()
    {
        return $this->intermediateReport;
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

    public function setCallbackData($callbackData)
    {
        $this->callbackData = $callbackData;
    }
    public function getCallbackData()
    {
        return $this->callbackData;
    }

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