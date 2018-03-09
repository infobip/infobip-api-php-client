<?php
namespace infobip\api\model\omni\send;

/**
 * This is a generated class and is not intended for modification!
 */
class Language implements \JsonSerializable
{
    private $singleShift;
    private $lockingShift;
    private $languageCode;


    public function setSingleShift($singleShift)
    {
        $this->singleShift = $singleShift;
    }
    public function isSingleShift()
    {
        return $this->singleShift;
    }

    public function setLockingShift($lockingShift)
    {
        $this->lockingShift = $lockingShift;
    }
    public function isLockingShift()
    {
        return $this->lockingShift;
    }

    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }
    public function getLanguageCode()
    {
        return $this->languageCode;
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