<?php
namespace infobip\api\model\sms\mt\send;
use JsonSerializable;

/**
 * This is a generated class and is not intended for modification!
 * TODO: Point to Github contribution instructions
 */
class Language implements JsonSerializable
{
    private $lockingShift;
    private $singleShift;
    private $languageCode;


    public function setLockingShift($lockingShift)
    {
        $this->lockingShift = $lockingShift;
    }

    public function isLockingShift()
    {
        return $this->lockingShift;
    }

    public function setSingleShift($singleShift)
    {
        $this->singleShift = $singleShift;
    }

    public function isSingleShift()
    {
        return $this->singleShift;
    }

    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

?>