<?php
namespace infobip\api\model;

/**
 * This is a generated class and is not intended for modification!
 */
class Status implements \JsonSerializable
{
    private $groupName;
    private $groupId;
    private $name;
    private $description;
    private $action;
    private $id;


    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;
    }
    public function getGroupName()
    {
        return $this->groupName;
    }

    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    }
    public function getGroupId()
    {
        return $this->groupId;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function setAction($action)
    {
        $this->action = $action;
    }
    public function getAction()
    {
        return $this->action;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
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