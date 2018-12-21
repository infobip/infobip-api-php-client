<?php
/*
 * @package: Infobip
 * @class: infobip\api\model\people\persons\contacts
 * @author: Zain Baloch
 */

namespace infobip\api\model\people\persons\contacts;

/**
 * This is a generated class and is not intended for modification!
 */
class Email implements \JsonSerializable
{
    /* @var $address string */
    private $address;

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
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