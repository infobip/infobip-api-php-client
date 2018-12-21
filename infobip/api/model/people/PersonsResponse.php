<?php
/*
 * @package: Infobip
 * @class: infobip\api\model\people\PersonsResponse
 * @author: Zain Baloch
 */

namespace infobip\api\model\people;

/**
 * This is a generated class and is not intended for modification!
 */
class PersonsResponse implements \JsonSerializable
{
    /**
     * @var \infobip\api\model\people\Persons
     */
    private $person;

    /**
     * @return \infobip\api\model\people\Persons
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param \infobip\api\model\people\Persons $persons
     */
    public function setPerson($person)
    {
        $this->person = $person;
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