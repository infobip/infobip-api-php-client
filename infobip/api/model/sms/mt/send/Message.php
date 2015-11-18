<?php
namespace infobip\api\model\sms\mt\send;

/**
 * This is a generated class and is not intended for modification!
 * TODO: Point to Github contribution instructions
 */
class Message implements \JsonSerializable
{
    private $campaignId;
    /**
     * @var \infobip\api\model\Destination[]
     */
    private $destinations;
    /**
     * @var \infobip\api\model\sms\mt\send\Language
     */
    private $language;
    private $notify;
    private $notifyContentType;
    /**
     * @var \Long
     */
    private $validityPeriod;
    /**
     * @var \infobip\api\model\sms\mt\send\binary\BinaryContent
     */
    private $binary;
    private $callbackData;
    private $notifyUrl;
    private $from;
    private $text;
    /**
     * @var \DateTime
     */
    private $sendAt;
    private $transliteration;
    /**
     * @var \Boolean
     */
    private $flash = false;
    private $intermediateReport;


    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;
    }
    public function getCampaignId()
    {
        return $this->campaignId;
    }

    /**
     * @param \infobip\api\model\Destination[] $destinations
     */
    public function setDestinations($destinations)
    {
        $this->destinations = $destinations;
    }

    /**
     * @return \infobip\api\model\Destination[]
     */
    public function getDestinations()
    {
        return $this->destinations;
    }

    /**
     * @param \infobip\api\model\sms\mt\send\Language $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return \infobip\api\model\sms\mt\send\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    public function setNotify($notify)
    {
        $this->notify = $notify;
    }
    public function isNotify()
    {
        return $this->notify;
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
     * @param \Long $validityPeriod
     */
    public function setValidityPeriod($validityPeriod)
    {
        $this->validityPeriod = $validityPeriod;
    }

    /**
     * @return \Long
     */
    public function getValidityPeriod()
    {
        return $this->validityPeriod;
    }

    /**
     * @param \infobip\api\model\sms\mt\send\binary\BinaryContent $binary
     */
    public function setBinary($binary)
    {
        $this->binary = $binary;
    }

    /**
     * @return \infobip\api\model\sms\mt\send\binary\BinaryContent
     */
    public function getBinary()
    {
        return $this->binary;
    }

    public function setCallbackData($callbackData)
    {
        $this->callbackData = $callbackData;
    }
    public function getCallbackData()
    {
        return $this->callbackData;
    }

    public function setNotifyUrl($notifyUrl)
    {
        $this->notifyUrl = $notifyUrl;
    }
    public function getNotifyUrl()
    {
        return $this->notifyUrl;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }
    public function getFrom()
    {
        return $this->from;
    }

    public function setText($text)
    {
        $this->text = $text;
    }
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param \DateTime $sendAt
     */
    public function setSendAt($sendAt)
    {
        $this->sendAt = $sendAt;
    }

    /**
     * @return \DateTime
     */
    public function getSendAt()
    {
        return $this->sendAt;
    }

    public function setTransliteration($transliteration)
    {
        $this->transliteration = $transliteration;
    }
    public function getTransliteration()
    {
        return $this->transliteration;
    }

    /**
     * @param \Boolean $flash
     */
    public function setFlash($flash)
    {
        $this->flash = $flash;
    }

    /**
     * @return \Boolean
     */
    public function isFlash()
    {
        return $this->flash;
    }

    public function setIntermediateReport($intermediateReport)
    {
        $this->intermediateReport = $intermediateReport;
    }
    public function isIntermediateReport()
    {
        return $this->intermediateReport;
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