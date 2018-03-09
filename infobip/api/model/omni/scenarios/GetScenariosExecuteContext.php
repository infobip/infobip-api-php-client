<?php
namespace infobip\api\model\omni\scenarios;

/**
 * This is a generated class and is not intended for modification!
 */
class GetScenariosExecuteContext implements \JsonSerializable
{
    private $isDefault;
    private $limit;
    private $page;


    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
    }
    public function isIsDefault()
    {
        return $this->isDefault;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
    }
    public function getLimit()
    {
        return $this->limit;
    }

    public function setPage($page)
    {
        $this->page = $page;
    }
    public function getPage()
    {
        return $this->page;
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