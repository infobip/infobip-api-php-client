<?php
namespace infobip\api\model;

/**
 * This is a generated class and is not intended for modification!
 */
class Price implements \JsonSerializable
{
    private $pricePerMessage;
    private $pricePerLookup;
    private $currency;


    public function setPricePerMessage($pricePerMessage)
    {
        $this->pricePerMessage = $pricePerMessage;
    }
    public function getPricePerMessage()
    {
        return $this->pricePerMessage;
    }

    public function setPricePerLookup($pricePerLookup)
    {
        $this->pricePerLookup = $pricePerLookup;
    }
    public function getPricePerLookup()
    {
        return $this->pricePerLookup;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
    public function getCurrency()
    {
        return $this->currency;
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