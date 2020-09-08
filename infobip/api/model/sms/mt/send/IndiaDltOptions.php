<?php
namespace infobip\api\model\sms\mt\send;

/**
 * This is a generated class and is not intended for modification!
 */
class IndiaDltOptions implements \JsonSerializable
{
    private $contentTemplateId;
    private $principalEntityId;


    public function setContentTemplateId($contentTemplateId)
    {
        $this->contentTemplateId = $contentTemplateId;
    }
    public function getContentTemplateId()
    {
        return $this->contentTemplateId;
    }

    public function setPrincipalEntityId($principalEntityId)
    {
        $this->principalEntityId = $principalEntityId;
    }
    public function getPrincipalEntityId()
    {
        return $this->principalEntityId;
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