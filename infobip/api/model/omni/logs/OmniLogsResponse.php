<?php
namespace infobip\api\model\omni\logs;

/**
 * This is a generated class and is not intended for modification!
 */
class OmniLogsResponse implements \JsonSerializable
{
    /**
     * @var \infobip\api\model\omni\logs\OmniLog[]
     */
    private $results;


    /**
     * @param \infobip\api\model\omni\logs\OmniLog[] $results
     */
    public function setResults($results)
    {
        $this->results = $results;
    }

    /**
     * @return \infobip\api\model\omni\logs\OmniLog[]
     */
    public function getResults()
    {
        return $this->results;
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