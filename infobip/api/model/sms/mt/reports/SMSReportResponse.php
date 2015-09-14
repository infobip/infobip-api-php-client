<?php
namespace infobip\api\model\sms\mt\reports;
use JsonSerializable;

/**
 * This is a generated class and is not intended for modification!
 * TODO: Point to Github contribution instructions
 */
class SMSReportResponse implements JsonSerializable
{
    /**
     * @var \infobip\api\model\sms\mt\reports\SMSReport[]
     */
    private $results;


    /**
     * @param \infobip\api\model\sms\mt\reports\SMSReport[] $results
     */
    public function setResults($results)
    {
        $this->results = $results;
    }

    /**
     * @return \infobip\api\model\sms\mt\reports\SMSReport[]
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