<?php
namespace infobip\api\model\sms\mt\send\preview;

/**
 * This is a generated class and is not intended for modification!
 */
class PreviewResponse implements \JsonSerializable
{
    private $originalText;
    /**
     * @var \infobip\api\model\sms\mt\send\preview\Preview[]
     */
    private $previews;


    public function setOriginalText($originalText)
    {
        $this->originalText = $originalText;
    }
    public function getOriginalText()
    {
        return $this->originalText;
    }

    /**
     * @param \infobip\api\model\sms\mt\send\preview\Preview[] $previews
     */
    public function setPreviews($previews)
    {
        $this->previews = $previews;
    }

    /**
     * @return \infobip\api\model\sms\mt\send\preview\Preview[]
     */
    public function getPreviews()
    {
        return $this->previews;
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