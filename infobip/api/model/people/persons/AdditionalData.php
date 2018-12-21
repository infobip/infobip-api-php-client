<?php
/*
 * @package: Infobip
 * @class: infobip\api\model\people\persons
 * @author: Zain Baloch
 */

namespace infobip\api\model\people\persons;

use Exception;

/**
 * This is a generated class and is not intended for modification!
 */
class AdditionalData implements \JsonSerializable
{
    protected $data = [];

    /*
     * Magic Method __call used to get/set dynamic property/values
     * @param string $methodName
     * @param array $args
     * @return mixed
     */
    public function __call($methodName, $args)
    {
        if (preg_match('~^(set|get)([A-Z])(.*)$~', $methodName, $matches)) {
            $property = strtolower($matches[2]) . $matches[3];
            switch ($matches[1]) {
                case 'set':
                    $this->set($property, $args[0]);
                    break;
                case 'get':
                    return $this->get($property);
                case 'default':
                    throw new Exception("Method $methodName doesn't exist.");
            }
        }
        return false;
    }

    /*
     * Get Method
     * @return string
     */
    protected function get($key)
    {
        return $this->data[$key];
    }

    /*
     * Set Method
     * @param string $key
     * @param string $value
     * @return void
     */
    protected function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    /*
     * Return Dynamically set key/values to be used in json post
     * @return array
     */
    public function getData() {
        return $this->data;
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