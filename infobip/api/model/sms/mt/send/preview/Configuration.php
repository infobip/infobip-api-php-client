<?php
namespace infobip\api\model\sms\mt\send\preview;

/**
 * This is a generated class and is not intended for modification!
 */
class Configuration implements \JsonSerializable
{
    /**
     * @var \infobip\api\model\sms\mt\send\Language
     */
    private $language;
    private $transliteration;


    /**
     * @param \infobip\api\model\sms\mt\send\Language $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return \infobip\api\model\sms\mt\send\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    public function setTransliteration($transliteration)
    {
        $this->transliteration = $transliteration;
    }
    public function getTransliteration()
    {
        return $this->transliteration;
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