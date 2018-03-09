<?php
namespace infobip\api\model\omni\scenarios;

/**
 * This is a generated class and is not intended for modification!
 */
class ScenariosResponse implements \JsonSerializable
{
    /**
     * @var \infobip\api\model\omni\scenarios\Scenario[]
     */
    private $scenarios;


    /**
     * @param \infobip\api\model\omni\scenarios\Scenario[] $scenarios
     */
    public function setScenarios($scenarios)
    {
        $this->scenarios = $scenarios;
    }

    /**
     * @return \infobip\api\model\omni\scenarios\Scenario[]
     */
    public function getScenarios()
    {
        return $this->scenarios;
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