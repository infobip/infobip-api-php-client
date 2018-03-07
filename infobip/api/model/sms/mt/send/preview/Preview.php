<?php
namespace infobip\api\model\sms\mt\send\preview;

/**
 * This is a generated class and is not intended for modification!
 */
class Preview implements \JsonSerializable
{
    private $textPreview;
    private $messageCount;
    private $charactersRemaining;
    /**
     * @var \infobip\api\model\sms\mt\send\preview\Configuration
     */
    private $configuration;


    public function setTextPreview($textPreview)
    {
        $this->textPreview = $textPreview;
    }
    public function getTextPreview()
    {
        return $this->textPreview;
    }

    public function setMessageCount($messageCount)
    {
        $this->messageCount = $messageCount;
    }
    public function getMessageCount()
    {
        return $this->messageCount;
    }

    public function setCharactersRemaining($charactersRemaining)
    {
        $this->charactersRemaining = $charactersRemaining;
    }
    public function getCharactersRemaining()
    {
        return $this->charactersRemaining;
    }

    /**
     * @param \infobip\api\model\sms\mt\send\preview\Configuration $configuration
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return \infobip\api\model\sms\mt\send\preview\Configuration
     */
    public function getConfiguration()
    {
        return $this->configuration;
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