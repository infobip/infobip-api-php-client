<?php
namespace infobip\api\model\nc\notify;
use JsonSerializable;

/**
 * This is a generated class and is not intended for modification!
 * TODO: Point to Github contribution instructions
 */
class NumberContextResponse implements JsonSerializable
{
    private $bulkId;
    /**
     * @var \infobip\api\model\nc\notify\NumberContextResponseDetails[]
     */
    private $results;


    public function setBulkId($bulkId)
    {
        $this->bulkId = $bulkId;
    }

    public function getBulkId()
    {
        return $this->bulkId;
    }

    /**
     * @param \infobip\api\model\nc\notify\NumberContextResponseDetails[] $results
     */
    public function setResults($results)
    {
        $this->results = $results;
    }

    /**
     * @return \infobip\api\model\nc\notify\NumberContextResponseDetails[]
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