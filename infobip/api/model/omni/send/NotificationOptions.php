<?php
namespace infobip\api\model\omni\send;

/**
 * This is a generated class and is not intended for modification!
 */
class NotificationOptions implements \JsonSerializable
{
    private $vibrationEnabled;
    private $soundEnabled;
    private $soundName;
    private $badge;
    private $contentUrl;
    private $category;


    public function setVibrationEnabled($vibrationEnabled)
    {
        $this->vibrationEnabled = $vibrationEnabled;
    }
    public function isVibrationEnabled()
    {
        return $this->vibrationEnabled;
    }

    public function setSoundEnabled($soundEnabled)
    {
        $this->soundEnabled = $soundEnabled;
    }
    public function isSoundEnabled()
    {
        return $this->soundEnabled;
    }

    public function setSoundName($soundName)
    {
        $this->soundName = $soundName;
    }
    public function getSoundName()
    {
        return $this->soundName;
    }

    public function setBadge($badge)
    {
        $this->badge = $badge;
    }
    public function getBadge()
    {
        return $this->badge;
    }

    public function setContentUrl($contentUrl)
    {
        $this->contentUrl = $contentUrl;
    }
    public function getContentUrl()
    {
        return $this->contentUrl;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function getCategory()
    {
        return $this->category;
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