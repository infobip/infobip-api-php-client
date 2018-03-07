<?php
namespace infobip\api\model\sms\mt\send\binary;

/**
 * This is a generated class and is not intended for modification!
 */
class BinaryContent implements \JsonSerializable
{
    private $hex;
    private $dataCoding;
    private $esmClass;


    public function setHex($hex)
    {
        $this->hex = $hex;
    }
    public function getHex()
    {
        return $this->hex;
    }

    public function setDataCoding($dataCoding)
    {
        $this->dataCoding = $dataCoding;
    }
    public function getDataCoding()
    {
        return $this->dataCoding;
    }

    public function setEsmClass($esmClass)
    {
        $this->esmClass = $esmClass;
    }
    public function getEsmClass()
    {
        return $this->esmClass;
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