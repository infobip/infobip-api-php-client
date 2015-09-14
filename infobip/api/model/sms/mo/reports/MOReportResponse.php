<?php
namespace infobip\api\model\sms\mo\reports;
use JsonSerializable;

/**
 * This is a generated class and is not intended for modification!
 * TODO: Point to Github contribution instructions
 */
class MOReportResponse implements JsonSerializable
{
    /**
     * @var \infobip\api\model\sms\mo\reports\MOReport[]
     */
    private $results;


    /**
     * @param \infobip\api\model\sms\mo\reports\MOReport[] $results
     */
    public function setResults($results)
    {
        $this->results = $results;
    }

    /**
     * @return \infobip\api\model\sms\mo\reports\MOReport[]
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