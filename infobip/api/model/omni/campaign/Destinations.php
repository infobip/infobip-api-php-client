<?php
namespace infobip\api\model\omni\campaign;

/**
 * This is a generated class and is not intended for modification!
 */
class Destinations implements \JsonSerializable
{
    /**
     * @var \infobip\api\model\omni\campaign\Destination[]
     */
    private $destinations;


    /**
     * @param \infobip\api\model\omni\campaign\Destination[] $destinations
     */
    public function setDestinations($destinations)
    {
        $this->destinations = $destinations;
    }

    /**
     * @return \infobip\api\model\omni\campaign\Destination[]
     */
    public function getDestinations()
    {
        return $this->destinations;
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