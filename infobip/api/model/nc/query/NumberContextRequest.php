<?php
namespace infobip\api\model\nc\query;
use JsonSerializable;

/**
 * This is a generated class and is not intended for modification!
 * TODO: Point to Github contribution instructions
 */
class NumberContextRequest implements JsonSerializable
{
    /**
     * @var \string[]
     */
    private $to;


    /**
     * @param \string[] $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return \string[]
     */
    public function getTo()
    {
        return $this->to;
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