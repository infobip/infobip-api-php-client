<?php
namespace infobip\api\model\omni\scenarios;

/**
 * This is a generated class and is not intended for modification!
 */
class Scenario implements \JsonSerializable
{
    private $key;
    private $name;
    /**
     * @var \infobip\api\model\omni\scenarios\Step[]
     */
    private $flow;
    private $defaultScenario;


    public function setKey($key)
    {
        $this->key = $key;
    }
    public function getKey()
    {
        return $this->key;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \infobip\api\model\omni\scenarios\Step[] $flow
     */
    public function setFlow($flow)
    {
        $this->flow = $flow;
    }

    /**
     * @return \infobip\api\model\omni\scenarios\Step[]
     */
    public function getFlow()
    {
        return $this->flow;
    }

    public function setDefaultScenario($defaultScenario)
    {
        $this->defaultScenario = $defaultScenario;
    }
    public function isDefaultScenario()
    {
        return $this->defaultScenario;
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