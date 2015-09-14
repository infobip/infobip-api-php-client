<?php
/**
 * Created by PhpStorm.
 * User: nmenkovic
 * Date: 9/8/15
 * Time: 4:37 PM
 */

namespace infobip\api\model\account;


use JsonSerializable;

class AccountBalance implements JsonSerializable
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