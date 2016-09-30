<?php
namespace infobip\api\model\sms\mt\send\binary;

/**
 * This is a generated class and is not intended for modification!
 */
class SMSBinaryRequest implements \JsonSerializable
{
    private $operatorClientId;
    private $campaignId;
    /**
     * @var \infobip\api\model\sms\mt\send\binary\BinaryContent
     */
    private $binary;
    private $from;
    /**
     * @var \string[]
     */
    private $to;


    public function setOperatorClientId($operatorClientId)
    {
        $this->operatorClientId = $operatorClientId;
    }
    public function getOperatorClientId()
    {
        return $this->operatorClientId;
    }

    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;
    }
    public function getCampaignId()
    {
        return $this->campaignId;
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