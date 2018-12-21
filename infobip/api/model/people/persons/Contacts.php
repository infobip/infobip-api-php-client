<?php
/*
 * @package: Infobip
 * @class: infobip\api\model\people\persons\Contacts
 * @author: Zain Baloch
 */

namespace infobip\api\model\people\persons;

use infobip\api\model\people\persons\contacts\Email;
use infobip\api\model\people\persons\contacts\Phone;

/**
 * This is a generated class and is not intended for modification!
 */
class Contacts implements \JsonSerializable
{
    /* @var $phone Phone */
    private $phone;
    /* @var $email Email */
    private $email;
    /* @var $push array */
    private $push;
    /* @var $facebook array */
    private $facebook;
    /* @var $telegram array */
    private $telegram;
    /* @var $line array */
    private $line;

    /**
     * @return Phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param Phone $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param Email $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return array
     */
    public function getPush()
    {
        return $this->push;
    }

    /**
     * @param array $Push
     */
    public function setPush($push)
    {
        $this->push = $push;
    }

    /**
     * @return array
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param array $Facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @return array
     */
    public function getTelegram()
    {
        return $this->telegram;
    }

    /**
     * @param array $telegram
     */
    public function setTelegram($telegram)
    {
        $this->telegram = $telegram;
    }

    /**
     * @return array
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * @param array $line
     */
    public function setLine($line)
    {
        $this->line = $line;
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