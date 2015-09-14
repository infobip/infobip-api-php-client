<?php
namespace infobip\api\model\sms\mo\logs;

use JsonSerializable;

/**
 * This is a generated class and is not intended for modification!
 * TODO: Point to Github contribution instructions
 */
class MOLogsResponse implements JsonSerializable
{
    /**
     * @var \infobip\api\model\sms\mo\logs\MOLog[]
     */
    private $results;


    /**
     * @param \infobip\api\model\sms\mo\logs\MOLog[] $results
     */
    public function setResults($results)
    {
        $this->results = $results;
    }

    /**
     * @return \infobip\api\model\sms\mo\logs\MOLog[]
     */
    public function getResults()
    {
        return $this->results;
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