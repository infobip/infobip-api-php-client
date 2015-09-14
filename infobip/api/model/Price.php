<?php
namespace infobip\api\model;
use JsonSerializable;

/**
 * This is a generated class and is not intended for modification!
 * TODO: Point to Github contribution instructions
 */
class Price implements JsonSerializable
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
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

?>