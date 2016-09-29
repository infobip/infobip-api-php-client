<?php
namespace infobip\api\model\account;

/**
 * This is a generated class and is not intended for modification!
 */
class AccountBalance implements \JsonSerializable
{
    private $balance;
    private $currency;


    public function setBalance($balance)
    {
        $this->balance = $balance;
    }
    public function getBalance()
    {
        return $this->balance;
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