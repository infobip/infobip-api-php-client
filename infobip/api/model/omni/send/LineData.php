<?php
namespace infobip\api\model\omni\send;

/**
 * This is a generated class and is not intended for modification!
 */
class LineData implements \JsonSerializable
{
    private $type;
    private $url;
    private $thumbnailUrl;
    private $duration;
    private $packageId;
    private $stickerId;
    private $text;
    private $validityPeriod;
    private $validityPeriodTimeUnit;


    public function setType($type)
    {
        $this->type = $type;
    }
    public function getType()
    {
        return $this->type;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }
    public function getUrl()
    {
        return $this->url;
    }

    public function setThumbnailUrl($thumbnailUrl)
    {
        $this->thumbnailUrl = $thumbnailUrl;
    }
    public function getThumbnailUrl()
    {
        return $this->thumbnailUrl;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
    }
    public function getDuration()
    {
        return $this->duration;
    }

    public function setPackageId($packageId)
    {
        $this->packageId = $packageId;
    }
    public function getPackageId()
    {
        return $this->packageId;
    }

    public function setStickerId($stickerId)
    {
        $this->stickerId = $stickerId;
    }
    public function getStickerId()
    {
        return $this->stickerId;
    }

    public function setText($text)
    {
        $this->text = $text;
    }
    public function getText()
    {
        return $this->text;
    }

    public function setValidityPeriod($validityPeriod)
    {
        $this->validityPeriod = $validityPeriod;
    }
    public function getValidityPeriod()
    {
        return $this->validityPeriod;
    }

    public function setValidityPeriodTimeUnit($validityPeriodTimeUnit)
    {
        $this->validityPeriodTimeUnit = $validityPeriodTimeUnit;
    }
    public function getValidityPeriodTimeUnit()
    {
        return $this->validityPeriodTimeUnit;
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