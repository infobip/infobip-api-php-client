<?php
namespace infobip\api\model\omni\send;

/**
 * This is a generated class and is not intended for modification!
 */
class EmailData implements \JsonSerializable
{
    private $subject;
    private $text;
    private $validityPeriod;
    private $validityPeriodTimeUnit;


    public function setSubject($subject)
    {
        $this->subject = $subject;
    }
    public function getSubject()
    {
        return $this->subject;
    }

    public function setText($text)
    {
        $this->text = $text;
    }
    public function getText()
    {
        return $this->text;
    }

    public function setValidityPeriod($validityPeriod)
    {
        $this->validityPeriod = $validityPeriod;
    }
    public function getValidityPeriod()
    {
        return $this->validityPeriod;
    }

    public function setValidityPeriodTimeUnit($validityPeriodTimeUnit)
    {
        $this->validityPeriodTimeUnit = $validityPeriodTimeUnit;
    }
    public function getValidityPeriodTimeUnit()
    {
        return $this->validityPeriodTimeUnit;
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