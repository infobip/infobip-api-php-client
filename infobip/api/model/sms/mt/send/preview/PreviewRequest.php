<?php
namespace infobip\api\model\sms\mt\send\preview;

/**
 * This is a generated class and is not intended for modification!
 */
class PreviewRequest implements \JsonSerializable
{
    private $text;
    private $languageCode;
    private $transliteration;


    public function setText($text)
    {
        $this->text = $text;
    }
    public function getText()
    {
        return $this->text;
    }

    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }
    public function getLanguageCode()
    {
        return $this->languageCode;
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