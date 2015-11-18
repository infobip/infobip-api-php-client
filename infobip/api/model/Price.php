<?php
namespace infobip\api\model;

/**
 * This is a generated class and is not intended for modification!
 * TODO: Point to Github contribution instructions
 */
class Price implements \JsonSerializable
{
    private $pricePerLookup;
    private $pricePerMessage;
    private $currency;


    public function setPricePerLookup($pricePerLookup)
    {
        $this->pricePerLookup = $pricePerLookup;
    }
    public function getPricePerLookup()
    {
        return $this->pricePerLookup;
    }

    public function setPricePerMessage($pricePerMessage)
    {
        $this->pricePerMessage = $pricePerMessage;
    }
    public function getPricePerMessage()
    {
        return $this->pricePerMessage;
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