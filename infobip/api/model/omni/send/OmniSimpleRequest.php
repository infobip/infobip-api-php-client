<?php
namespace infobip\api\model\omni\send;

/**
 * This is a generated class and is not intended for modification!
 */
class OmniSimpleRequest implements \JsonSerializable
{
    /**
     * @var \infobip\api\model\omni\Destination[]
     */
    private $destinations;
    private $bulkId;
    private $scenarioKey;
    private $text;
    private $mailSubject;


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

    public function setText($text)
    {
        $this->text = $text;
    }
    public function getText()
    {
        return $this->text;
    }

    public function setMailSubject($mailSubject)
    {
        $this->mailSubject = $mailSubject;
    }
    public function getMailSubject()
    {
        return $this->mailSubject;
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