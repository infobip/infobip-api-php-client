<?php
namespace infobip\api\model\sms\mt\send\textual;

/**
 * This is a generated class and is not intended for modification!
 */
class SMSTextualRequest implements \JsonSerializable
{
    private $from;
    /**
     * @var \string[]
     */
    private $to;
    private $text;
    private $campaignId;
    private $operatorClientId;
    private $transliteration;


    public function setFrom($from)
    {
        $this->from = $from;
    }
    public function getFrom()
    {
        return $this->from;
    }

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

    public function setText($text)
    {
        $this->text = $text;
    }
    public function getText()
    {
        return $this->text;
    }

    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;
    }
    public function getCampaignId()
    {
        return $this->campaignId;
    }

    public function setOperatorClientId($operatorClientId)
    {
        $this->operatorClientId = $operatorClientId;
    }
    public function getOperatorClientId()
    {
        return $this->operatorClientId;
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